<?php

namespace Database\Seeders;

use App\Models\WorkingPlace;
use Illuminate\Database\Seeder;

class WorkingPlaceSeeder extends Seeder
{
    public function run(): void
    {
        $places = [
            'Chennai',
            'Bangalore',
            'Hyderabad',
            'Pune',
            'Mumbai',
            'Delhi',
            'Coimbatore',
            'Madurai',
            'Tiruchirappalli',
            'Salem',
            'Dubai',
            'Singapore',
            'Malaysia',
            'Qatar',
            'Saudi Arabia',
            'USA',
            'Canada',
            'Australia',
            'UK',
        ];

        foreach ($places as $place) {
            WorkingPlace::updateOrInsert(
                ['name' => $place],
                ['updated_at' => now()]
            );
        }
    }
}
