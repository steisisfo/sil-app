<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class StudyProgram extends Model
{
    use HasTranslations;
    use SoftDeletes;

    public $translatable = [
        'name',
        'description',
        'curriculum_details',
        'learning_outcomes',
        'accreditation',
        'degree_title',
        'career_prospects',
    ];

    protected $fillable = [
        'name',
        'degree_level',
        'description',
        'curriculum_details',
        'learning_outcomes',
        'accreditation',
        'degree_title',
        'study_duration',
        'career_prospects',
        'contact_info',
    ];

    public function lecturers()
    {
        return $this->hasMany(Lecturer::class, 'study_program_id');
    }
}
