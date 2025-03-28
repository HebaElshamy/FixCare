<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Location::updateOrCreate(

            [
                'city_id' => 1,
                'latitude' => 0.0,
                'longitude' => 0.0,
            ]
        );
    }
}
