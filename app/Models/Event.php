<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasTranslations;
    use SoftDeletes;

    public $translatable = [
        'name',
        'location',
        'description',
    ];

    protected $fillable = [
        'name',
        'slug',
        'type',
        'start_datetime',
        'end_datetime',
        'location',
        'description',
        'registration_link',
        'speakers',
        'organizer',
        'poster',
        'status',
    ];

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
    ];
}
