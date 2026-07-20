<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchGroup extends Model
{
    use SoftDeletes;

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
