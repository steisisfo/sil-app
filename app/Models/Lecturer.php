<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'nip',
        'nidn',
        'functional_position',
        'study_program_id',
        'research_group_id',
        'research_fields',
        'email',
        'photo',
        'scopus_link',
        'google_scholar_link',
        'sinta_link',
        'lab_managed',
        'status',
    ];

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class, 'study_program_id');
    }

    public function researchGroup()
    {
        return $this->belongsTo(ResearchGroup::class, 'research_group_id');
    }

    public function researches()
    {
        return $this->belongsToMany(Research::class, 'lecturer_research', 'lecturer_id', 'research_id')
                    ->withPivot('is_primary_author');
    }
}
