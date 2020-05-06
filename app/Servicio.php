<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    
     protected $table = 'servicios';
     protected $primaryKey='id';
 
     protected $fillable=[
         'idcategoria',
         'idprestador',
         'codigo',
         'nombre',
         'descripcion',
         'precio',
         'condicion'];

    //relacion categoria
    public function categoria(){
        return  $this->belongsTo('App\Categoria');
    }

         
}
