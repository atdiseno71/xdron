<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nit
 * @property $nombre
 * @property $contacto
 * @property $email
 * @property $campos_nuevos
 * @property $direccion
 * @property $telefono
 * @property $email_encargado
 * @property $email1
 * @property $email2
 * @property $email3
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
class Cliente extends Model
{
    use SoftDeletes;

    protected $table = 'cliente';

    static $rules = [
		'contacto' => 'required',
		'direccion' => 'required',
        'id_user' => 'required',
        'id_finca' => 'required',
        'contacto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'nit',
        // 'nombre',
        // 'email',
        'id_user',
        'contacto',
        'campos_nuevos',
        'direccion',
        'telefono',
        'email_encargado',
        'email1',
        'email2',
        'email3',
        'id_finca',
        'observaciones',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientesFincas()
    {
        return $this->hasMany('App\Models\ClientesFinca', 'id_cliente', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function finca()
    {
        return $this->hasOne('App\Models\Finca', 'id', 'id_finca');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operacions()
    {
        return $this->hasMany('App\Models\Operacion', 'id_cliente', 'id');
    }


}
