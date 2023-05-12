<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Calibracion
 *
 * @property $id
 * @property $id_cliente
 * @property $fecha
 * @property $archivo1
 * @property $observacion_piloto
 * @property $observacion_cliente
 * @property $archivo2
 * @property $archivo3
 * @property $id_user
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Cliente $cliente
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Calibracion extends Model
{
    use SoftDeletes;

    static $rules = [
		'fecha' => 'required',
		'archivo2' => 'required',
		'archivo3' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cliente','fecha','archivo1','observacion_piloto','observacion_cliente','archivo2','archivo3','id_user'];


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
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
    

}
