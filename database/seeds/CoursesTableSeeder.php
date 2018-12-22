<?php

use Illuminate\Database\Seeder;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
           'name' => 'Software Engineering'
        ]);

        Course::create([
            'name' => 'Computer Science'
        ]);

        Course::create([
            'name' => 'Information Technology'
        ]);

    }
}
