<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * Class Operacion
 *
 * @property $id
 * @property $id_servicio
 * @property $descarga
 * @property $fecha_ejecucion
 * @property $id_cliente
 * @property $id_finca
 * @property $zona_id
 * @property $id_piloto
 * @property $evidencia_record
 * @property $evidencia_track
 * @property $evidencia_gps
 * @property $observations
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Cliente $cliente
 * @property Finca $finca
 * @property Servicio $servicio
 * @property User $user
 * @property Zona $zona
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Operacion extends Model
{
    use SoftDeletes, Notifiable;

    protected $table = 'operacion';

    static $rules = [
        'fecha_ejecucion' => 'required',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->perPage = config('global.num_pagination');
    }

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_servicio',
        'descarga',
        'fecha_ejecucion',
        'id_cliente',
        'id_finca',
        'id_suerte',
        'zona_id',
        'id_piloto',
        'evidencia_record',
        'evidencia_track',
        'evidencia_gps',
        'observations'
    ];


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
    public function finca()
    {
        return $this->hasOne('App\Models\Finca', 'id', 'id_finca');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function servicio()
    {
        return $this->hasOne('App\Models\Servicio', 'id', 'id_servicio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_piloto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function zona()
    {
        return $this->hasOne('App\Models\Zona', 'id', 'zona_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function suerte()
    {
        return $this->hasOne('App\Models\Suerte', 'id', 'id_suerte');
    }
}
