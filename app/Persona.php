<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
     //
     protected $table = 'personas';
     protected $primaryKey='id';
 
     protected $fillable=[
         'id',
         'dni',
         'nombres',
         'apellidos',
         'tipo_documento',       
         'direccion',
         'ciudad',
         'pais',
         'telefono',
         'email',
         'sexo'

        ];

        public function prestador(){
            return  $this->hasMany('App\Prestador');
        }
           
 
}
