@php
    $male = $genders->firstWhere('name', 'Male');
    $female = $genders->firstWhere('name', 'Female');
@endphp

<div
    id="genderSelectionModal"
    class="fixed inset-0 z-[999] flex items-center justify-center bg-slate-950/70 px-4 py-6 backdrop-blur-[6px] sm:px-6"
>
    <div class="relative w-full max-w-4xl overflow-hidden rounded-[32px] border border-white/20 bg-white shadow-[0_30px_80px_rgba(15,23,42,0.35)]">

        {{-- soft background glow --}}
        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <div class="absolute -left-16 -top-16 h-52 w-52 rounded-full bg-indigo-100 blur-3xl"></div>
            <div class="absolute -right-16 top-10 h-56 w-56 rounded-full bg-pink-100 blur-3xl"></div>
        </div>

        <div class="relative z-10">
            {{-- Header --}}
            <div class="px-6 pt-8 pb-4 text-center sm:px-8 sm:pt-10">
                <div class="mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-[28px] bg-gradient-to-br from-amber-400 via-rose-500 to-pink-500 text-white shadow-lg shadow-rose-200/60">
                    <i class="fa-solid fa-people-group text-3xl"></i>
                </div>

                <h2 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
                    Choose Profile Type
                </h2>

                <p class="mx-auto mt-3 max-w-xl text-sm leading-6 text-slate-500 sm:text-base">
                    Select the profile category you want to browse.
                </p>
            </div>

            {{-- Options --}}
            <div class="px-5 pb-8 pt-4 sm:px-8 sm:pb-10">
                <form method="GET" action="{{ route('profiles.index') }}" id="genderSelectForm">
                    <input type="hidden" name="gender_id" id="modal_gender_id">

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        {{-- Male --}}
                        <button
                            type="button"
                            onclick="submitGender('{{ $male?->id }}')"
                            class="group relative overflow-hidden rounded-[28px] border border-slate-200 bg-white p-8 text-center shadow-sm transition duration-300 hover:-translate-y-1 hover:border-indigo-300 hover:bg-indigo-50 hover:shadow-xl hover:shadow-indigo-100/60 sm:p-10"
                        >
                            <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-[28px] bg-indigo-50 text-indigo-600 transition duration-300 group-hover:bg-indigo-600 group-hover:text-white sm:h-28 sm:w-28">
                                <i class="fa-solid fa-person text-4xl sm:text-5xl"></i>
                            </div>

                            <h3 class="mt-6 text-2xl font-bold text-slate-800 sm:text-3xl">
                                Male
                            </h3>
                        </button>

                        {{-- Female --}}
                        <button
                            type="button"
                            onclick="submitGender('{{ $female?->id }}')"
                            class="group relative overflow-hidden rounded-[28px] border border-slate-200 bg-white p-8 text-center shadow-sm transition duration-300 hover:-translate-y-1 hover:border-pink-300 hover:bg-pink-50 hover:shadow-xl hover:shadow-pink-100/60 sm:p-10"
                        >
                            <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-[28px] bg-pink-50 text-pink-600 transition duration-300 group-hover:bg-pink-600 group-hover:text-white sm:h-28 sm:w-28">
                                <i class="fa-solid fa-person-dress text-4xl sm:text-5xl"></i>
                            </div>

                            <h3 class="mt-6 text-2xl font-bold text-slate-800 sm:text-3xl">
                                Female
                            </h3>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function submitGender(genderId) {
        document.getElementById('modal_gender_id').value = genderId;
        document.getElementById('genderSelectForm').submit();
    }
</script>
