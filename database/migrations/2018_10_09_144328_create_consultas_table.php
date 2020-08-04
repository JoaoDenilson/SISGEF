<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agendamento_medico', 255);
            $table->date('agendamento_data')->format('d.m.y');
            $table->integer('agendamento_confirmada');
            $table->integer('tipo_id')->unsigned();
            $table->string('tipo_consulta', 60);
            $table->string('prioridade', 60);
            $table->string('observacao', 255)->nullable();
            $table->integer('paciente_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('consultas', function($table) {
            $table->foreign('tipo_id')->references('id')->on('consultas_tipos');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
