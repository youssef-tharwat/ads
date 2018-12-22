<?php

use Illuminate\Database\Seeder;
use App\Exam;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Exam::create([
            'name' => 'Introduction to Networking',
            'start_date' => '2019-04-20 08:00:00',
            'duration' => '2 Hours',
            'subject_id' => '1'
        ]);

        Exam::create([
            'name' => 'Further Mathematics',
            'start_date' => '2019-04-23 08:00:00',
            'duration' => '2 Hours',
            'subject_id' => '3'
        ]);

        Exam::create([
            'name' => 'Mobile Wireless Technologies',
            'start_date' => '2019-04-25 08:00:00',
            'duration' => '1 Hour',
            'subject_id' => '5'
        ]);


    }
}
