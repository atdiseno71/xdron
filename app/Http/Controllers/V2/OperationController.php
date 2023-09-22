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
use App\Models\TypeDocument;
use App\Models\User;
use App\Models\Zone;

/**
 * Class OperationController
 * @package App\Http\Controllers
 */
class OperationController extends Controller
{
    function __construct()
    {
        $this->middleware('can:operations.index')->only('index');
        $this->middleware('can:operations.create')->only('create', 'store');
        $this->middleware('can:operations.show')->only('show');
        $this->middleware('can:operations.edit')->only('edit', 'update');
        $this->middleware('can:operations.destroy')->only('destroy');
    }

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

        $type_products = Product::pluck('name as label', 'id as value');

        $assistents = Assistant::pluck('name as label', 'id as value');

        $pilots = User::where('id_role', config('roles.piloto'))->pluck('name as label', 'id as value');

        $clients = Client::pluck('full_name_user as label', 'id as value');

        $estates = Estate::pluck('name as label', 'id as value');

        $lucks = Luck::pluck('name as label', 'id as value');

        $zones = Zone::pluck('name as label', 'id as value');

        $drones = Dron::pluck('enrollment as label', 'id as value');

        $types_documents = TypeDocument::pluck('name as label', 'id as value');

        return view('operation.create',
            compact(
                'operation',
                'detail_operation',
                'role_user',
                'type_products',
                'assistents',
                'pilots',
                'clients',
                'estates',
                'drones',
                'lucks',
                'zones',
                'files_operation',
                'types_documents',
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

        // Decodificar la cadena JSON en un array
        $detailOperationData = json_decode($request['detail_operation_input'], true);

        request()->validate(Operation::$rules);

        $request['admin_by'] = Auth::id();
        $request['status_id'] = config('status.CRE');

        $operation = Operation::create($request->all());

        foreach ($detailOperationData as $detail_operation) {
            /* Guardamos el detalle de la operacion */
            DetailOperation::create([
                'operation_id' => $operation->id,
                'estate_id' => $detail_operation['estate_id'],
                'luck_id' => $detail_operation['luck_id'],
                'download' => $detail_operation['download'],
                'zone_id' => $detail_operation['zone_id'],
                'dron_id' => $detail_operation['dron_id'],
                'number_flights' => $detail_operation['number_flights'],
                'hour_flights' => $detail_operation['hour_flights'],
                'acres' => $detail_operation['acres'],
                'evidencia_record' => $detail_operation['evidencia_record'],
                'evidencia_track' => $detail_operation['evidencia_track'],
                'evidencia_gps' => $detail_operation['evidencia_gps'],
            ]);
        }

        dd($detailOperationData);

        return redirect()->route('operations.index')
            ->with('success', 'Operacion creada con exito.');
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

        dd($request->all());

        request()->validate(Operation::$rules);

        $operation->update($request->all());

        return redirect()->route('operations.index')
            ->with('success', 'Operacion actualizada con exito.');
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
            ->with('success', 'Operacion eliminada con exito.');
    }
}
