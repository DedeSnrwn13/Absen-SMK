<?php

use Illuminate\Database\Seeder;
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
        //bikin isi untuk table
        User::create([
             'name'           => 'Ini Admin',
             'role'           => 'admin',
             'email'          => 'admin@test.app',
             'password'       => bcrypt('smk1cbdpwadmin01'),
             'remember_token' => Str::random(40),
         ]);
    }
}
