<?php

namespace App\Http\Controllers\V2;

use App\Models\Municipality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class MunicipalityController
 * @package App\Http\Controllers
 */
class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipalities = Municipality::paginate();

        return view('municipality.index', compact('municipalities'))
            ->with('i', (request()->input('page', 1) - 1) * $municipalities->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipality = new Municipality();
        return view('municipality.create', compact('municipality'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Municipality::$rules);

        $municipality = Municipality::create($request->all());

        return redirect()->route('municipalities.index')
            ->with('success', 'Municipality created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $municipality = Municipality::find($id);

        return view('municipality.show', compact('municipality'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $municipality = Municipality::find($id);

        return view('municipality.edit', compact('municipality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Municipality $municipality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipality $municipality)
    {
        request()->validate(Municipality::$rules);

        $municipality->update($request->all());

        return redirect()->route('municipalities.index')
            ->with('success', 'Municipality updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $municipality = Municipality::find($id)->delete();

        return redirect()->route('municipalities.index')
            ->with('success', 'Municipality deleted successfully');
    }
}
