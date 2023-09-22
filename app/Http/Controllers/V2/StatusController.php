<?php

namespace App\Http\Controllers\V2;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class StatusController
 * @package App\Http\Controllers
 */
class StatusController extends Controller
{

    function __construct()
    {
        $this->middleware('can:statuses.index')->only('index');
        $this->middleware('can:statuses.create')->only('create', 'store');
        $this->middleware('can:statuses.show')->only('show');
        $this->middleware('can:statuses.edit')->only('edit', 'update');
        $this->middleware('can:statuses.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::paginate();

        return view('status.index', compact('statuses'))
            ->with('i', (request()->input('page', 1) - 1) * $statuses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = new Status();
        return view('status.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Status::$rules);

        $status = Status::create($request->all());

        return redirect()->route('statuses.index')
            ->with('success', 'Status creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = Status::find($id);

        return view('status.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = Status::find($id);

        return view('status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Status $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        request()->validate(Status::$rules);

        $status->update($request->all());

        return redirect()->route('statuses.index')
            ->with('success', 'Status actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $status = Status::find($id)->delete();

        return redirect()->route('statuses.index')
            ->with('success', 'Status eliminado con exito.');
    }
}
