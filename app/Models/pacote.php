<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pacote extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'img1',
        'img2',
        'img3',
        'desc'
    ];
}
