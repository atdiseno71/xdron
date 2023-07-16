<?php

namespace App\Http\Controllers\V1;

use App\Models\Suerte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zona;

/**
 * Class SuerteController
 * @package App\Http\Controllers
 */
class SuerteController extends Controller
{
    function __construct()
    {
        $this->middleware('can:suertes.index')->only('index');
        $this->middleware('can:suertes.create')->only('create', 'store');
        $this->middleware('can:suertes.show')->only('show');
        $this->middleware('can:suertes.edit')->only('edit', 'update', 'active', 'updateRol');
        $this->middleware('can:suertes.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suertes = Suerte::paginate();

        return view('suerte.index', compact('suertes'))
            ->with('i', (request()->input('page', 1) - 1) * $suertes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suerte = new Suerte();

        $zonas = Zona::pluck('name', 'id');

        return view('suerte.create', compact('suerte', 'zonas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Suerte::$rules);

        $suerte = Suerte::create($request->all());

        return redirect()->route('suertes.index')
            ->with('success', 'Suerte creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suerte = Suerte::find($id);

        return view('suerte.show', compact('suerte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suerte = Suerte::find($id);

        $zonas = Zona::pluck('name', 'id');

        return view('suerte.edit', compact('suerte', 'zonas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Suerte $suerte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suerte $suerte)
    {
        request()->validate(Suerte::$rules);

        $suerte->update($request->all());

        return redirect()->route('suertes.index')
            ->with('success', 'Suerte actualizada con éxito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $suerte = Suerte::find($id)->delete();

        return redirect()->route('suertes.index')
            ->with('success', 'Suerte eliminada con éxito.');
    }
}
