<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $IdProducto
 * @property $CantidadProducto
 * @property $ValorUnidadMedidaProducto
 * @property $FechaFabricacion
 * @property $IdColor
 * @property $IdEmpleado
 * @property $IdUnidadMedida
 * @property $IdEstadoProducto
 * @property $IdNombreProducto
 *
 * @property Color $color
 * @property Empleado $empleado
 * @property Estadoproducto $estadoproducto
 * @property Flujo[] $flujos
 * @property Nombreproducto $nombreproducto
 * @property Promocion[] $promocions
 * @property Unidadmedida $unidadmedida
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{    
    protected $table = 'producto';
    protected $primaryKey = 'IdProducto';   
    static $rules = [		
		'CantidadProducto',
		'ValorUnidadMedidaProducto',
		'FechaFabricacion',
		'IdColor',
		'IdEmpleado',
		'IdUnidadMedida',
		'IdEstadoProducto',
		'IdNombreProducto',
    ];

    protected $perPage = 20;
    public $timestamps = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['IdProducto','CantidadProducto','ValorUnidadMedidaProducto','FechaFabricacion','IdColor','IdEmpleado','IdUnidadMedida','IdEstadoProducto','IdNombreProducto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function color()
    {
        return $this->hasOne('App\Models\Color', 'IdColor', 'IdColor');
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
    public function estadoproducto()
    {
        return $this->hasOne('App\Models\Estadoproducto', 'idEstadoProducto', 'IdEstadoProducto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flujos()
    {
        return $this->hasMany('App\Models\Flujo', 'IdProducto', 'IdProducto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nombreproducto()
    {
        return $this->hasOne('App\Models\Nombreproducto', 'idNombreProducto', 'IdNombreProducto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promocions()
    {
        return $this->hasMany('App\Models\Promocion', 'IdProducto', 'IdProducto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unidadmedida()
    {
        return $this->hasOne('App\Models\Unidadmedida', 'idUnidadMedida', 'IdUnidadMedida');
    }
    

}
