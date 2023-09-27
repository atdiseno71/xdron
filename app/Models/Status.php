<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Status
 *
 * @property $id
 * @property $name
 * @property $slug
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Operation[] $operations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Status extends Model
{
    use SoftDeletes;

    protected $table = "statuses";

    static $rules = [
		'name' => 'required',
		'slug' => 'required',
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
    protected $fillable = ['name','slug'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operations()
    {
        return $this->hasMany('App\Models\Operation', 'status_id', 'id');
    }


}
