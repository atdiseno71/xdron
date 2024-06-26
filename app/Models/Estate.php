<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Estate
 *
 * @property $id
 * @property $name
 * @property $cliente_id
 * @property $created_by
 * @property $observations
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Client $client
 * @property DetailOperation[] $detailOperations
 * @property Luck[] $lucks
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estate extends Model
{
    use SoftDeletes;

    protected $table = "estate";

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
    protected $fillable = ['name','cliente_id','created_by','observations'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeProduct()
    {
        return $this->hasOne('App\Models\TypeProduct', 'id', 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne('App\Models\Client', 'id', 'cliente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailOperations()
    {
        return $this->hasMany('App\Models\DetailOperation', 'estate_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lucks()
    {
        return $this->hasMany('App\Models\Luck', 'estate_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function creator()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }


}
