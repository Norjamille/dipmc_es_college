<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'program_subject_year_level')->withPivot('program_id', 'subject_id', 'year_level_id');
    }

    public function year_levels()
    {
        return $this->belongsToMany(YearLevel::class, 'program_subject_year_level')->withPivot('program_id', 'subject_id', 'year_level_id');
    }
}
