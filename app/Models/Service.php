<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

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
