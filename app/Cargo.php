<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Cargo extends Model
{
    //
    protected $table = 'cargos';
    protected $primaryKey='id';

    protected $fillable=[
        'nombre',
        'descripcion',
        'condicion'];

     //relacion servicios
    public function empleados(){
        return  $this->hasMany('App\Empleado');
    }
        
}
