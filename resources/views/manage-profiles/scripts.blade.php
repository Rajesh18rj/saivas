<script>
    document.addEventListener('DOMContentLoaded', function () {
        const viewModal = document.getElementById('viewProfileModal');
        const editModal = document.getElementById('editProfileModal');
        const deleteModal = document.getElementById('deleteProfileModal');

        const openModal = (modal) => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        };

        const closeModal = (modal) => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        };

        // =====================================================
        // VIEW MODAL
        // =====================================================
        document.querySelectorAll('.view-profile-btn').forEach(button => {
            button.addEventListener('click', function () {
                const name = this.dataset.name || '—';
                const fatherName = this.dataset.father_name || '—';
                const gender = this.dataset.gender || '—';
                const age = this.dataset.age || '—';
                const dob = this.dataset.dob || '—';
                const height = this.dataset.height || '—';
                const nativePlace = this.dataset.native_place || '—';
                const star = this.dataset.star || '—';
                const qualification = this.dataset.qualification || '—';
                const occupation = this.dataset.occupation || '—';
                const salary = this.dataset.salary || '—';
                const workingPlace = this.dataset.working_place || '—';
                const status = this.dataset.is_active === '1' ? 'Active' : 'Inactive';
                const payment = this.dataset.is_paid === '1' ? 'Paid' : 'Unpaid';
                const inactiveReason = this.dataset.inactive_reason || '—';

                // top header
                document.getElementById('view_profile_title').textContent = name;

                // personal
                document.getElementById('view_name').textContent = name;
                document.getElementById('view_father_name').textContent = fatherName;
                document.getElementById('view_gender').textContent = gender;
                document.getElementById('view_dob').textContent = dob;
                document.getElementById('view_age').textContent = age;
                document.getElementById('view_height').textContent = height;

                // matrimony
                document.getElementById('view_star').textContent = star;
                document.getElementById('view_qualification').textContent = qualification;
                document.getElementById('view_occupation').textContent = occupation;
                document.getElementById('view_salary').textContent = salary;
                document.getElementById('view_native_place').textContent = nativePlace;
                document.getElementById('view_working_place').textContent = workingPlace;

                // status
                document.getElementById('view_status').textContent = status;
                document.getElementById('view_payment').textContent = payment;
                document.getElementById('view_inactive_reason').textContent = inactiveReason;

                // active badge
                const activeBadge = document.getElementById('view_active_badge');
                if (this.dataset.is_active === '1') {
                    activeBadge.className = 'inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700';
                    activeBadge.innerHTML = '<span class="h-2 w-2 rounded-full bg-emerald-500"></span>Active';
                } else {
                    activeBadge.className = 'inline-flex items-center gap-2 rounded-full border border-rose-200 bg-rose-50 px-3 py-1 text-xs font-semibold text-rose-700';
                    activeBadge.innerHTML = '<span class="h-2 w-2 rounded-full bg-rose-500"></span>Inactive';
                }

                // paid badge
                const paidBadge = document.getElementById('view_paid_badge');
                if (this.dataset.is_paid === '1') {
                    paidBadge.className = 'inline-flex items-center gap-2 rounded-full border border-indigo-200 bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700';
                    paidBadge.innerHTML = '<i class="fa-solid fa-circle-check text-[10px]"></i>Paid';
                } else {
                    paidBadge.className = 'inline-flex items-center gap-2 rounded-full border border-amber-200 bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700';
                    paidBadge.innerHTML = '<i class="fa-solid fa-clock text-[10px]"></i>Unpaid';
                }

                openModal(viewModal);
            });
        });

        // =====================================================
        // EDIT MODAL
        // =====================================================
        document.querySelectorAll('.edit-profile-btn').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('edit_profile_id').value = this.dataset.id || '';
                document.getElementById('edit_name').value = this.dataset.name || '';
                document.getElementById('edit_father_name').value = this.dataset.father_name || '';
                document.getElementById('edit_is_active').value = this.dataset.is_active || 1;
                document.getElementById('edit_is_paid').value = this.dataset.is_paid || 0;
                document.getElementById('edit_inactive_reason').value =
                    this.dataset.inactive_reason === '—' ? '' : this.dataset.inactive_reason;

                openModal(editModal);
            });
        });

        // =====================================================
        // DELETE MODAL
        // =====================================================
        document.querySelectorAll('.delete-profile-btn').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('delete_profile_id').value = this.dataset.id || '';
                document.getElementById('delete_profile_name').textContent = this.dataset.name || 'this profile';

                openModal(deleteModal);
            });
        });

        // =====================================================
        // CLOSE BUTTONS
        // =====================================================
        document.querySelectorAll('.close-view-modal').forEach(button => {
            button.addEventListener('click', () => closeModal(viewModal));
        });

        document.querySelectorAll('.close-edit-modal').forEach(button => {
            button.addEventListener('click', () => closeModal(editModal));
        });

        document.querySelectorAll('.close-delete-modal').forEach(button => {
            button.addEventListener('click', () => closeModal(deleteModal));
        });

        // =====================================================
        // BACKDROP CLOSE
        // =====================================================
        [viewModal, editModal, deleteModal].forEach(modal => {
            modal.addEventListener('click', function (e) {
                if (e.target === modal) {
                    closeModal(modal);
                }
            });
        });

        // =====================================================
        // ESC CLOSE
        // =====================================================
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closeModal(viewModal);
                closeModal(editModal);
                closeModal(deleteModal);
            }
        });
    });
</script>
