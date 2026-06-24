@extends('layouts.master')

@php
    $title = 'Manage Profiles';
    $pageTitle = 'Manage_Profiles';
@endphp

@section('content')

    {{-- Top Toolbar --}}
    <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

        {{-- LEFT : SEARCH BAR --}}
        <div class="w-full lg:max-w-md">
            <form method="GET" action="{{ route('manage-profiles.index') }}" class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                    <i class="fa-solid fa-magnifying-glass text-sm"></i>
                </span>

                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search by name or father name..."
                       class="h-12 w-full rounded-2xl border border-slate-200 bg-white pl-11 pr-4 text-sm text-slate-700 shadow-sm outline-none transition focus:border-emerald-300 focus:ring-4 focus:ring-emerald-100">
            </form>
        </div>

        {{-- RIGHT : CREATE PROFILE BUTTON --}}
        <div class="flex justify-start lg:justify-end">
            <button type="button"
                    id="openCreateProfileModal"
                    class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-200/60 transition hover:scale-[1.01] hover:shadow-xl">
                <i class="fa-solid fa-plus text-xs"></i>
                Create Profile
            </button>
        </div>
    </div>

    {{-- Table --}}
    @include('manage-profiles.table')

    {{-- Separate modals --}}
    @include('manage-profiles.create-modal')
    @include('manage-profiles.view-modal')
    @include('manage-profiles.edit-modal')
    @include('manage-profiles.delete-modal')

@endsection

@push('scripts')
    @include('manage-profiles.scripts')
@endpush
