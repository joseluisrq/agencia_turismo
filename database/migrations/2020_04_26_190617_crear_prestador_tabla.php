<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearPrestadorTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('prestadores',function(Blueprint $table){
            $table->integer('id')->unsigned();            
            $table->string('empresa',100)->nullable(); ;  
            $table->string('ruc',20)->nullable(); ;  
            $table->string('puesto',20)->nullable();               
            $table->foreign('id')->references('id')->on('personas')->onDelete('cascade');

       
                    
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
