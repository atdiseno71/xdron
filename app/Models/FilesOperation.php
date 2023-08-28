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
class FilesOperation extends Model
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
    protected $fillable = ['record','track','map','detail_operation_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detailOperation()
    {
        return $this->hasOne('App\Models\DetailOperation', 'id', 'detail_operation_id');
    }
    

}
