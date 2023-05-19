<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Zona
 *
 * @property $id
 * @property $name
 * @property $id_finca
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property ClientesFinca[] $clientesFincas
 * @property Finca $finca
 * @property Operacion[] $operacions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Zona extends Model
{
    use SoftDeletes;

    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','id_finca'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientesFincas()
    {
        return $this->hasMany('App\Models\ClientesFinca', 'zona_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function finca()
    {
        return $this->hasOne('App\Models\Finca', 'id', 'id_finca');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operacions()
    {
        return $this->hasMany('App\Models\Operacion', 'zona_id', 'id');
    }
    

}
