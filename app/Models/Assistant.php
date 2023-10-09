<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Assistant
 *
 * @property $id
 * @property $name
 * @property $lastname
 * @property $type_document
 * @property $document_number
 * @property $created_by
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Operation[] $operations
 * @property Operation[] $operations
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Assistant extends Model
{

    protected $table = 'assistants';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->perPage = config('global.num_pagination');
    }

    use SoftDeletes;

    static $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'type_document' => 'required',
        'document_number' => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'lastname', 'type_document', 'document_number', 'created_by'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assistant_one()
    {
        return $this->hasMany('App\Models\Operation', 'assistant_id_one', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assistant_two()
    {
        return $this->hasMany('App\Models\Operation', 'assistant_id_two', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeDocument()
    {
        return $this->hasOne('App\Models\TypeDocument', 'id', 'type_document');
    }
}
