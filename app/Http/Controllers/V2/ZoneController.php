<?php

namespace App\Http\Controllers\V2;

use App\Models\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Operation;

/**
 * Class ZoneController
 * @package App\Http\Controllers
 */
class ZoneController extends Controller
{

    function __construct()
    {
        $this->middleware('can:type-documents.index')->only('index');
        $this->middleware('can:type-documents.create')->only('create', 'store');
        $this->middleware('can:type-documents.show')->only('show');
        $this->middleware('can:type-documents.edit')->only('edit', 'update');
        $this->middleware('can:type-documents.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = Zone::paginate();

        return view('zone.index', compact('zones'))
            ->with('i', (request()->input('page', 1) - 1) * $zones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zone = new Zone();
        return view('zone.create', compact('zone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Zone::$rules);

        $zone = Zone::create($request->all());

        return redirect()->route('zones.index')
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
        $zone = Zone::find($id);

        return view('zone.show', compact('zone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zone = Zone::find($id);

        return view('zone.edit', compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Zone $zone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zone $zone)
    {
        request()->validate(Zone::$rules);

        $zone->update($request->all());

        return redirect()->route('zones.index')
            ->with('success', 'Zona actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {

        $operations = Operation::where('zone_id', $id)->count();

        if($operations>0) {
            return redirect()->route('zones.index')
                ->with('error', 'No se puede eliminar la zona, tiene operaciones relacionadas.');
        }

        $zone = Zone::find($id)->delete();

        return redirect()->route('zones.index')
            ->with('success', 'Zona eliminado con exito.');
    }
}
