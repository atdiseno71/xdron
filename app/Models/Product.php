<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 *
 * @property $id
 * @property $name
 * @property $type
 * @property $created_by
 * @property $observations
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Operation[] $operations
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    use SoftDeletes;

    protected $table = "products";

    static $rules = [
		'name' => 'required',
		'type_id' => 'required',
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
    protected $fillable = ['name','type_id','created_by','observations'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operations()
    {
        return $this->hasMany('App\Models\Operation', 'type_product_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function creator()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeProduct()
    {
        return $this->hasOne('App\Models\TypeProduct', 'id', 'type_id');
    }

}
