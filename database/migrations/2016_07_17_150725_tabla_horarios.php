<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaHorarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id_horario',6);
            $table->string('descripcion',255);
            $table->string('hora_entrada',45);
            $table->string('hora_salida',45);
            $table->string('hora_salida_almuerzo',45);
            $table->string('hora_entrada_almuerzo',45);
            $table->timestamp('created_at',NULL);
            $table->timestamp('updated_at',NULL);
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
