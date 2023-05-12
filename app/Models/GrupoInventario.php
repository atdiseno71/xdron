<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GrupoInventario
 *
 * @property $id
 * @property $nombre
 * @property $cuenta_puc
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class GrupoInventario extends Model
{
    use SoftDeletes;

    static $rules = [
		'nombre' => 'required',
		'cuenta_puc' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','cuenta_puc'];



}
