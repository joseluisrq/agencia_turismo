<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearDetallePaqueteTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('detalle_paquete',function(Blueprint $table){
            $table->increments('id');    

            $table->integer('idservicio')->unsigned();    
            $table->foreign('idservicio')->references('id')->on('servicios')->onDelete('cascade');

            $table->integer('idpaquete')->unsigned();    
            $table->foreign('idpaquete')->references('id')->on('paquetes')->onDelete('cascade'); 
            
            $table->integer('cantidad');
            $table->decimal('precio',11,2);   
            $table->decimal('descuento',11,2);              
        
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
