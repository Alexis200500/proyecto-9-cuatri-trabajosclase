<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('usuarios',function(Blueprint $table){
          $table->increments('idusuario');
          $table->string('nombre',20);
          $table->string('apellidop',20);
          $table->string('apellidom',20);
          $table->string('sexo',1);
          $table->string('edad',5);
          $table->string('telefono',10);
          $table->string('correo',30);

          $table->integer('idtipo_u')->unsigned();
          $table->foreign('idtipo_u')->references('idtipo_u')->on('tipo_usuarios');

          
          $table->rememberToken();
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
        Schema::drop('usuarios');
    }
}

