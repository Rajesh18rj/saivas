@extends('layouts.register')

@php
    $title = 'Profile Registration';
    $pageTitle = 'Profile Registration';
@endphp

@section('content')
    <div class="mx-auto max-w-[1550px] px-4 py-0 sm:px-6 lg:px-8">

        <div class="relative overflow-hidden bg-gradient-to-br from-pink-50 via-purple-50 to-indigo-50 px-10 py-10">

        {{-- PAGE HERO --}}
        @include('profile-register.hero-section')

        {{-- FORM --}}
        <form method="POST" action="{{ route('profile-register.store') }}" class="mt-8 space-y-8" id="profileRegisterForm">
            @csrf

            <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">

                {{-- ===================================================== --}}
                {{-- LEFT SIDE --}}
                {{-- ===================================================== --}}
                <div class="space-y-6 xl:col-span-8">

                    {{-- PERSONAL DETAILS --}}
                    <div class="overflow-hidden rounded-[30px] border border-slate-200 bg-white shadow-sm">
                        <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600">
                                <i class="fa-solid fa-user text-sm"></i>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-slate-800">Personal Details</h2>
                                <p class="text-sm text-slate-500">Basic profile information</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-5 p-6 sm:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Name <span class="text-rose-500">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                       class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Father Name</label>
                                <input type="text" name="father_name" value="{{ old('father_name') }}"
                                       class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Gender <span class="text-rose-500">*</span></label>
                                <select name="gender_id"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                    <option value="">Select Gender</option>
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender->id }}" @selected(old('gender_id') == $gender->id)>
                                            {{ $gender->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Date of Birth</label>
                                <input type="date" name="dob" value="{{ old('dob') }}"
                                       class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Height</label>
                                <input type="text" name="height" value="{{ old('height') }}" placeholder="e.g. 5.8"
                                       class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                            </div>
                        </div>
                    </div>

                    {{-- MATRIMONY DETAILS --}}
                    <div class="overflow-hidden rounded-[30px] border border-slate-200 bg-white shadow-sm">
                        <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-rose-50 text-rose-600">
                                <i class="fa-solid fa-heart text-sm"></i>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-slate-800">Matrimony Details</h2>
                                <p class="text-sm text-slate-500">Education, work and location details</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-5 p-6 sm:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Star</label>
                                <select name="star_id"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                    <option value="">Select Star</option>
                                    @foreach($stars as $star)
                                        <option value="{{ $star->id }}" @selected(old('star_id') == $star->id)>
                                            {{ $star->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Education Qualification</label>
                                <select name="education_qualification_id"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                    <option value="">Select Qualification</option>
                                    @foreach($educationQualifications as $education)
                                        <option value="{{ $education->id }}" @selected(old('education_qualification_id') == $education->id)>
                                            {{ $education->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Occupation</label>
                                <select name="occupation_id"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                    <option value="">Select Occupation</option>
                                    @foreach($occupations as $occupation)
                                        <option value="{{ $occupation->id }}" @selected(old('occupation_id') == $occupation->id)>
                                            {{ $occupation->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Salary</label>
                                <input type="number" name="salary" value="{{ old('salary') }}"
                                       class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Native Place</label>
                                <select name="native_place_id"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                    <option value="">Select Native Place</option>
                                    @foreach($nativePlaces as $nativePlace)
                                        <option value="{{ $nativePlace->id }}" @selected(old('native_place_id') == $nativePlace->id)>
                                            {{ $nativePlace->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Working Place</label>
                                <select name="working_place_id"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                    <option value="">Select Working Place</option>
                                    @foreach($workingPlaces as $workingPlace)
                                        <option value="{{ $workingPlace->id }}" @selected(old('working_place_id') == $workingPlace->id)>
                                            {{ $workingPlace->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ===================================================== --}}
                {{-- RIGHT SIDE --}}
                {{-- ===================================================== --}}
                <div class="space-y-6 xl:col-span-4">

                    {{-- CONTACT DETAILS --}}
                    <div class="overflow-hidden rounded-[30px] border border-slate-200 bg-white shadow-sm">
                        <div class="flex items-center justify-between gap-3 border-b border-slate-100 px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                    <i class="fa-solid fa-address-book text-sm"></i>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-slate-800">Contact Details</h2>
                                    <p class="text-sm text-slate-500">Add family / contact persons</p>
                                </div>
                            </div>

                            <button type="button"
                                    id="addRegisterContactBtn"
                                    class="inline-flex h-10 items-center gap-2 rounded-xl bg-violet-50 px-3 text-sm font-semibold text-violet-700 transition hover:bg-violet-100">
                                <i class="fa-solid fa-plus text-xs"></i>
                                Add
                            </button>
                        </div>

                        <div id="register_contacts_wrapper" class="space-y-4 p-6">
                            {{-- JS adds contact cards --}}
                        </div>
                    </div>

                    {{-- SUBMIT CARD --}}
                    <div class="overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-[0_10px_30px_rgba(15,23,42,0.06)]">

                        <div class="p-5">

                            {{-- Header --}}
                            <div class="flex items-start gap-4">

                                <div
                                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 text-white shadow-lg shadow-emerald-200">

                                    <i class="fa-solid fa-paper-plane text-sm"></i>

                                </div>

                                <div class="min-w-0">

                                    <h3 class="text-lg font-bold tracking-tight text-slate-800">
                                        Submit Registration
                                    </h3>

                                    <p class="mt-1 text-sm leading-6 text-slate-500">
                                        Once submitted, your profile will be reviewed and approved before it becomes visible to other members.
                                    </p>

                                </div>

                            </div>

                            {{-- Divider --}}
                            <div class="my-5 border-t border-dashed border-slate-200"></div>

                            {{-- Note --}}
                            <div class="flex gap-3 rounded-2xl border border-amber-200 bg-gradient-to-r from-amber-50 to-orange-50 p-4">

                                <div
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-amber-100 text-amber-600">

                                    <i class="fa-solid fa-circle-exclamation text-sm"></i>

                                </div>

                                <div>

                                    <p class="text-sm font-semibold text-amber-800">
                                        Admin Approval Required
                                    </p>

                                    <p class="mt-1 text-xs leading-5 text-amber-700">
                                        Your profile will remain private until our admin reviews and approves the submitted details.
                                    </p>

                                </div>

                            </div>

                            {{-- Submit Button --}}
                            <button
                                type="submit"
                                class="group mt-5 inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-200 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl active:scale-[0.98]">

                                <span
                                    class="flex h-7 w-7 items-center justify-center rounded-full bg-white/20 transition group-hover:rotate-12">

                                    <i class="fa-solid fa-paper-plane text-xs"></i>

                                </span>


                                <span>
                                    Submit Registration
                                </span>

                            </button>

                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection

@push('scripts')
    @include('profile-register.scripts')
@endpush
