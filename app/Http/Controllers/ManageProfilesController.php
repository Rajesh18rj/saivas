<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ManageProfilesController extends Controller
{
    public function index(Request $request)
    {
        $query = Profile::with([
            'gender',
            'star',
            'educationQualification',
            'occupation',
            'nativePlace',
            'workingPlace',
        ]);

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
        // ACTIVE FILTER
        // =====================================================
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            }

            if ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        // =====================================================
        // PAID FILTER
        // =====================================================
        if ($request->filled('payment')) {
            if ($request->payment === 'paid') {
                $query->where('is_paid', true);
            }

            if ($request->payment === 'unpaid') {
                $query->where('is_paid', false);
            }
        }

        $profiles = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('manage-profiles.index', compact('profiles'));
    }
}
