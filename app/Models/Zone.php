<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Zone
 *
 * @property $id
 * @property $name
 * @property $observations
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property DetailOperation[] $detailOperations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Zone extends Model
{
    use SoftDeletes;

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
    protected $fillable = ['name','observations'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailOperations()
    {
        return $this->hasMany('App\Models\DetailOperation', 'zone_id', 'id');
    }


}
