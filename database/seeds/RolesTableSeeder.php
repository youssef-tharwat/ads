<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'admin',
            'description' => 'full access',
        ]);

        $student = Role::create([
            'name' => 'student',
            'display_name' => 'student',
            'description' => 'student access',
        ]);
    }
}
