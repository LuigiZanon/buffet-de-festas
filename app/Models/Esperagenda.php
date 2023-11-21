<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class esperagenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'nome',
        'idade',
        'convidados',
        'pacote',
        'status',
        'Dinicio',
        'Dfim',
    ];

    protected $dates = [
        'Dinicio',
        'Dfim',
    ];
}
