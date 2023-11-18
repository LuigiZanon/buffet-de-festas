<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convidado extends Model
{
    protected $table = 'convidados';
    protected $fillable = ['cpf', 'nome', 'idade'];
}
