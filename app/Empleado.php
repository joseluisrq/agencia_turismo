<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //
    protected $table = 'empleados';
    protected $primaryKey='id';

    protected $fillable=[
        'id',
        'condicion'     

       ];
 
    public function persona(){
        return  $this->belongsTo('App\Persona');
    }

    public function user(){
        return  $this->hasOne('App\User');
    }
    public function cargo(){
        return  $this->belongsTo('App\Cargo');
    }

}
