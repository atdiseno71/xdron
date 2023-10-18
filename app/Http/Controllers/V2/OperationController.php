<?php

namespace App\Http\Controllers\V2;

use App\Notifications\OperationNotification;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DetailOperation;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\FilesOperation;
use App\Models\TypeDocument;
use Illuminate\Http\Request;
use App\Models\TypeProduct;
use App\Traits\Integration;
use App\Traits\ImageTrait;
use App\Models\Assistant;
use App\Models\Operation;
use App\Traits\Template;
use App\Models\Client;
use App\Models\Estate;
use App\Models\Status;
use App\Models\Dron;
use App\Models\Luck;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Support\Facades\Log;

/**
 * Class OperationController
 * @package App\Http\Controllers
 */
class OperationController extends Controller
{

    use Template, ImageTrait, Integration;

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

        $clients = Client::pluck('social_reason as label', 'id as value');

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
        // $operation->type_product_id = $request['type_product_id'];
        $operation->assistant_id_one = $request['assistant_id_one'];
        $operation->assistant_id_two = $request['assistant_id_two'];
        $operation->pilot_id = $request['pilot_id'];
        $operation->id_cliente = $request['id_cliente'];
        $operation->admin_by = Auth::id();
        $operation->status_id = config('status.CRE');

        $operation->save();

        /* CREAMOS LA NOTIFICACION */
        $this->make_operation_notification($operation);

        // Enviamos el correo
        $response_email = $this->sendEmail($operation->id);

        // Enviamos el SMS
        $response_sms = $this->sendSMS($operation->id);

        Log::info("Response email: ");
        Log::info($response_email);
        Log::info("Response sms: ");
        Log::info($response_sms);

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
        $operation = Operation::with('details')->find($id);

        //Generamos el pdf
        set_time_limit(30000);
        // return view('pdf.report.operation', compact('operation'));
        $pdf = PDF::loadview('pdf.report.operation', compact('operation'), ['dpi' => '200']);

