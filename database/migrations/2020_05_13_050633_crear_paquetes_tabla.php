<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearPaquetesTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('paquetes',function(Blueprint $table){
            $table->increments('id');    
          
            $table->integer('idempleado')->unsigned();    
            $table->foreign('idempleado')->references('id')->on('empleados')->onDelete('cascade');  

            $table->string('tipo_comprobante',20);
            $table->string('serie_comprobante',7)->nullable();   
            $table->string('num_comprobante',10);   

            $table->dateTime('fecha_hora');   
            $table->decimal('impuesto',4,2);   
            $table->decimal('total',11,2);   

            $table->string('estado',20);   

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
