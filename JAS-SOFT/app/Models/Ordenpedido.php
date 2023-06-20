<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ordenpedido
 *
 * @property $IdOrdenPedido
 * @property $cantidadProducto
 * @property $fechaPedido
 * @property $IdProducto
 * @property $IdEstadopedido
 *
 * @property Estadopedido $estadopedido
 * @property Ordenproduccion[] $ordenproduccions
 * @property Pago[] $pagos
 * @property Ventum[] $ventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ordenpedido extends Model
{
    protected $table = 'ordenpedido';
<<<<<<< Updated upstream
    protected $primaryKey = 'id';   
    static $rules = [
		'IdOrdenPedido' => 'required',
		'cantidadProducto' => 'required',
		'fechaPedido' => 'required',
		'IdProducto' => 'required',
		'IdEstadopedido' => 'required',
=======
    protected $primaryKey = 'IdOrdenPedido';   
    protected $fillable = [		
		'cantidadProducto',
		'fechaPedido',
		'IdProducto',
		'IdEstadopedido',
>>>>>>> Stashed changes
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['IdOrdenPedido','cantidadProducto','fechaPedido','IdProducto','IdEstadopedido'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadopedido()
    {
        return $this->hasOne('App\Models\Estadopedido', 'IdEstadoPedido', 'IdEstadopedido');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordenproduccions()
    {
        return $this->hasMany('App\Models\Ordenproduccion', 'IdOrdenPedido', 'IdOrdenPedido');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagos()
    {
        return $this->hasMany('App\Models\Pago', 'IdOrdenPedido', 'IdOrdenPedido');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Models\Ventum', 'IdOrdenPedido', 'IdOrdenPedido');
    }
    

}
