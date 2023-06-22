<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buzonsugerencia extends Model
{
    
  protected $table = 'buzonsugerencias';
  protected $primaryKey = 'idSugerencias';

  protected $fillable = [
  'CategoriaSugerencia',
  'DescripSugerencias',
  'IdEmpleado',
  ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'IdEmpleado', 'IdEmpleado');
    }
    

}
