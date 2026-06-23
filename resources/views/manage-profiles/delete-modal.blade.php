<div id="deleteProfileModal" class="fixed inset-0 z-[999] hidden items-center justify-center bg-slate-900/50 px-4 py-6">
    <div class="relative w-full max-w-lg overflow-hidden rounded-[28px] bg-white shadow-2xl">
        <div class="border-b border-slate-200 px-6 py-4">
            <h3 class="text-lg font-bold text-slate-800">Delete Profile</h3>
            <p class="text-sm text-slate-500">This action cannot be undone.</p>
        </div>

        <div class="px-6 py-5">
            <div class="rounded-2xl border border-rose-100 bg-rose-50 px-4 py-4 text-sm text-rose-700">
                Are you sure you want to delete
                <span id="delete_profile_name" class="font-bold">this profile</span>?
            </div>
        </div>

        <form method="POST" action="#" id="deleteProfileForm">
            @csrf
            @method('DELETE')

            <input type="hidden" name="profile_id" id="delete_profile_id">

            <div class="flex items-center justify-end gap-3 border-t border-slate-200 px-6 py-4">
                <button type="button"
                        class="close-delete-modal rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    Cancel
                </button>

                <button type="submit"
                        class="rounded-2xl bg-gradient-to-r from-rose-500 to-pink-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-rose-200/60">
                    Delete Profile
                </button>
            </div>
        </form>
    </div>
</div>
