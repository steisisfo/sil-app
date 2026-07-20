<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyProgram extends Model
{
    use SoftDeletes;

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
