<?php

namespace Database\Seeders;

use App\Models\EducationQualification;
use Illuminate\Database\Seeder;

class EducationQualificationSeeder extends Seeder
{
    public function run(): void
    {
        $qualifications = [
            'SSLC',
            'HSC',
            'Diploma',
            'ITI',
            'BA',
            'BSc',
            'BCom',
            'BCA',
            'BE',
            'BTech',
            'BBA',
            'LLB',
            'MA',
            'MSc',
            'MCom',
            'MCA',
            'ME',
            'MTech',
            'MBA',
            'PhD',
        ];

        foreach ($qualifications as $qualification) {
            EducationQualification::updateOrInsert(
                ['name' => $qualification],
                ['updated_at' => now()]
            );
        }
    }
}
