<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
     protected $table = 'caja';
    protected $primaryKey='id';

    protected $fillable=[
        'id',
        'idempleado',
        'fecha_hora_inicial',
        'inicial',
        'final',
        'fecha_hora_final' ,
        'estado' 

       ];

    public $timestamps=false;

    
}
