<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Research extends Model
{
    use SoftDeletes;

    // Menentukan nama tabel secara eksplisit karena plural dari research dalam Laravel
    // bisa jadi terdeteksi otomatis secara kurang tepat jika menggunakan inflektor bawaan (researches).
    protected $table = 'researches';

    protected $fillable = [
        'title',
        'abstract',
        'year',
        'type',
        'document_link',
        'funding_source',
        'status',
        'research_group_id',
    ];

    protected $casts = [
        'year' => 'integer',
    ];

    public function researchGroup()
    {
        return $this->belongsTo(ResearchGroup::class, 'research_group_id');
    }

    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class, 'lecturer_research', 'research_id', 'lecturer_id')
                    ->withPivot('is_primary_author');
    }
}
