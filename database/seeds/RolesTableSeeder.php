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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::table('role_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

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
                'display_name' => 'Admin/Dean User Role',
                'description'  => ''
            ],
            [
                'id'           => 3,
                'name'         => 'instructor',
                'display_name' => 'Instructor User Role',
                'description'  => ''
            ],
            [
                'id'           => 4,
                'name'         => 'student',
                'display_name' => 'Student User Role',
                'description'  => ''
            ],
        ]);
    }
}
