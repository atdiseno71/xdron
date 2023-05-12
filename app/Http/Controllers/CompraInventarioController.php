<?php

namespace App\Http\Controllers;

use App\Models\CompraInventario;
use Illuminate\Http\Request;

/**
 * Class CompraInventarioController
 * @package App\Http\Controllers
 */
class CompraInventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compraInventarios = CompraInventario::paginate();

        return view('compra-inventario.index', compact('compraInventarios'))
            ->with('i', (request()->input('page', 1) - 1) * $compraInventarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $compraInventario = new CompraInventario();
        return view('compra-inventario.create', compact('compraInventario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CompraInventario::$rules);

        $compraInventario = CompraInventario::create($request->all());

        return redirect()->route('compra-inventarios.index')
            ->with('success', 'CompraInventario created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compraInventario = CompraInventario::find($id);

        return view('compra-inventario.show', compact('compraInventario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compraInventario = CompraInventario::find($id);

        return view('compra-inventario.edit', compact('compraInventario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CompraInventario $compraInventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompraInventario $compraInventario)
    {
        request()->validate(CompraInventario::$rules);

        $compraInventario->update($request->all());

        return redirect()->route('compra-inventarios.index')
            ->with('success', 'CompraInventario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $compraInventario = CompraInventario::find($id)->delete();

        return redirect()->route('compra-inventarios.index')
            ->with('success', 'CompraInventario deleted successfully');
    }
}
