<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Odontologossin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinfoto', function (Blueprint $table) {
            $table->id();
            $table->string('matricula');
            $table->string('nombre');
            $table->string('app');
            $table->string('gen');
            $table->string('fn');
            $table->string('email')->unique();
            $table->string('pass');
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
        Schema::table('odontologossin', function (Blueprint $table) {
            //
        });
    }
}
