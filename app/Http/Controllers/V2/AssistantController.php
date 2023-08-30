<?php

namespace App\Http\Controllers\V2;

use App\Models\Assistant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class AssistantController
 * @package App\Http\Controllers
 */
class AssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assistants = Assistant::paginate();

        return view('assistant.index', compact('assistants'))
            ->with('i', (request()->input('page', 1) - 1) * $assistants->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assistant = new Assistant();
        return view('assistant.create', compact('assistant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Assistant::$rules);

        $assistant = Assistant::create($request->all());

        return redirect()->route('assistants.index')
            ->with('success', 'Assistant created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assistant = Assistant::find($id);

        return view('assistant.show', compact('assistant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assistant = Assistant::find($id);

        return view('assistant.edit', compact('assistant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Assistant $assistant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assistant $assistant)
    {
        request()->validate(Assistant::$rules);

        $assistant->update($request->all());

        return redirect()->route('assistants.index')
            ->with('success', 'Assistant updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $assistant = Assistant::find($id)->delete();

        return redirect()->route('assistants.index')
            ->with('success', 'Assistant deleted successfully');
    }
}
