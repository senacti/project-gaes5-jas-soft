<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenpedido extends Model
{
    protected $table = 'ordenpedido';
    protected $primaryKey = 'IdOrdenPedido';   
    protected $fillable = [		
		'cantidadProducto',
		'fechaPedido',
		'IdProducto',
		'IdEstadopedido',
    ];
    public $timestamps = false;
}