        $pdf->set_paper('letter', 'landscape');
        return $pdf->stream('reporte.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operation = Operation::with(['details' => function ($query) {
                            $query->orderBy('id', 'DESC'); // Reemplaza 'column_name' con el nombre de la columna por la cual deseas ordenar
                        }])->find($id);

        $detail_operation = new DetailOperation();

        $files_operation = new FilesOperation();

        $user = User::where('id', Auth::id())->with('roles')->first();

        $role_user = $user->roles[0]->name;

        $type_products = TypeProduct::pluck('name as label', 'id as value');

        $assistents = Assistant::pluck('name as label', 'id as value');

        $pilots = User::where('id_role', config('roles.piloto'))->pluck('name as label', 'id as value');

        $clients = Client::pluck('social_reason as label', 'id as value');

        $estates = Estate::where('cliente_id', $operation->id_cliente)->pluck('name as label', 'id as value');

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
            'id_detail_operation',
            'number_flights',
            'hour_flights',
            'acres',
            'download',
            'description',
            'observation',
            'estate_id',
            'luck',
            'zone_id',
            'dron_id',
            'type_product_id',
        ];

        // Folder donde se guardan las evidencias
        $folder = 'evidences/_' . $operation->id . '/';

        for ($i = 1; $i <= $num_operation; $i++) {
            // Creo variable temporal para la informacion del detalle
            $detail_temp = [];
            // Guardo el id de la operacion
            $detail_temp['operation_id'] = $operation->id;
            foreach ($name_inputs as $input) {
                $fieldName = $input . "_" . $i;
                // Acceder al valor del campo en la solicitud
                $value = $request->input($fieldName);
                // Agregar el valor al arreglo de datos
                if ($request->has($fieldName)) {
                    $detail_temp[$input] = $value;
                }
            }
            // Creamos el detalle de la operacion
            if ($detail_temp['id_detail_operation'] == 0 || $detail_temp['id_detail_operation'] == "0") {
                // El campo clave es nulo, así que creamos un nuevo registro
                $detail_operation_new = DetailOperation::create($detail_temp);
            } else {
                // El campo clave no es nulo, intentamos actualizar un registro existente
                $detail_operation_new = DetailOperation::find($detail_temp['id_detail_operation']);
                $detail_operation_new->update($detail_temp);
            }
            // Preguntamos si hay imagenes por eliminar
            $files_delete = json_decode($request->input('files_evidence_delete_' . $i), true);
            if ($files_delete != null) {
                foreach ($files_delete as $key => $file_delete) {
                    $file_find = FilesOperation::where('src_file', $file_delete)
                            ->whereHas('detailOperation', function ($query) use($detail_operation_new) {
                                $query->where('detail_operation.id', $detail_operation_new->id);
                            })->first();
                    // Storage::disk('public')->delete($evidence->path);
                    if (File::exists($file_find->src_file)) {
                        // Elimina el archivo
                        File::delete($file_find->src_file);
                        $file_find->delete();
                    }
                }
            }
            // Guardamos las imagenes despues de todo
            $file_name = "files_" . $i;
            if ($request->has($file_name)) {
                // Guardamos lo que viene del request
                $files = $request[$file_name];
                $handle_1 = $this->updateAllFiles($request, $detail_operation_new->id, $folder, $file_name);
            }
        }

        if ($role_user == config('roles.super_root') || $role_user == config('roles.root')) {
            // request()->validate(Operation::$rules);
            $operation->update($request->all());
            // subir archivo
            if ($request->has('file_evidence')) {
                $handle_1 = $this->update_file($request, 'file_evidence', $folder, $operation->id, $operation->file_evidence);
                $operation->update(['file_evidence' => $handle_1['response']['payload']]);
            }
        } else if ($role_user == config('roles.piloto')) {
            $operation->update(['status_id' => config('status.ENR')]);
        }

        /* CREAMOS LA NOTIFICACION */
        // $this->make_detail_operation_notification($operation);

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

    /* MANEJAR NOTIFICACIONES */
    public function make_operation_notification(Operation $operation) {
        try {
            /* GENERAR NOTIFICACION AL PILOTO CREADO EN LA NOTIFICACION */
            $user = User::find($operation->pilot_id);
            if ($user) {
                $user->notify(new OperationNotification($operation, 0)); // Notificacion de Operacion creada para el piloto
            }
        } catch (\Exception $ex) {
            return response()->json('Error al generar la notificacion', 422);
        }
    }

    /* MANEJAR NOTIFICACIONES */
    public function make_detail_operation_notification($operation) {
        try {
            /* GENERAR NOTIFICACION AL PILOTO CREADO EN LA NOTIFICACION */
            $user = User::find($operation->admin_by);
            if ($user) {
                $user->notify(new OperationNotification($operation, 1)); // Notificacion de Operacion creada para el admin
            }
        } catch (\Exception $ex) {
            return response()->json('Error al generar la notificacion', 422);
        }
    }

    /* BUSCAR FINCAS POR ID DEL CLIENTE */
    public function getFincasByCliente(Request $request)
    {
        $clienteId = $request->input('cliente_id');
        $fincas = Estate::whereHas('clientesFincas', function ($query) use ($clienteId) {
            $query->where('id_cliente', $clienteId);
        })->get();

        return response()->json($fincas);
    }

    /* BUSCAR FINCAS POR ID DEL CLIENTE */
    public function getLucksByClient(Request $request)
    {

        $estate_id = $request->input('id');
        $fincas = Luck::where('estate_id', $estate_id)->get();

        return response()->json($fincas);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function acceptOperationIndex($id)
    {
        $operation = Operation::find($id);

        $clients = Client::where('id', $operation->id_cliente)->pluck('social_reason as label', 'id as value');

        $assistents = Assistant::whereIn('id', [$operation->assistant_id_one, $operation->assistant_id_two])
                    ->pluck('name as label', 'id as value');

        $statuses = Status::whereIn('id', [config('status.RECI'), config('status.REC')])->pluck('name as label', 'id as value');

        return view('operation.accept', compact('operation', 'clients', 'assistents', 'statuses'));

    }

    /* Aceptar operacion */
    public function acceptOperation(Request $request, $id)
    {
        $operation = Operation::with('details')->find($id);

        request()->validate(Operation::$rulesAccept);
        $operation->update($request->all());

        //Generamos el pdf
        set_time_limit(30000);
        return redirect()->route('home.welcome')
            ->with('success', 'Puede continuar con su labor.');

    }

}
