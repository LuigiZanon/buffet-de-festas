<?php

namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

class AprovadaAgenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'nome',
       'convidados',
       'pacote',
        'dia',
        'hora'
    ];
  }
