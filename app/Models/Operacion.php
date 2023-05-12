<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Operacion
 *
 * @property $id
 * @property $fecha
 * @property $horas_voladas
 * @property $consumo_combustible
 * @property $motivo
 * @property $aterrizajes
 * @property $matricula
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Operacion extends Model
{
    use SoftDeletes;

    static $rules = [
		'fecha' => 'required',
		'horas_voladas' => 'required',
		'consumo_combustible' => 'required',
		'motivo' => 'required',
		'aterrizajes' => 'required',
		'matricula' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','horas_voladas','consumo_combustible','motivo','aterrizajes','matricula'];



}
