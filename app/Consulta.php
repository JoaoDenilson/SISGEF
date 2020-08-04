<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'agendamento_medico', 'tipo_consulta', 'prioridade', 'agendamento_data', 'agendamento_confirmada', 'tipo_id', 'paciente_id', 'observacao'
    ];

    public function tipo(){
        return $this->belongsTo('App\Consultas_Tipo');
    }

    public function paciente(){
        return $this->belongsTo('App\Paciente');
    }
}
