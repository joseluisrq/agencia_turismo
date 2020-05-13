<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePaquete extends Model
{
    protected $table = 'detalle_paquete';
    protected $fillable = [
        'idservicio', 
        'idpaquete',
        'cantidad',
        'precio',
        'descuento'
    ];
    public $timestamps = false;
}
