<?php

namespace App\Http\Controllers\V2;

use App\Models\TypeDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class TypeDocumentController
 * @package App\Http\Controllers
 */
class TypeDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeDocuments = TypeDocument::paginate();

        return view('type-document.index', compact('typeDocuments'))
            ->with('i', (request()->input('page', 1) - 1) * $typeDocuments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeDocument = new TypeDocument();
        return view('type-document.create', compact('typeDocument'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TypeDocument::$rules);

        $typeDocument = TypeDocument::create($request->all());

        return redirect()->route('type-documents.index')
            ->with('success', 'TypeDocument created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeDocument = TypeDocument::find($id);

        return view('type-document.show', compact('typeDocument'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeDocument = TypeDocument::find($id);

        return view('type-document.edit', compact('typeDocument'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TypeDocument $typeDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeDocument $typeDocument)
    {
        request()->validate(TypeDocument::$rules);

        $typeDocument->update($request->all());

        return redirect()->route('type-documents.index')
            ->with('success', 'TypeDocument updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typeDocument = TypeDocument::find($id)->delete();

        return redirect()->route('type-documents.index')
            ->with('success', 'TypeDocument deleted successfully');
    }
}
