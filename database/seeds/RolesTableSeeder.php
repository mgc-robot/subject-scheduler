<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert([
            [
                'id'           => 1,
                'name'         => 'root',
                'display_name' => 'Root User Role',
                'description'  => ''
            ],
            [
                'id'           => 2,
                'name'         => 'admin',
                'display_name' => 'Admin User Role',
                'description'  => ''
            ],
            [
                'id'           => 3,
                'name'         => 'dean',
                'display_name' => 'Dean User Role',
                'description'  => ''
            ],
            [
                'id'           => 4,
                'name'         => 'instructor',
                'display_name' => 'Instructor User Role',
                'description'  => ''
            ],
            [
                'id'           => 5,
                'name'         => 'student',
                'display_name' => 'Student User Role',
                'description'  => ''
            ],
        ]);
    }
}
