<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearLevel extends Model
{
    use HasFactory;

    protected $guarded = [];

    const SEMESTERS = [
        'first_semester' => '1st Semester',
        'second_semester' => '2nd Semester',
    ];

    const FIRST_SEMESTER = 'first_semester';

    const SECOND_SEMESTER = 'second_semester';

    public function formatedSemester()
    {
        return self::SEMESTERS[$this->semester];
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'program_subject_year_level')->withPivot('program_id', 'subject_id', 'year_level_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'program_subject_year_level')->withPivot('program_id', 'subject_id', 'year_level_id');
    }
}
