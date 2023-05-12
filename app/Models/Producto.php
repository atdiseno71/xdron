<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Producto
 *
 * @property $id
 * @property $nombre
 * @property $tipo
 * @property $descarga
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Aplicacion[] $aplicacions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    use SoftDeletes;

    static $rules = [
		'nombre' => 'required',
		'tipo' => 'required',
		'descarga' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','tipo','descarga'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aplicacions()
    {
        return $this->hasMany('App\Models\Aplicacion', 'id_producto', 'id');
    }
    

}
