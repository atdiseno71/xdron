<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use Illuminate\Http\Request;

/**
 * Class RepuestoController
 * @package App\Http\Controllers
 */
class RepuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repuestos = Repuesto::paginate();

        return view('repuesto.index', compact('repuestos'))
            ->with('i', (request()->input('page', 1) - 1) * $repuestos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $repuesto = new Repuesto();
        return view('repuesto.create', compact('repuesto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Repuesto::$rules);

        $repuesto = Repuesto::create($request->all());

        return redirect()->route('repuestos.index')
            ->with('success', 'Repuesto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repuesto = Repuesto::find($id);

        return view('repuesto.show', compact('repuesto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repuesto = Repuesto::find($id);

        return view('repuesto.edit', compact('repuesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Repuesto $repuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repuesto $repuesto)
    {
        request()->validate(Repuesto::$rules);

        $repuesto->update($request->all());

        return redirect()->route('repuestos.index')
            ->with('success', 'Repuesto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $repuesto = Repuesto::find($id)->delete();

        return redirect()->route('repuestos.index')
            ->with('success', 'Repuesto deleted successfully');
    }
}
