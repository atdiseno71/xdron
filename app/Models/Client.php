<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 *
 * @property $id
 * @property $nit
 * @property $social_reason
 * @property $address
 * @property $phone
 * @property $email_enterprise
 * @property $email_enterprise2
 * @property $email_user
 * @property $full_name_user
 * @property $created_by
 * @property $observations
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Estate[] $estates
 * @property Operation[] $operations
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Client extends Model
{
    use SoftDeletes;

    static $rules = [
		'nit' => 'required',
		'social_reason' => 'required',
		'address' => 'required',
		'phone' => 'required',
		'email_enterprise' => 'required',
		'email_enterprise2' => 'required',
		'email_user' => 'required',
		'full_name_user' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nit','social_reason','address','phone','email_enterprise','email_enterprise2','email_user','full_name_user','created_by','observations'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estates()
    {
        return $this->hasMany('App\Models\Estate', 'cliente_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operations()
    {
        return $this->hasMany('App\Models\Operation', 'id_cliente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
    

}