<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Grupo
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property GrupoUsuario[] $grupoUsuarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Grupo extends Model
{
    use SoftDeletes;

    static $rules = [
		'nombre' => 'required',
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
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupoUsuarios()
    {
        return $this->hasMany('App\Models\GrupoUsuario', 'id_grupo', 'id');
    }


}
