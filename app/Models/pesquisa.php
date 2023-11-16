<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesquisa extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'resposta1',
        'resposta2',
        'resposta3',
        'resposta33',
        'resposta4',
        'resposta5',
        'resposta6',
    ];

}
