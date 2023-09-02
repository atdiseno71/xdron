<?php

namespace App\Http\Controllers\V2;

use App\Models\Estate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class EstateController
 * @package App\Http\Controllers
 */
class EstateController extends Controller
{
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
        return view('estate.create', compact('estate'));
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

        $estate = Estate::create($request->all());

        return redirect()->route('estates.index')
            ->with('success', 'Estate creado con exito.');
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

        return view('estate.edit', compact('estate'));
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
            ->with('success', 'Estate actualizado con exito.');
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
            ->with('success', 'Estate eliminado con exito.');
    }
}
