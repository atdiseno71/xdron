<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 * @property $username
 * @property $lastname
 * @property $active
 *
 * @property Operacion[] $operacions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, SoftDeletes, Notifiable;

    static $rules = [
		'name' => 'required',
		'email' => 'required',
		'username' => 'required',
		'lastname' => 'required',
		'id_role' => 'required',
		'id_type_document' => 'required',
		'document_number' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'lastname',
        'active',
        'password',
        'id_type_document',
        'document_number',
        'id_role',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operacions()
    {
        return $this->hasMany('App\Models\Operacion', 'id_piloto', 'id');
    }

    public function count_notificacion() {
        $user = User::find(Auth::id());
        return count($user->notifications);
    }

}
