<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ObservationOperation
 *
 * @property $id
 * @property $operation_id
 * @property $observation_admin
 * @property $observation_pilot
 * @property $observation_asistent_one
 * @property $observation_asistent_two
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Operation $operation
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Observation extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "observation_operation";

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
        'observation_admin',
        'observation_pilot',
        'observation_asistent_one',
        'observation_asistent_two'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function operation()
    {
        return $this->hasOne(Operation::class, 'operation_id', 'id');
    }

}