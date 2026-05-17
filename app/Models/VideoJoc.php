<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoJoc extends Model
{
    /** @use HasFactory<\Database\Factories\VideoJocFactory> */
    use HasFactory;

    protected $fillable = [
        'titol', 'any_llancament', 'compatibilitat', 'duracioJoc',
        'disponibilitat', 'valoracion', 'tipus', 'preu'
    ];
}
