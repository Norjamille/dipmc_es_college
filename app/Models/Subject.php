<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'program_subject_year_level')->withPivot('program_id', 'subject_id', 'year_level_id');
    }

    public function year_levels()
    {
        return $this->belongsToMany(YearLevel::class, 'program_subject_year_level')->withPivot('program_id', 'subject_id', 'year_level_id');
    }
}
