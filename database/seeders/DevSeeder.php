<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Program;
use Illuminate\Database\Seeder;
use Database\Factories\ProgramFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::create([
            'abbreviation'=>'BSIT',
            'name'=>'Bachelor of Science in Information Technology'
        ]);
        Program::factory()->count(100)->create();
        Course::factory()->count(100)->create();
    }
}
