<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProfilesSeeder extends Seeder
{
    public function run(): void
    {
        // -------------------------------------------------
        // Gender IDs
        // -------------------------------------------------
        $maleId = DB::table('genders')->whereRaw('LOWER(name) = ?', ['male'])->value('id');
        $femaleId = DB::table('genders')->whereRaw('LOWER(name) = ?', ['female'])->value('id');

        // -------------------------------------------------
        // Master table IDs
        // -------------------------------------------------
        $starIds = DB::table('stars')->pluck('id')->toArray();
        $qualificationIds = DB::table('education_qualifications')->pluck('id')->toArray();
        $occupationIds = DB::table('occupations')->pluck('id')->toArray();
        $nativePlaceIds = DB::table('native_places')->pluck('id')->toArray();
        $workingPlaceIds = DB::table('working_places')->pluck('id')->toArray();

        if (
            !$maleId || !$femaleId ||
            empty($starIds) ||
            empty($qualificationIds) ||
            empty($occupationIds) ||
            empty($nativePlaceIds) ||
            empty($workingPlaceIds)
        ) {
            $this->command->warn('Please seed genders, stars, qualifications, occupations, native places, and working places first.');
            return;
        }

        // -------------------------------------------------
        // Sample names
        // -------------------------------------------------
        $maleNames = [
            'Arun Kumar', 'Karthick', 'Pradeep', 'Vignesh', 'Mohan Raj',
            'Suresh Babu', 'Dinesh Kumar', 'Saravanan', 'Hari Prasath', 'Ranjith Kumar',
            'Ashwin', 'Lokesh', 'Naveen', 'Gokul', 'Bharath',
            'Jeeva', 'Manikandan', 'Ramesh', 'Sathish', 'Vinoth',
            'Yuvaraj', 'Kishore', 'Ganesh', 'Santhosh', 'Murali'
        ];

        $femaleNames = [
            'Priya', 'Nivetha', 'Kavya', 'Harini', 'Divya',
            'Anitha', 'Deepika', 'Mahalakshmi', 'Janani', 'Sowmiya',
            'Aarthi', 'Keerthana', 'Shalini', 'Ramya', 'Subiksha',
            'Nandhini', 'Pavithra', 'Akshaya', 'Dhivya Bharathi', 'Monisha',
            'Rajalakshmi', 'Vaishnavi', 'Sangeetha', 'Meena', 'Abinaya'
        ];

        $fatherNames = [
            'Ramasamy', 'Sundaram', 'Murugan', 'Balasubramanian', 'Rajendran',
            'Babu', 'Gopal', 'Natarajan', 'Prakash', 'Kannan',
            'Ravi', 'Sivakumar', 'Mani', 'Selvaraj', 'Ganesan',
            'Subramani', 'Periyasamy', 'Kumaravel', 'Muthu', 'Palanisamy',
            'Arumugam', 'Krishnan', 'Velusamy', 'Thangaraj', 'Shanmugam'
        ];

        $profiles = [];

        // -------------------------------------------------
        // 25 male profiles
        // -------------------------------------------------
        foreach ($maleNames as $name) {
            $profiles[] = [
                'name' => $name,
                'father_name' => $fatherNames[array_rand($fatherNames)],
                'dob' => Carbon::create(rand(1991, 1999), rand(1, 12), rand(1, 28))->format('Y-m-d'),
                'height' => rand(5, 6) . '.' . rand(1, 11),
                'salary' => rand(25000, 90000),
                'gender_id' => $maleId,
                'star_id' => $starIds[array_rand($starIds)],
                'education_qualification_id' => $qualificationIds[array_rand($qualificationIds)],
                'occupation_id' => $occupationIds[array_rand($occupationIds)],
                'native_place_id' => $nativePlaceIds[array_rand($nativePlaceIds)],
                'working_place_id' => $workingPlaceIds[array_rand($workingPlaceIds)],
                'payment_type' => 'direct',
                'is_paid' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // -------------------------------------------------
        // 25 female profiles
        // -------------------------------------------------
        foreach ($femaleNames as $name) {
            $profiles[] = [
                'name' => $name,
                'father_name' => $fatherNames[array_rand($fatherNames)],
                'dob' => Carbon::create(rand(1993, 2001), rand(1, 12), rand(1, 28))->format('Y-m-d'),
                'height' => '5.' . rand(1, 8),
                'salary' => rand(18000, 70000),
                'gender_id' => $femaleId,
                'star_id' => $starIds[array_rand($starIds)],
                'education_qualification_id' => $qualificationIds[array_rand($qualificationIds)],
                'occupation_id' => $occupationIds[array_rand($occupationIds)],
                'native_place_id' => $nativePlaceIds[array_rand($nativePlaceIds)],
                'working_place_id' => $workingPlaceIds[array_rand($workingPlaceIds)],
                'payment_type' => 'direct',
                'is_paid' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // -------------------------------------------------
        // Insert all 50
        // -------------------------------------------------
        Profile::insert($profiles);

        $this->command->info('50 profiles seeded successfully.');
    }
}
