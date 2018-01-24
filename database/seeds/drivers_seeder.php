<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class drivers_seeder extends Seeder
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
                'name' => 'Jonas',
                'city' => 'Vilnius',                
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'name' => 'Jonas',
                'city' => 'Vilnius',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Jonas',
                'city' => 'Vilnius',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($data as $value)
        {
            DB::table('drivers')->insert($value);
        }
    }
}
