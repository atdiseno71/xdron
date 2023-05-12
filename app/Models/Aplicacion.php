<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Aplicacion
 *
 * @property $id
 * @property $id_cliente
 * @property $id_producto
 * @property $matricula
 * @property $fecha
 * @property $hora_salida
 * @property $hora_llegada
 * @property $consumo_combustible
 * @property $tanqueador
 * @property $horas_vuelo
 * @property $aterrizajes
 * @property $hectareas
 * @property $archivo_aplicacion
 * @property $archivo_track
 * @property $archivo_record
 * @property $archivo_mapa
 * @property $otro_archivo
 * @property $observacion_piloto
 * @property $observacion_cliente
 * @property $id_user
 * @property $descarga
 * @property $tipo_app
 * @property $archivo_factura
 * @property $valor_factura
 * @property $comprobante
 * @property $observacion_factura
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Cliente $cliente
 * @property Producto $producto
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Aplicacion extends Model
{
    use SoftDeletes;

    static $rules = [
		'matricula' => 'required',
		'fecha' => 'required',
		'consumo_combustible' => 'required',
		'horas_vuelo' => 'required',
		'aterrizajes' => 'required',
		'hectareas' => 'required',
		'descarga' => 'required',
		'tipo_app' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cliente','id_producto','matricula','fecha','hora_salida','hora_llegada','consumo_combustible','tanqueador','horas_vuelo','aterrizajes','hectareas','archivo_aplicacion','archivo_track','archivo_record','archivo_mapa','otro_archivo','observacion_piloto','observacion_cliente','id_user','descarga','tipo_app','archivo_factura','valor_factura','comprobante','observacion_factura'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_cliente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_producto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
    

}
