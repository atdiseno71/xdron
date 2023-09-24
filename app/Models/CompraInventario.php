<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompraInventario
 *
 * @property $id
 * @property $id_factura
 * @property $saldo
 * @property $monto
 * @property $fecha_inicio
 * @property $observacion
 * @property $fecha_pago
 * @property $estado
 * @property $id_user
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CompraInventario extends Model
{
    use SoftDeletes;

    static $rules = [
		'id_factura' => 'required',
		'saldo' => 'required',
		'monto' => 'required',
		'fecha_inicio' => 'required',
		'fecha_pago' => 'required',
		'estado' => 'required',
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
    protected $fillable = ['id_factura','saldo','monto','fecha_inicio','observacion','fecha_pago','estado','id_user'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }


}
