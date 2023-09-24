<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HistorialArchivosCreado
 *
 * @property $id
 * @property $directorio
 * @property $nombre_archivo
 * @property $id_user
 * @property $fecha_registro
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class HistorialArchivosCreado extends Model
{
    use SoftDeletes;

    static $rules = [
		'directorio' => 'required',
		'nombre_archivo' => 'required',
		'fecha_registro' => 'required',
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
    protected $fillable = ['directorio','nombre_archivo','id_user','fecha_registro'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }


}
