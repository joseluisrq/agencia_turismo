<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
     protected $table = 'clientes';
     protected $primaryKey='id';
 
     protected $fillable=[
         'id',
         'condicion'     
 
        ];
  
     public function persona(){
         return  $this->belongsTo('App\Persona');
     }
        
}
