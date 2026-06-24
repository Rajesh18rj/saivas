<div id="viewProfileModal" class="fixed inset-0 z-[999] hidden items-center justify-center bg-slate-950/60 px-4 py-6 backdrop-blur-[2px]">
    <div class="relative flex max-h-[92vh] w-full max-w-7xl flex-col overflow-hidden rounded-[30px] border border-slate-200 bg-white shadow-[0_30px_80px_rgba(15,23,42,0.22)]">

        {{-- ===================================================== --}}
        {{-- MODAL HEADER --}}
        {{-- ===================================================== --}}
        <div class="border-b border-slate-200 bg-gradient-to-r from-[#f8fffd] via-white to-[#f4fffb] px-6 py-5 sm:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">

                <div class="flex items-start gap-4">
                    <div class="flex h-16 w-16 items-center justify-center rounded-[24px] bg-gradient-to-br from-[#18c2b8] to-[#0ea5a0] text-white shadow-lg shadow-emerald-100">
                        <i class="fa-solid fa-user-gear text-xl"></i>
                    </div>

                    <div class="min-w-0">
                        <h3 id="view_profile_title" class="text-2xl font-bold tracking-tight text-slate-800">
                            Profile Details
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Complete profile overview and account information
                        </p>

                        <div class="mt-4 flex flex-wrap gap-3">
                            {{-- Active badge --}}
                            <span id="view_active_badge"
                                  class="inline-flex items-center gap-3 rounded-full border border-emerald-200 bg-emerald-50/80 px-4 py-2 text-sm font-semibold text-emerald-700 shadow-sm">
                                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-500/15">
                                    <span class="h-3 w-3 rounded-full bg-emerald-500"></span>
                                </span>
                                <span>Active</span>
                            </span>

                            {{-- Paid badge --}}
                            <span id="view_paid_badge"
                                  class="inline-flex items-center gap-3 rounded-full border border-sky-200 bg-sky-50/80 px-4 py-2 text-sm font-semibold text-sky-700 shadow-sm">
                                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-sky-500/10 text-sky-600">
                                    <i class="fa-solid fa-check text-sm"></i>
                                </span>
                                <span>Paid Member</span>
                            </span>
                        </div>
                    </div>
                </div>

                <button type="button"
                        class="close-view-modal inline-flex h-11 w-11 items-center justify-center self-start rounded-2xl border border-slate-200 bg-white text-slate-500 shadow-sm transition hover:bg-slate-100 hover:text-slate-700">
                    <i class="fa-solid fa-xmark text-base"></i>
                </button>
            </div>
        </div>

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
                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Name</p>
                                <p id="view_name" class="mt-1 text-sm font-semibold text-slate-800">—</p>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Father Name</p>
                                <p id="view_father_name" class="mt-1 text-sm font-semibold text-slate-800">—</p>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Gender</p>
                                <p id="view_gender" class="mt-1 text-sm font-semibold text-slate-800">—</p>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Date of Birth</p>
                                <p id="view_dob" class="mt-1 text-sm font-semibold text-slate-800">—</p>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Age</p>
                                <p id="view_age" class="mt-1 text-sm font-semibold text-slate-800">—</p>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Height</p>
                                <p id="view_height" class="mt-1 text-sm font-semibold text-slate-800">—</p>
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
                                <p class="text-sm text-slate-500">Education, work, and profile details</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 p-5 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Star</p>
                                <p id="view_star" class="mt-1 text-sm font-semibold text-slate-800">—</p>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Qualification</p>
                                <p id="view_qualification" class="mt-1 text-sm font-semibold text-slate-800">—</p>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Occupation</p>
                                <p id="view_occupation" class="mt-1 text-sm font-semibold text-slate-800">—</p>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Salary</p>
                                <p id="view_salary" class="mt-1 text-sm font-semibold text-slate-800">—</p>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Native Place</p>
                                <p id="view_native_place" class="mt-1 text-sm font-semibold text-slate-800">—</p>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Working Place</p>
                                <p id="view_working_place" class="mt-1 text-sm font-semibold text-slate-800">—</p>
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
                            <div class="rounded-2xl border border-emerald-100 bg-emerald-50/60 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-emerald-700">Active Status</p>
                                <p id="view_status" class="mt-1 text-sm font-semibold text-slate-800">—</p>
                            </div>

                            <div class="rounded-2xl border border-cyan-100 bg-cyan-50/60 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-cyan-700">Payment Status</p>
                                <p id="view_payment" class="mt-1 text-sm font-semibold text-slate-800">—</p>
                            </div>

                            <div class="rounded-2xl border border-amber-100 bg-amber-50/50 px-4 py-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-amber-700">Inactive Reason</p>
                                <p id="view_inactive_reason" class="mt-1 text-sm font-semibold leading-6 text-slate-800">—</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ===================================================== --}}
                {{-- RIGHT SIDE --}}
                {{-- ===================================================== --}}
                <div class="space-y-6 xl:col-span-4">


                    {{-- CONTACT DETAILS --}}
                    <div class="overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-sm">
                        <div class="flex items-center justify-between gap-3 border-b border-slate-100 px-5 py-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                    <i class="fa-solid fa-address-book text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-slate-800">Contact Details</h4>
                                    <p class="text-sm text-slate-500">Family contact information</p>
                                </div>
                            </div>

                            {{-- contact count badge --}}
                            <span id="view_contact_count_badge"
                                  class="inline-flex items-center rounded-full bg-violet-50 px-3 py-1 text-xs font-semibold text-violet-700">
                                0 Contacts
                            </span>
                        </div>

                        {{-- IMPORTANT:
                             JS will replace this entire wrapper with one or many contact cards
                        --}}
                        <div id="view_contacts_wrapper" class="p-5">
                            <div class="rounded-[24px] border border-dashed border-slate-300 bg-slate-50 px-5 py-10 text-center">
                                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-slate-400 shadow-sm">
                                    <i class="fa-solid fa-address-book text-sm"></i>
                                </div>
                                <p class="mt-3 text-sm font-semibold text-slate-700">No contact details available</p>
                                <p class="mt-1 text-xs text-slate-400">This profile does not have contact information yet.</p>
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
                    class="close-view-modal rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                Close
            </button>
        </div>
    </div>
</div>

