<?php

namespace App\Http\Controllers\V2;

use App\Models\DetailOperation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class DetailOperationController
 * @package App\Http\Controllers
 */
class DetailOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailOperations = DetailOperation::paginate();

        return view('detail-operation.index', compact('detailOperations'))
            ->with('i', (request()->input('page', 1) - 1) * $detailOperations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detailOperation = new DetailOperation();
        return view('detail-operation.create', compact('detailOperation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetailOperation::$rules);

        $detailOperation = DetailOperation::create($request->all());

        return redirect()->route('detail-operations.index')
            ->with('success', 'DetailOperation creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailOperation = DetailOperation::find($id);

        return view('detail-operation.show', compact('detailOperation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailOperation = DetailOperation::find($id);

        return view('detail-operation.edit', compact('detailOperation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetailOperation $detailOperation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailOperation $detailOperation)
    {
        request()->validate(DetailOperation::$rules);

        $detailOperation->update($request->all());

        return redirect()->route('detail-operations.index')
            ->with('success', 'DetailOperation actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detailOperation = DetailOperation::find($id)->delete();

        return redirect()->route('detail-operations.index')
            ->with('success', 'DetailOperation eliminado con exito.');
    }
}
