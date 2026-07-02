@extends('layouts.register')

@php
    $title = 'Registration Payment';
@endphp

@section('content')

    <div class="mx-auto max-w-7xl px-4 py-10">

        {{-- Success Header --}}
        <div class="overflow-hidden rounded-[28px] border border-emerald-200 bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 shadow-lg">

            <div class="flex flex-col items-center justify-between gap-5 px-6 py-6 sm:flex-row">

                {{-- Left --}}
                <div class="flex items-center gap-4">

                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white/20 backdrop-blur">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white text-emerald-600">

                            <i class="fa-solid fa-check text-xl"></i>

                        </div>

                    </div>

                    <div>

                        <h1 class="text-2xl font-bold text-white">
                            Submit Successful
                        </h1>

                        <p class="mt-1 text-sm text-emerald-50">
                            Welcome
                            <span class="font-semibold">{{ $profile->name }}</span>.
                            Complete the payment to finish your registration.
                        </p>

                    </div>

                </div>

                {{-- Right --}}
                <div class="rounded-2xl bg-white/15 px-5 py-3 backdrop-blur">

                    <p class="text-xs uppercase tracking-widest text-emerald-100">
                        Registration Fee
                    </p>

                    <p class="mt-1 text-3xl font-black text-white">
                        ₹500
                    </p>

                </div>

            </div>

        </div>
        <div class="mt-8 grid grid-cols-1 gap-8 lg:grid-cols-12">

            {{-- LEFT --}}
            <div class="space-y-6 lg:col-span-7">

                <div class="overflow-hidden rounded-[30px] border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-100 px-6 py-5">

                        <h2 class="text-xl font-bold text-slate-800">
                            Profile Summary
                        </h2>

                        <p class="text-sm text-slate-500">
                            Please verify your information before making the payment.
                        </p>

                    </div>

                    <div class="grid grid-cols-1 gap-5 p-6 sm:grid-cols-2">

                        <div>
                            <p class="text-xs uppercase tracking-wider text-slate-400">
                                Name
                            </p>

                            <p class="mt-1 font-semibold text-slate-800">
                                {{ $profile->name }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs uppercase tracking-wider text-slate-400">
                                Father Name
                            </p>

                            <p class="mt-1 font-semibold text-slate-800">
                                {{ $profile->father_name ?: '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs uppercase tracking-wider text-slate-400">
                                Gender
                            </p>

                            <p class="mt-1 font-semibold text-slate-800">
                                {{ optional($profile->gender)->name }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs uppercase tracking-wider text-slate-400">
                                Date of Birth
                            </p>

                            <p class="mt-1 font-semibold text-slate-800">
                                {{ $profile->dob ?: '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs uppercase tracking-wider text-slate-400">
                                Occupation
                            </p>

                            <p class="mt-1 font-semibold text-slate-800">
                                {{ optional($profile->occupation)->name }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs uppercase tracking-wider text-slate-400">
                                Native Place
                            </p>

                            <p class="mt-1 font-semibold text-slate-800">
                                {{ optional($profile->nativePlace)->name }}
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="lg:col-span-5">

                <form method="POST"
                      action="{{ route('profile-register.upload-payment',$profile->id) }}"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="overflow-hidden rounded-[30px] border border-slate-200 bg-white shadow-sm">

                        <div class="border-l border-slate-200 bg-gradient-to-br from-green-50 via-white to-green-50 p-8">

                            {{-- Header --}}
                            <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">

                                <div class="flex items-start gap-3">

                                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-green-500 to-emerald-400 shadow-lg">

                                        <i class="fa-solid fa-qrcode text-2xl text-white"></i>

                                    </div>

                                    <div>

                                        <h3 class="text-[22px] font-bold tracking-tight text-[#059669]">
                                            Scan & Pay
                                        </h3>

                                        <p class="mt-2 max-w-xs text-sm leading-6 text-slate-500">
                                            Scan the QR code using any UPI app and complete the registration payment.
                                        </p>

                                    </div>

                                </div>

                                <div class="flex justify-center">

                                    <div class="rounded-2xl border border-slate-200 bg-white p-3 shadow-md">

                                        <img
                                            src="{{ asset('images/qr.png') }}"
                                            alt="QR"
                                            class="h-32 w-32 rounded-xl object-cover">

                                    </div>

                                </div>

                            </div>

                            {{-- Registration Fee --}}
                            <div class="mt-8 rounded-2xl border border-green-100 bg-gradient-to-br from-green-50 to-white p-4">

                            <span class="text-xs font-semibold uppercase tracking-widest text-green-700">
                                Registration Fee
                            </span>

                                <h2 class="mt-2 text-3xl font-black text-green-600">
                                    ₹500
                                </h2>

                            </div>

                            {{-- Account Details --}}
                            <div class="mt-5 space-y-3">

                                {{-- Account Holder --}}
                                <div
                                    class="group flex items-center rounded-2xl border border-slate-200 bg-white px-4 py-3 transition duration-200 hover:border-violet-200 hover:shadow-md">

                                    <div
                                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-violet-50 text-violet-600">
                                        <i class="fa-solid fa-user"></i>
                                    </div>

                                    <div class="ml-4 flex-1">

                                        <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                                            Account Holder
                                        </p>

                                        <p class="mt-1 text-sm font-bold text-slate-800">
                                            Demo Matrimony
                                        </p>

                                    </div>

                                </div>

                                {{-- UPI ID --}}
                                <div
                                    class="group flex items-center rounded-2xl border border-slate-200 bg-white px-4 py-3 transition duration-200 hover:border-blue-200 hover:shadow-md">

                                    <div
                                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-orange-50 text-orange-500">
                                        <i class="fa-solid fa-wallet"></i>
                                    </div>

                                    <div class="ml-4 flex-1">

                                        <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                                            UPI ID
                                        </p>

                                        <p id="upiID"
                                           class="mt-1 text-sm font-bold text-slate-800">
                                            demo@upi
                                        </p>

                                    </div>

                                    <button
                                        type="button"
                                        id="copyBtn"
                                        onclick="copyUPI()"
                                        class="inline-flex items-center gap-2 rounded-xl border border-blue-100 bg-blue-50 px-4 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-100">

                                        <i class="fa-regular fa-copy text-xs"></i>

                                        <span id="copyText">
                                        Copy
                                    </span>

                                    </button>

                                </div>

                                {{-- Bank --}}
                                <div
                                    class="group flex items-center rounded-2xl border border-slate-200 bg-white px-4 py-3 transition duration-200 hover:border-sky-200 hover:shadow-md">

                                    <div
                                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-sky-50 text-sky-600">
                                        <i class="fa-solid fa-building-columns"></i>
                                    </div>

                                    <div class="ml-4 flex-1">

                                        <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                                            Bank
                                        </p>

                                        <p class="mt-1 text-sm font-bold text-slate-800">
                                            State Bank of India
                                        </p>

                                    </div>

                                </div>

                            </div>

                            {{-- Instructions --}}
                            <div class="rounded-2xl border border-amber-200 bg-gradient-to-r from-amber-50 to-orange-50 mt-2 p-5">

                                <div class="flex items-start gap-4">

                                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

                                        <i class="fa-solid fa-file-arrow-up"></i>

                                    </div>

                                    <div>

                                        <h4 class="font-semibold text-amber-800">
                                            Before Uploading
                                        </h4>

                                        <p class="mt-1 text-sm leading-6 text-amber-700">
                                            Complete the payment using the QR code, then upload a clear screenshot showing the successful transaction.
                                        </p>

                                    </div>

                                </div>

                            </div>
                            {{-- Upload Card --}}
                            <div
                                class="mt-6 rounded-2xl border border-slate-200 bg-white p-6">

                                <h3 class="text-lg font-bold text-slate-800">
                                    Upload Payment Proof
                                </h3>

                                <p class="mt-1 text-sm text-slate-500">
                                    Upload the payment screenshot after successful payment.
                                </p>

                                <div class="mt-5">

                                    <input
                                        type="file"
                                        name="payment_proof"
                                        accept="image/*"
                                        required
                                        class="block w-full rounded-2xl border border-dashed border-emerald-300 bg-emerald-50 px-4 py-4 text-sm
                                           file:mr-4
                                           file:rounded-xl
                                           file:border-0
                                           file:bg-emerald-500
                                           file:px-5
                                           file:py-2
                                           file:font-semibold
                                           file:text-white
                                           hover:file:bg-emerald-600">

                                    @error('payment_proof')
                                    <p class="mt-2 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                    @enderror

                                </div>

                                <button
                                    type="submit"
                                    class="mt-6 inline-flex w-full items-center justify-center gap-3 rounded-2xl bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 px-6 py-4 text-sm font-bold text-white shadow-lg shadow-emerald-200 transition hover:-translate-y-0.5 hover:shadow-xl">

                                    <i class="fa-solid fa-cloud-arrow-up"></i>

                                    Upload Payment Proof

                                </button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>
        async function copyUPI() {

            const upi = document.getElementById('upiID').innerText.trim();

            try {

                await navigator.clipboard.writeText(upi);

                const btn = document.getElementById('copyBtn');
                const text = document.getElementById('copyText');

                btn.classList.remove(
                    'bg-blue-50',
                    'border-blue-100',
                    'text-blue-600'
                );

                btn.classList.add(
                    'bg-green-50',
                    'border-green-200',
                    'text-green-600'
                );

                btn.innerHTML = `
                <i class="fa-solid fa-check text-xs"></i>
                <span>Copied</span>
            `;

                setTimeout(() => {

                    btn.innerHTML = `
                    <i class="fa-regular fa-copy text-xs"></i>
                    <span id="copyText">Copy</span>
                `;

                    btn.classList.remove(
                        'bg-green-50',
                        'border-green-200',
                        'text-green-600'
                    );

                    btn.classList.add(
                        'bg-blue-50',
                        'border-blue-100',
                        'text-blue-600'
                    );

                }, 1800);

            } catch (error) {

                console.error(error);

            }

        }
    </script>

@endsection
