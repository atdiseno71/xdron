<?php

namespace App\Http\Controllers\V1;

use App\Models\Operacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class OperacionController
 * @package App\Http\Controllers
 */
class OperacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operaciones = Operacion::paginate();

        return view('operacion.index', compact('operaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $operaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operacion = new Operacion();
        return view('operacion.create', compact('operacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Operacion::$rules);

        $operacion = Operacion::create($request->all());

        return redirect()->route('operaciones.index')
            ->with('success', 'Operacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operacion = Operacion::find($id);

        return view('operacion.show', compact('operacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operacion = Operacion::find($id);

        return view('operacion.edit', compact('operacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Operacion $operacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operacion $operacion)
    {
        request()->validate(Operacion::$rules);

        $operacion->update($request->all());

        return redirect()->route('operaciones.index')
            ->with('success', 'Operacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $operacion = Operacion::find($id)->delete();

        return redirect()->route('operaciones.index')
            ->with('success', 'Operacion deleted successfully');
    }
}
