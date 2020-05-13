<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearDetalleClientesTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('detalle_clientes',function(Blueprint $table){
            $table->increments('id');    

            $table->integer('idcliente')->unsigned();    
            $table->foreign('idcliente')->references('id')->on('clientes')->onDelete('cascade');

            $table->integer('idpaquete')->unsigned();    
            $table->foreign('idpaquete')->references('id')->on('paquetes')->onDelete('cascade'); 
            
            $table->boolean('responsable')->default(1); 
                 
        
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
