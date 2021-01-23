<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BandRequests extends Model
{
    use HasFactory;

    protected $fillable = [
        'band_admin_name', 'request_sender_namde', 'band_admin_id',
        'request_sender_id', 'request_join_band_name', 'accepted', 
    ];
}
