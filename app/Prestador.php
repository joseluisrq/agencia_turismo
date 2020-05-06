<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestador extends Model
{
    //
    protected $table = 'prestadores';
    protected $primaryKey='id';

    protected $fillable=[
        'id',
        'empresa',
        'ruc',
        'puesto' ,
        'condicion'     

       ];

    public $timestamps=false;

    public function persona(){
        return  $this->belongsTo('App\Persona');
    }
       

}
