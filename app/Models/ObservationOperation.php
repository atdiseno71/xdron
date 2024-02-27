<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FilesOperation
 *
 * @property $id
 * @property $record
 * @property $track
 * @property $map
 * @property $detail_operation_id
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property DetailOperation $detailOperation
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ObservationOperation extends Model
{
    // use SoftDeletes;

    protected $table = "files_operation";

    static $rules = [
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
        'observation_admin',
        'observation_pilot',
        'observation_asistent_one',
        'observation_asistent_two',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function operation()
    {
        return $this->hasOne('App\Models\Operation', 'id', 'operation_id');
    }

}
