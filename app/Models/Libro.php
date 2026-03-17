<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    // Campos que el sistema reconoce como modificables
    protected $fillable = ['nombre', 'autor', 'editorial', 'precio'];
}
