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

    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['number_flights','hour_flights','acres','download','description','observation','estate_id','luck_id','zone_id'];


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
    public function filesOperations()
    {
        return $this->hasMany('App\Models\FilesOperation', 'detail_operation_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function luck()
    {
        return $this->hasOne('App\Models\Luck', 'id', 'luck_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function zone()
    {
        return $this->hasOne('App\Models\Zone', 'id', 'zone_id');
    }
    

}