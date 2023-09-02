<?php

namespace App\Http\Controllers\V1;

use App\Models\Zona;
use App\Models\Finca;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ZonaController
 * @package App\Http\Controllers
 */
class ZonaController extends Controller
{
    function __construct()
    {
        $this->middleware('can:zonas.index')->only('index');
        $this->middleware('can:zonas.create')->only('create', 'store');
        $this->middleware('can:zonas.show')->only('show');
        $this->middleware('can:zonas.edit')->only('edit', 'update', 'active', 'updateRol');
        $this->middleware('can:zonas.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zonas = Zona::paginate();

        return view('zona.index', compact('zonas'))
            ->with('i', (request()->input('page', 1) - 1) * $zonas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fincas = Finca::pluck('name', 'id');
        $zona = new Zona();
        return view('zona.create', compact('zona', 'fincas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Zona::$rules);

        $zona = Zona::create($request->all());

        return redirect()->route('zonas.index')
            ->with('success', 'Zona creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zona = Zona::find($id);

        return view('zona.show', compact('zona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fincas = Finca::pluck('name', 'id');
        $zona = Zona::find($id);

        return view('zona.edit', compact('zona','fincas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Zona $zona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zona $zona)
    {
        request()->validate(Zona::$rules);

        $zona->update($request->all());

        return redirect()->route('zonas.index')
            ->with('success', 'Zona actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $zona = Zona::find($id)->delete();

        return redirect()->route('zonas.index')
            ->with('success', 'Zona eliminado con exito.');
    }

    public function zonaFinca($id) {

        $zonas = Zona::where('id_finca', $id)->pluck('name', 'id');

        return $zonas;

    }

}
