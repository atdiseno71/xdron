<?php

namespace App\Http\Controllers\V2;

use App\Models\Assistant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TypeDocument;
use Illuminate\Support\Facades\Auth;

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

        $type_documents = TypeDocument::pluck('name as label', 'id as value');

        return view('assistant.create', compact('assistant', 'type_documents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromModal(Request $request)
    {
        request()->validate(Assistant::$rules);

        $assistant = Assistant::create($request->all());

        return response()->json(['success' => 'Asistente creado con exito.']);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSelects()
    {
        $assistants = Assistant::pluck('name', 'id');

        // Agregar la opción "Seleccione una opción" con clave 0
        $assistants[0] = 'Seleccione una opción';

        return response()->json($assistants, 200, [], JSON_NUMERIC_CHECK);
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

        $request['created_by'] = Auth::id();

        $assistant = Assistant::create($request->all());

        return redirect()->route('assistants.index')
            ->with('success', 'Asistente creado con exito.');
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

        $type_documents = TypeDocument::pluck('name as label', 'id as value');

        return view('assistant.edit', compact('assistant', 'type_documents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asistente$assistant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assistant $assistant)
    {
        // request()->validate(Assistant::$rules);

        $assistant->update($request->all());

        return redirect()->route('assistants.index')
            ->with('success', 'Asistente actualizado con exito.');
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
            ->with('success', 'Asistente eliminado con exito.');
    }
}
