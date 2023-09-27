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

    protected $table = 'clientes';

    static $rules = [
		'nit' => 'required',
		'telefono' => 'required',
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
    protected $fillable = [
        'nit',
        'razon_social',
        'direccion',
        'telefono',
        'email_enterprise',
        'email_enterprise2',
        'email_user',
        'full_name_user',
        'created_by',
        'observations',
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
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operacions()
    {
        return $this->hasMany('App\Models\Operacion', 'id_cliente', 'id');
    }


}
