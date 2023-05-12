<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Aeronave
 *
 * @property $id
 * @property $id_cliente
 * @property $matricula
 * @property $poliza_inicio
 * @property $poliza_fin
 * @property $cert_matricula_inicio
 * @property $cert_matricula_fin
 * @property $cert_aereonavegabilidad_inicio
 * @property $cert_aereonavegabilidad_fin
 * @property $antinarcoticos_inicio
 * @property $antinarcoticos_fin
 * @property $archivo_aereonave
 * @property $login
 * @property $fechasys
 * @property $archivo_poliza
 * @property $archivo_cert_matricula
 * @property $archivo_avion
 * @property $archivo_cert_aereonavegabilidad
 * @property $archivo_antinarcoticos
 * @property $direccional_estupefacientes_inicio
 * @property $direccional_estupefacientes_fin
 * @property $archivo_direccional
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Cliente $cliente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Aeronave extends Model
{
    use SoftDeletes;

    static $rules = [
		'matricula' => 'required',
		'poliza_inicio' => 'required',
		'poliza_fin' => 'required',
		'cert_matricula_inicio' => 'required',
		'cert_matricula_fin' => 'required',
		'cert_aereonavegabilidad_inicio' => 'required',
		'cert_aereonavegabilidad_fin' => 'required',
		'antinarcoticos_inicio' => 'required',
		'antinarcoticos_fin' => 'required',
		'archivo_aereonave' => 'required',
		'login' => 'required',
		'fechasys' => 'required',
		'archivo_poliza' => 'required',
		'archivo_cert_matricula' => 'required',
		'archivo_avion' => 'required',
		'archivo_cert_aereonavegabilidad' => 'required',
		'archivo_antinarcoticos' => 'required',
		'direccional_estupefacientes_inicio' => 'required',
		'direccional_estupefacientes_fin' => 'required',
		'archivo_direccional' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cliente','matricula','poliza_inicio','poliza_fin','cert_matricula_inicio','cert_matricula_fin','cert_aereonavegabilidad_inicio','cert_aereonavegabilidad_fin','antinarcoticos_inicio','antinarcoticos_fin','archivo_aereonave','login','fechasys','archivo_poliza','archivo_cert_matricula','archivo_avion','archivo_cert_aereonavegabilidad','archivo_antinarcoticos','direccional_estupefacientes_inicio','direccional_estupefacientes_fin','archivo_direccional'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_cliente');
    }
    

}
