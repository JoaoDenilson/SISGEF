<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'paciente_nome', 'paciente_nome_mae', 'paciente_data_nascimento','paciente_cartao_sus', 'paciente_fone', 'endereco_id'
    ];

     public function endereco(){
    	return $this->belongsTo('App\Endereco');
    }
}

