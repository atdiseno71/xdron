<?php

namespace App\Http\Controllers;

use App\Models\EstacionServicio;
use Illuminate\Http\Request;

/**
 * Class EstacionServicioController
 * @package App\Http\Controllers
 */
class EstacionServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estacionServicios = EstacionServicio::paginate();

        return view('estacion-servicio.index', compact('estacionServicios'))
            ->with('i', (request()->input('page', 1) - 1) * $estacionServicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estacionServicio = new EstacionServicio();
        return view('estacion-servicio.create', compact('estacionServicio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EstacionServicio::$rules);

        $estacionServicio = EstacionServicio::create($request->all());

        return redirect()->route('estacion-servicios.index')
            ->with('success', 'EstacionServicio creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estacionServicio = EstacionServicio::find($id);

        return view('estacion-servicio.show', compact('estacionServicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estacionServicio = EstacionServicio::find($id);

        return view('estacion-servicio.edit', compact('estacionServicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EstacionServicio $estacionServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstacionServicio $estacionServicio)
    {
        request()->validate(EstacionServicio::$rules);

        $estacionServicio->update($request->all());

        return redirect()->route('estacion-servicios.index')
            ->with('success', 'EstacionServicio actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estacionServicio = EstacionServicio::find($id)->delete();

        return redirect()->route('estacion-servicios.index')
            ->with('success', 'EstacionServicio eliminado con exito.');
    }
}
