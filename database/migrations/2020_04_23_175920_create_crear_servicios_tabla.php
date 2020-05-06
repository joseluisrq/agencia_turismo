<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrearServiciosTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('servicios',function(Blueprint $table){
            $table->increments('id');         
            $table->integer('idcategoria')->unsigned();
            $table->integer('idprestador')->unsigned();

            $table->string('codigo',50)->nullable();
            $table->string('nombre',100)->unique();
            $table->string('descripcion',256)->nullable();
            $table->decimal('precio',11,2);
            $table->boolean('condicion')->default(1);
            $table->timestamps();
            
            $table->foreign('idcategoria')->references('id')->on('categorias');
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
