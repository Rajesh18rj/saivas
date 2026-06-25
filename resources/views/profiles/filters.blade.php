@php
    $selectedGenderId = request('gender_id');
    $selectedGender = $genders->firstWhere('id', $selectedGenderId);
@endphp

@if (request()->filled('gender_id'))
<div class="rounded-2xl border border-slate-200 bg-white shadow-sm" id="profileFilterCard" data-open="true">
    {{-- Collapsible header --}}
    <button type="button" id="filterCardToggle" class="flex w-full items-center justify-between gap-3 p-4">
        <div class="flex items-center gap-3">
            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-amber-400 to-rose-500 text-white">
                <i class="fa-solid fa-sliders text-xs"></i>
            </div>
            <div class="text-left">
                <h2 class="text-sm font-bold text-slate-800">Filters</h2>
                <p id="filterSummaryText" class="text-xs text-slate-400">No filters applied</p>
            </div>
        </div>

        <div class="flex items-center gap-3">
            @if ($selectedGender)
                <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold
            {{ strtolower($selectedGender->name) === 'male'
                ? 'bg-indigo-50 text-indigo-700'
                : 'bg-pink-50 text-pink-700' }}">
            <i class="fa-solid {{ strtolower($selectedGender->name) === 'male' ? 'fa-person' : 'fa-person-dress' }}"></i>
            {{ $selectedGender->name }} Profiles
        </span>
            @endif

                <a href="{{ route('profiles.index') }}"
                   class="group inline-flex items-center gap-2 rounded-xl border border-rose-200 bg-gradient-to-r from-amber-50 to-rose-50 px-3.5 py-2 text-xs font-semibold text-rose-700 shadow-sm transition duration-200 hover:-translate-y-[1px] hover:border-rose-300 hover:from-amber-100 hover:to-rose-100 hover:text-rose-800">
                    <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-white text-rose-500 shadow-sm transition group-hover:bg-gradient-to-br group-hover:from-amber-500 group-hover:to-rose-500 group-hover:text-white">
                        <i class="fa-solid fa-people-arrows-left-right text-[11px]"></i>
                    </span>
                    <span>Change Gender</span>
                </a>

            <a href="{{ route('profiles.index', ['gender_id' => request('gender_id')]) }}"
               id="filterClearAllBtn"
               class="hidden text-xs font-semibold text-rose-500 transition hover:text-rose-600">
                Clear all
            </a>

            <i class="filter-card-chev fa-solid fa-chevron-down text-xs text-slate-400 transition-transform duration-300"></i>
        </div>
    </button>

    <div class="filter-card-body-wrap" id="filterCardBody">
        <div class="filter-card-body-inner">
            <form method="GET" action="{{ route('profiles.index') }}" class="space-y-4 border-t border-slate-100 p-4">
                <input type="hidden" name="gender_id" value="{{ request('gender_id') }}">
                {{-- Dropdown filter row --}}
                <div class="flex flex-wrap items-center gap-2">

                    {{-- Salary --}}
                    <div class="filter-dd relative" data-dd-name="Salary">
                        <button type="button" class="dd-btn inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm font-medium text-slate-600 transition hover:border-slate-300">
                            <i class="fa-solid fa-indian-rupee-sign text-[11px] text-amber-500"></i>
                            <span class="dd-label">Salary</span>
                            <i class="dd-chevron fa-solid fa-chevron-down text-[10px] text-slate-400 transition-transform"></i>
                        </button>
                        <div class="filter-pop w-64 rounded-2xl border border-slate-200 bg-white p-4 shadow-lg">
                            <div class="grid grid-cols-2 gap-2">
                                <div class="relative">
                                    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-[10px] font-semibold text-slate-400">MIN</span>
                                    <input
                                        type="number"
                                        step="0.01"
                                        name="salary_min"
                                        value="{{ request('salary_min') }}"
                                        placeholder="0"
                                        class="salary-input w-full rounded-lg border border-slate-200 py-2 pl-9 pr-2 text-sm outline-none focus:border-rose-400"
                                    >
                                </div>
                                <div class="relative">
                                    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-[10px] font-semibold text-slate-400">MAX</span>
                                    <input
                                        type="number"
                                        step="0.01"
                                        name="salary_max"
                                        value="{{ request('salary_max') }}"
                                        placeholder="0"
                                        class="salary-input w-full rounded-lg border border-slate-200 py-2 pl-9 pr-2 text-sm outline-none focus:border-rose-400"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Qualification --}}
                    <div class="filter-dd relative" data-dd-name="Qualification">
                        <button type="button" class="dd-btn inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm font-medium text-slate-600 transition hover:border-slate-300">
                            <i class="fa-solid fa-graduation-cap text-[11px] text-amber-500"></i>
                            <span class="dd-label">Qualification</span>
                            <i class="dd-chevron fa-solid fa-chevron-down text-[10px] text-slate-400 transition-transform"></i>
                        </button>
                        <div class="filter-pop w-64 rounded-2xl border border-slate-200 bg-white p-3 shadow-lg">
                            <div class="pop-scroll max-h-52 space-y-0.5 overflow-y-auto pr-1">
                                @foreach ($educations as $education)
                                    <label class="flex cursor-pointer items-center gap-2.5 rounded-lg px-2 py-1.5 text-sm text-slate-600 hover:bg-rose-50/60">
                                    <span class="chk-wrap">
                                        <input
                                            type="checkbox"
                                            class="dd-input"
                                            name="education_qualification_id[]"
                                            value="{{ $education->id }}"
                                            @checked(in_array($education->id, (array) request('education_qualification_id', [])))
                                        >
                                        <span class="chk-box"><i class="fa-solid fa-check"></i></span>
                                    </span>
                                        {{ $education->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Age --}}
                    <div class="filter-dd relative" data-dd-name="Age">
                        <button type="button" class="dd-btn inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm font-medium text-slate-600 transition hover:border-slate-300">
                            <i class="fa-solid fa-user-clock text-[11px] text-amber-500"></i>
                            <span class="dd-label">Age</span>
                            <i class="dd-chevron fa-solid fa-chevron-down text-[10px] text-slate-400 transition-transform"></i>
                        </button>

                        <div class="filter-pop w-64 rounded-2xl border border-slate-200 bg-white p-4 shadow-lg">
                            <div class="grid grid-cols-2 gap-2">
                                <div class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-[10px] font-semibold text-slate-400">
                    MIN
                </span>
                                    <input
                                        type="number"
                                        name="age_min"
                                        value="{{ request('age_min') }}"
                                        placeholder=""
                                        min="1"
                                        class="salary-input w-full rounded-lg border border-slate-200 py-2 pl-9 pr-2 text-sm outline-none focus:border-rose-400"
                                    >
                                </div>

                                <div class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-[10px] font-semibold text-slate-400">
                    MAX
                </span>
                                    <input
                                        type="number"
                                        name="age_max"
                                        value="{{ request('age_max') }}"
                                        placeholder=""
                                        min="1"
                                        class="salary-input w-full rounded-lg border border-slate-200 py-2 pl-9 pr-2 text-sm outline-none focus:border-rose-400"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Star --}}
                    <div class="filter-dd relative" data-dd-name="Star">
                        <button type="button" class="dd-btn inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm font-medium text-slate-600 transition hover:border-slate-300">
                            <i class="fa-solid fa-star text-[11px] text-amber-500"></i>
                            <span class="dd-label">Star</span>
                            <i class="dd-chevron fa-solid fa-chevron-down text-[10px] text-slate-400 transition-transform"></i>
                        </button>
                        <div class="filter-pop w-64 rounded-2xl border border-slate-200 bg-white p-3 shadow-lg">
                            <div class="pop-scroll max-h-52 space-y-0.5 overflow-y-auto pr-1">
                                @foreach ($stars as $star)
                                    <label class="flex cursor-pointer items-center gap-2.5 rounded-lg px-2 py-1.5 text-sm text-slate-600 hover:bg-rose-50/60">
                                    <span class="chk-wrap">
                                        <input
                                            type="checkbox"
                                            class="dd-input"
                                            name="star_id[]"
                                            value="{{ $star->id }}"
                                            @checked(in_array($star->id, (array) request('star_id', [])))
                                        >
                                        <span class="chk-box"><i class="fa-solid fa-check"></i></span>
                                    </span>
                                        {{ $star->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Job Location --}}
                    <div class="filter-dd relative" data-dd-name="Job location">
                        <button type="button" class="dd-btn inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm font-medium text-slate-600 transition hover:border-slate-300">
                            <i class="fa-solid fa-briefcase text-[11px] text-amber-500"></i>
                            <span class="dd-label">Job location</span>
                            <i class="dd-chevron fa-solid fa-chevron-down text-[10px] text-slate-400 transition-transform"></i>
                        </button>
                        <div class="filter-pop w-64 rounded-2xl border border-slate-200 bg-white p-3 shadow-lg">
                            <div class="pop-scroll max-h-52 space-y-0.5 overflow-y-auto pr-1">
                                @foreach ($workingPlaces as $workingPlace)
                                    <label class="flex cursor-pointer items-center gap-2.5 rounded-lg px-2 py-1.5 text-sm text-slate-600 hover:bg-rose-50/60">
                                    <span class="chk-wrap">
                                        <input
                                            type="checkbox"
                                            class="dd-input"
                                            name="working_place_id[]"
                                            value="{{ $workingPlace->id }}"
                                            @checked(in_array($workingPlace->id, (array) request('working_place_id', [])))
                                        >
                                        <span class="chk-box"><i class="fa-solid fa-check"></i></span>
                                    </span>
                                        {{ $workingPlace->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Native Place --}}
                    <div class="filter-dd relative" data-dd-name="Native place">
                        <button type="button" class="dd-btn inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm font-medium text-slate-600 transition hover:border-slate-300">
                            <i class="fa-solid fa-location-dot text-[11px] text-amber-500"></i>
                            <span class="dd-label">Native place</span>
                            <i class="dd-chevron fa-solid fa-chevron-down text-[10px] text-slate-400 transition-transform"></i>
                        </button>
                        <div class="filter-pop w-64 rounded-2xl border border-slate-200 bg-white p-3 shadow-lg">
                            <div class="pop-scroll max-h-52 space-y-0.5 overflow-y-auto pr-1">
                                @foreach ($nativePlaces as $nativePlace)
                                    <label class="flex cursor-pointer items-center gap-2.5 rounded-lg px-2 py-1.5 text-sm text-slate-600 hover:bg-rose-50/60">
                                    <span class="chk-wrap">
                                        <input
                                            type="checkbox"
                                            class="dd-input"
                                            name="native_place_id[]"
                                            value="{{ $nativePlace->id }}"
                                            @checked(in_array($nativePlace->id, (array) request('native_place_id', [])))
                                        >
                                        <span class="chk-box"><i class="fa-solid fa-check"></i></span>
                                    </span>
                                        {{ $nativePlace->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-2.5 pt-1">
                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-amber-500 to-rose-500 px-4 py-2 text-sm font-semibold text-white shadow-sm shadow-rose-200 transition hover:from-amber-600 hover:to-rose-600 active:scale-[0.98]">
                        <i class="fa-solid fa-filter text-xs"></i>
                        Apply filters
                    </button>
                    <a href="{{ route('profiles.index', ['gender_id' => request('gender_id')]) }}"
                       class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100 active:scale-[0.98]">
                        <i class="fa-solid fa-rotate-left text-xs"></i>
                        Reset
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

<style>
    .filter-card-body-wrap {
        display: grid;
        grid-template-rows: 1fr;
        transition: grid-template-rows 0.3s ease;
    }
    #profileFilterCard[data-open="false"] .filter-card-body-wrap {
        grid-template-rows: 0fr;
    }
    .filter-card-body-inner {
        overflow: hidden;
        min-height: 0;
    }
    #profileFilterCard[data-open="false"] .filter-card-chev {
        transform: rotate(-90deg);
    }

    /* Popover — position: fixed, placed by JS, escapes ANY ancestor's overflow:hidden */
    .filter-pop {
        position: fixed;
        z-index: 9999;
        width: 16rem;
        opacity: 0;
        transform: translateY(-6px) scale(0.98);
        pointer-events: none;
        transition: opacity 0.15s ease, transform 0.15s ease;
        transform-origin: top left;
    }
    .filter-dd.open .filter-pop {
        opacity: 1;
        transform: translateY(0) scale(1);
        pointer-events: auto;
    }
    .filter-dd.open .dd-chevron {
        transform: rotate(180deg);
    }
    .filter-dd.has-value .dd-btn {
        border-color: #fb7185;
        background: #fff1f2;
        color: #be123c;
    }
    .filter-dd.has-value .dd-btn i {
        color: #f43f5e;
    }

    .pop-scroll::-webkit-scrollbar { width: 6px; }
    .pop-scroll::-webkit-scrollbar-track { background: transparent; }
    .pop-scroll::-webkit-scrollbar-thumb { background-color: #fda4af; border-radius: 999px; }

    .chk-wrap {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 17px;
        height: 17px;
        flex-shrink: 0;
    }
    .chk-wrap input {
        position: absolute;
        inset: 0;
        margin: 0;
        opacity: 0;
        cursor: pointer;
    }
    .chk-box {
        width: 17px;
        height: 17px;
        border-radius: 5px;
        border: 1.5px solid #cbd5e1;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.15s ease;
        pointer-events: none;
    }
    .chk-wrap input:checked + .chk-box {
        background: linear-gradient(135deg, #f59e0b, #f43f5e);
        border-color: transparent;
    }
    .chk-wrap input:focus-visible + .chk-box {
        box-shadow: 0 0 0 3px rgba(244, 63, 94, 0.18);
    }
    .chk-box i {
        font-size: 9px;
        color: white;
        opacity: 0;
        transform: scale(0.5);
        transition: all 0.15s ease;
    }
    .chk-wrap input:checked + .chk-box i {
        opacity: 1;
        transform: scale(1);
    }
</style>

<script>
    class AdvancedProfileFilters {
        constructor(card) {
            this.card = card;
            if (!this.card) return;
            this.dropdowns = [...this.card.querySelectorAll('.filter-dd')];
            this.summaryText = this.card.querySelector('#filterSummaryText');
            this.clearAllBtn = this.card.querySelector('#filterClearAllBtn');

            this.bindCardCollapse();
            this.bindDropdowns();
            this.bindOutsideClick();
            this.bindCheckboxesAndSalary();
            this.refreshAll();
        }

        bindCardCollapse() {
            const toggle = this.card.querySelector('#filterCardToggle');
            toggle.addEventListener('click', (e) => {
                if (e.target.closest('#filterClearAllBtn')) return;
                const isOpen = this.card.dataset.open !== 'false';
                this.card.dataset.open = isOpen ? 'false' : 'true';
                // close any open popover when the card itself collapses
                this.dropdowns.forEach(o => o.classList.remove('open'));
            });
        }

        bindDropdowns() {
            this.dropdowns.forEach(dd => {
                const btn = dd.querySelector('.dd-btn');
                const pop = dd.querySelector('.filter-pop');

                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const isOpen = dd.classList.contains('open');
                    this.dropdowns.forEach(o => o.classList.remove('open'));
                    if (!isOpen) {
                        this.positionPopover(btn, pop);
                        dd.classList.add('open');
                    }
                });

                // keep popover open while interacting inside it
                if (pop) pop.addEventListener('click', (e) => e.stopPropagation());
            });

            // reposition the open popover if the page scrolls or resizes
            window.addEventListener('scroll', () => this.repositionOpenPopover(), true);
            window.addEventListener('resize', () => this.repositionOpenPopover());
        }

        positionPopover(btn, pop) {
            const rect = btn.getBoundingClientRect();
            const popWidth = 256; // matches w-64
            let left = rect.left;
            if (left + popWidth > window.innerWidth - 16) {
                left = window.innerWidth - popWidth - 16;
            }
            if (left < 16) left = 16;
            pop.style.top = `${rect.bottom + 8}px`;
            pop.style.left = `${left}px`;
        }

        repositionOpenPopover() {
            const openDd = this.dropdowns.find(dd => dd.classList.contains('open'));
            if (!openDd) return;
            const btn = openDd.querySelector('.dd-btn');
            const pop = openDd.querySelector('.filter-pop');
            this.positionPopover(btn, pop);
        }

        bindOutsideClick() {
            document.addEventListener('click', () => {
                this.dropdowns.forEach(o => o.classList.remove('open'));
            });
        }

        bindCheckboxesAndSalary() {
            this.card.querySelectorAll('.dd-input').forEach(input => {
                input.addEventListener('change', () => this.refreshAll());
            });
            this.card.querySelectorAll('.salary-input').forEach(input => {
                input.addEventListener('input', () => this.refreshAll());
            });
        }

        refreshAll() {
            let totalActive = 0;

            this.dropdowns.forEach(dd => {
                const name = dd.dataset.ddName;
                const label = dd.querySelector('.dd-label');
                const checkboxes = dd.querySelectorAll('.dd-input');
                const salaryInputs = dd.querySelectorAll('.salary-input');

                if (checkboxes.length) {
                    const checkedCount = dd.querySelectorAll('.dd-input:checked').length;
                    if (checkedCount > 0) {
                        label.textContent = checkedCount === 1
                            ? dd.querySelector('.dd-input:checked').closest('label').textContent.trim()
                            : `${name} (${checkedCount})`;
                        dd.classList.add('has-value');
                        totalActive += checkedCount;
                    } else {
                        label.textContent = name;
                        dd.classList.remove('has-value');
                    }
                } else if (salaryInputs.length) {
                    const [min, max] = salaryInputs;
                    if (min.value || max.value) {
                        label.textContent = `${name}: ${min.value || '0'}–${max.value || '∞'}`;
                        dd.classList.add('has-value');
                        totalActive += 1;
                    } else {
                        label.textContent = name;
                        dd.classList.remove('has-value');
                    }
                }
            });

            if (this.summaryText) {
                this.summaryText.textContent = totalActive > 0
                    ? `${totalActive} filter${totalActive > 1 ? 's' : ''} applied`
                    : 'No filters applied';
            }
            if (this.clearAllBtn) {
                this.clearAllBtn.classList.toggle('hidden', totalActive === 0);
            }
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        new AdvancedProfileFilters(document.getElementById('profileFilterCard'));
    });
</script>
