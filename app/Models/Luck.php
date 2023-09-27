<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Luck
 *
 * @property $id
 * @property $name
 * @property $observations
 * @property $estate_id
 * @property $created_by
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property DetailOperation[] $detailOperations
 * @property Estate $estate
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Luck extends Model
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
    protected $fillable = ['name','observations','estate_id','created_by'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailOperations()
    {
        return $this->hasMany('App\Models\DetailOperation', 'luck_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estate()
    {
        return $this->hasOne('App\Models\Estate', 'id', 'estate_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function creator()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }


}
