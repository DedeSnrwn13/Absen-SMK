<?php

use Illuminate\Database\Seeder;
use App\HourOver;

class OverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //bikin isi untuk table
        HourOver::create([
            'hours_start' => '15:00:00',
            'hours_over'  => '20:00:00',
            'updated_by'  => 'Ini Admin',
        ]);
    }
}
