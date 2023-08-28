<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Municipality
 *
 * @property $id
 * @property $name
 * @property $department_id
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Department $department
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Municipality extends Model
{
    use SoftDeletes;

    static $rules = [
		'name' => 'required',
		'department_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','department_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function department()
    {
        return $this->hasOne('App\Models\Department', 'id', 'department_id');
    }
    

}
