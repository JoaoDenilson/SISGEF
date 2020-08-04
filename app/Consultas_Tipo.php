<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultas_Tipo extends Model
{
	protected $table = 'consultas_tipos';
    protected $fillable = [
        'tipo_nome',
    ];
}
