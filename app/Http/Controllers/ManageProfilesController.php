<?php

namespace App\Http\Controllers;

use App\Models\EducationQualification;
use App\Models\Gender;
use App\Models\NativePlace;
use App\Models\Occupation;
use App\Models\Profile;
use App\Models\Star;
use App\Models\WorkingPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageProfilesController extends Controller
{
    public function index(Request $request)
    {
        $genders = Gender::orderBy('name')->get();
        $stars = Star::orderBy('name')->get();
        $educations = EducationQualification::orderBy('name')->get();
        $occupations = Occupation::orderBy('name')->get();
        $nativePlaces = NativePlace::orderBy('name')->get();
        $workingPlaces = WorkingPlace::orderBy('name')->get();

        $query = Profile::with([
            'gender',
            'star',
            'educationQualification',
            'occupation',
            'nativePlace',
            'workingPlace',
            'contacts',
        ]);

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('father_name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        if ($request->filled('payment')) {
            if ($request->payment === 'paid') {
                $query->where('is_paid', true);
            } elseif ($request->payment === 'unpaid') {
                $query->where('is_paid', false);
            }
        }

        $profiles = $query->latest()->paginate(12)->withQueryString();

        return view('manage-profiles.index', compact(
            'profiles',
            'genders',
            'stars',
            'educations',
            'occupations',
            'nativePlaces',
            'workingPlaces'
        ));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'father_name' => ['nullable', 'string', 'max:255'],

            'dob' => ['nullable', 'date'],
            'height' => ['nullable', 'string', 'max:50'],
            'salary' => ['nullable', 'numeric'],

            'gender_id' => ['nullable', 'exists:genders,id'],
            'star_id' => ['nullable', 'exists:stars,id'],
            'education_qualification_id' => ['nullable', 'exists:education_qualifications,id'],
            'occupation_id' => ['nullable', 'exists:occupations,id'],
            'native_place_id' => ['nullable', 'exists:native_places,id'],
            'working_place_id' => ['nullable', 'exists:working_places,id'],

            'is_active' => ['required', 'boolean'],
            'is_paid' => ['required', 'boolean'],
            'inactive_reason' => ['nullable', 'string'],

            // contacts
            'contact_name' => ['nullable', 'array'],
            'contact_name.*' => ['nullable', 'string', 'max:255'],

            'contact_relationship' => ['nullable', 'array'],
            'contact_relationship.*' => ['nullable', 'string', 'max:255'],

            'contact_mobile' => ['nullable', 'array'],
            'contact_mobile.*' => ['nullable', 'string', 'max:20'],
        ]);

        // if profile is active, no inactive reason needed
        if ((int) $validated['is_active'] === 1) {
            $validated['inactive_reason'] = null;
        }

        DB::transaction(function () use ($validated) {
            // =====================================================
            // CREATE PROFILE
            // =====================================================
            $profile = Profile::create([
                'name' => $validated['name'],
                'father_name' => $validated['father_name'] ?? null,
                'dob' => $validated['dob'] ?? null,
                'height' => $validated['height'] ?? null,
                'salary' => $validated['salary'] ?? null,

                'gender_id' => $validated['gender_id'] ?? null,
                'star_id' => $validated['star_id'] ?? null,
                'education_qualification_id' => $validated['education_qualification_id'] ?? null,
                'occupation_id' => $validated['occupation_id'] ?? null,
                'native_place_id' => $validated['native_place_id'] ?? null,
                'working_place_id' => $validated['working_place_id'] ?? null,

                'is_active' => $validated['is_active'],
                'is_paid' => $validated['is_paid'],
                'inactive_reason' => $validated['inactive_reason'] ?? null,
            ]);

            // =====================================================
            // CREATE CONTACTS
            // =====================================================
            $contactNames = $validated['contact_name'] ?? [];
            $contactRelationships = $validated['contact_relationship'] ?? [];
            $contactMobiles = $validated['contact_mobile'] ?? [];

            $contactsToInsert = [];

            foreach ($contactNames as $index => $contactName) {
                $name = trim($contactName ?? '');
                $relationship = trim($contactRelationships[$index] ?? '');
                $mobile = trim($contactMobiles[$index] ?? '');

                // skip fully empty row
                if ($name === '' && $relationship === '' && $mobile === '') {
                    continue;
                }

                $contactsToInsert[] = [
                    'name' => $name !== '' ? $name : null,
                    'relationship' => $relationship !== '' ? $relationship : null,
                    'mobile' => $mobile !== '' ? $mobile : null,
                ];
            }

            if (!empty($contactsToInsert)) {
                $profile->contacts()->createMany($contactsToInsert);
            }
        });

        return redirect()
            ->route('manage-profiles.index')
            ->with('success', 'Profile created successfully.');
    }

    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'father_name' => ['nullable', 'string', 'max:255'],

            'dob' => ['nullable', 'date'],
            'height' => ['nullable', 'string', 'max:50'],
            'salary' => ['nullable', 'numeric'],

            'gender_id' => ['nullable', 'exists:genders,id'],
            'star_id' => ['nullable', 'exists:stars,id'],
            'education_qualification_id' => ['nullable', 'exists:education_qualifications,id'],
            'occupation_id' => ['nullable', 'exists:occupations,id'],
            'native_place_id' => ['nullable', 'exists:native_places,id'],
            'working_place_id' => ['nullable', 'exists:working_places,id'],

            'is_active' => ['required', 'boolean'],
            'is_paid' => ['required', 'boolean'],
            'inactive_reason' => ['nullable', 'string'],

            // contacts
            'contact_name' => ['nullable', 'array'],
            'contact_name.*' => ['nullable', 'string', 'max:255'],

            'contact_relationship' => ['nullable', 'array'],
            'contact_relationship.*' => ['nullable', 'string', 'max:255'],

            'contact_mobile' => ['nullable', 'array'],
            'contact_mobile.*' => ['nullable', 'string', 'max:50'],
        ]);

        if ((int) $validated['is_active'] === 1) {
            $validated['inactive_reason'] = null;
        }

        // update profile basic fields
        $profile->update([
            'name' => $validated['name'],
            'father_name' => $validated['father_name'] ?? null,
            'dob' => $validated['dob'] ?? null,
            'height' => $validated['height'] ?? null,
            'salary' => $validated['salary'] ?? null,
            'gender_id' => $validated['gender_id'] ?? null,
            'star_id' => $validated['star_id'] ?? null,
            'education_qualification_id' => $validated['education_qualification_id'] ?? null,
            'occupation_id' => $validated['occupation_id'] ?? null,
            'native_place_id' => $validated['native_place_id'] ?? null,
            'working_place_id' => $validated['working_place_id'] ?? null,
            'is_active' => $validated['is_active'],
            'is_paid' => $validated['is_paid'],
            'inactive_reason' => $validated['inactive_reason'] ?? null,
        ]);

        // =====================================================
        // SAVE CONTACTS
        // =====================================================
        $profile->contacts()->delete();

        $contactNames = $request->input('contact_name', []);
        $contactRelationships = $request->input('contact_relationship', []);
        $contactMobiles = $request->input('contact_mobile', []);

        foreach ($contactNames as $index => $name) {
            $relationship = $contactRelationships[$index] ?? null;
            $mobile = $contactMobiles[$index] ?? null;

            // skip completely empty rows
            if (
                blank($name) &&
                blank($relationship) &&
                blank($mobile)
            ) {
                continue;
            }

            $profile->contacts()->create([
                'name' => $name,
                'relationship' => $relationship,
                'mobile' => $mobile,
            ]);
        }

        return redirect()
            ->route('manage-profiles.index')
            ->with('success', 'Profile updated successfully.');
    }

    public function destroy(Profile $profile)
    {
        $profile->contacts()->delete(); // if needed
        $profile->delete();

        return redirect()
            ->route('manage-profiles.index')
            ->with('success', 'Profile deleted successfully.');
    }
}
