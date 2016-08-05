<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaPersonalGrupos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_grupos', function (Blueprint $table) {
            $table->increments('id_personal_grupos',6);
            $table->string('id_horario',6);
            $table->string('nombre',50);
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
