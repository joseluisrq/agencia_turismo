<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $table = 'roles';
    protected $primaryKey='id';

    protected $fillable=[
        'id',
        'nombre',
        'descripcion'  

       ];

    public $timestamps=false;

    public function users(){
        return  $this->hasMany('App\User');
    }

}
