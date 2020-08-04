<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'endereco_rua', 'endereco_bairro', 'endereco_numero', 'endereco_complemento',
    ];

    public function pacientes() {
        return $this->hasMany('App\Paciente');
    }
}
