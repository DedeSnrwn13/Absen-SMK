<?php

use Illuminate\Database\Seeder;
use App\HourStart;

class StartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //bikin isi untuk table
        HourStart::create([
            'hours_start' => '08:00:00',
            'hours_over'  => '10:00:00',
            'updated_by'  => 'Ini Admin',
        ]);
    }
}
