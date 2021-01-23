<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bands extends Model
{
    use HasFactory;

    protected $fillable = [
        'band_name', 'band_description', 'band_tekstkleur',
        'band_achtergrondkleur', 'video1', 'video2', 'video3',
        'band_admin', 
    ];
}
