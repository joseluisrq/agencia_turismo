<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearClientesTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clientes',function(Blueprint $table){
            $table->integer('id')->unsigned();
            $table->boolean('condicion')->default(1); 
            $table->timestamps();        
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
