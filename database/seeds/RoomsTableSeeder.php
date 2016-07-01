<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->delete();

        DB::table('rooms')->insert([
            [
                'id'        => 1,
                'room_no'   => 'MA1',
                'room_type' => 'Lecture'
            ],
            [
                'id'        => 2,
                'room_no'   => 'C1',
                'room_type' => 'Laboratory'
            ],
            [
                'id'        => 3,
                'room_no'   => 'C2',
                'room_type' => 'Laboratory'
            ],
            [
                'id'        => 4,
                'room_no'   => 'MA4',
                'room_type' => 'Laboratory'
            ],
            [
                'id'        => 5,
                'room_no'   => 'M1',
                'room_type' => 'Lecture'
            ],
            [
                'id'        => 6,
                'room_no'   => 'MA2',
                'room_type' => 'Lecture'
            ],
            [
                'id'        => 7,
                'room_no'   => 'MA3',
                'room_type' => 'Lecture'
            ]
        ]);
    }
}
