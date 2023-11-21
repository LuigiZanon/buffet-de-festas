<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funcionamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'horarioMin',
        'horarioMax',
        'horasPfesta',
    ];

    protected $dates = [
        'horarioMin',
        'horarioMax',
    ];
}
