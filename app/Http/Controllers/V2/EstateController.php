<?php

namespace App\Http\Controllers\V2;

use App\Models\Estate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

/**
 * Class EstateController
 * @package App\Http\Controllers
 */
class EstateController extends Controller
{

    function __construct()
    {
        $this->middleware('can:estates.index')->only('index');
        $this->middleware('can:estates.create')->only('create', 'store');
        $this->middleware('can:estates.show')->only('show');
        $this->middleware('can:estates.edit')->only('edit', 'update');
        $this->middleware('can:estates.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estates = Estate::paginate();

        return view('estate.index', compact('estates'))
            ->with('i', (request()->input('page', 1) - 1) * $estates->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estate = new Estate();

        $clients = Client::pluck('social_reason as label', 'id as value');

        return view('estate.create', compact('estate', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Estate::$rules);

        $request['created_by'] = Auth::id();

        $estate = Estate::create($request->all());

        return redirect()->back()
            ->with('success', 'Hacienda creada con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSelects()
    {
        $assistants = Estate::pluck('name', 'id');

        // Agregar la opción "Seleccione una opción" con clave 0
        $assistants[0] = 'Seleccione una opción';

        return response()->json($assistants, 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estate = Estate::find($id);

        return view('estate.show', compact('estate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estate = Estate::find($id);

        $clients = Client::pluck('social_reason as label', 'id as value');

        return view('estate.edit', compact('estate', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estate $estate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estate $estate)
    {
        request()->validate(Estate::$rules);

        $estate->update($request->all());

        return redirect()->route('estates.index')
            ->with('success', 'Hacienda actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estate = Estate::find($id)->delete();

        return redirect()->route('estates.index')
            ->with('success', 'Hacienda eliminado con exito.');
    }
}
