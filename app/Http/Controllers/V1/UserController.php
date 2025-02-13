<?php

namespace App\Http\Controllers\V1;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\TypeDocument;
use App\Models\ClientUsers;
use App\Models\Client;
use App\Models\User;
use App\Models\Role;

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
        $users = User::whereNotIn('id_role', [config('roles.super_root')])->with('roles')->paginate();

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
        $roles = Role::whereNotIn('id', [1])->pluck('name', 'id');
        $clients = Client::pluck('social_reason as label', 'id as name');

        $user = new User();

        $selectedClients = $user->clients;

        return view('user.create', compact('selectedClients', 'user', 'clients', 'type_documents', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        request()->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
            'id_role' => 'required',
            'id_type_document' => 'required',
            'document_number' => 'required',
            'phone' => 'required|numeric|digits:10',
        ]);

        $request['password'] = Hash::make($request['document_number']);

        $new_user = $this->model->create($request->all());

        $clients = $request['id_cliente'];

        if (isset($clients) && empty($clients)) {
            // echo "La variable \$clients está definida pero está vacía.";
        } elseif (!isset($clients)) {
            // echo "La variable \$clients no está definida.";
        } else {
            foreach ($clients as $id_client) {
                ClientUsers::create(array(
                    'client_id' => $id_client,
                    'user_id' => $new_user->id,
                ));
            }
        }

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
        $roles = Role::whereNotIn('id', [1])->pluck('name', 'id');
        $clients = Client::pluck('social_reason as label', 'id as name');

        $user = $this->model->find($user->id);

        $selectedClients = $user->clients;

        return view('user.edit', compact('user', 'clients', 'type_documents', 'roles', 'selectedClients'));
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
        request()->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')->ignore($user->id)],
            'id_role' => 'required',
            'id_type_document' => 'required',
            'document_number' => 'required',
        ]);

        $request['password'] = Hash::make($request['document_number']);
        
        $clients = $request['id_cliente'];

        $user->update($request->all());

        if (isset($clients) && empty($clients)) {
            // echo "La variable \$clients está definida pero está vacía.";
        } elseif (!isset($clients)) {
            // echo "La variable \$clients no está definida.";
        } else {
            foreach ($clients as $id_client) {
                ClientUsers::create(array(
                    'client_id' => $id_client,
                    'user_id' => $user->id,
                ));
            }
        }

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

    /* TRAER NOTIFICACIONES USUARIO LOGEADO */
    public function getNotification()
    {

        $user = User::find(Auth::id());

        return response()
            ->json([
                'countPage' => count($user->notifications),
                'data' => json_decode($user->notifications),
            ]);

    }

}
