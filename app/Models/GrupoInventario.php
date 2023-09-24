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
    protected $fillable = ['nombre','cuenta_puc'];



}
