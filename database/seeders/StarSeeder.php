<?php

namespace Database\Seeders;

use App\Models\Star;
use Illuminate\Database\Seeder;

class StarSeeder extends Seeder
{
    public function run(): void
    {
        $stars = [
            'Ashwini',
            'Bharani',
            'Karthigai',
            'Rohini',
            'Mrigashirsha',
            'Thiruvathirai',
            'Punarpoosam',
            'Poosam',
            'Ayilyam',
            'Magam',
            'Pooram',
            'Uthiram',
            'Hastham',
            'Chithirai',
            'Swathi',
            'Visakam',
            'Anusham',
            'Kettai',
            'Moolam',
            'Pooradam',
            'Uthiradam',
            'Thiruvonam',
            'Avittam',
            'Sathayam',
            'Poorattadhi',
            'Uthirattadhi',
            'Revathi',
        ];

        foreach ($stars as $star) {
            Star::updateOrInsert(
                ['name' => $star],
                ['updated_at' => now()]
            );
        }
    }
}
