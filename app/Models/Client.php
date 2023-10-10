<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    use SoftDeletes, HasFactory;

    static $rules = [
		// 'nit' => 'required',
		'social_reason' => 'required',
		// 'address' => 'required',
		// 'phone' => 'required',
		// 'email_enterprise' => 'required',
		// 'full_name_user' => 'required',
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
    public function createBy()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'clients_users', 'client_id', 'user_id');
    }

}
