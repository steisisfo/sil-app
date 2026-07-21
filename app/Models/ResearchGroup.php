<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ResearchGroup extends Model
{
    use HasTranslations;
    use SoftDeletes;

    public $translatable = [
        'name',
        'description',
    ];

    protected $fillable = [
        'name',
        'description',
    ];

    public function lecturers()
    {
        return $this->hasMany(Lecturer::class, 'research_group_id');
    }

    public function researches()
    {
        return $this->hasMany(Research::class, 'research_group_id');
    }
}
