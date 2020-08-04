<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacientes_Contactado extends Model
{
    protected $table = 'pacientes_contactados';
    protected $fillable = [
        'contactado_data', 'agendamento_id',
    ];
}
