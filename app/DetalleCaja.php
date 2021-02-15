<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCaja extends Model
{
    protected $table = 'detalle_caja';
    protected $fillable = [
        'id', 
        'idcaja',
        'fecha_hora',
        'monto',
        'tipo',
        'idventa_salida',
        'detalle',
       
    ];
    public $timestamps = false;
}
