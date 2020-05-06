<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearPersonasTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('personas',function(Blueprint $table){
            $table->increments('id');  
            $table->string('dni',100)->unique();   
            $table->string('nombres',100);  
            $table->string('apellidos',100);  
            $table->string('tipo_documento',20)->nullable();         

            $table->string('direccion',100)->nullable();  
            $table->string('ciudad',100)->nullable();  
            $table->string('pais',100)->nullable();  

            $table->string('telefono',20)->nullable();  
            $table->string('email',50)->nullable();  

            $table->boolean('sexo');
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
    }
}
