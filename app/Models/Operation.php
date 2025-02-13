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
        'id_cliente' => 'required',
        'pilot_id' => 'required',
        'assistant_id_one' => 'required',
        'date_operation' => 'required',
        // nuevos
        'dron_id' => 'required',
        'download' => 'required',
        'zone_id' => 'required',
        'type_product_id' => 'required',
        'number_flights' => 'required',
        'hour_flights' => 'required',
    ];

    static $rulesAccept = [
        'status_id' => 'required'
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'consecutive',
        'download',
        'assistant_id_one',
        'assistant_id_two',
        'pilot_id',
        'id_cliente',
        'admin_by',
        'status_id',
        'file_evidence',
        'date_operation',
        'evidence_record',
        'evidence_aplication',
        'evidence_pdf',
        'dron_id',
        'zone_id',
        'number_flights',
        'hour_flights',
        'type_product_id',
    ];

    protected $casts = [
        'date_operation' => 'date:Y-m-d',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assistant_one()
    {
        return $this->hasOne(Assistant::class, 'id', 'assistant_id_one');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assistant_two()
    {
        return $this->hasOne(Assistant::class, 'id', 'assistant_id_two');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'id_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(TypeProduct::class, 'id', 'type_product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userAdmin()
    {
        return $this->hasOne(User::class, 'id', 'admin_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_pilot()
    {
        return $this->hasOne(User::class, 'id', 'pilot_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function observation()
    {
        return $this->hasOne(Observation::class, 'operation_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany(DetailOperation::class, 'operation_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function zone()
    {
        return $this->hasOne(Zone::class, 'id', 'zone_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function drone()
    {
        return $this->hasOne(Dron::class, 'id', 'dron_id');
    }

}
