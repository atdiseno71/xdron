<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Avion
 *
 * @property $id
 * @property $matricula
 * @property $marca
 * @property $modelo
 * @property $ano
 * @property $serie
 * @property $motor
 * @property $horometro
 * @property $alas
 * @property $fuselage
 * @property $helice
 * @property $cola
 * @property $hora_motor
 * @property $centro_costo
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Avion extends Model
{
    use SoftDeletes;

    static $rules = [
		'matricula' => 'required',
		'marca' => 'required',
		'modelo' => 'required',
		'ano' => 'required',
		'serie' => 'required',
		'motor' => 'required',
		'horometro' => 'required',
		'alas' => 'required',
		'fuselage' => 'required',
		'helice' => 'required',
		'cola' => 'required',
		'hora_motor' => 'required',
		'centro_costo' => 'required',
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
    protected $fillable = ['matricula','marca','modelo','ano','serie','motor','horometro','alas','fuselage','helice','cola','hora_motor','centro_costo'];



}
