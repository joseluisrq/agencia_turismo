<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearCargosTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cargos',function(Blueprint $table){
            $table->increments('id');    
            $table->string('nombre',100)->unique();
            $table->string('descripcion',256)->nullable();   
            $table->boolean('condicion')->default(1);
            $table->timestamps();
            
        
        });
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
