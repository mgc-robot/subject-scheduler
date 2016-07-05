<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();

        DB::table('subjects')->insert([
            [
                'id'          => 1,
                'edp_code'    => 'MA1234',
                'name'        => 'Comprog 1',
                'description' => 'Comprog',
                'unit'        => '3.0',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()

            ],
            [
                'id'          => 2,
                'edp_code'    => 'MA2345',
                'name'        => 'Comprog 2',
                'description' => 'Comprog',
                'unit'        => '3.0',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()

            ],
            [
                'id'          => 3,
                'edp_code'    => 'MA3456',
                'name'        => 'Comprog 3',
                'description' => 'Comprog',
                'unit'        => '3.0',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()

            ],
            [
                'id'          => 4,
                'edp_code'    => 'MA4567',
                'name'        => 'Comprog 1',
                'description' => 'Comprog',
                'unit'        => '3.0',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()

            ],
            [
                'id'          => 5,
                'edp_code'    => 'MA5678',
                'name'        => 'Comprog 4',
                'description' => 'Comprog',
                'unit'        => '3.0',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()

            ],
            [
                'id'          => 6,
                'edp_code'    => 'MA6789',
                'name'        => 'Comprog 2',
                'description' => 'Comprog',
                'unit'        => '3.0',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()

            ],
            [
                'id'          => 7,
                'edp_code'    => 'MA7890',
                'name'        => 'Comprog 3',
                'description' => 'Comprog',
                'unit'        => '3.0',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()

            ]
        ]);
    }
}
