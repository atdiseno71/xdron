<?php

namespace App\Http\Controllers\V2;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class DepartmentController
 * @package App\Http\Controllers
 */
class DepartmentController extends Controller
{

    function __construct()
    {
        $this->middleware('can:departments.index')->only('index');
        $this->middleware('can:departments.create')->only('create', 'store');
        $this->middleware('can:departments.show')->only('show');
        $this->middleware('can:departments.edit')->only('edit', 'update');
        $this->middleware('can:departments.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::paginate();

        return view('department.index', compact('departments'))
            ->with('i', (request()->input('page', 1) - 1) * $departments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = new Department();
        return view('department.create', compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Department::$rules);

        $department = Department::create($request->all());

        return redirect()->route('departments.index')
            ->with('success', 'Department creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);

        return view('department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);

        return view('department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Department $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        request()->validate(Department::$rules);

        $department->update($request->all());

        return redirect()->route('departments.index')
            ->with('success', 'Department actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $department = Department::find($id)->delete();

        return redirect()->route('departments.index')
            ->with('success', 'Department eliminado con exito.');
    }
}
