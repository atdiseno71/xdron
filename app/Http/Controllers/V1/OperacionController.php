<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operacion;
use App\Models\Servicio;
use App\Traits\Template;
use App\Models\Cliente;
use App\Models\Finca;
use App\Models\User;
use App\Models\Zona;
use App\Notifications\OperationNotification;
use Dompdf\Dompdf;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * Class OperacionController
 * @package App\Http\Controllers
 */
class OperacionController extends Controller
{

    use Template;

    function __construct()
    {
        $this->middleware('can:operaciones.index')->only('index');
        $this->middleware('can:operaciones.create')->only('create', 'store');
        $this->middleware('can:operaciones.show')->only('show');
        $this->middleware('can:operaciones.edit')->only('edit', 'update', 'active', 'updateRol');
        $this->middleware('can:operaciones.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operaciones = Operacion::paginate();

        return view('operacion.index', compact('operaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $operaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operacion = new Operacion();

        $servicios = Servicio::pluck('name as label', 'id as value');

        $clientes = Cliente::with('user')->get()->pluck('user.name', 'id');

        $fincas = Finca::pluck('name as label', 'id as value');

        $zonas = Zona::pluck('name as label', 'id as value');

        $pilotos = User::where('id_role', config('roles.piloto'))->pluck('name as label', 'id as value');

        return view('operacion.create', compact('operacion', 'servicios', 'clientes', 'fincas', 'zonas', 'pilotos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Operacion::$rules);

        $operacion = new Operacion();

        /* Pasamos los valores */
        $operacion->id_servicio = $request['id_servicio'];
        $operacion->descarga = $request['descarga'];
        $operacion->fecha_ejecucion = $request['fecha_ejecucion'];
        $operacion->id_cliente = $request['id_cliente'];
        $operacion->id_finca = $request['id_finca'];
        $operacion->zona_id = $request['zona_id'];
        $operacion->id_piloto = $request['id_piloto'];
        $operacion->observaciones = $request['observaciones'];

        $save = $operacion->save();

        if ($save) {
            /* Le decimos donde queremos que se guarde la operacion */
            $carpeta = 'evidencias/' . $operacion->id . '/';
            /* Guardamos la primera evidencia */
            $handle_1 = $this->moveImage($request, 'evidencia_record', 'evidencia_record', $carpeta);
            $operacion->update(['evidencia_record' => $handle_1]);
            /* Guardamos la segunda evidencia */
            $handle_2 = $this->moveImage($request, 'evidencia_track', 'evidencia_track', $carpeta);
            $operacion->update(['evidencia_track' => $handle_2]);
            /* Guardamos la tercera evidencia */
            $handle_3 = $this->moveImage($request, 'evidencia_gps', 'evidencia_gps', $carpeta);
            $operacion->update(['evidencia_gps' => $handle_3]);
        }

        /* CREAMOS LA NOTIFICACION */
        $this->make_operation_notification($operacion);

        /* return redirect()->route('operaciones.index')
            ->with('success', 'Operacion registrada con éxito.'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operacion = Operacion::find($id);

        // Crea una instancia de Dompdf
        $dompdf = new Dompdf();

        // Renderiza la vista 'pdf.ejemplo' en HTML
        $html = view('pdf.report.operation', [
            'evidencia_record' => $operacion->evidencia_record,
            'evidencia_track' => $operacion->evidencia_track,
            'evidencia_gps' => $operacion->evidencia_gps,
        ])->render();

        // Carga el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderiza el PDF
        $dompdf->render();

        // Genera el nombre del archivo PDF
        $filename = 'ejemplo.pdf';

        // Descarga el archivo PDF generado
        return $dompdf->stream($filename);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operacion = Operacion::find($id);

        $servicios = Servicio::pluck('name as label', 'id as value');

        $clientes = Cliente::with('user')->get()->pluck('user.name', 'id');

        $fincas = Finca::pluck('name as label', 'id as value');

        $zonas = Zona::pluck('name as label', 'id as value');

        $pilotos = User::where('id_role', config('roles.piloto'))->pluck('name as label', 'id as value');

        return view('operacion.edit', compact('operacion', 'servicios', 'clientes', 'fincas', 'zonas', 'pilotos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Operacion $operacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operacion $operacion)
    {
        try {
            request()->validate(Operacion::$rules);
            /* Pasamos los valores */
            $operacion->id_servicio = $request['id_servicio'];
            $operacion->descarga = $request['descarga'];
            $operacion->fecha_ejecucion = $request['fecha_ejecucion'];
            $operacion->id_cliente = $request['id_cliente'];
            $operacion->id_finca = $request['id_finca'];
            $operacion->zona_id = $request['zona_id'];
            $operacion->id_piloto = $request['id_piloto'];
            $operacion->observaciones = $request['observaciones'];

            $save = $operacion->save();

            /* Le decimos donde queremos que se guarde la operacion */
            $carpeta = 'evidencias/' . $operacion->id . '/';

            if ($request->hasFile('evidencia_record')) {
                /* Guardamos la primera evidencia */
                $handle_1 = $this->moveImage($request, 'evidencia_record', 'evidencia_record', $carpeta);
                $operacion->update(['evidencia_record' => $handle_1]);
            }

            if ($request->hasFile('evidencia_track')) {
                /* Guardamos la segunda evidencia */
                $handle_2 = $this->moveImage($request, 'evidencia_track', 'evidencia_track', $carpeta);
                $operacion->update(['evidencia_track' => $handle_2]);
            }

            if ($request->hasFile('evidencia_gps')) {
                /* Guardamos la tercera evidencia */
                $handle_3 = $this->moveImage($request, 'evidencia_gps', 'evidencia_gps', $carpeta);
                $operacion->update(['evidencia_gps' => $handle_3]);
            }

            /* CREAMOS LA NOTIFICACION */
            $this->make_operation_notification($operacion);

            return redirect()->route('operaciones.index')
            ->with('success', 'Operacion guardada con éxito.');

        } catch (Exception $th) {
            return redirect()->route('operaciones.index')
                ->with('error', 'Hubo un error al actualizar la operacion.');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $operacion = Operacion::find($id)->delete();

        return redirect()->route('operaciones.index')
            ->with('success', 'Operacion eliminada con éxito.');
    }

    /* MANEJAR NOTIFICACIONES */
    public function make_operation_notification($operation) {
        try {
            /* GENERAR NOTIFICACION AL PILOTO CREADO EN LA NOTIFICACION */
            Log::info($operation->id_piloto);
            $user = User::find($operation->id_piloto);
            if ($user) {
                $user->notify(new OperationNotification($operation));
            }
        } catch (\Exception $ex) {
            return response()->json('Error al generar la notificacion', 422);
        }
    }

}
