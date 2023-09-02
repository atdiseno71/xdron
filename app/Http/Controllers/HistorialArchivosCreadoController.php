<?php

namespace App\Http\Controllers;

use App\Models\HistorialArchivosCreado;
use Illuminate\Http\Request;

/**
 * Class HistorialArchivosCreadoController
 * @package App\Http\Controllers
 */
class HistorialArchivosCreadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historialArchivosCreados = HistorialArchivosCreado::paginate();

        return view('historial-archivos-creado.index', compact('historialArchivosCreados'))
            ->with('i', (request()->input('page', 1) - 1) * $historialArchivosCreados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $historialArchivosCreado = new HistorialArchivosCreado();
        return view('historial-archivos-creado.create', compact('historialArchivosCreado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(HistorialArchivosCreado::$rules);

        $historialArchivosCreado = HistorialArchivosCreado::create($request->all());

        return redirect()->route('historial-archivos-creados.index')
            ->with('success', 'HistorialArchivosCreado creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historialArchivosCreado = HistorialArchivosCreado::find($id);

        return view('historial-archivos-creado.show', compact('historialArchivosCreado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historialArchivosCreado = HistorialArchivosCreado::find($id);

        return view('historial-archivos-creado.edit', compact('historialArchivosCreado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  HistorialArchivosCreado $historialArchivosCreado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialArchivosCreado $historialArchivosCreado)
    {
        request()->validate(HistorialArchivosCreado::$rules);

        $historialArchivosCreado->update($request->all());

        return redirect()->route('historial-archivos-creados.index')
            ->with('success', 'HistorialArchivosCreado actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $historialArchivosCreado = HistorialArchivosCreado::find($id)->delete();

        return redirect()->route('historial-archivos-creados.index')
            ->with('success', 'HistorialArchivosCreado eliminado con exito.');
    }
}
