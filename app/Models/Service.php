<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;
    use SoftDeletes;

    public $translatable = [
        'name',
        'description',
        'procedure',
    ];

    protected $fillable = [
        'name',
        'category',
        'description',
        'procedure',
        'related_link',
        'pic_contact',
        'document_file',
        'status',
    ];
}
