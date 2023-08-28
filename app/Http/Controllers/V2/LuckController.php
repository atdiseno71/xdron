<?php

namespace App\Http\Controllers\V2;

use App\Models\Luck;
use Illuminate\Http\Request;

/**
 * Class LuckController
 * @package App\Http\Controllers
 */
class LuckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lucks = Luck::paginate();

        return view('luck.index', compact('lucks'))
            ->with('i', (request()->input('page', 1) - 1) * $lucks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $luck = new Luck();
        return view('luck.create', compact('luck'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Luck::$rules);

        $luck = Luck::create($request->all());

        return redirect()->route('lucks.index')
            ->with('success', 'Luck created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $luck = Luck::find($id);

        return view('luck.show', compact('luck'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $luck = Luck::find($id);

        return view('luck.edit', compact('luck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Luck $luck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Luck $luck)
    {
        request()->validate(Luck::$rules);

        $luck->update($request->all());

        return redirect()->route('lucks.index')
            ->with('success', 'Luck updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $luck = Luck::find($id)->delete();

        return redirect()->route('lucks.index')
            ->with('success', 'Luck deleted successfully');
    }
}
