<?php

namespace App\Http\Controllers;

use App\Models\Avion;
use Illuminate\Http\Request;

/**
 * Class AvionController
 * @package App\Http\Controllers
 */
class AvionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avions = Avion::paginate();

        return view('avion.index', compact('avions'))
            ->with('i', (request()->input('page', 1) - 1) * $avions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $avion = new Avion();
        return view('avion.create', compact('avion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Avion::$rules);

        $avion = Avion::create($request->all());

        return redirect()->route('avions.index')
            ->with('success', 'Avion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $avion = Avion::find($id);

        return view('avion.show', compact('avion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $avion = Avion::find($id);

        return view('avion.edit', compact('avion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Avion $avion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avion $avion)
    {
        request()->validate(Avion::$rules);

        $avion->update($request->all());

        return redirect()->route('avions.index')
            ->with('success', 'Avion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $avion = Avion::find($id)->delete();

        return redirect()->route('avions.index')
            ->with('success', 'Avion deleted successfully');
    }
}
