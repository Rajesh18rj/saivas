@php
    $selectedGenderId = request('gender_id');
    $selectedGender = $genders->firstWhere('id', $selectedGenderId);
    $selectedCount = (int) request('profile_count', 10);

    $hasActiveFilters =
        request()->filled('search') ||
        request()->filled('native_place_id') ||
        request()->filled('education_qualification_id') ||
        request()->filled('working_place_id') ||
        request()->filled('star_id') ||
        request()->filled('salary_min') ||
        request()->filled('salary_max');
        request()->filled('age_min') ||
        request()->filled('age_max');
@endphp

<div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

    {{-- ===================================================== --}}
    {{-- TABLE HEADER --}}
    {{-- ===================================================== --}}
    <div
        class="flex flex-col gap-4 rounded-2xl border border-slate-200 bg-gradient-to-r from-white to-slate-50 px-5 py-4 shadow-sm sm:flex-row sm:items-center sm:justify-between">

        {{-- Left side --}}
        <div class="min-w-0">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-100 text-slate-600 shadow-inner">
                    <i class="fa-solid fa-address-card text-sm"></i>
                </div>

                <div>
                    <h2 class="text-lg font-bold tracking-tight text-slate-800">
                        Profiles List
                    </h2>

                    @if ($selectedGender)
                        <p class="mt-0.5 text-sm text-slate-500">
                            Browse and manage
                            <span class="font-semibold text-slate-700">{{ $selectedGender->name }}</span>
                            matrimony profiles
                        </p>
                    @else
                        <p class="mt-0.5 text-sm text-slate-500">
                            Choose a profile type to load records
                        </p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Right side --}}
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            @if ($selectedGender)
                @php
                    $isMale = strtolower($selectedGender->name) === 'male';
                @endphp

                <div class="inline-flex items-center gap-3 rounded-2xl border px-4 py-3 shadow-sm
                    {{ $isMale
                        ? 'border-indigo-200 bg-indigo-50/80 text-indigo-700'
                        : 'border-pink-200 bg-pink-50/80 text-pink-700' }}">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl shadow-sm
                        {{ $isMale
                            ? 'bg-white text-indigo-600'
                            : 'bg-white text-pink-600' }}">
                        <i class="fa-solid {{ $isMale ? 'fa-person' : 'fa-person-dress' }} text-base"></i>
                    </div>

                    <div class="leading-tight">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.14em] opacity-70">
                            Active View
                        </p>
                        <p class="text-sm font-bold">
                            {{ $selectedGender->name }} Profiles
                        </p>
                    </div>
                </div>
            @endif

            {{-- Count selector + Print --}}
            @if ($selectedGender && $hasActiveFilters)
                <div class="flex flex-wrap items-center gap-2 sm:justify-end">

                    {{-- Count form --}}
                    <form method="GET" action="{{ route('profiles.index') }}" class="flex items-center gap-2">
                        {{-- keep all current filters --}}
                        <input type="hidden" name="gender_id" value="{{ request('gender_id') }}">

                        @foreach ((array) request('native_place_id', []) as $id)
                            <input type="hidden" name="native_place_id[]" value="{{ $id }}">
                        @endforeach

                        @foreach ((array) request('education_qualification_id', []) as $id)
                            <input type="hidden" name="education_qualification_id[]" value="{{ $id }}">
                        @endforeach

                        @foreach ((array) request('working_place_id', []) as $id)
                            <input type="hidden" name="working_place_id[]" value="{{ $id }}">
                        @endforeach

                        @foreach ((array) request('star_id', []) as $id)
                            <input type="hidden" name="star_id[]" value="{{ $id }}">
                        @endforeach

                        @if (request()->filled('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        @if (request()->filled('salary_min'))
                            <input type="hidden" name="salary_min" value="{{ request('salary_min') }}">
                        @endif

                        @if (request()->filled('salary_max'))
                            <input type="hidden" name="salary_max" value="{{ request('salary_max') }}">
                        @endif

                        @if (request()->filled('age_min'))
                            <input type="hidden" name="age_min" value="{{ request('age_min') }}">
                        @endif

                        @if (request()->filled('age_max'))
                            <input type="hidden" name="age_max" value="{{ request('age_max') }}">
                        @endif

                        <div class="flex items-center gap-2 rounded-2xl border border-slate-200 bg-white px-3 py-2 shadow-sm">
                            <span class="text-xs font-semibold uppercase tracking-[0.12em] text-slate-400">
                                Show
                            </span>

                            <select name="profile_count"
                                    onchange="this.form.submit()"
                                    class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 text-sm font-semibold text-slate-700 outline-none transition focus:border-rose-300 focus:ring-2 focus:ring-rose-100">
                                <option value="10" {{ $selectedCount === 10 ? 'selected' : '' }}>10</option>
                                <option value="15" {{ $selectedCount === 15 ? 'selected' : '' }}>15</option>
                                <option value="20" {{ $selectedCount === 20 ? 'selected' : '' }}>20</option>
                            </select>
                        </div>
                    </form>

                    {{-- Print button --}}
                    @if ($profiles->count())
                        <form method="POST" action="{{ route('profiles.print') }}">
                            @csrf

                            {{-- gender --}}
                            <input type="hidden" name="gender_id" value="{{ request('gender_id') }}">

                            {{-- search --}}
                            @if (request()->filled('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif

                            {{-- salary --}}
                            @if (request()->filled('salary_min'))
                                <input type="hidden" name="salary_min" value="{{ request('salary_min') }}">
                            @endif

                            @if (request()->filled('salary_max'))
                                <input type="hidden" name="salary_max" value="{{ request('salary_max') }}">
                            @endif

                            {{-- selected count --}}
                            <input type="hidden" name="profile_count" value="{{ request('profile_count', 10) }}">

                            {{-- native places --}}
                            @foreach ((array) request('native_place_id', []) as $id)
                                <input type="hidden" name="native_place_id[]" value="{{ $id }}">
                            @endforeach

                            {{-- qualifications --}}
                            @foreach ((array) request('education_qualification_id', []) as $id)
                                <input type="hidden" name="education_qualification_id[]" value="{{ $id }}">
                            @endforeach

                            {{-- working places --}}
                            @foreach ((array) request('working_place_id', []) as $id)
                                <input type="hidden" name="working_place_id[]" value="{{ $id }}">
                            @endforeach

                            {{-- stars --}}
                            @foreach ((array) request('star_id', []) as $id)
                                <input type="hidden" name="star_id[]" value="{{ $id }}">
                            @endforeach

                            {{-- exact currently displayed profile ids --}}
                            @foreach ($profiles as $profile)
                                <input type="hidden" name="profile_ids[]" value="{{ $profile->id }}">
                            @endforeach

                            <button type="submit"
                                    class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-rose-500 to-amber-500 px-4 py-2.5 text-sm font-semibold text-white shadow-sm shadow-rose-200 transition hover:from-rose-600 hover:to-amber-600">
                                <i class="fa-solid fa-print text-xs"></i>
                                Print PDF
                            </button>
                        </form>
                    @endif
                </div>
            @endif
        </div>
    </div>

    {{-- ===================================================== --}}
    {{-- TABLE --}}
    {{-- ===================================================== --}}
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50/80">
            <tr class="text-left">
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">#</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">பெயர்</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">தந்தை பெயர்</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">பிறந்த தேதி</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">வயது</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">உயரம்</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">சம்பளம்</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">நட்சத்திரம்</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">கல்வி</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">வேலை</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">சொந்த ஊர்</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">பணியிடம்</th>
            </tr>
            </thead>

            <tbody class="divide-y divide-slate-200">
            @forelse ($profiles as $profile)
                <tr class="transition hover:bg-slate-50/70">
                    <td class="px-5 py-4 align-top text-slate-500">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-5 py-4 align-top font-semibold text-slate-800">
                        {{ $profile->name }}
                    </td>

                    <td class="px-5 py-4 align-top text-slate-600">
                        {{ $profile->father_name ?? '—' }}
                    </td>

                    <td class="px-5 py-4 align-top text-slate-600">
                        {{ $profile->dob ? $profile->dob->format('d-m-Y') : '—' }}
                    </td>

                    <td class="px-5 py-4 align-top text-slate-600">
                        {{ $profile->dob ? $profile->dob->age : '—' }}
                    </td>

                    <td class="px-5 py-4 align-top text-slate-600">
                        {{ $profile->height ?? '—' }}
                    </td>

                    <td class="px-5 py-4 align-top text-slate-600">
                        {{ $profile->salary ? number_format($profile->salary, 2) : '—' }}
                    </td>

                    <td class="px-5 py-4 align-top text-slate-600">
                        {{ $profile->star->name ?? '—' }}
                    </td>

                    <td class="px-5 py-4 align-top text-slate-600">
                        {{ $profile->educationQualification->name ?? '—' }}
                    </td>

                    <td class="px-5 py-4 align-top text-slate-600">
                        {{ $profile->occupation->name ?? '—' }}
                    </td>

                    <td class="px-5 py-4 align-top text-slate-600">
                        {{ $profile->nativePlace->name ?? '—' }}
                    </td>

                    <td class="px-5 py-4 align-top text-slate-600">
                        {{ $profile->workingPlace->name ?? '—' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="px-5 py-12 text-center">
                        <div class="flex flex-col items-center justify-center gap-3 text-slate-500">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                <i class="fa-regular fa-folder-open text-xl"></i>
                            </div>

                            <div>
                                @if (!$selectedGender)
                                    <h3 class="text-base font-semibold text-slate-700">No profiles loaded yet</h3>
                                    <p class="text-sm text-slate-500">
                                        Choose male or female first to start browsing profiles.
                                    </p>
                                @elseif (!$hasActiveFilters)
                                    <h3 class="text-base font-semibold text-slate-700">Apply filters to view profiles</h3>
                                    <p class="text-sm text-slate-500">
                                        Select the required filters and click Apply Filters.
                                    </p>
                                @else
                                    <h3 class="text-base font-semibold text-slate-700">No profiles found</h3>
                                    <p class="text-sm text-slate-500">
                                        Try changing the filters or salary range.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
