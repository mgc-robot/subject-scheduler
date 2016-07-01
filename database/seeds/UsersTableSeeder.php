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
        DB::table('users')->delete();

        DB::table('users')->insert([
            [
                'id'         => 1,
                'email'      => 'footless@demo.com',
                'username'   => 'footless',
                'password'   => Hash::make('password'),
                'first_name' => 'Footless',
                'last_name'  => 'Hero',
                'gender'     => 'm'
            ],
            [
                'id'         => 2,
                'email'      => 'john_doe@demo.com',
                'username'   => 'john_doe',
                'password'   => Hash::make('password'),
                'first_name' => 'John',
                'last_name'  => 'Doe',
                'gender'     => 'm'
            ],
            [
                'id'         => 3,
                'email'      => 'jon@sample.com',
                'username'   => 'jon',
                'password'   => Hash::make('password'),
                'first_name' => 'Jon',
                'last_name'  => 'Snow',
                'gender'     => 'm'
            ]
        ]);
    }
}
