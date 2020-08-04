<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesContactadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_contactados', function (Blueprint $table) {
            $table->increments('id');
            $table->date('contactado_data')->format('d.m.y');
            $table->integer('agendamento_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('pacientes_contactados', function($table) {
            $table->foreign('agendamento_id')->references('id')->on('consultas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes_contactados');
    }
}
