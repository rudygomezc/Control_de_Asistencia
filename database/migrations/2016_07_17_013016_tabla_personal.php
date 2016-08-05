<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaPersonal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->increments('id_personal',6);
            $table->string('id_personal_grupos',6);
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('dni',8);
            $table->string('telefono',12);
            $table->string('direccion',50);
            $table->string('email',50);
            $table->string('imagen',255);
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
