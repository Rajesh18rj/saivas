<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\Profile;
//use App\Models\Star;
//use App\Models\Gender;
//use App\Models\NativePlace;
//use App\Models\WorkingPlace;
//use App\Models\EducationQualification;
//use Illuminate\Http\Request;
//
//class ProfilesController extends Controller
//{
////    public function index(Request $request)
////    {
////        $query = Profile::with([
////            'gender',
////            'star',
////            'educationQualification',
////            'occupation',
////            'nativePlace',
////            'workingPlace',
////        ]);
////
////        // =====================================================
////        // GENDER FILTER (MAIN FIRST FILTER)
////        // =====================================================
////        if ($request->filled('gender_id')) {
////            $query->where('gender_id', $request->gender_id);
////        }
////
////        // =====================================================
////        // SEARCH
////        // =====================================================
////        if ($request->filled('search')) {
////            $search = trim($request->search);
////
////            $query->where(function ($q) use ($search) {
////                $q->where('name', 'like', "%{$search}%")
////                    ->orWhere('father_name', 'like', "%{$search}%");
////            });
////        }
////
////        // =====================================================
////        // NATIVE PLACE (MULTIPLE)
////        // =====================================================
////        if ($request->filled('native_place_id')) {
////            $nativePlaceIds = array_filter((array) $request->native_place_id);
////
////            if (!empty($nativePlaceIds)) {
////                $query->whereIn('native_place_id', $nativePlaceIds);
////            }
////        }
////
////        // =====================================================
////        // QUALIFICATION (MULTIPLE)
////        // =====================================================
////        if ($request->filled('education_qualification_id')) {
////            $educationIds = array_filter((array) $request->education_qualification_id);
////
////            if (!empty($educationIds)) {
////                $query->whereIn('education_qualification_id', $educationIds);
////            }
////        }
////
////        // =====================================================
////        // JOB LOCATION / WORKING PLACE (MULTIPLE)
////        // =====================================================
////        if ($request->filled('working_place_id')) {
////            $workingPlaceIds = array_filter((array) $request->working_place_id);
////
////            if (!empty($workingPlaceIds)) {
////                $query->whereIn('working_place_id', $workingPlaceIds);
////            }
////        }
////
////        // =====================================================
////        // STAR (MULTIPLE)
////        // =====================================================
////        if ($request->filled('star_id')) {
////            $starIds = array_filter((array) $request->star_id);
////
////            if (!empty($starIds)) {
////                $query->whereIn('star_id', $starIds);
////            }
////        }
////
////        // =====================================================
////        // SALARY RANGE
////        // =====================================================
////        if ($request->filled('salary_min')) {
////            $query->where('salary', '>=', $request->salary_min);
////        }
////
////        if ($request->filled('salary_max')) {
////            $query->where('salary', '<=', $request->salary_max);
////        }
////
////        $profiles = $query->latest()->paginate(10)->withQueryString();
////
////        // lookup data
////        $nativePlaces = NativePlace::orderBy('name')->get();
////        $educations = EducationQualification::orderBy('name')->get();
////        $workingPlaces = WorkingPlace::orderBy('name')->get();
////        $stars = Star::orderBy('name')->get();
////        $genders = Gender::orderBy('id')->get();
////
////        return view('profiles.index', compact(
////            'profiles',
////            'nativePlaces',
////            'educations',
////            'workingPlaces',
////            'stars',
////            'genders'
////        ));
////    }
//
//    public function index(Request $request)
//    {
//        // =====================================================
//        // LOOKUP DATA FOR FILTERS / MODAL / BADGES
//        // =====================================================
//        $nativePlaces = NativePlace::orderBy('name')->get();
//        $educations = EducationQualification::orderBy('name')->get();
//        $workingPlaces = WorkingPlace::orderBy('name')->get();
//        $stars = Star::orderBy('name')->get();
//        $genders = Gender::orderBy('id')->get();
//
//        // =====================================================
//        // BASE QUERY
//        // =====================================================
//        $query = Profile::with([
//            'gender',
//            'star',
//            'educationQualification',
//            'occupation',
//            'nativePlace',
//            'workingPlace',
//        ]);
//
//        // default empty result
//        $profiles = collect();
//
//        // =====================================================
//        // STRICT MODE:
//        // NO PROFILES UNTIL GENDER IS CHOSEN
//        // =====================================================
//        if (!$request->filled('gender_id')) {
//            return view('profiles.index', compact(
//                'profiles',
//                'nativePlaces',
//                'educations',
//                'workingPlaces',
//                'stars',
//                'genders'
//            ));
//        }
//
//        // =====================================================
//        // GENDER FILTER (MAIN FIRST FILTER)
//        // =====================================================
//        $query->where('gender_id', $request->gender_id);
//
//        // =====================================================
//        // SEARCH
//        // =====================================================
//        if ($request->filled('search')) {
//            $search = trim($request->search);
//
//            $query->where(function ($q) use ($search) {
//                $q->where('name', 'like', "%{$search}%")
//                    ->orWhere('father_name', 'like', "%{$search}%");
//            });
//        }
//
//        // =====================================================
//        // NATIVE PLACE (MULTIPLE)
//        // =====================================================
//        if ($request->filled('native_place_id')) {
//            $nativePlaceIds = array_filter((array) $request->native_place_id);
//
//            if (!empty($nativePlaceIds)) {
//                $query->whereIn('native_place_id', $nativePlaceIds);
//            }
//        }
//
//        // =====================================================
//        // QUALIFICATION (MULTIPLE)
//        // =====================================================
//        if ($request->filled('education_qualification_id')) {
//            $educationIds = array_filter((array) $request->education_qualification_id);
//
//            if (!empty($educationIds)) {
//                $query->whereIn('education_qualification_id', $educationIds);
//            }
//        }
//
//        // =====================================================
//        // JOB LOCATION / WORKING PLACE (MULTIPLE)
//        // =====================================================
//        if ($request->filled('working_place_id')) {
//            $workingPlaceIds = array_filter((array) $request->working_place_id);
//
//            if (!empty($workingPlaceIds)) {
//                $query->whereIn('working_place_id', $workingPlaceIds);
//            }
//        }
//
//        // =====================================================
//        // STAR (MULTIPLE)
//        // =====================================================
//        if ($request->filled('star_id')) {
//            $starIds = array_filter((array) $request->star_id);
//
//            if (!empty($starIds)) {
//                $query->whereIn('star_id', $starIds);
//            }
//        }
//
//        // =====================================================
//        // SALARY RANGE
//        // =====================================================
//        if ($request->filled('salary_min')) {
//            $query->where('salary', '>=', $request->salary_min);
//        }
//
//        if ($request->filled('salary_max')) {
//            $query->where('salary', '<=', $request->salary_max);
//        }
//
//        // =====================================================
//        // CHECK IF ANY FILTER / SEARCH IS APPLIED
//        // (gender alone should NOT immediately show profiles)
//        // =====================================================
//        $hasFilterRequest =
//            $request->filled('search') ||
//            $request->filled('native_place_id') ||
//            $request->filled('education_qualification_id') ||
//            $request->filled('working_place_id') ||
//            $request->filled('star_id') ||
//            $request->filled('salary_min') ||
//            $request->filled('salary_max');
//
//        // =====================================================
//        // IF FILTERS ARE APPLIED BUT COUNT NOT CHOSEN,
//        // DEFAULT TO 10
//        // =====================================================
//        if ($hasFilterRequest && !$request->filled('profile_count')) {
//            $request->merge([
//                'profile_count' => 10,
//            ]);
//        }
//
//        // =====================================================
//        // SHOW RANDOM FILTERED RESULTS ONLY WHEN:
//        // 1) FILTERS ARE APPLIED
//        // OR
//        // 2) profile_count EXISTS
//        // =====================================================
//        if ($hasFilterRequest || $request->filled('profile_count')) {
//            $count = (int) $request->get('profile_count', 10);
//
//            // allow only 10 / 15 / 20
//            if (!in_array($count, [10, 15, 20])) {
//                $count = 10;
//            }
//
//            $profiles = $query
//                ->inRandomOrder()
//                ->take($count)
//                ->get();
//        }
//
//        return view('profiles.index', compact(
//            'profiles',
//            'nativePlaces',
//            'educations',
//            'workingPlaces',
//            'stars',
//            'genders'
//        ));
//    }
//}


namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Star;
use App\Models\Gender;
use App\Models\NativePlace;
use App\Models\WorkingPlace;
use App\Models\EducationQualification;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProfilesController extends Controller
{
    public function index(Request $request)
    {
        // =====================================================
        // LOOKUP DATA FOR FILTERS / MODAL / BADGES
        // =====================================================
        $nativePlaces = NativePlace::orderBy('name')->get();
        $educations = EducationQualification::orderBy('name')->get();
        $workingPlaces = WorkingPlace::orderBy('name')->get();
        $stars = Star::orderBy('name')->get();
        $genders = Gender::orderBy('id')->get();

        // =====================================================
        // BASE QUERY
        // =====================================================
        $query = Profile::with([
            'gender',
            'star',
            'educationQualification',
            'occupation',
            'nativePlace',
            'workingPlace',
        ]);

        $profiles = collect();

        // =====================================================
        // STRICT MODE:
        // NO PROFILES UNTIL GENDER IS CHOSEN
        // =====================================================
        if (!$request->filled('gender_id')) {
            return view('profiles.index', compact(
                'profiles',
                'nativePlaces',
                'educations',
                'workingPlaces',
                'stars',
                'genders'
            ));
        }

        // =====================================================
        // GENDER FILTER
        // =====================================================
        $query->where('gender_id', $request->gender_id);

        // =====================================================
        // SEARCH
        // =====================================================
        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('father_name', 'like', "%{$search}%");
            });
        }

        // =====================================================
        // NATIVE PLACE (MULTIPLE)
        // =====================================================
        if ($request->filled('native_place_id')) {
            $nativePlaceIds = array_filter((array) $request->native_place_id);

            if (!empty($nativePlaceIds)) {
                $query->whereIn('native_place_id', $nativePlaceIds);
            }
        }

        // =====================================================
        // QUALIFICATION (MULTIPLE)
        // =====================================================
        if ($request->filled('education_qualification_id')) {
            $educationIds = array_filter((array) $request->education_qualification_id);

            if (!empty($educationIds)) {
                $query->whereIn('education_qualification_id', $educationIds);
            }
        }

        // =====================================================
        // JOB LOCATION / WORKING PLACE (MULTIPLE)
        // =====================================================
        if ($request->filled('working_place_id')) {
            $workingPlaceIds = array_filter((array) $request->working_place_id);

            if (!empty($workingPlaceIds)) {
                $query->whereIn('working_place_id', $workingPlaceIds);
            }
        }

        // =====================================================
        // STAR (MULTIPLE)
        // =====================================================
        if ($request->filled('star_id')) {
            $starIds = array_filter((array) $request->star_id);

            if (!empty($starIds)) {
                $query->whereIn('star_id', $starIds);
            }
        }

        // =====================================================
        // SALARY RANGE
        // =====================================================
        if ($request->filled('salary_min')) {
            $query->where('salary', '>=', $request->salary_min);
        }

        if ($request->filled('salary_max')) {
            $query->where('salary', '<=', $request->salary_max);
        }

        // =====================================================
        // AGE RANGE
        // age_min = minimum age user wants
        // age_max = maximum age user wants
        // =====================================================
        if ($request->filled('age_min')) {
            $ageMin = (int) $request->age_min;

            // Person must be at least this age
            // Example: age_min 25 => dob <= today - 25 years
            $maxDob = now()->subYears($ageMin)->endOfDay();

            $query->whereDate('dob', '<=', $maxDob);
        }

        if ($request->filled('age_max')) {
            $ageMax = (int) $request->age_max;

            // Person must not be older than this age
            // Example: age_max 30 => dob >= today - 30 years
            $minDob = now()->subYears($ageMax + 1)->addDay()->startOfDay();

            $query->whereDate('dob', '>=', $minDob);
        }

        // =====================================================
        // CHECK IF ANY FILTER / SEARCH IS APPLIED
        // IMPORTANT: age_min and age_max added here
        // =====================================================
        $hasActiveFilters =
            $request->filled('search') ||
            $request->filled('native_place_id') ||
            $request->filled('education_qualification_id') ||
            $request->filled('working_place_id') ||
            $request->filled('star_id') ||
            $request->filled('salary_min') ||
            $request->filled('salary_max') ||
            $request->filled('age_min') ||
            $request->filled('age_max');

        // =====================================================
        // DEFAULT TO 10 IF FILTERS APPLIED AND COUNT MISSING
        // =====================================================
        if ($hasActiveFilters && !$request->filled('profile_count')) {
            $request->merge([
                'profile_count' => 10,
            ]);
        }

        // =====================================================
        // LOAD RANDOM FILTERED RESULTS
        // =====================================================
        if ($hasActiveFilters || $request->filled('profile_count')) {
            $count = (int) $request->get('profile_count', 10);

            if (!in_array($count, [10, 15, 20])) {
                $count = 10;
            }

            $profiles = $query
                ->inRandomOrder()
                ->take($count)
                ->get();
        }

        return view('profiles.index', compact(
            'profiles',
            'nativePlaces',
            'educations',
            'workingPlaces',
            'stars',
            'genders'
        ));
    }

    public function print(Request $request)
    {
        $profileIds = array_filter((array) $request->input('profile_ids', []));

        if (empty($profileIds)) {
            return redirect()
                ->route('profiles.index')
                ->with('error', 'No profiles selected for printing.');
        }

        $profiles = Profile::with([
            'gender',
            'star',
            'educationQualification',
            'occupation',
            'nativePlace',
            'workingPlace',
        ])
            ->whereIn('id', $profileIds)
            ->get();

        if ($profiles->isEmpty()) {
            return redirect()
                ->route('profiles.index')
                ->with('error', 'No matching profiles found for printing.');
        }

        // =====================================================
        // SELECTED GENDER
        // =====================================================
        $selectedGender = null;

        if ($request->filled('gender_id')) {
            $selectedGender = Gender::find($request->gender_id);
        }

        // =====================================================
        // FILTER LABELS FOR PDF HEADER
        // =====================================================
        $nativePlaceNames = NativePlace::whereIn('id', (array) $request->input('native_place_id', []))
            ->pluck('name')
            ->toArray();

        $educationNames = EducationQualification::whereIn('id', (array) $request->input('education_qualification_id', []))
            ->pluck('name')
            ->toArray();

        $workingPlaceNames = WorkingPlace::whereIn('id', (array) $request->input('working_place_id', []))
            ->pluck('name')
            ->toArray();

        $starNames = Star::whereIn('id', (array) $request->input('star_id', []))
            ->pluck('name')
            ->toArray();

        $salaryMin = $request->input('salary_min');
        $salaryMax = $request->input('salary_max');

        $ageMin = $request->input('age_min');
        $ageMax = $request->input('age_max');

        $profileCount = (int) $request->input('profile_count', $profiles->count());

        $appliedFilters = [
            'gender' => $selectedGender?->name,
            'native_places' => $nativePlaceNames,
            'educations' => $educationNames,
            'working_places' => $workingPlaceNames,
            'stars' => $starNames,
            'salary_min' => $salaryMin,
            'salary_max' => $salaryMax,
            'age_min' => $ageMin,
            'age_max' => $ageMax,
            'profile_count' => $profileCount,
        ];

        $pdf = Pdf::loadView('profiles.pdf', [
            'profiles' => $profiles,
            'selectedGender' => $selectedGender,
            'appliedFilters' => $appliedFilters,
        ])->setPaper('a4', 'landscape');

        return $pdf->download('saivas-profiles.pdf');
    }}
