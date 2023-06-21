<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\VentumController;

class Ventum extends Model
{
    protected $table = 'venta';
    protected $primariKey = 'IdVenta';

    protected $fillable = [
		'fecha',
		'totalVenta',
		'subTotal',
		'CantidadDescuento',
		'totalIva',
		'IdCliente',
		'IdPagos',
		'IdEmpleado',
		'IdOrdenPedido',
    ];
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'idCliente', 'IdCliente');
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
    public function ordenpedido()
    {
        return $this->hasOne('App\Models\Ordenpedido', 'IdOrdenPedido', 'IdOrdenPedido');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pago()
    {
        return $this->hasOne('App\Models\Pago', 'Idpagos', 'IdPagos');
    }
    

}
