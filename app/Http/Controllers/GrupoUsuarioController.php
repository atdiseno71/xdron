<?php

namespace App\Http\Controllers;

use App\Models\GrupoUsuario;
use Illuminate\Http\Request;

/**
 * Class GrupoUsuarioController
 * @package App\Http\Controllers
 */
class GrupoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupoUsuarios = GrupoUsuario::paginate();

        return view('grupo-usuario.index', compact('grupoUsuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $grupoUsuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupoUsuario = new GrupoUsuario();
        return view('grupo-usuario.create', compact('grupoUsuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(GrupoUsuario::$rules);

        $grupoUsuario = GrupoUsuario::create($request->all());

        return redirect()->route('grupo-usuarios.index')
            ->with('success', 'GrupoUsuario created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupoUsuario = GrupoUsuario::find($id);

        return view('grupo-usuario.show', compact('grupoUsuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupoUsuario = GrupoUsuario::find($id);

        return view('grupo-usuario.edit', compact('grupoUsuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  GrupoUsuario $grupoUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrupoUsuario $grupoUsuario)
    {
        request()->validate(GrupoUsuario::$rules);

        $grupoUsuario->update($request->all());

        return redirect()->route('grupo-usuarios.index')
            ->with('success', 'GrupoUsuario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $grupoUsuario = GrupoUsuario::find($id)->delete();

        return redirect()->route('grupo-usuarios.index')
            ->with('success', 'GrupoUsuario deleted successfully');
    }
}
