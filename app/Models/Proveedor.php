<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Proveedor
 *
 * @property $id
 * @property $ciudad
 * @property $direccion
 * @property $telefono
 * @property $email
 * @property $archivo_factura
 * @property $nombre
 * @property $identificacion
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Repuesto[] $repuestos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedor extends Model
{
    use SoftDeletes;

    static $rules = [
		'ciudad' => 'required',
		'nombre' => 'required',
		'identificacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ciudad','direccion','telefono','email','archivo_factura','nombre','identificacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function repuestos()
    {
        return $this->hasMany('App\Models\Repuesto', 'id_proveedor', 'id');
    }
    

}
