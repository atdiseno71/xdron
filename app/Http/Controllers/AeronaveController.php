<?php

namespace App\Http\Controllers;

use App\Models\Aeronave;
use Illuminate\Http\Request;

/**
 * Class AeronaveController
 * @package App\Http\Controllers
 */
class AeronaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aeronaves = Aeronave::paginate();

        return view('aeronave.index', compact('aeronaves'))
            ->with('i', (request()->input('page', 1) - 1) * $aeronaves->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aeronave = new Aeronave();
        return view('aeronave.create', compact('aeronave'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Aeronave::$rules);

        $aeronave = Aeronave::create($request->all());

        return redirect()->route('aeronaves.index')
            ->with('success', 'Aeronave creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aeronave = Aeronave::find($id);

        return view('aeronave.show', compact('aeronave'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aeronave = Aeronave::find($id);

        return view('aeronave.edit', compact('aeronave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Aeronave $aeronave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aeronave $aeronave)
    {
        request()->validate(Aeronave::$rules);

        $aeronave->update($request->all());

        return redirect()->route('aeronaves.index')
            ->with('success', 'Aeronave actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $aeronave = Aeronave::find($id)->delete();

        return redirect()->route('aeronaves.index')
            ->with('success', 'Aeronave eliminado con exito.');
    }
}
