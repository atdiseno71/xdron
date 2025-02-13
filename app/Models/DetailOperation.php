<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailOperation
 *
 * @property $id
 * @property $number_flights
 * @property $hour_flights
 * @property $acres
 * @property $download
 * @property $description
 * @property $observation
 * @property $estate_id
 * @property $luck_id
 * @property $zone_id
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Estate $estate
 * @property FilesOperation[] $filesOperations
 * @property Luck $luck
 * @property Zone $zone
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetailOperation extends Model
{
    use SoftDeletes;

    protected $table = "detail_operation";

    static $rules = [
        'observation' => 'required',
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
    protected $fillable = [
        'operation_id',
        'number_flights',
        'hour_flights',
        'acres',
        'download',
        'description',
        'observation',
        'estate_id',
        'luck',
        'zone_id',
        'dron_id',
        'evidencia_record',
        'evidencia_track',
        'evidencia_gps',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    /* public function drone()
    {
        return $this->hasOne('App\Models\Dron', 'id', 'dron_id');
    } */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estate()
    {
        return $this->hasOne('App\Models\Estate', 'id', 'estate_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operations()
    {
        return $this->hasMany('App\Models\Operation', 'operation_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files_details()
    {
        return $this->hasMany('App\Models\FilesOperation', 'detail_operation_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function zone()
    {
        return $this->hasOne('App\Models\Zone', 'id', 'zone_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeProduct()
    {
        return $this->hasOne('App\Models\TypeProduct', 'id', 'type_product_id');
    }

}
