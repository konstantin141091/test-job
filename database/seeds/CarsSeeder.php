<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert($this->getData());
    }

    private function getData() {
        $data = [];

        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'name' => 'M '.$i,
                'number' => rand(100, 999),
                'year' => rand(1991, 2021),
                'status' => 'free',
                'data' => 'данные есть '.$i,
                'osago' => rand(1000, 9999),
                'license' => rand(1000, 9999),
                'color' => 'желтый',
                'time_accounting' => rand(1, 10),
                'mileage' => rand(1000, 100000),
                'service' => rand(1, 5000),
            ];
        }

        return $data;
    }
}
