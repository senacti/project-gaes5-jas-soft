<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenpedido extends Model
{
    protected $table = 'ordenpedido';
    protected $primaryKey = 'IdOrdenPedido';   
    protected $fillable = [
		'IdOrdenPedido' => 'required',
		'cantidadProducto' => 'required',
		'fechaPedido' => 'required',
		'IdProducto' => 'required',
		'IdEstadopedido' => 'required',
    ];
    public $timestamps = false;
}
