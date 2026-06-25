@php
    $oldRegisterContacts = collect(old('contact_name', []))->map(function ($name, $index) {
        return [
            'name' => $name,
            'relationship' => old('contact_relationship.' . $index),
            'mobile' => old('contact_mobile.' . $index),
        ];
    })->values();

    $registerContactErrors = [
        'name' => $errors->get('contact_name.*'),
        'relationship' => $errors->get('contact_relationship.*'),
        'mobile' => $errors->get('contact_mobile.*'),
        'firstName' => $errors->first('contact_name.0'),
        'firstRelationship' => $errors->first('contact_relationship.0'),
        'firstMobile' => $errors->first('contact_mobile.0'),
    ];
@endphp

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const wrapper = document.getElementById('register_contacts_wrapper');
        const addBtn = document.getElementById('addRegisterContactBtn');
        const form = document.getElementById('profileRegisterForm');

        const oldContacts = @json($oldRegisterContacts);
        const contactErrors = @json($registerContactErrors);

        function fieldErrorHtml(message) {
            if (!message) return '';
            return `<p class="mt-2 text-xs font-medium text-rose-600">${message}</p>`;
        }

        function renderRegisterContacts(contacts = []) {
            if (!wrapper) return;

            wrapper.innerHTML = '';

            if (!Array.isArray(contacts) || !contacts.length) {
                contacts = [{ name: '', relationship: '', mobile: '' }];
            }

            contacts.forEach((contact, index) => {
                const nameError =
                    (contactErrors.name?.[index]?.[0]) ??
                    (index === 0 ? contactErrors.firstName : '');

                const relationshipError =
                    (contactErrors.relationship?.[index]?.[0]) ??
                    (index === 0 ? contactErrors.firstRelationship : '');

                const mobileError =
                    (contactErrors.mobile?.[index]?.[0]) ??
                    (index === 0 ? contactErrors.firstMobile : '');

                const card = document.createElement('div');
                card.className = 'register-contact-card rounded-[24px] border border-slate-200 bg-slate-50 p-4';

                card.innerHTML = `
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <h4 class="text-sm font-bold text-slate-800">Contact ${index + 1}</h4>
                            <p class="text-xs text-slate-500">Family / guardian contact information</p>
                        </div>

                        <button type="button"
                                class="remove-register-contact inline-flex h-9 w-9 items-center justify-center rounded-xl border border-rose-200 bg-rose-50 text-rose-600 transition hover:bg-rose-100 ${contacts.length === 1 ? 'hidden' : ''}">
                            <i class="fa-solid fa-trash text-xs"></i>
                        </button>
                    </div>

                    <div class="mt-4 space-y-4">
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Contact Name</label>
                            <input type="text"
                                   name="contact_name[]"
                                   value="${contact.name ?? ''}"
                                   class="h-11 w-full rounded-2xl border px-4 text-sm text-slate-700 outline-none transition
                                          ${nameError
                    ? 'border-rose-300 bg-rose-50 focus:border-rose-300 focus:ring-4 focus:ring-rose-100'
                    : 'border-slate-200 bg-white focus:border-violet-300 focus:ring-4 focus:ring-violet-100'}">
                            ${fieldErrorHtml(nameError)}
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Relationship</label>
                            <input type="text"
                                   name="contact_relationship[]"
                                   value="${contact.relationship ?? ''}"
                                   class="h-11 w-full rounded-2xl border px-4 text-sm text-slate-700 outline-none transition
                                          ${relationshipError
                    ? 'border-rose-300 bg-rose-50 focus:border-rose-300 focus:ring-4 focus:ring-rose-100'
                    : 'border-slate-200 bg-white focus:border-violet-300 focus:ring-4 focus:ring-violet-100'}">
                            ${fieldErrorHtml(relationshipError)}
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Mobile Number</label>
                            <input type="text"
                                   name="contact_mobile[]"
                                   value="${contact.mobile ?? ''}"
                                   class="h-11 w-full rounded-2xl border px-4 text-sm text-slate-700 outline-none transition
                                          ${mobileError
                    ? 'border-rose-300 bg-rose-50 focus:border-rose-300 focus:ring-4 focus:ring-rose-100'
                    : 'border-slate-200 bg-white focus:border-violet-300 focus:ring-4 focus:ring-violet-100'}">
                            ${fieldErrorHtml(mobileError)}
                        </div>
                    </div>
                `;

                wrapper.appendChild(card);
            });

            attachRegisterRemoveEvents();
        }

        function attachRegisterRemoveEvents() {
            wrapper.querySelectorAll('.remove-register-contact').forEach(btn => {
                btn.addEventListener('click', function () {
                    const card = this.closest('.register-contact-card');
                    if (card) card.remove();

                    const cards = wrapper.querySelectorAll('.register-contact-card');

                    if (!cards.length) {
                        renderRegisterContacts([{ name: '', relationship: '', mobile: '' }]);
                        return;
                    }

                    cards.forEach((card, index) => {
                        const title = card.querySelector('h4');
                        if (title) {
                            title.textContent = `Contact ${index + 1}`;
                        }
                    });

                    if (cards.length === 1) {
                        const removeBtn = cards[0].querySelector('.remove-register-contact');
                        if (removeBtn) {
                            removeBtn.classList.add('hidden');
                        }
                    }
                });
            });
        }

        if (addBtn) {
            addBtn.addEventListener('click', function () {
                const currentContacts = [];

                wrapper.querySelectorAll('.register-contact-card').forEach(card => {
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

                renderRegisterContacts(currentContacts);
            });
        }

        if (form) {
            form.addEventListener('submit', function () {
                const submitBtn = form.querySelector('button[type="submit"]');

                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.classList.add('opacity-70', 'cursor-not-allowed');
                    submitBtn.innerHTML = `
                        <i class="fa-solid fa-spinner fa-spin text-xs"></i>
                        Submitting...
                    `;
                }
            });
        }

        if (oldContacts.length) {
            renderRegisterContacts(oldContacts);
        } else {
            renderRegisterContacts();
        }
    });
</script>
