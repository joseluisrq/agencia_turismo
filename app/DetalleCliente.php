<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCliente extends Model
{
    protected $table = 'detalle_clientes';
    protected $fillable = [
        'idcliente', 
        'idpaquete',
        'responsable',
       
    ];
    public $timestamps = false;
}
