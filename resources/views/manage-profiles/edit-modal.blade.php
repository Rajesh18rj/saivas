<div id="editProfileModal" class="fixed inset-0 z-[999] hidden items-center justify-center bg-slate-900/50 px-4 py-6">
    <div class="relative w-full max-w-3xl overflow-hidden rounded-[28px] bg-white shadow-2xl">
        <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
            <div>
                <h3 class="text-lg font-bold text-slate-800">Edit Profile</h3>
                <p class="text-sm text-slate-500">Update profile information</p>
            </div>

            <button type="button"
                    class="close-edit-modal flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-500 hover:bg-slate-200">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form method="POST" action="#" id="editProfileForm">
            @csrf
            @method('PUT')

            <input type="hidden" name="profile_id" id="edit_profile_id">

            <div class="grid grid-cols-1 gap-4 p-6 sm:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Name</label>
                    <input type="text" name="name" id="edit_name"
                           class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Father Name</label>
                    <input type="text" name="father_name" id="edit_father_name"
                           class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Active Status</label>
                    <select name="is_active" id="edit_is_active"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Payment Status</label>
                    <select name="is_paid" id="edit_is_paid"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                        <option value="1">Paid</option>
                        <option value="0">Unpaid</option>
                    </select>
                </div>

                <div class="sm:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Inactive Reason</label>
                    <textarea name="inactive_reason" id="edit_inactive_reason" rows="4"
                              class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100"></textarea>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 border-t border-slate-200 px-6 py-4">
                <button type="button"
                        class="close-edit-modal rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    Cancel
                </button>

                <button type="submit"
                        class="rounded-2xl bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-200/60">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</div>
