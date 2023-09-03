<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Dron
 *
 * @property $id
 * @property $enrollment
 * @property $brand
 * @property $model
 * @property $year
 * @property $created_by
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dron extends Model
{
    use SoftDeletes;

    protected $table = "dron";

    static $rules = [
		'enrollment' => 'required',
		'brand' => 'required',
		'model' => 'required',
		'year' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['enrollment','brand','model','year','created_by'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function creator()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }


}
