<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function courses()
    {
        return $this->belongsToMany(Course::class,'course_program_year_level')->withPivot('program_id','course_id','year_level_id');
    }

    public function year_levels()
    {
        return $this->belongsToMany(YearLevel::class,'course_program_year_level')->withPivot('program_id','course_id','year_level_id');
    }

}
