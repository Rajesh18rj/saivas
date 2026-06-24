<script>
    document.addEventListener('DOMContentLoaded', function () {
        const viewModal = document.getElementById('viewProfileModal');
        const createModal = document.getElementById('createProfileModal');
        const editModal = document.getElementById('editProfileModal');
        const deleteModal = document.getElementById('deleteProfileModal');
        const openCreateBtn = document.getElementById('openCreateProfileModal');
        const createForm = document.getElementById('createProfileForm');

        if (openCreateBtn) {
            openCreateBtn.addEventListener('click', function () {
                if (createForm) createForm.reset();
                renderCreateContacts([{ name: '', relationship: '', mobile: '' }]);
                openModal(createModal);
            });
        }

        const openModal = (modal) => {
            if (!modal) return;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        };

        const closeModal = (modal) => {
            if (!modal) return;
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        };

        const addCreateContactBtn = document.getElementById('addCreateContactBtn');

        if (addCreateContactBtn) {
            addCreateContactBtn.addEventListener('click', function () {
                const wrapper = document.getElementById('create_contacts_wrapper');
                if (!wrapper) return;

                const currentContacts = [];

                wrapper.querySelectorAll('.create-contact-card').forEach(card => {
                    currentContacts.push({
                        name: card.querySelector('input[name="contact_name[]"]')?.value || '',
                        relationship: card.querySelector('input[name="contact_relationship[]"]')?.value || '',
                        mobile: card.querySelector('input[name="contact_mobile[]"]')?.value || '',
                    });
                });

                currentContacts.push({
                    name: '',
                    relationship: '',
                    mobile: '',
                });

                renderCreateContacts(currentContacts);
            });
        }
        // =====================================================
        // VIEW CONTACTS RENDERER
        // =====================================================
        function renderProfileContacts(contacts = []) {
            const wrapper = document.getElementById('view_contacts_wrapper');
            const countBadge = document.getElementById('view_contact_count_badge');

            if (!wrapper) return;

            wrapper.innerHTML = '';

            if (!Array.isArray(contacts) || !contacts.length) {
                if (countBadge) countBadge.textContent = '0 Contacts';

                wrapper.innerHTML = `
            <div class="rounded-[24px] border border-dashed border-slate-300 bg-slate-50 px-5 py-8 text-center">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-slate-400 shadow-sm">
                    <i class="fa-solid fa-address-book text-sm"></i>
                </div>
                <p class="mt-3 text-sm font-semibold text-slate-700">No contact details added</p>
                <p class="mt-1 text-xs text-slate-400">This profile doesn’t have any saved contact information.</p>
            </div>
        `;
                return;
            }

            if (countBadge) {
                countBadge.textContent = `${contacts.length} Contact${contacts.length > 1 ? 's' : ''}`;
            }

            const cards = contacts.map((contact, index) => {
                return `
            <div class="rounded-[24px] border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                            <i class="fa-solid fa-user-group text-sm"></i>
                        </div>

                        <div>
                            <h5 class="text-lg font-bold text-slate-800">
                                Contact ${index + 1}
                            </h5>
                            <p class="mt-1 text-sm text-slate-500">
                                Family contact information
                            </p>
                        </div>
                    </div>

                    <span class="inline-flex items-center rounded-full bg-violet-50 px-3 py-1 text-xs font-semibold text-violet-700">
                        ${contact.relationship || 'Family Contact'}
                    </span>
                </div>

                <div class="mt-5 overflow-hidden rounded-[20px] bg-slate-50 divide-y divide-slate-200">
                    <div class="flex items-center gap-4 px-4 py-4">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-white text-violet-600 shadow-sm">
                            <i class="fa-solid fa-user text-sm"></i>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400">Name</p>
                            <p class="mt-1 text-sm font-semibold text-slate-800 break-words">
                                ${contact.name || '—'}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 px-4 py-4">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-white text-sky-600 shadow-sm">
                            <i class="fa-solid fa-users text-sm"></i>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400">Relationship</p>
                            <p class="mt-1 text-sm font-semibold text-slate-800 break-words">
                                ${contact.relationship || '—'}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 px-4 py-4">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-white text-emerald-600 shadow-sm">
                            <i class="fa-solid fa-phone text-sm"></i>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400">Mobile Number</p>
                            <p class="mt-1 text-sm font-semibold text-slate-800 break-words">
                                ${contact.mobile || '—'}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        `;
            }).join('');

            wrapper.innerHTML = `
        <div class="grid grid-cols-1 gap-4">
            ${cards}
        </div>
    `;
        }

        // =====================================================
        // EDIT CONTACTS RENDERER
        // =====================================================
        function renderEditContacts(contacts = []) {
            const wrapper = document.getElementById('edit_contacts_wrapper');
            if (!wrapper) return;

            wrapper.innerHTML = '';

            if (!Array.isArray(contacts) || !contacts.length) {
                contacts = [{ name: '', relationship: '', mobile: '' }];
            }

            contacts.forEach((contact, index) => {
                const card = document.createElement('div');
                card.className = 'edit-contact-card rounded-[24px] border border-slate-200 bg-slate-50 p-4';

                card.innerHTML = `
                <div class="rounded-[24px] border border-slate-200 bg-white p-5 shadow-sm">
                    {{-- top row --}}
                            <div class="flex items-center justify-between gap-3 border-b border-slate-100 pb-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                        <i class="fa-solid fa-address-book text-sm"></i>
                                    </div>

                                    <div>
                                        <h5 class="text-sm font-bold text-slate-800">Contact ${index + 1}</h5>
                                <p class="text-xs text-slate-500">Edit contact details</p>
                            </div>
                        </div>

                        <button type="button"
                                class="remove-edit-contact inline-flex h-10 w-10 items-center justify-center rounded-2xl border border-rose-200 bg-rose-50 text-rose-600 transition hover:bg-rose-100"
                                ${contacts.length === 1 ? 'style="display:none;"' : ''}>
                            <i class="fa-solid fa-trash text-xs"></i>
                        </button>
                    </div>

                    {{-- fields --}}
                            <div class="mt-5 grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div class="md:col-span-2">
                                    <label class="mb-2 block text-xs font-bold uppercase tracking-[0.14em] text-slate-400">
                                        Contact Name
                                    </label>
                                    <input type="text"
                                           name="contact_name[]"
                                           value="${contact.name ?? ''}"
                                   placeholder="Enter contact name"
                                   class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-violet-300 focus:bg-white focus:ring-4 focus:ring-violet-100">
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-[0.14em] text-slate-400">
                                Relationship
                            </label>
                            <input type="text"
                                   name="contact_relationship[]"
                                   value="${contact.relationship ?? ''}"
                                   placeholder="Enter relationship"
                                   class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100">
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-[0.14em] text-slate-400">
                                Mobile Number
                            </label>
                            <input type="text"
                                   name="contact_mobile[]"
                                   value="${contact.mobile ?? ''}"
                                   placeholder="Enter mobile number"
                                   class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 outline-none transition focus:border-emerald-300 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                        </div>
                    </div>
                </div>
            `;

                wrapper.appendChild(card);
            });

            attachRemoveEditContactEvents();
        }

        function renderCreateContacts(contacts = []) {
            const wrapper = document.getElementById('create_contacts_wrapper');
            if (!wrapper) return;

            wrapper.innerHTML = '';

            if (!Array.isArray(contacts) || !contacts.length) {
                contacts = [{ name: '', relationship: '', mobile: '' }];
            }

            contacts.forEach((contact, index) => {
                const card = document.createElement('div');
                card.className = 'create-contact-card rounded-[24px] border border-slate-200 bg-slate-50 p-4';

                card.innerHTML = `
            <div class="flex items-start justify-between gap-3">
                <div>
                    <h5 class="text-sm font-bold text-slate-800">Contact ${index + 1}</h5>
                    <p class="text-xs text-slate-500">Family contact information</p>
                </div>

                <button type="button"
                        class="remove-create-contact inline-flex h-9 w-9 items-center justify-center rounded-xl border border-rose-200 bg-rose-50 text-rose-600 transition hover:bg-rose-100"
                        ${contacts.length === 1 ? 'style="display:none;"' : ''}>
                    <i class="fa-solid fa-trash text-xs"></i>
                </button>
            </div>

            <div class="mt-4 grid grid-cols-1 gap-4 md:grid-cols-3">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Contact Name</label>
                    <input type="text"
                           name="contact_name[]"
                           value="${contact.name ?? ''}"
                           placeholder="Enter contact name"
                           class="h-12 w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm text-slate-700 outline-none focus:border-violet-300 focus:ring-4 focus:ring-violet-100">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Relationship</label>
                    <input type="text"
                           name="contact_relationship[]"
                           value="${contact.relationship ?? ''}"
                           placeholder="Enter relationship"
                           class="h-12 w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm text-slate-700 outline-none focus:border-violet-300 focus:ring-4 focus:ring-violet-100">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Mobile Number</label>
                    <input type="text"
                           name="contact_mobile[]"
                           value="${contact.mobile ?? ''}"
                           placeholder="Enter mobile number"
                           class="h-12 w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm text-slate-700 outline-none focus:border-violet-300 focus:ring-4 focus:ring-violet-100">
                </div>
            </div>
        `;

                wrapper.appendChild(card);
            });

            attachRemoveCreateContactEvents();
        }

        function attachRemoveCreateContactEvents() {
            const wrapper = document.getElementById('create_contacts_wrapper');
            if (!wrapper) return;

            wrapper.querySelectorAll('.remove-create-contact').forEach(btn => {
                btn.addEventListener('click', function () {
                    const card = this.closest('.create-contact-card');
                    if (card) {
                        card.remove();
                    }

                    const remainingCards = wrapper.querySelectorAll('.create-contact-card');

                    if (!remainingCards.length) {
                        renderCreateContacts([{ name: '', relationship: '', mobile: '' }]);
                        return;
                    }

                    remainingCards.forEach((card, index) => {
                        const title = card.querySelector('h5');
                        if (title) {
                            title.textContent = `Contact ${index + 1}`;
                        }
                    });

                    if (remainingCards.length === 1) {
                        const deleteBtn = remainingCards[0].querySelector('.remove-create-contact');
                        if (deleteBtn) {
                            deleteBtn.style.display = 'none';
                        }
                    }
                });
            });
        }

        // =====================================================
        // REMOVE CONTACT EVENTS
        // =====================================================
        function attachRemoveEditContactEvents() {
            const wrapper = document.getElementById('edit_contacts_wrapper');
            if (!wrapper) return;

            wrapper.querySelectorAll('.remove-edit-contact').forEach(btn => {
                btn.onclick = function () {
                    const card = this.closest('.edit-contact-card');
                    if (card) {
                        card.remove();
                    }

                    let cards = wrapper.querySelectorAll('.edit-contact-card');

                    if (!cards.length) {
                        renderEditContacts([{ name: '', relationship: '', mobile: '' }]);
                        return;
                    }

                    cards.forEach((card, index) => {
                        const title = card.querySelector('h5');
                        if (title) title.textContent = `Contact ${index + 1}`;
                    });

                    cards.forEach(card => {
                        const deleteBtn = card.querySelector('.remove-edit-contact');
                        if (!deleteBtn) return;

                        if (cards.length === 1) {
                            deleteBtn.style.display = 'none';
                        } else {
                            deleteBtn.style.display = '';
                        }
                    });
                };
            });
        }

        // =====================================================
        // ADD NEW EDIT CONTACT
        // =====================================================
        const addEditContactBtn = document.getElementById('addEditContactBtn');

        if (addEditContactBtn) {
            addEditContactBtn.addEventListener('click', function () {
                const wrapper = document.getElementById('edit_contacts_wrapper');
                if (!wrapper) return;

                const currentContacts = [];

                wrapper.querySelectorAll('.edit-contact-card').forEach(card => {
                    currentContacts.push({
                        name: card.querySelector('input[name="contact_name[]"]')?.value || '',
                        relationship: card.querySelector('input[name="contact_relationship[]"]')?.value || '',
                        mobile: card.querySelector('input[name="contact_mobile[]"]')?.value || '',
                    });
                });

                currentContacts.push({
                    name: '',
                    relationship: '',
                    mobile: '',
                });

                renderEditContacts(currentContacts);
            });
        }

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

                // header
                const profileTitle = document.getElementById('view_profile_title');
                if (profileTitle) profileTitle.textContent = name;

                // personal
                if (document.getElementById('view_name')) document.getElementById('view_name').textContent = name;
                if (document.getElementById('view_father_name')) document.getElementById('view_father_name').textContent = fatherName;
                if (document.getElementById('view_gender')) document.getElementById('view_gender').textContent = gender;
                if (document.getElementById('view_dob')) document.getElementById('view_dob').textContent = dob;
                if (document.getElementById('view_age')) document.getElementById('view_age').textContent = age;
                if (document.getElementById('view_height')) document.getElementById('view_height').textContent = height;

                // top strip
                if (document.getElementById('view_age_top')) document.getElementById('view_age_top').textContent = age;
                if (document.getElementById('view_gender_top')) document.getElementById('view_gender_top').textContent = gender;
                if (document.getElementById('view_native_place_top')) document.getElementById('view_native_place_top').textContent = nativePlace;
                if (document.getElementById('view_working_place_top')) document.getElementById('view_working_place_top').textContent = workingPlace;

                // matrimony
                if (document.getElementById('view_star')) document.getElementById('view_star').textContent = star;
                if (document.getElementById('view_qualification')) document.getElementById('view_qualification').textContent = qualification;
                if (document.getElementById('view_occupation')) document.getElementById('view_occupation').textContent = occupation;
                if (document.getElementById('view_salary')) document.getElementById('view_salary').textContent = salary;
                if (document.getElementById('view_native_place')) document.getElementById('view_native_place').textContent = nativePlace;
                if (document.getElementById('view_working_place')) document.getElementById('view_working_place').textContent = workingPlace;

                // status
                if (document.getElementById('view_status')) document.getElementById('view_status').textContent = status;
                if (document.getElementById('view_payment')) document.getElementById('view_payment').textContent = payment;
                if (document.getElementById('view_inactive_reason')) document.getElementById('view_inactive_reason').textContent = inactiveReason;

                // contacts
                let contacts = [];
                try {
                    contacts = JSON.parse(this.dataset.contacts || '[]');
                } catch (e) {
                    contacts = [];
                }
                renderProfileContacts(contacts);

                // active badge
                const activeBadge = document.getElementById('view_active_badge');
                if (activeBadge) {
                    if (this.dataset.is_active === '1') {
                        activeBadge.className =
                            'inline-flex items-center gap-3 rounded-full border border-emerald-200 bg-emerald-50/80 px-4 py-2 text-sm font-semibold text-emerald-700 shadow-sm';
                        activeBadge.innerHTML = `
                            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-500/15">
                                <span class="h-3 w-3 rounded-full bg-emerald-500"></span>
                            </span>
                            <span>Active</span>
                        `;
                    } else {
                        activeBadge.className =
                            'inline-flex items-center gap-3 rounded-full border border-rose-200 bg-rose-50/80 px-4 py-2 text-sm font-semibold text-rose-700 shadow-sm';
                        activeBadge.innerHTML = `
                            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-rose-500/15">
                                <span class="h-3 w-3 rounded-full bg-rose-500"></span>
                            </span>
                            <span>Inactive</span>
                        `;
                    }
                }

                // paid badge
                const paidBadge = document.getElementById('view_paid_badge');
                if (paidBadge) {
                    if (this.dataset.is_paid === '1') {
                        paidBadge.className =
                            'inline-flex items-center gap-3 rounded-full border border-sky-200 bg-sky-50/80 px-4 py-2 text-sm font-semibold text-sky-700 shadow-sm';
                        paidBadge.innerHTML = `
                            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-sky-500/10 text-sky-600">
                                <i class="fa-solid fa-check text-sm"></i>
                            </span>
                            <span>Paid</span>
                        `;
                    } else {
                        paidBadge.className =
                            'inline-flex items-center gap-3 rounded-full border border-amber-200 bg-amber-50/80 px-4 py-2 text-sm font-semibold text-amber-700 shadow-sm';
                        paidBadge.innerHTML = `
                            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-amber-500/10 text-amber-600">
                                <i class="fa-solid fa-clock text-sm"></i>
                            </span>
                            <span>Unpaid</span>
                        `;
                    }
                }

                openModal(viewModal);
            });
        });

        // =====================================================
        // EDIT MODAL
        // =====================================================
        document.querySelectorAll('.edit-profile-btn').forEach(button => {
            button.addEventListener('click', function () {
                if (document.getElementById('edit_profile_id')) {
                    document.getElementById('edit_profile_id').value = this.dataset.id || '';
                }

                if (document.getElementById('edit_name')) {
                    document.getElementById('edit_name').value = this.dataset.name || '';
                }

                if (document.getElementById('edit_father_name')) {
                    document.getElementById('edit_father_name').value = this.dataset.father_name || '';
                }

                // IMPORTANT: use dob_raw for input[type="date"]
                if (document.getElementById('edit_dob')) {
                    document.getElementById('edit_dob').value = this.dataset.dob_raw || '';
                }

                if (document.getElementById('edit_height')) {
                    document.getElementById('edit_height').value = this.dataset.height || '';
                }

                if (document.getElementById('edit_salary')) {
                    document.getElementById('edit_salary').value = this.dataset.salary_raw || '';
                }

                if (document.getElementById('edit_gender_id')) {
                    document.getElementById('edit_gender_id').value = this.dataset.gender_id || '';
                }

                if (document.getElementById('edit_star_id')) {
                    document.getElementById('edit_star_id').value = this.dataset.star_id || '';
                }

                if (document.getElementById('edit_education_qualification_id')) {
                    document.getElementById('edit_education_qualification_id').value = this.dataset.education_qualification_id || '';
                }

                if (document.getElementById('edit_occupation_id')) {
                    document.getElementById('edit_occupation_id').value = this.dataset.occupation_id || '';
                }

                if (document.getElementById('edit_native_place_id')) {
                    document.getElementById('edit_native_place_id').value = this.dataset.native_place_id || '';
                }

                if (document.getElementById('edit_working_place_id')) {
                    document.getElementById('edit_working_place_id').value = this.dataset.working_place_id || '';
                }

                if (document.getElementById('edit_is_active')) {
                    document.getElementById('edit_is_active').value = this.dataset.is_active || '1';
                }

                if (document.getElementById('edit_is_paid')) {
                    document.getElementById('edit_is_paid').value = this.dataset.is_paid || '0';
                }

                if (document.getElementById('edit_inactive_reason')) {
                    document.getElementById('edit_inactive_reason').value =
                        (this.dataset.inactive_reason && this.dataset.inactive_reason !== '—')
                            ? this.dataset.inactive_reason
                            : '';
                }

                let contacts = [];
                try {
                    contacts = JSON.parse(this.dataset.contacts || '[]');
                } catch (e) {
                    contacts = [];
                }

                renderEditContacts(contacts);

                const form = document.getElementById('editProfileForm');
                if (form) {
                    form.action = `/manage-profiles/${this.dataset.id}`;
                }

                openModal(editModal);
            });
        });

        // =====================================================
        // DELETE MODAL
        // =====================================================
        document.querySelectorAll('.delete-profile-btn').forEach(button => {
            button.addEventListener('click', function () {
                const profileId = this.dataset.id || '';
                const profileName = this.dataset.name || 'this profile';

                // show profile name in modal
                document.getElementById('delete_profile_name').textContent = profileName;

                // hidden input (optional)
                document.getElementById('delete_profile_id').value = profileId;

                // set form action for DELETE route
                document.getElementById('deleteProfileForm').action = `/manage-profiles/${profileId}`;

                openModal(deleteModal);
            });
        });

        // =====================================================
        // CLOSE BUTTONS
        // =====================================================
        document.querySelectorAll('.close-view-modal').forEach(button => {
            button.addEventListener('click', () => closeModal(viewModal));
        });

        document.querySelectorAll('.close-create-modal').forEach(button => {
            button.addEventListener('click', () => closeModal(createModal));
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
        [viewModal, editModal, deleteModal, createModal].forEach(modal => {
            if (!modal) return;

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
                closeModal(createModal);
                closeModal(editModal);
                closeModal(deleteModal);
            }
        });
    });


</script>
