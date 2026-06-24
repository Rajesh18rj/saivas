<div id="editProfileModal" class="fixed inset-0 z-[999] hidden items-center justify-center bg-slate-950/60 px-4 py-6 backdrop-blur-[2px]">
    <div class="relative flex max-h-[94vh] w-full max-w-6xl flex-col overflow-hidden rounded-[30px] border border-slate-200 bg-white shadow-[0_30px_80px_rgba(15,23,42,0.22)]">

        {{-- ===================================================== --}}
        {{-- HEADER --}}
        {{-- ===================================================== --}}
        <div class="border-b border-slate-200 bg-gradient-to-r from-[#f8fffd] via-white to-[#f4fffb] px-6 py-5 sm:px-8">
            <div class="flex items-start justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="flex h-16 w-16 items-center justify-center rounded-[24px] bg-gradient-to-br from-[#18c2b8] to-[#0ea5a0] text-white shadow-lg shadow-emerald-100">
                        <i class="fa-solid fa-pen-to-square text-xl"></i>
                    </div>

                    <div>
                        <h3 class="text-2xl font-bold tracking-tight text-slate-800">Edit Profile</h3>
                        <p class="mt-1 text-sm text-slate-500">
                            Update matrimony profile information, status, and account details.
                        </p>
                    </div>
                </div>

                <button type="button"
                        class="close-edit-modal inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-500 shadow-sm transition hover:bg-slate-100 hover:text-slate-700">
                    <i class="fa-solid fa-xmark text-base"></i>
                </button>
            </div>
        </div>

        <form method="POST" action="#" id="editProfileForm" class="flex min-h-0 flex-1 flex-col">
            @csrf
            @method('PUT')

            <input type="hidden" name="profile_id" id="edit_profile_id">

            {{-- ===================================================== --}}
            {{-- BODY --}}
            {{-- ===================================================== --}}
            <div class="flex-1 overflow-y-auto bg-slate-50/50 px-6 py-6 sm:px-8">
                <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">

                    {{-- ===================================================== --}}
                    {{-- LEFT SIDE --}}
                    {{-- ===================================================== --}}
                    <div class="space-y-6 xl:col-span-8">

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
                                {{-- Name --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Name</label>
                                    <input type="text" name="name" id="edit_name"
                                           class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                </div>

                                {{-- Father Name --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Father Name</label>
                                    <input type="text" name="father_name" id="edit_father_name"
                                           class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                </div>

                                {{-- DOB --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Date of Birth</label>
                                    <input type="date" name="dob" id="edit_dob"
                                           class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                </div>

                                {{-- Height --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Height</label>
                                    <input type="text" name="height" id="edit_height"
                                           placeholder="e.g. 5.8"
                                           class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                </div>

                                {{-- Salary --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Salary</label>
                                    <input type="number" step="0.01" name="salary" id="edit_salary"
                                           class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                </div>

                                {{-- Gender --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Gender</label>
                                    <select name="gender_id" id="edit_gender_id"
                                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                        <option value="">Select Gender</option>
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
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
                                    <p class="text-sm text-slate-500">Education, work, and location details</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-4 p-5 sm:grid-cols-2 lg:grid-cols-3">
                                {{-- Star --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Star</label>
                                    <select name="star_id" id="edit_star_id"
                                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                        <option value="">Select Star</option>
                                        @foreach($stars as $star)
                                            <option value="{{ $star->id }}">{{ $star->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Qualification --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Qualification</label>
                                    <select name="education_qualification_id" id="edit_education_qualification_id"
                                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                        <option value="">Select Qualification</option>
                                        @foreach($educations as $education)
                                            <option value="{{ $education->id }}">{{ $education->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Occupation --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Occupation</label>
                                    <select name="occupation_id" id="edit_occupation_id"
                                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                        <option value="">Select Occupation</option>
                                        @foreach($occupations as $occupation)
                                            <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Native Place --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Native Place</label>
                                    <select name="native_place_id" id="edit_native_place_id"
                                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                        <option value="">Select Native Place</option>
                                        @foreach($nativePlaces as $nativePlace)
                                            <option value="{{ $nativePlace->id }}">{{ $nativePlace->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Working Place --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Working Place</label>
                                    <select name="working_place_id" id="edit_working_place_id"
                                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                        <option value="">Select Working Place</option>
                                        @foreach($workingPlaces as $workingPlace)
                                            <option value="{{ $workingPlace->id }}">{{ $workingPlace->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- CONTACT DETAILS --}}
                        <div class="overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-sm">
                            <div class="flex items-center justify-between gap-3 border-b border-slate-100 px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                        <i class="fa-solid fa-address-book text-sm"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-base font-bold text-slate-800">Contact Details</h4>
                                        <p class="text-sm text-slate-500">Add and edit family / profile contacts</p>
                                    </div>
                                </div>

                                <button type="button"
                                        id="addEditContactBtn"
                                        class="inline-flex items-center gap-2 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm font-semibold text-emerald-700 transition hover:bg-emerald-100">
                                    <i class="fa-solid fa-plus text-xs"></i>
                                    Add Contact
                                </button>
                            </div>

                            <div class="p-5">
                                {{-- JS will render all contact cards here --}}
                                <div id="edit_contacts_wrapper" class="space-y-4"></div>
                            </div>
                        </div>
                    </div>

                    {{-- ===================================================== --}}
                    {{-- RIGHT SIDE --}}
                    {{-- ===================================================== --}}
                    <div class="space-y-6 xl:col-span-4">

                        {{-- PROFILE STATUS --}}
                        <div class="overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-sm">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-5 py-4">
                                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                    <i class="fa-solid fa-shield-heart text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-slate-800">Profile Status</h4>
                                    <p class="text-sm text-slate-500">Membership and account settings</p>
                                </div>
                            </div>

                            <div class="space-y-4 p-5">
                                {{-- Active --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Active Status</label>
                                    <select name="is_active" id="edit_is_active"
                                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                {{-- Paid --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Payment Status</label>
                                    <select name="is_paid" id="edit_is_paid"
                                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                                        <option value="1">Paid</option>
                                        <option value="0">Unpaid</option>
                                    </select>
                                </div>

                                {{-- Inactive Reason --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Inactive Reason</label>
                                    <textarea name="inactive_reason" id="edit_inactive_reason" rows="5"
                                              class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                                              placeholder="Reason for inactive status..."></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- NOTE CARD --}}
                        <div class="rounded-[28px] border border-dashed border-emerald-200 bg-emerald-50/50 p-5">
                            <div class="flex items-start gap-3">
                                <div class="mt-0.5 flex h-10 w-10 items-center justify-center rounded-2xl bg-white text-emerald-600 shadow-sm">
                                    <i class="fa-solid fa-circle-info text-sm"></i>
                                </div>
                                <div>
                                    <h5 class="text-sm font-bold text-slate-800">Profile Update Note</h5>
                                    <p class="mt-1 text-sm leading-6 text-slate-600">
                                        Keep profile details accurate before saving. If a profile is marked inactive,
                                        you can mention the reason in the inactive reason field.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===================================================== --}}
            {{-- FOOTER --}}
            {{-- ===================================================== --}}
            <div class="flex items-center justify-end gap-3 border-t border-slate-200 bg-white px-6 py-4 sm:px-8">
                <button type="button"
                        class="close-edit-modal rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                    Cancel
                </button>

                <button type="submit"
                        class="rounded-2xl bg-gradient-to-r from-[#18c2b8] to-[#0ea5a0] px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-200/60 transition hover:opacity-95">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</div>
