<?php

namespace App\Http\Controllers\V1;

use App\Models\Finca;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Suerte;
use App\Models\Zona;
use App\Traits\Template;

/**
 * Class FincaController
 * @package App\Http\Controllers
 */
class FincaController extends Controller
{

    use Template;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fincas = Finca::paginate();

        return view('finca.index', compact('fincas'))
            ->with('i', (request()->input('page', 1) - 1) * $fincas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $finca = new Finca();
        return view('finca.create', compact('finca'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Finca::$rules);

        $finca = Finca::create($request->all());

        $this->createZones($finca->id);

        return redirect()->route('fincas.index')
            ->with('success', 'Finca creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $finca = Finca::find($id);

        return view('finca.show', compact('finca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finca = Finca::find($id);

        return view('finca.edit', compact('finca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Finca $finca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finca $finca)
    {
        request()->validate(Finca::$rules);

        $finca->update($request->all());

        $this->deleteZones($finca->id);

        $this->createZones($finca->id);

        return redirect()->route('fincas.index')
            ->with('success', 'Finca actualizada con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $finca = Finca::find($id)->delete();

        $zonas = Zona::where('id_finca', $id)->get();

        foreach ($zonas as $zona) {
            $suerte = Suerte::where('id_zona', $zona->id)->delete();
            $zona->delete();
        }

        return redirect()->route('fincas.index')
            ->with('success', 'Finca eliminada con éxito');
    }
}
