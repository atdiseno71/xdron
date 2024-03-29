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

    function __construct()
    {
        $this->middleware('can:type-documents.index')->only('index');
        $this->middleware('can:type-documents.create')->only('create', 'store');
        $this->middleware('can:type-documents.show')->only('show');
        $this->middleware('can:type-documents.edit')->only('edit', 'update');
        $this->middleware('can:type-documents.destroy')->only('destroy');
    }

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
            ->with('success', 'TypeDocument creado con exito.');
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
            ->with('success', 'TypeDocument actualizado con exito.');
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
            ->with('success', 'TypeDocument eliminado con exito.');
    }
}
