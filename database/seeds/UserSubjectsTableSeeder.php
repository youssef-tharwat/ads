<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_subjects')->insert([
            'subject_id' => 5,
            'user_id' => 3,
            'attendance' => 0,
        ]);

        DB::table('user_subjects')->insert([
            'subject_id' => 6,
            'user_id' => 3,
            'attendance' => 0,
        ]);
    }
}
