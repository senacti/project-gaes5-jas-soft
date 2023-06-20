<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $table = 'insumo';
    protected $primaryKey = 'IdInsumo';

    protected $fillable = [
        'Cantidad',
        'Color',
        'IdEmpleado',
        'IdUnidadMedida',
        'IdNombreInsumo',
    ];
    public $timestamps = false;
}