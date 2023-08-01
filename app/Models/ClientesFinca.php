<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClientesFinca
 *
 * @property $id
 * @property $id_cliente
 * @property $id_finca
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Cliente $cliente
 * @property Finca $finca
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ClientesFinca extends Model
{
    use SoftDeletes;

    protected $table = "clientes_finca";

    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cliente','id_finca'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function finca()
    {
        return $this->hasOne('App\Models\Finca', 'id', 'id_finca');
    }


}
