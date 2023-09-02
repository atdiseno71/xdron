<?php

namespace App\Http\Controllers\V2;

use App\Models\FilesOperation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class FilesOperationController
 * @package App\Http\Controllers
 */
class FilesOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filesOperations = FilesOperation::paginate();

        return view('files-operation.index', compact('filesOperations'))
            ->with('i', (request()->input('page', 1) - 1) * $filesOperations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filesOperation = new FilesOperation();
        return view('files-operation.create', compact('filesOperation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(FilesOperation::$rules);

        $filesOperation = FilesOperation::create($request->all());

        return redirect()->route('files-operations.index')
            ->with('success', 'FilesOperation creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filesOperation = FilesOperation::find($id);

        return view('files-operation.show', compact('filesOperation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filesOperation = FilesOperation::find($id);

        return view('files-operation.edit', compact('filesOperation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  FilesOperation $filesOperation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FilesOperation $filesOperation)
    {
        request()->validate(FilesOperation::$rules);

        $filesOperation->update($request->all());

        return redirect()->route('files-operations.index')
            ->with('success', 'FilesOperation actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $filesOperation = FilesOperation::find($id)->delete();

        return redirect()->route('files-operations.index')
            ->with('success', 'FilesOperation eliminado con exito.');
    }
}
