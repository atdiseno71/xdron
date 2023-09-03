<?php

namespace App\Http\Controllers\V2;

use App\Models\Dron;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class DronController
 * @package App\Http\Controllers
 */
class DronController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drons = Dron::paginate();

        return view('dron.index', compact('drons'))
            ->with('i', (request()->input('page', 1) - 1) * $drons->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dron = new Dron();
        return view('dron.create', compact('dron'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Dron::$rules);

        $request['created_by'] = Auth::id();

        $dron = Dron::create($request->all());

        return redirect()->route('drons.index')
            ->with('success', 'Dron creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dron = Dron::find($id);

        return view('dron.show', compact('dron'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dron = Dron::find($id);

        return view('dron.edit', compact('dron'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Dron $dron
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dron $dron)
    {
        request()->validate(Dron::$rules);

        $dron->update($request->all());

        return redirect()->route('drons.index')
            ->with('success', 'Dron actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dron = Dron::find($id)->delete();

        return redirect()->route('drons.index')
            ->with('success', 'Dron eliminado con exito.');
    }
}
