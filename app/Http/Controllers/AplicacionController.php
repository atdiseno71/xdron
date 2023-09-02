<?php

namespace App\Http\Controllers;

use App\Models\Aplicacion;
use Illuminate\Http\Request;

/**
 * Class AplicacionController
 * @package App\Http\Controllers
 */
class AplicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aplicacions = Aplicacion::paginate();

        return view('aplicacion.index', compact('aplicacions'))
            ->with('i', (request()->input('page', 1) - 1) * $aplicacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aplicacion = new Aplicacion();
        return view('aplicacion.create', compact('aplicacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Aplicacion::$rules);

        $aplicacion = Aplicacion::create($request->all());

        return redirect()->route('aplicacions.index')
            ->with('success', 'Aplicacion creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aplicacion = Aplicacion::find($id);

        return view('aplicacion.show', compact('aplicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aplicacion = Aplicacion::find($id);

        return view('aplicacion.edit', compact('aplicacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Aplicacion $aplicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aplicacion $aplicacion)
    {
        request()->validate(Aplicacion::$rules);

        $aplicacion->update($request->all());

        return redirect()->route('aplicacions.index')
            ->with('success', 'Aplicacion actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $aplicacion = Aplicacion::find($id)->delete();

        return redirect()->route('aplicacions.index')
            ->with('success', 'Aplicacion eliminado con exito.');
    }
}
