<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use Illuminate\Http\Request;

/**
 * Class FincaController
 * @package App\Http\Controllers
 */
class FincaController extends Controller
{
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

        return redirect()->route('fincas.index')
            ->with('success', 'Finca created successfully.');
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

        return redirect()->route('fincas.index')
            ->with('success', 'Finca updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $finca = Finca::find($id)->delete();

        return redirect()->route('fincas.index')
            ->with('success', 'Finca deleted successfully');
    }
}
