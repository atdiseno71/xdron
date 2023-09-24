<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Servicio
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Operacion[] $operacions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Servicio extends Model
{
    use SoftDeletes;

    protected $table = 'servicio';

    static $rules = [
		'name' => 'required',
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
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operacions()
    {
        return $this->hasMany('App\Models\Operacion', 'id_servicio', 'id');
    }


}
