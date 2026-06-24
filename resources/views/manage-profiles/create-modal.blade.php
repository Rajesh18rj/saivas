<div id="createProfileModal" class="fixed inset-0 z-[999] hidden items-center justify-center bg-slate-900/50 px-4 py-6">
    <div class="relative flex max-h-[92vh] w-full max-w-6xl flex-col overflow-hidden rounded-[30px] bg-white shadow-2xl">
        {{-- HEADER --}}
        <div class="border-b border-slate-200 bg-gradient-to-r from-[#f8fffd] via-white to-[#f4fffb] px-6 py-5 sm:px-8">
            <div class="flex items-start justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="flex h-14 w-14 items-center justify-center rounded-[22px] bg-gradient-to-br from-[#18c2b8] to-[#0ea5a0] text-white shadow-lg shadow-emerald-100">
                        <i class="fa-solid fa-user-plus text-lg"></i>
                    </div>

                    <div>
                        <h3 class="text-xl font-bold tracking-tight text-slate-800">Create Profile</h3>
                        <p class="mt-1 text-sm text-slate-500">
                            Add a new profile with personal, matrimony, status and contact details.
                        </p>
                    </div>
                </div>

                <button type="button"
                        class="close-create-modal inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-500 shadow-sm transition hover:bg-slate-100 hover:text-slate-700">
                    <i class="fa-solid fa-xmark text-base"></i>
                </button>
            </div>
        </div>

        <form method="POST"
              action="{{ route('manage-profiles.store') }}"
              id="createProfileForm"
              class="flex min-h-0 flex-1 flex-col">
            @csrf

            <div class="min-h-0 flex-1 overflow-y-auto bg-slate-50/50 px-6 py-6 sm:px-8">
                <div class="grid grid-cols-1 gap-6">

                    {{-- PERSONAL DETAILS --}}
                    <div class="overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-sm">
                        <div class="flex items-center gap-3 border-b border-slate-100 px-5 py-4">
                            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600">
                                <i class="fa-solid fa-user text-sm"></i>
                            </div>
                            <div>
                                <h4 class="text-base font-bold text-slate-800">Personal Details</h4>
                                <p class="text-sm text-slate-500">Basic personal information</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 p-5 sm:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Name</label>
                                <input type="text" name="name"
                                       class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                                       placeholder="Enter name">
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Father Name</label>
                                <input type="text" name="father_name"
                                       class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                                       placeholder="Enter father name">
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Gender</label>
                                <select name="gender_id"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                    <option value="">Select Gender</option>
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Date of Birth</label>
                                <input type="date" name="dob"
                                       class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Height</label>
                                <input type="text" name="height"
                                       class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                                       placeholder="Enter height">
                            </div>
                        </div>
                    </div>

                    {{-- MATRIMONY DETAILS --}}
                    <div class="overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-sm">
                        <div class="flex items-center gap-3 border-b border-slate-100 px-5 py-4">
                            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-rose-50 text-rose-600">
                                <i class="fa-solid fa-heart text-sm"></i>
                            </div>
                            <div>
                                <h4 class="text-base font-bold text-slate-800">Matrimony Details</h4>
                                <p class="text-sm text-slate-500">Education, work and profile information</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 p-5 sm:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Star</label>
                                <select name="star_id"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-rose-300 focus:bg-white focus:ring-4 focus:ring-rose-100">
                                    <option value="">Select Star</option>
                                    @foreach($stars as $star)
                                        <option value="{{ $star->id }}">{{ $star->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Qualification</label>
                                <select name="education_qualification_id"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-rose-300 focus:bg-white focus:ring-4 focus:ring-rose-100">
                                    <option value="">Select Qualification</option>
                                    @foreach($educations as $education)
                                        <option value="{{ $education->id }}">{{ $education->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Occupation</label>
                                <select name="occupation_id"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-rose-300 focus:bg-white focus:ring-4 focus:ring-rose-100">
                                    <option value="">Select Occupation</option>
                                    @foreach($occupations as $occupation)
                                        <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Salary</label>
                                <input type="number" step="0.01" name="salary"
                                       class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-rose-300 focus:bg-white focus:ring-4 focus:ring-rose-100"
                                       placeholder="Enter salary">
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Native Place</label>
                                <select name="native_place_id"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-rose-300 focus:bg-white focus:ring-4 focus:ring-rose-100">
                                    <option value="">Select Native Place</option>
                                    @foreach($nativePlaces as $nativePlace)
                                        <option value="{{ $nativePlace->id }}">{{ $nativePlace->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Working Place</label>
                                <select name="working_place_id"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-rose-300 focus:bg-white focus:ring-4 focus:ring-rose-100">
                                    <option value="">Select Working Place</option>
                                    @foreach($workingPlaces as $workingPlace)
                                        <option value="{{ $workingPlace->id }}">{{ $workingPlace->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- PROFILE STATUS --}}
                    <div class="overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-sm">
                        <div class="flex items-center gap-3 border-b border-slate-100 px-5 py-4">
                            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                <i class="fa-solid fa-shield-heart text-sm"></i>
                            </div>
                            <div>
                                <h4 class="text-base font-bold text-slate-800">Profile Status</h4>
                                <p class="text-sm text-slate-500">Account and membership information</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 p-5 md:grid-cols-3">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Active Status</label>
                                <select name="is_active"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Payment Status</label>
                                <select name="is_paid"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                    <option value="1">Paid</option>
                                    <option value="0">Unpaid</option>
                                </select>
                            </div>

                            <div class="md:col-span-3">
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Inactive Reason</label>
                                <textarea name="inactive_reason" rows="4"
                                          class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                                          placeholder="Enter inactive reason if profile is inactive"></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- CONTACT DETAILS --}}
                    <div class="overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-sm">
                        <div class="flex flex-col gap-4 border-b border-slate-100 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                    <i class="fa-solid fa-address-book text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-slate-800">Contact Details</h4>
                                    <p class="text-sm text-slate-500">Add one or more family contacts</p>
                                </div>
                            </div>

                            <button type="button"
                                    id="addCreateContactBtn"
                                    class="inline-flex items-center gap-2 rounded-2xl bg-violet-50 px-4 py-2.5 text-sm font-semibold text-violet-700 transition hover:bg-violet-100">
                                <i class="fa-solid fa-plus text-xs"></i>
                                Add Contact
                            </button>
                        </div>

                        <div id="create_contacts_wrapper" class="space-y-4 p-5">
                            {{-- JS will render contact cards here --}}
                        </div>
                    </div>
                </div>
            </div>

            {{-- FOOTER --}}
            <div class="shrink-0 border-t border-slate-200 bg-white px-6 py-4 sm:px-8">
                <div class="flex items-center justify-end gap-3">
                    <button type="button"
                            class="close-create-modal rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                        Cancel
                    </button>

                    <button type="submit"
                            class="rounded-2xl bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-200/60">
                        Create Profile
                    </button>
                </div>
            </div>        </form>
    </div>
</div>
