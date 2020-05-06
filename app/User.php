<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'usuarios';
    protected $primaryKey='id';

    protected $fillable = [
        'id', 'usuario', 'password', 'condicion', 'idrol',
    ];
    
    public $timestamps=false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol(){
        return  $this->belongsTo('App\Roles');
    }

    public function empleado(){
        return  $this->belongsTo('App\Empleado');
    }
}
