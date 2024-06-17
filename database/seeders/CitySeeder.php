<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = [
            ['name' => 'Surabaya'],
            ['name' => 'Malang'],
            ['name' => 'Jember'],
            ['name' => 'Kediri'],
            ['name' => 'Madiun'],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
