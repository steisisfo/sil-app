<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    // Menonaktifkan updated_at karena tidak tersedia di tabel
    const UPDATED_AT = null;

    protected $fillable = [
        'keyword',
        'results_count',
        'searched_at',
        'created_at',
    ];

    protected $casts = [
        'results_count' => 'integer',
        'searched_at' => 'datetime',
        'created_at' => 'datetime',
    ];
}
