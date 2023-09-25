<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DetailOperation;
use App\Models\FilesOperation;
use App\Models\TypeDocument;
use Illuminate\Http\Request;
use App\Models\TypeProduct;
use App\Models\Assistant;
use App\Models\Operation;
use App\Traits\Template;
use App\Models\Client;
use App\Models\Estate;
use App\Models\Dron;
use App\Models\Luck;
use App\Models\User;
use App\Models\Zone;

/**
 * Class OperationController
 * @package App\Http\Controllers
 */
class OperationController extends Controller
{

    use Template;

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
        // Capturamos el usuario logeado
        $user_log = User::with('roles')->find(Auth::id());
        // Capturamos el rol
        $rol = $user_log->roles[0]?->id;

        switch ($rol) {
            case config('roles.piloto'):
                $operations = Operation::where('pilot_id', $user_log->id)->paginate();
                break;
            case config('roles.cliente'):
                $operations = Operation::where('id_cliente', $user_log->id)->paginate();
                break;
            default:
                $operations = Operation::paginate();
                break;
        }

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

        $type_products = TypeProduct::pluck('name as label', 'id as value');

        $assistents = Assistant::pluck('name as label', 'id as value');

        $pilots = User::where('id_role', config('roles.piloto'))->pluck('name as label', 'id as value');

        $clients = Client::pluck('full_name_user as label', 'id as value');

        $estates = Estate::pluck('name as label', 'id as value');

        $lucks = Luck::pluck('name as label', 'id as value');

        $zones = Zone::pluck('name as label', 'id as value');

        $drones = Dron::pluck('enrollment as label', 'id as value');

        $types_documents = TypeDocument::pluck('name as label', 'id as value');

        return view(
            'operation.create',
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
            )
        );
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

        $operation = new Operation();

        $operation->observation_admin = $request['observation_admin'];
        $operation->type_product_id = $request['type_product_id'];
        $operation->assistant_id_one = $request['assistant_id_one'];
        $operation->assistant_id_two = $request['assistant_id_two'];
        $operation->pilot_id = $request['pilot_id'];
        $operation->id_cliente = $request['id_cliente'];
        $operation->admin_by = Auth::id();
        $operation->status_id = config('status.CRE');

        $operation->save();

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
        $operation = Operation::with('details')->find($id);

        $detail_operation = new DetailOperation();

        $files_operation = new FilesOperation();

        $user = User::where('id', Auth::id())->with('roles')->first();

        $role_user = $user->roles[0]->name;

        $type_products = TypeProduct::pluck('name as label', 'id as value');

        $assistents = Assistant::pluck('name as label', 'id as value');

        $pilots = User::where('id_role', config('roles.piloto'))->pluck('name as label', 'id as value');

        $clients = Client::pluck('full_name_user as label', 'id as value');

        $estates = Estate::pluck('name as label', 'id as value');

        $lucks = Luck::pluck('name as label', 'id as value');

        $zones = Zone::pluck('name as label', 'id as value');

        $drones = Dron::pluck('enrollment as label', 'id as value');

        $types_documents = TypeDocument::pluck('name as label', 'id as value');

        return view(
            'operation.edit',
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
            )
        );
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

        $num_operation = (int)$request['detalleCounter'];

        $user = User::where('id', Auth::id())->with('roles')->first();

        $role_user = $user->roles[0]?->id;

        // $maxFields = config('global.max_operation'); // De momento no se usa, se tiene un contador en el front

        $name_inputs = [
            'number_flights',
            'hour_flights',
            'acres',
            'download',
            'description',
            'observation',
            'estate_id',
            'luck_id',
            'zone_id',
            'dron_id',
            'evidencia_record',
            'evidencia_track',
            'evidencia_gps',
            // 'operation_id',
        ];

        // Folder donde se guardan las evidencias
        $folder = 'evidencias/' . $operation->id . '/';

        for ($i = 1; $i <= $num_operation; $i++) {
            // Creo variable temporal para la informacion del detalle
            $detail_temp = [];
            // Guardo el id de la operacion
            $detail_temp['operation_id'] = $operation->id;
            foreach ($name_inputs as $input) {
                $fieldName = $input . "_" . $i;
                // Acceder al valor del campo en la solicitud
                $value = $request->input($fieldName);
                // Guardamos campos de archivos
                $file_name = [
                    "evidencia_record_" . $i,
                    "evidencia_track_" . $i,
                    "evidencia_gps_" . $i,
                ];
                // Preguntamos si es un archivo, sino sobelo y guarde el dato
                if (in_array($fieldName, $file_name)) {
                    $handle_1 = $this->moveImage($request, $fieldName, $fieldName, $folder);
                    $detail_temp[$input] = $handle_1;
                }
                // Agregar el valor al arreglo de datos
                else if ($request->has($fieldName)) {
                    $detail_temp[$input] = $value;
                }
            }
            // Creamos el detalle de la operacion
            $detail_operation = DetailOperation::create($detail_temp);
        }

        if ($role_user == config('roles.super_root') || $role_user == config('roles.root')) {
            request()->validate(Operation::$rules);

            $operation->update($request->all());
        }

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
