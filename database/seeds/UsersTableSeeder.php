<?php

use App\Eloquent\User;
use Carbon\Carbon;
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
            'gender'     => 'm',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

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
            'gender'     => 'm',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ];

        $userAdmin = new User($dataAdmin);
        $userAdmin->save();

        $userAdmin->attachRole(2);
        $dataInstructor =
            [
                [
                    'id'         => 3,
                    'email'      => 'test_instructor1@gmail.com',
                    'password'   => Hash::make('password'),
                    'first_name' => 'Jon 1',
                    'last_name'  => 'Doe',
                    'gender'     => 'm',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()

                ],
                [
                    'id'         => 4,
                    'email'      => 'test_instructor2@gmail.com',
                    'password'   => Hash::make('password'),
                    'first_name' => 'Jon 2',
                    'last_name'  => 'Snow',
                    'gender'     => 'm',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()

                ],
                [
                    'id'         => 5,
                    'email'      => 'test_instructor3@gmail.com',
                    'password'   => Hash::make('password'),
                    'first_name' => 'Jon 3',
                    'last_name'  => 'Snow',
                    'gender'     => 'm',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()

                ],
                [
                    'id'         => 6,
                    'email'      => 'test_instructor4@gmail.com',
                    'password'   => Hash::make('password'),
                    'first_name' => 'Jon 4',
                    'last_name'  => 'Snow',
                    'gender'     => 'm',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()

                ],
                [
                    'id'         => 7,
                    'email'      => 'test_instructor5@gmail.com',
                    'password'   => Hash::make('password'),
                    'first_name' => 'Jon 5',
                    'last_name'  => 'Snow',
                    'gender'     => 'm',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()

                ],
                [
                    'id'         => 8,
                    'email'      => 'test_instructor6@gmail.com',
                    'password'   => Hash::make('password'),
                    'first_name' => 'Jon 6',
                    'last_name'  => 'Snow',
                    'gender'     => 'm',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()

                ]
            ];

        foreach ($dataInstructor as $instructor) {
            $userInstructor = new User($instructor);
            $userInstructor->save();

            $userInstructor->attachRole(3);
        }

        $dataStudent = [
            'id'         => 9,
            'email'      => 'test_student@gmail.com',
            'password'   => Hash::make('password'),
            'first_name' => 'Jon student',
            'last_name'  => 'Snow',
            'gender'     => 'm',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ];

        $userStudent = new User($dataStudent);
        $userStudent->save();

        $userStudent->attachRole(4);
    }
}
