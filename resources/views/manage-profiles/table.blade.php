<div class="overflow-hidden rounded-[30px] border border-slate-200 bg-white shadow-sm">
    {{-- ===================================================== --}}
    {{-- TABLE HEADER --}}
    {{-- ===================================================== --}}
    <div class="border-b border-slate-100 px-5 py-4 sm:px-6">
        <div class="flex items-center gap-3">
            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-100 text-slate-600">
                <i class="fa-solid fa-address-card text-sm"></i>
            </div>

            <div>
                <h2 class="text-lg font-bold text-slate-800">Profiles Management Table</h2>
                <p class="text-sm text-slate-500">View, edit, and remove profile records from one place.</p>
            </div>
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
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">Name</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">Father Name</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">Gender</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">Age</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500">Native Place</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500 text-center">Status</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500 text-center">Payment</th>
                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-slate-500 text-center">Actions</th>
            </tr>
            </thead>

            <tbody class="divide-y divide-slate-200">
            @forelse ($profiles as $profile)
                <tr class="transition hover:bg-slate-50/70">
                    <td class="px-5 py-4 align-top text-slate-500">
                        {{ $profiles->firstItem() + $loop->index }}
                    </td>

                    <td class="px-5 py-4 align-top">
                        <div>
                            <p class="font-semibold text-slate-800">{{ $profile->name }}</p>
                        </div>
                    </td>

                    <td class="px-5 py-4 align-top text-slate-600">
                        {{ $profile->father_name ?? '—' }}
                    </td>

                    <td class="px-5 py-4 align-top text-slate-600">
                        {{ $profile->gender->name ?? '—' }}
                    </td>

                    <td class="px-5 py-4 align-top text-slate-600">
                        {{ $profile->age ?? '—' }}
                    </td>

                    <td class="px-5 py-4 align-top text-slate-600">
                        {{ $profile->nativePlace->name ?? '—' }}
                    </td>

                    <td class="px-5 py-4 align-top text-center">
                        @if ($profile->is_active)
                            <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-600">
                                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                Active
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 rounded-full bg-rose-50 px-3 py-1 text-xs font-semibold text-rose-600">
                                <span class="h-2 w-2 rounded-full bg-rose-500"></span>
                                Inactive
                            </span>
                        @endif
                    </td>

                    <td class="px-5 py-4 align-top text-center">
                        @if ($profile->is_paid)
                            <span class="inline-flex items-center gap-2 rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-600">
                                <i class="fa-solid fa-circle-check text-[10px]"></i>
                                Paid
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-600">
                                <i class="fa-solid fa-clock text-[10px]"></i>
                                Unpaid
                            </span>
                        @endif
                    </td>

                    <td class="px-5 py-4 align-top">
                        <div class="flex flex-wrap items-center justify-center gap-2">
                            {{-- VIEW --}}
                            <button type="button"
                                    class="view-profile-btn ..."
                                    data-id="{{ $profile->id }}"
                                    data-name="{{ $profile->name }}"
                                    data-father_name="{{ $profile->father_name ?? '—' }}"
                                    data-gender="{{ $profile->gender->name ?? '—' }}"
                                    data-age="{{ $profile->age ?? '—' }}"
                                    data-dob="{{ $profile->dob ? $profile->dob->format('d-m-Y') : '—' }}"
                                    data-height="{{ $profile->height ?? '—' }}"
                                    data-native_place="{{ $profile->nativePlace->name ?? '—' }}"
                                    data-star="{{ $profile->star->name ?? '—' }}"
                                    data-qualification="{{ $profile->educationQualification->name ?? '—' }}"
                                    data-occupation="{{ $profile->occupation->name ?? '—' }}"
                                    data-salary="{{ $profile->salary ? number_format($profile->salary, 2) : '—' }}"
                                    data-working_place="{{ $profile->workingPlace->name ?? '—' }}"
                                    data-is_active="{{ $profile->is_active ? 1 : 0 }}"
                                    data-is_paid="{{ $profile->is_paid ? 1 : 0 }}"
                                    data-inactive_reason="{{ $profile->inactive_reason ?? '—' }}"
                                    data-contacts='@json($profile->contacts ?? [])'>
                                <i class="fa-solid fa-eye text-[11px]"></i>
                            </button>

                            {{-- EDIT --}}
                            @php
                                $editContacts = $profile->contacts->map(function ($contact) {
                                    return [
                                        'name' => $contact->name,
                                        'relationship' => $contact->relationship,
                                        'mobile' => $contact->mobile,
                                    ];
                                })->values()->toArray();
                            @endphp

                            <button type="button"
                                    class="edit-profile-btn inline-flex items-center gap-2 rounded-xl bg-amber-50 px-3 py-2 text-xs font-semibold text-amber-700 transition hover:bg-amber-100"
                                    data-id="{{ $profile->id }}"
                                    data-name="{{ $profile->name ?? '' }}"
                                    data-father_name="{{ $profile->father_name ?? '' }}"

                                    data-dob_raw="{{ $profile->dob ? \Carbon\Carbon::parse($profile->dob)->format('Y-m-d') : '' }}"
                                    data-height="{{ $profile->height ?? '' }}"
                                    data-salary_raw="{{ $profile->salary ?? '' }}"

                                    data-gender_id="{{ $profile->gender_id ?? '' }}"
                                    data-star_id="{{ $profile->star_id ?? '' }}"
                                    data-education_qualification_id="{{ $profile->education_qualification_id ?? '' }}"
                                    data-occupation_id="{{ $profile->occupation_id ?? '' }}"
                                    data-native_place_id="{{ $profile->native_place_id ?? '' }}"
                                    data-working_place_id="{{ $profile->working_place_id ?? '' }}"

                                    data-is_active="{{ $profile->is_active ? 1 : 0 }}"
                                    data-is_paid="{{ $profile->is_paid ? 1 : 0 }}"
                                    data-inactive_reason="{{ $profile->inactive_reason ?? '' }}"

                                    data-contacts='@json($editContacts)'>
                                <i class="fa-solid fa-pen-to-square text-[11px]"></i>
                            </button>

                            {{-- DELETE --}}
                            <button type="button"
                                    class="hidden delete-profile-btn inline-flex items-center gap-2 rounded-xl bg-rose-50 px-3 py-2 text-xs font-semibold text-rose-700 transition hover:bg-rose-100"
                                    data-id="{{ $profile->id }}"
                                    data-name="{{ $profile->name }}">
                                <i class="fa-solid fa-trash text-[11px]"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-5 py-12 text-center">
                        <div class="flex flex-col items-center justify-center gap-3 text-slate-500">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                <i class="fa-regular fa-folder-open text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-base font-semibold text-slate-700">No profiles found</h3>
                                <p class="text-sm text-slate-500">Try changing the search or status filters.</p>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    @if ($profiles->count())
        <div class="border-t border-slate-200 px-5 py-4">
            {{ $profiles->links('components.pagination.manage-profiles-pagination') }}
        </div>
    @endif
</div>
