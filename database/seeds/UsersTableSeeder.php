<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        $dataRoot = [
            'id'         => 1,
            'email'      => 'mark@demo.com',
            'password'   => Hash::make('password'),
            'first_name' => 'Mark Gerald',
            'last_name'  => 'Cabatingan',
            'gender'     => 'm'
        ];

        $userRoot = new User($dataRoot);
        $userRoot->save();

        $userRoot->attachRole(1);

        $dataAdmin = [
            'id'         => 2,
            'email'      => 'footless@demo.com',
            'password'   => Hash::make('password'),
            'first_name' => 'Footless',
            'last_name'  => 'Hero',
            'gender'     => 'm'
        ];

        $userRoot = new User($dataAdmin);
        $userRoot->save();

        $userRoot->attachRole(2);
        $dataInstructor =
            [
                [
                    'id'         => 3,
                    'email'      => 'test_instructor1@gmail.com',
                    'password'   => Hash::make('password'),
                    'first_name' => 'Jon 1',
                    'last_name'  => 'Doe',
                    'gender'     => 'm'
                ],
                [
                    'id'         => 4,
                    'email'      => 'test_instructor2@gmail.com',
                    'password'   => Hash::make('password'),
                    'first_name' => 'Jon 2',
                    'last_name'  => 'Snow',
                    'gender'     => 'm'
                ],
                [
                    'id'         => 5,
                    'email'      => 'test_instructor3@gmail.com',
                    'password'   => Hash::make('password'),
                    'first_name' => 'Jon 3',
                    'last_name'  => 'Snow',
                    'gender'     => 'm'
                ],
                [
                    'id'         => 6,
                    'email'      => 'test_instructor4@gmail.com',
                    'password'   => Hash::make('password'),
                    'first_name' => 'Jon 4',
                    'last_name'  => 'Snow',
                    'gender'     => 'm'
                ],
                [
                    'id'         => 7,
                    'email'      => 'test_instructor5@gmail.com',
                    'password'   => Hash::make('password'),
                    'first_name' => 'Jon 5',
                    'last_name'  => 'Snow',
                    'gender'     => 'm'
                ],
                [
                    'id'         => 8,
                    'email'      => 'test_instructor6@gmail.com',
                    'password'   => Hash::make('password'),
                    'first_name' => 'Jon 6',
                    'last_name'  => 'Snow',
                    'gender'     => 'm'
                ]
            ];

        foreach ($dataInstructor as $instructor) {
            $userRoot = new User($instructor);
            $userRoot->save();

            $userRoot->attachRole(3);
        }

        $dataStudent = [
            'id'         => 8,
            'email'      => 'test_student@gmail.com',
            'password'   => Hash::make('password'),
            'first_name' => 'Jon student',
            'last_name'  => 'Snow',
            'gender'     => 'm'
        ];

        $userRoot = new User($dataStudent);
        $userRoot->save();

        $userRoot->attachRole(4);
    }
}
