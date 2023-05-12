<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FacturaInventario
 *
 * @property $id
 * @property $id_proveedor
 * @property $fecha
 * @property $total
 * @property $archivo_factura
 * @property $no_factura
 * @property $estado
 * @property $fecha_vencimiento
 * @property $observacion
 * @property $id_user
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class FacturaInventario extends Model
{
    use SoftDeletes;

    static $rules = [
		'id_proveedor' => 'required',
		'fecha' => 'required',
		'total' => 'required',
		'no_factura' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_proveedor','fecha','total','archivo_factura','no_factura','estado','fecha_vencimiento','observacion','id_user'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
    

}
