<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    // Menonaktifkan updated_at karena tabel tidak memiliki kolom tersebut,
    // tetapi membiarkan created_at diatur otomatis saat penambahan data.
    const UPDATED_AT = null;

    protected $fillable = [
        'ip_address',
        'user_agent',
        'page_url',
        'visited_at',
        'created_at',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
        'created_at' => 'datetime',
    ];
}
