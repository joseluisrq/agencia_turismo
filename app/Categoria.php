<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Categoria extends Model
{
    //
    protected $table = 'categorias';
    protected $primaryKey='id';

    protected $fillable=[
        'nommbre',
        'descripcion',
        'condicion'];

     //relacion servicios
    public function servicios(){
        return  $this->hasMany('App\Articulo');
    }
        
}
