<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Star;
use App\Models\Occupation;
use App\Models\NativePlace;
use App\Models\WorkingPlace;
use App\Models\EducationQualification;
use Illuminate\Http\Request;

class ProfileRegistrationController extends Controller
{
    public function create()
    {
        $genders = Gender::orderBy('id')->get();
        $stars = Star::orderBy('name')->get();
        $occupations = Occupation::orderBy('name')->get();
        $nativePlaces = NativePlace::orderBy('name')->get();
        $workingPlaces = WorkingPlace::orderBy('name')->get();
        $educationQualifications = EducationQualification::orderBy('name')->get();

        return view('profile-register.create', compact(
            'genders',
            'stars',
            'occupations',
            'nativePlaces',
            'workingPlaces',
            'educationQualifications'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // =====================================================
            // PROFILE FIELDS
            // =====================================================
            'name' => ['required', 'string', 'max:255'],
            'father_name' => ['nullable', 'string', 'max:255'],
            'dob' => ['nullable', 'date'],
            'height' => ['nullable', 'string', 'max:50'],
            'salary' => ['nullable', 'numeric'],

            'gender_id' => ['required', 'exists:genders,id'],
            'star_id' => ['nullable', 'exists:stars,id'],
            'education_qualification_id' => ['nullable', 'exists:education_qualifications,id'],
            'occupation_id' => ['nullable', 'exists:occupations,id'],
            'native_place_id' => ['nullable', 'exists:native_places,id'],
            'working_place_id' => ['nullable', 'exists:working_places,id'],

            // =====================================================
            // CONTACT FIELDS
            // =====================================================
            'contact_name' => ['nullable', 'array'],
            'contact_name.*' => ['nullable', 'string', 'max:255'],

            'contact_relationship' => ['nullable', 'array'],
            'contact_relationship.*' => ['nullable', 'string', 'max:255'],

            'contact_mobile' => ['nullable', 'array'],
            'contact_mobile.*' => ['nullable', 'string', 'max:50'],
        ]);

        // =====================================================
        // CREATE PROFILE
        // Guest registration should NOT be public immediately
        // =====================================================
        $profile = \App\Models\Profile::create([
            'name' => $validated['name'],
            'father_name' => $validated['father_name'] ?? null,
            'dob' => $validated['dob'] ?? null,
            'height' => $validated['height'] ?? null,
            'salary' => $validated['salary'] ?? null,

            'gender_id' => $validated['gender_id'],
            'star_id' => $validated['star_id'] ?? null,
            'education_qualification_id' => $validated['education_qualification_id'] ?? null,
            'occupation_id' => $validated['occupation_id'] ?? null,
            'native_place_id' => $validated['native_place_id'] ?? null,
            'working_place_id' => $validated['working_place_id'] ?? null,

            // default guest registration status
            'is_active' => 0,
            'is_paid' => 0,
            'inactive_reason' => 'Pending admin approval',
        ]);

        // =====================================================
        // SAVE CONTACTS
        // =====================================================
        $contactNames = $request->input('contact_name', []);
        $contactRelationships = $request->input('contact_relationship', []);
        $contactMobiles = $request->input('contact_mobile', []);

        foreach ($contactNames as $index => $contactName) {
            $name = trim($contactName ?? '');
            $relationship = trim($contactRelationships[$index] ?? '');
            $mobile = trim($contactMobiles[$index] ?? '');

            // skip completely empty rows
            if ($name === '' && $relationship === '' && $mobile === '') {
                continue;
            }

            $profile->contacts()->create([
                'name' => $name ?: null,
                'relationship' => $relationship ?: null,
                'mobile' => $mobile ?: null,
            ]);
        }

        return redirect()
            ->route('profile-register.create')
            ->with('success', 'Your profile has been submitted successfully. It will be reviewed by admin before publishing.');
    }
}
