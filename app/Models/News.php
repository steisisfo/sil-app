<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    // Explicitly define the table name because 'news' is singular/plural same form
    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'category',
        'tags',
        'author_id',
        'status',
        'published_at',
        'views_count',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'views_count' => 'integer',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
