<?php

namespace App\Http\Controllers\V1;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\TypeDocument;
use Illuminate\Support\Facades\Log;

use Livewire\WithPagination;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    private $model;

    function __construct()
    {
        $this->model = new User();
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only('create', 'store');
        $this->middleware('can:users.show')->only('show');
        $this->middleware('can:users.edit')->only('edit', 'update', 'active', 'updateRol');
        $this->middleware('can:users.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $type_documents = TypeDocument::pluck('name', 'id');
        $roles = Role::pluck('name', 'id');

        $user = new User();

        return view('user.create', compact('user', 'type_documents', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(User::$rules);

        $request['password'] = Hash::make($request['username']);

        $new_user = $this->model->create($request->all());

        $new_user->assignRole($request->id_role);

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::whereNotIn('id', [1])->get();

        return view('user.editrol', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $type_documents = TypeDocument::pluck('name as label', 'id as value');
        $roles = Role::pluck('name as label', 'id as value');

        $user = $this->model->find($user->id);

        return view('user.edit', compact('user', 'type_documents', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update($request->all());

        $user->assignRole($request->id_role);

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado con éxito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = $this->model->find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado con éxito.');
    }

    /* Activar usuario en la plataforma */
    public function active(Request $request, $id) {
        $user = $this->model->find($id);
        $user->active = $request->active == 'on' ? 1 : 0;
        $user->save();
        $action = $user->active == 1 ? 'activado' : 'desactivado';
        $message = "Usuario {$action} con éxito.";

        return redirect()->route('users.index')
            ->with('success', $message);
    }

    public function updateRol(Request $request, User $user)
    {
        $user->assignRole($request->roles);
        return redirect()->route('users.asignar', $user)->with('info', 'Se asignaron los roles correctamente');
    }

}
