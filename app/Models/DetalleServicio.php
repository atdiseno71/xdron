<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetalleServicio
 *
 * @property $id
 * @property $cantidad
 * @property $id_inventario
 * @property $num_servicio
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleServicio extends Model
{
    use SoftDeletes;

    static $rules = [
		'cantidad' => 'required',
		'id_inventario' => 'required',
		'num_servicio' => 'required',
		'fecha' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cantidad','id_inventario','num_servicio','fecha'];



}
