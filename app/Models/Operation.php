<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Operation
 *
 * @property $id
 * @property $download
 * @property $observation_admin
 * @property $observation_pilot
 * @property $observation_assistant_one
 * @property $observation_assistant_two
 * @property $type_product_id
 * @property $assistant_id_one
 * @property $assistant_id_two
 * @property $pilot_id
 * @property $id_cliente
 * @property $admin_by
 * @property $status_id
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Assistant $assistant
 * @property Assistant $assistant
 * @property Client $client
 * @property Product $product
 * @property Status $status
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Operation extends Model
{

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->perPage = config('global.num_pagination');
    }

    use SoftDeletes, HasFactory;

    protected $table = "operation";

    static $rules = [
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'download',
        'observation_admin',
        'assistant_id_one',
        'assistant_id_two',
        'pilot_id',
        'id_cliente',
        'admin_by',
        'status_id',
        'observation_admin',
        'file_evidence',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assistant_one()
    {
        return $this->hasOne('App\Models\Assistant', 'id', 'assistant_id_one');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assistant_two()
    {
        return $this->hasOne('App\Models\Assistant', 'id', 'assistant_id_two');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne('App\Models\Client', 'id', 'id_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\TypeProduct', 'id', 'type_product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne('App\Models\Status', 'id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userAdmin()
    {
        return $this->hasOne('App\Models\User', 'id', 'admin_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userPilot()
    {
        return $this->hasOne('App\Models\User', 'id', 'pilot_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany('App\Models\DetailOperation', 'operation_id', 'id');
    }

}
