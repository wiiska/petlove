<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = "turmas";
    //app/Models/
    protected $fillable = [
        "nome",
        "professor_id",
        "curso_id",
        "codigo",
        "data_inicio",
        "data_fim",
    ];

    protected $casts = [
        'professor_id'=>'integer',
        'curso_id'=>'integer',
        'data_inicio'=>'date',
        'data_fim'=>'date',
    ];
}
