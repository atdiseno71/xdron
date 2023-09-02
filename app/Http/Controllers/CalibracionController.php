<?php

namespace App\Http\Controllers;

use App\Models\Calibracion;
use Illuminate\Http\Request;

/**
 * Class CalibracionController
 * @package App\Http\Controllers
 */
class CalibracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calibracions = Calibracion::paginate();

        return view('calibracion.index', compact('calibracions'))
            ->with('i', (request()->input('page', 1) - 1) * $calibracions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calibracion = new Calibracion();
        return view('calibracion.create', compact('calibracion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Calibracion::$rules);

        $calibracion = Calibracion::create($request->all());

        return redirect()->route('calibracions.index')
            ->with('success', 'Calibracion creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calibracion = Calibracion::find($id);

        return view('calibracion.show', compact('calibracion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calibracion = Calibracion::find($id);

        return view('calibracion.edit', compact('calibracion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Calibracion $calibracion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calibracion $calibracion)
    {
        request()->validate(Calibracion::$rules);

        $calibracion->update($request->all());

        return redirect()->route('calibracions.index')
            ->with('success', 'Calibracion actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $calibracion = Calibracion::find($id)->delete();

        return redirect()->route('calibracions.index')
            ->with('success', 'Calibracion eliminado con exito.');
    }
}
