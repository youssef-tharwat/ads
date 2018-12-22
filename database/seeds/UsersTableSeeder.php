<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = \App\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password'=> bcrypt('password'),
            'avatar' => 'default.jpg',
            'birthday'=> '1994-05-20',
            'IDC'=> 9999999999,
            'phone_number' => '0123456789',
            'department' => 'Attendance',
        ]);

        $adminUser->attachRole('admin');

        $adminUser2 = \App\User::create([
            'name' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password'=> bcrypt('password'),
            'avatar' => 'default.jpg',
            'birthday'=> '1994-05-20',
            'IDC'=> 9999999993,
            'phone_number' => '0123456789',
            'department' => 'Invigilator',
        ]);

        $adminUser2->attachRole('admin');

        $studentUser = \App\User::create([
            'name' => 'teststudent',
            'email' => 'teststudent@gmail.com',
            'password'=> bcrypt('password'),
            'avatar' => 'default.jpg',
            'birthday'=> '1994-05-20',
            'IDC'=> 9999999998,
            'phone_number' => '0123456789',
            'tp' => 'TP012345',
            'course' => 'Information Technology',
            'intake'=> 'UC1F1805IT',

        ]);

        $studentUser->attachRole('student');
    }
}
