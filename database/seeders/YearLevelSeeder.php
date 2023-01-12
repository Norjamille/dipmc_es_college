<?php

namespace Database\Seeders;

use App\Models\YearLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        YearLevel::create([
            'name'=>'1st Year',
            'semester'=>YearLevel::FIRST_SEMESTER,
        ]);
        YearLevel::create([
            'name'=>'1st Year',
            'semester'=>YearLevel::SECOND_SEMESTER,
        ]);

        YearLevel::create([
            'name'=>'2nd Year',
            'semester'=>YearLevel::FIRST_SEMESTER,
        ]);
        YearLevel::create([
            'name'=>'2nd Year',
            'semester'=>YearLevel::SECOND_SEMESTER,
        ]);

        YearLevel::create([
            'name'=>'3rd Year',
            'semester'=>YearLevel::FIRST_SEMESTER,
        ]);
        YearLevel::create([
            'name'=>'3rd Year',
            'semester'=>YearLevel::SECOND_SEMESTER,
        ]);

        YearLevel::create([
            'name'=>'4th Year',
            'semester'=>YearLevel::FIRST_SEMESTER,
        ]);
        YearLevel::create([
            'name'=>'4th Year',
            'semester'=>YearLevel::SECOND_SEMESTER,
        ]);

        YearLevel::create([
            'name'=>'5th Year',
            'semester'=>YearLevel::FIRST_SEMESTER,
        ]);
        YearLevel::create([
            'name'=>'5th Year',
            'semester'=>YearLevel::SECOND_SEMESTER,
        ]);
    }
}
