<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Operacion;
use App\Models\Servicio;
use App\Traits\Template;
use App\Models\Finca;
use App\Models\User;
use App\Models\Zona;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class OperacionController
 * @package App\Http\Controllers
 */
class OperacionController extends Controller
{

    use Template;

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

        return redirect()->route('operaciones.index')
            ->with('success', 'Operacion registrada con éxito.');
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

        return view('operacion.show', compact('operacion'));
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

        $clientes = User::pluck('name as label', 'id as value')->where('id_role', config('roles.cliente'));

        $fincas = Finca::pluck('name as label', 'id as value');

        $zonas = Zona::pluck('name as label', 'id as value');

        $pilotos = User::pluck('name as label', 'id as value')->where('id_role', config('roles.piloto'));

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
}