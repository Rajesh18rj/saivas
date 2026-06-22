<?php

namespace Database\Seeders;

use App\Models\NativePlace;
use Illuminate\Database\Seeder;

class NativePlaceSeeder extends Seeder
{
    public function run(): void
    {
        $places = [
            'Chennai',
            'Coimbatore',
            'Madurai',
            'Tiruchirappalli',
            'Salem',
            'Erode',
            'Tiruppur',
            'Vellore',
            'Thoothukudi',
            'Tirunelveli',
            'Nagercoil',
            'Dindigul',
            'Karur',
            'Namakkal',
            'Thanjavur',
            'Kumbakonam',
            'Sivakasi',
            'Virudhunagar',
            'Ramanathapuram',
            'Kanchipuram',
            'Cuddalore',
            'Villupuram',
            'Pudukkottai',
            'Nagapattinam',
            'Tenkasi',
            'Pollachi',
            'Hosur',
            'Ooty',
            'Karaikudi',
            'Theni',
        ];

        foreach ($places as $place) {
            NativePlace::updateOrInsert(
                ['name' => $place],
                ['updated_at' => now()]
            );
        }
    }
}
