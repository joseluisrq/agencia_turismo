<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearRolesTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
       /* Schema::create('roles',function(Blueprint $table){
            DB::table('roles')->insert(array('id'=>'1','nombre'=>'Administrador', 'descripcion'=>'Administradores de área'));
            DB::table('roles')->insert(array('id'=>'2','nombre'=>'Counter', 'descripcion'=>'Vendedor área venta'));
            DB::table('roles')->insert(array('id'=>'3','nombre'=>'Coordinador', 'descripcion'=>'Almacenero área compras'));
         
   
           
                           
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
       // Schema::dropIfExists('roles');
    }
}
