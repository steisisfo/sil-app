<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Announcement extends Model
{
    use HasTranslations;
    use SoftDeletes;

    public $translatable = [
        'title',
        'content',
    ];

    protected $fillable = [
        'title',
        'slug',
        'content',
        'target_audience',
        'valid_from',
        'valid_until',
        'attachment_file',
        'priority',
        'status',
        'is_pinned',
        'author_id',
    ];

    protected $casts = [
        'valid_from' => 'datetime',
        'valid_until' => 'datetime',
        'is_pinned' => 'boolean',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
