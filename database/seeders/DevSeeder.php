<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\Subject;
use Illuminate\Database\Seeder;

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
            'abbreviation' => 'BSIT',
            'name' => 'Bachelor of Science in Information Technology',
        ]);
        Program::factory()->count(100)->create();
        Subject::factory()->count(100)->create();
    }
}
