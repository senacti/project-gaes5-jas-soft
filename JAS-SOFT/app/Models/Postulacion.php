<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\PostulacionController;

class Postulacion extends Model
{
    protected $table = 'postulacion';
    protected $primaryKey = 'IdPostulacion';
    protected $fillable = [        
        'FechaPostulacion' ,
        'DescripOferta' ,
        'PerfilPostulacion' ,
        'IdDetallesOferta' ,
        'IdEmpleado' ,
        'IdEstadoPostulaciones' ,
    ];

    public $timestamps = false;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function descripofertum()
    {
        return $this->hasOne('App\Models\Descripofertum', 'IdDetallesOferta', 'IdDetallesOferta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'IdEmpleado', 'IdEmpleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadopostulacion()
    {
        return $this->hasOne('App\Models\Estadopostulacione', 'IdEstadoPostulaciones', 'IdEstadoPostulaciones');
    }
}