<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Buzonsugerencia
 *
 * @property $IdSugerencias
 * @property $CategoriaSugerencia
 * @property $DescripSugerencias
 * @property $IdEmpleado
 *
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Buzonsugerencia extends Model
{
    
    static $rules = [
		'IdSugerencias' => 'required',
		'CategoriaSugerencia' => 'required',
		'DescripSugerencias' => 'required',
		'IdEmpleado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['IdSugerencias','CategoriaSugerencia','DescripSugerencias','IdEmpleado'];
   


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'IdEmpleado', 'IdEmpleado');
    }
    

}
