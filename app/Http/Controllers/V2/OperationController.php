<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use App\Models\Assistant;
use App\Models\Client;
use App\Models\DetailOperation;
use App\Models\Dron;
use App\Models\Estate;
use App\Models\FilesOperation;
use App\Models\Luck;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Operation;
use App\Models\Product;
use App\Models\User;
use App\Models\Zone;

/**
 * Class OperationController
 * @package App\Http\Controllers
 */
class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operations = Operation::paginate();

        return view('operation.index', compact('operations'))
            ->with('i', (request()->input('page', 1) - 1) * $operations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operation = new Operation();

        $detail_operation = new DetailOperation();

        $files_operation = new FilesOperation();

        $user = User::where('id', Auth::id())->with('roles')->first();

        $role_user = $user->roles[0]->name;

        $products = Product::pluck('name as label', 'id as value');

        $assistents = Assistant::pluck('name as label', 'id as value');

        $pilots = User::where('id_role', config('roles.piloto'))->pluck('name as label', 'id as value');

        $clients = Client::pluck('full_name_user as label', 'id as value');

        $estates = Estate::pluck('name as label', 'id as value');

        $lucks = Luck::pluck('name as label', 'id as value');

        $zones = Zone::pluck('name as label', 'id as value');

        $drones = Dron::pluck('enrollment as label', 'id as value');

        return view('operation.create',
            compact(
                'operation',
                'detail_operation',
                'role_user',
                'products',
                'assistents',
                'pilots',
                'clients',
                'estates',
                'drones',
                'lucks',
                'zones',
                'files_operation',
            ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Operation::$rules);

        $request['admin_by'] = Auth::id();
        $request['status_id'] = config('status.CRE');

        $operation = Operation::create($request->all());

        return redirect()->route('operations.index')
            ->with('success', 'Operation creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operation = Operation::find($id);

        return view('operation.show', compact('operation', 'role_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operation = Operation::find($id);

        $detail_operation = new DetailOperation();

        $files_operation = new FilesOperation();

        $user = User::where('id', Auth::id())->with('roles')->first();

        $role_user = $user->roles[0]->name;

        $products = Product::pluck('name as label', 'id as value');

        $assistents = Assistant::pluck('name as label', 'id as value');

        $pilots = User::where('id_role', config('roles.piloto'))->pluck('name as label', 'id as value');

        $clients = Client::pluck('full_name_user as label', 'id as value');

        $estates = Estate::pluck('name as label', 'id as value');

        $lucks = Luck::pluck('name as label', 'id as value');

        $zones = Zone::pluck('name as label', 'id as value');

        $drones = Dron::pluck('enrollment as label', 'id as value');

        return view('operation.edit',
            compact(
                'operation',
                'detail_operation',
                'role_user',
                'products',
                'assistents',
                'pilots',
                'clients',
                'estates',
                'drones',
                'lucks',
                'zones',
                'files_operation',
            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Operation $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operation $operation)
    {
        request()->validate(Operation::$rules);

        $operation->update($request->all());

        return redirect()->route('operations.index')
            ->with('success', 'Operation actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $operation = Operation::find($id)->delete();

        return redirect()->route('operations.index')
            ->with('success', 'Operation eliminado con exito.');
    }
}
