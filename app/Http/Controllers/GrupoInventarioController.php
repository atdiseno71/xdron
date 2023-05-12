<?php

namespace App\Http\Controllers;

use App\Models\GrupoInventario;
use Illuminate\Http\Request;

/**
 * Class GrupoInventarioController
 * @package App\Http\Controllers
 */
class GrupoInventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupoInventarios = GrupoInventario::paginate();

        return view('grupo-inventario.index', compact('grupoInventarios'))
            ->with('i', (request()->input('page', 1) - 1) * $grupoInventarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupoInventario = new GrupoInventario();
        return view('grupo-inventario.create', compact('grupoInventario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(GrupoInventario::$rules);

        $grupoInventario = GrupoInventario::create($request->all());

        return redirect()->route('grupo-inventarios.index')
            ->with('success', 'GrupoInventario created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupoInventario = GrupoInventario::find($id);

        return view('grupo-inventario.show', compact('grupoInventario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupoInventario = GrupoInventario::find($id);

        return view('grupo-inventario.edit', compact('grupoInventario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  GrupoInventario $grupoInventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrupoInventario $grupoInventario)
    {
        request()->validate(GrupoInventario::$rules);

        $grupoInventario->update($request->all());

        return redirect()->route('grupo-inventarios.index')
            ->with('success', 'GrupoInventario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $grupoInventario = GrupoInventario::find($id)->delete();

        return redirect()->route('grupo-inventarios.index')
            ->with('success', 'GrupoInventario deleted successfully');
    }
}
