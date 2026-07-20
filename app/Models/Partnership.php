<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partnership extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'partner_name',
        'partnership_type',
        'start_date',
        'end_date',
        'description',
        'contact_info',
        'logo',
        'document_file',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
