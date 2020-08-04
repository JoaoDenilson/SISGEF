<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paciente_nome', 255);
            $table->string('paciente_nome_mae', 255);
            $table->string('paciente_data_nascimento', 12);
            $table->string('paciente_cartao_sus', 20);
            $table->string('paciente_fone', 18);
            $table->integer('endereco_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('pacientes', function($table) {
            $table->foreign('endereco_id')->references('id')->on('enderecos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
