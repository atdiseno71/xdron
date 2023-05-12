<?php

namespace App\Http\Controllers;

use App\Models\FacturaInventario;
use Illuminate\Http\Request;

/**
 * Class FacturaInventarioController
 * @package App\Http\Controllers
 */
class FacturaInventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturaInventarios = FacturaInventario::paginate();

        return view('factura-inventario.index', compact('facturaInventarios'))
            ->with('i', (request()->input('page', 1) - 1) * $facturaInventarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facturaInventario = new FacturaInventario();
        return view('factura-inventario.create', compact('facturaInventario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(FacturaInventario::$rules);

        $facturaInventario = FacturaInventario::create($request->all());

        return redirect()->route('factura-inventarios.index')
            ->with('success', 'FacturaInventario created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facturaInventario = FacturaInventario::find($id);

        return view('factura-inventario.show', compact('facturaInventario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facturaInventario = FacturaInventario::find($id);

        return view('factura-inventario.edit', compact('facturaInventario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  FacturaInventario $facturaInventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacturaInventario $facturaInventario)
    {
        request()->validate(FacturaInventario::$rules);

        $facturaInventario->update($request->all());

        return redirect()->route('factura-inventarios.index')
            ->with('success', 'FacturaInventario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $facturaInventario = FacturaInventario::find($id)->delete();

        return redirect()->route('factura-inventarios.index')
            ->with('success', 'FacturaInventario deleted successfully');
    }
}
