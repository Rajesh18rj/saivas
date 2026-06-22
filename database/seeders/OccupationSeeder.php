<?php

namespace Database\Seeders;

use App\Models\Occupation;
use Illuminate\Database\Seeder;

class OccupationSeeder extends Seeder
{
    public function run(): void
    {
        $occupations = [
            'Software Engineer',
            'Doctor',
            'Teacher',
            'Professor',
            'Government Employee',
            'Bank Employee',
            'Police',
            'Army',
            'Lawyer',
            'Chartered Accountant',
            'Business',
            'Entrepreneur',
            'Farmer',
            'Driver',
            'Electrician',
            'Technician',
            'Mechanical Engineer',
            'Civil Engineer',
            'Accountant',
            'Private Employee',
            'Self Employed',
            'Student',
        ];

        foreach ($occupations as $occupation) {
            Occupation::updateOrInsert(
                ['name' => $occupation],
                ['updated_at' => now()]
            );
        }
    }
}
