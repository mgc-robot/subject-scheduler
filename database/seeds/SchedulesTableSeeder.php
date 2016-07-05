<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->delete();

        DB::table('schedules')->insert([
            [
                'id'         => 1,
                'user_id'    => 3,
                'subject_id' => 1,
                'room_id'    => 1,
                'from_time'  => '7:30 PM',
                'to_time'    => '8:30 PM',
                'day'        => 'MWF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'id'         => 2,
                'user_id'    => 4,
                'subject_id' => 1,
                'room_id'    => 2,
                'from_time'  => '8:00 AM',
                'to_time'    => '9:00 AM',
                'day'        => 'MWF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'id'         => 3,
                'user_id'    => 5,
                'subject_id' => 2,
                'room_id'    => 3,
                'from_time'  => '9:30 AM',
                'to_time'    => '10:30 AM',
                'day'        => 'MWF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'id'         => 4,
                'user_id'    => 6,
                'subject_id' => 3,
                'room_id'    => 1,
                'from_time'  => '12:30 PM',
                'to_time'    => '1:30 PM',
                'day'        => 'MWF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'id'         => 5,
                'user_id'    => 7,
                'subject_id' => 3,
                'room_id'    => 3,
                'from_time'  => '7:30 AM',
                'to_time'    => '8:30 AM',
                'day'        => 'MWF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'id'         => 6,
                'user_id'    => 8,
                'subject_id' => 2,
                'room_id'    => 1,
                'from_time'  => '2:30 PM',
                'to_time'    => '3:30 PM',
                'day'        => 'MWF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'id'         => 7,
                'user_id'    => 3,
                'subject_id' => 1,
                'room_id'    => 1,
                'from_time'  => '9:30 AM',
                'to_time'    => '10:30 AM',
                'day'        => 'MWF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'id'         => 8,
                'user_id'    => 4,
                'subject_id' => 1,
                'room_id'    => 1,
                'from_time'  => '9:30 AM',
                'to_time'    => '10:30 AM',
                'day'        => 'MWF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ]
        ]);
    }
}
