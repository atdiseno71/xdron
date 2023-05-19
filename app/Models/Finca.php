<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Finca
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Cliente[] $clientes
 * @property ClientesFinca[] $clientesFincas
 * @property Operacion[] $operacions
 * @property Zona[] $zonas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Finca extends Model
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
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientes()
    {
        return $this->hasMany('App\Models\Cliente', 'id_finca', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientesFincas()
    {
        return $this->hasMany('App\Models\ClientesFinca', 'id_finca', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operacions()
    {
        return $this->hasMany('App\Models\Operacion', 'id_finca', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zonas()
    {
        return $this->hasMany('App\Models\Zona', 'id_finca', 'id');
    }
    

}
