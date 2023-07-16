<?php

namespace App\Http\Controllers\V1;

use App\Models\User;
use App\Models\Finca;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{

    function __construct()
    {
        $this->middleware('can:clientes.index')->only('index');
        $this->middleware('can:clientes.create')->only('create', 'store');
        $this->middleware('can:clientes.show')->only('show');
        $this->middleware('can:clientes.edit')->only('edit', 'update', 'active', 'updateRol');
        $this->middleware('can:clientes.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = User::where('id_role', config('roles.cliente'))->paginate();

        return view('cliente.index', compact('clientes'))
            ->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente();

        $users = User::where('id_role', config('roles.cliente'))->pluck('name', 'id');
        $fincas = Finca::where('id_role', config('roles.cliente'))->pluck('name', 'id');

        return view('cliente.create', compact('cliente', 'users', 'fincas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cliente::$rules);

        $cliente = Cliente::create($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $cliente = Cliente::where('id_user', $user->id)->first() ?? '';

        $fincas = Finca::pluck('name', 'id');

        return view('cliente.edit', compact('user', 'fincas', 'cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $cliente)
    {
        request()->validate(Cliente::$rules);

        $data = $request->all();

        $data['id_user'] = $cliente->id;

        $new_client = Cliente::create($data);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado con éxito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cliente = Cliente::where('id_user', $id)->delete();

        $user = User::find($id)->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente eliminado con éxito.');
    }
}
