<?php

use Illuminate\Database\Seeder;
use App\Subject;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
           'name' => 'Introduction to Networking',
            'course_id' => '1',
        ]);

        Subject::create([
            'name' => 'Advanced Wireless Technologies',
            'course_id' => '1',
        ]);

        Subject::create([
            'name' => 'Further Mathematics',
            'course_id' => '2',
        ]);

        Subject::create([
            'name' => 'Introduction to Database',
            'course_id' => '2',
        ]);

        Subject::create([
            'name' => 'Mobile Wireless Technologies',
            'course_id' => '3',
        ]);

        Subject::create([
            'name' => 'Cloud Infrastructure ',
            'course_id' => '3',
        ]);

    }
}
