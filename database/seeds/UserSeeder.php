<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{Hash, DB};
use Illuminate\Support\Str;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'           => 'Admin Role',
            'email'          => 'admin@role.test',
            'password'       => Hash::make('12345678'),
            'remember_token' => Str::random(40),
        ]);

        $admin->assignRole('admin');

        $teacher = User::create([
            'name'           => 'Teacher Role',
            'no_hp'          => '081572390208',
            'email'          => 'teacher@role.test',
            'subjects'       => 'Desain Grafis',
            'password'       => Hash::make('sandiuser'),
            'remember_token' => Str::random(40),
        ]);

        $teacher->assignRole('teacher');

    }
}
