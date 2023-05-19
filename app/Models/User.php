<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    static $rules = [
		'name' => 'required',
		'email' => 'required',
		'username' => 'required',
		'lastname' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','username','lastname'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operacions()
    {
        return $this->hasMany('App\Models\Operacion', 'id_piloto', 'id');
    }


}
