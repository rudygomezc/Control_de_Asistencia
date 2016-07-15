<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('empleado', function (Blueprint $table) {
            $table->increments('idempleado');
            $table->string('name',100);
            $table->string('apellido',50);
            $table->string('email')->unique();
            $table->string('direccion',100);
            $table->string('telefono',12);
            $table->string('profesion',100);
            $table->tinyInteger('habilitado')
                  ->default(1);
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
