<?php

namespace App\Http\Controllers;

use App\Models\DetalleServicio;
use Illuminate\Http\Request;

/**
 * Class DetalleServicioController
 * @package App\Http\Controllers
 */
class DetalleServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalleServicios = DetalleServicio::paginate();

        return view('detalle-servicio.index', compact('detalleServicios'))
            ->with('i', (request()->input('page', 1) - 1) * $detalleServicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detalleServicio = new DetalleServicio();
        return view('detalle-servicio.create', compact('detalleServicio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetalleServicio::$rules);

        $detalleServicio = DetalleServicio::create($request->all());

        return redirect()->route('detalle-servicios.index')
            ->with('success', 'DetalleServicio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleServicio = DetalleServicio::find($id);

        return view('detalle-servicio.show', compact('detalleServicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleServicio = DetalleServicio::find($id);

        return view('detalle-servicio.edit', compact('detalleServicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetalleServicio $detalleServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleServicio $detalleServicio)
    {
        request()->validate(DetalleServicio::$rules);

        $detalleServicio->update($request->all());

        return redirect()->route('detalle-servicios.index')
            ->with('success', 'DetalleServicio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detalleServicio = DetalleServicio::find($id)->delete();

        return redirect()->route('detalle-servicios.index')
            ->with('success', 'DetalleServicio deleted successfully');
    }
}
