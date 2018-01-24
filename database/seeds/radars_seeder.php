<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class radars_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'date' => Carbon::create(2017, 2, 15, 10, 15, 12),
                'number' => 'gtg123',
                'distance' => '12000',
                'time' => '120',
                'driver_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'date' => Carbon::create(2017, 2, 15, 10, 15, 12),
                'number' => 'gtg123',
                'distance' => '12000',
                'time' => '120',
                'driver_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'date' => Carbon::create(2017, 2, 15, 10, 15, 12),
                'number' => 'gtg123',
                'distance' => '12000',
                'time' => '120',
                'driver_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($data as $value) {
            DB::table('radars')->insert($value);
        }
}
    
}
