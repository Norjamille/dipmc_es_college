<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'staff']);

        $user = User::create([
            'name'=>'Administrator',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password'),
        ]);

        $user->assignRole('admin');

        $user = User::create([
            'name'=>'Staff1',
            'email'=>'staff1@gmail.com',
            'password'=>bcrypt('password'),
        ]);

        $user->assignRole('staff');
    }
}
