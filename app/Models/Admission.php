<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admission extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'selection_path',
        'degree_level',
        'admission_requirements',
        'start_date',
        'end_date',
        'tuition_fee',
        'capacity',
        'external_link',
        'faq',
        'contact_info',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'tuition_fee' => 'decimal:2',
        'capacity' => 'integer',
        'faq' => 'array', // mapping to JSON
    ];
}
