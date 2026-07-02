@extends('layouts.register')

@php
    $title = 'Registration Successful';
@endphp

@section('content')

    <div class="relative overflow-hidden bg-gradient-to-br from-emerald-50 via-white to-cyan-50">

        {{-- Background Decorations --}}
        <div class="absolute -top-40 -left-40 h-96 w-96 rounded-full bg-emerald-200/30 blur-3xl"></div>
        <div class="absolute -right-40 top-20 h-[28rem] w-[28rem] rounded-full bg-cyan-200/30 blur-3xl"></div>
        <div class="absolute bottom-0 left-1/2 h-80 w-80 -translate-x-1/2 rounded-full bg-green-100/40 blur-3xl"></div>

        <div class="relative mx-auto flex min-h-[90vh] max-w-5xl items-center justify-center px-4 py-12">

            <div class="w-full">

                {{-- Floating Success Icon --}}
                <div class="flex justify-center">

                    <div class="relative">

                        <div class="absolute inset-0 animate-ping rounded-full bg-emerald-300 opacity-30"></div>

                        <div
                            class="relative flex h-36 w-36 items-center justify-center rounded-full bg-gradient-to-br from-emerald-500 via-green-500 to-teal-500 shadow-[0_30px_80px_rgba(16,185,129,.35)]">

                            <div
                                class="flex h-24 w-24 items-center justify-center rounded-full bg-white">

                                <i
                                    class="fa-solid fa-check text-6xl text-emerald-500"></i>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Heading --}}
                <div class="mt-10 text-center">

                <span
                    class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-white px-5 py-2 text-sm font-semibold text-emerald-700 shadow">

                    <i class="fa-solid fa-circle-check"></i>

                    Registration Completed

                </span>

                    <h1
                        class="mt-6 text-5xl font-black tracking-tight text-slate-900">

                        Congratulations!

                    </h1>

                    <p
                        class="mt-5 text-xl text-slate-600">

                        Thank you,

                        <span class="font-bold text-emerald-600">

                        {{ $profile->name }}

                    </span>

                        🎉

                    </p>

                    <p
                        class="mx-auto mt-5 max-w-2xl text-base leading-8 text-slate-500">

                        Your payment proof has been received successfully.

                        Our team will now verify your payment and review your
                        profile before publishing it on our Matrimony platform.

                    </p>

                </div>

                {{-- Pending Approval Card --}}
                <div
                    class="mx-auto mt-12 max-w-3xl rounded-[30px] border border-amber-200 bg-white p-8 shadow-lg">

                    <div class="flex flex-col items-center gap-6 md:flex-row">

                        <div
                            class="flex h-20 w-20 shrink-0 items-center justify-center rounded-3xl bg-gradient-to-br from-amber-400 to-orange-500 text-white shadow-lg">

                            <i
                                class="fa-solid fa-hourglass-half text-3xl"></i>

                        </div>

                        <div class="flex-1 text-center md:text-left">

                        <span
                            class="rounded-full bg-amber-100 px-4 py-1 text-xs font-bold uppercase tracking-widest text-amber-700">

                            Current Status

                        </span>

                            <h2
                                class="mt-4 text-2xl font-bold text-slate-800">

                                Waiting for Admin Approval

                            </h2>

                            <p
                                class="mt-3 leading-7 text-slate-600">

                                Once our administrator verifies your payment,
                                your profile will automatically become visible in
                                the Matrimony Profile Search.

                            </p>

                        </div>

                    </div>

                </div>

                {{-- Next Steps --}}
                <div class="mx-auto mt-10 max-w-4xl">

                    <h3 class="text-center text-2xl font-bold text-slate-800">
                        What Happens Next?
                    </h3>

                    <p class="mt-2 text-center text-slate-500">
                        Your registration is almost complete. Our team will take care of the remaining steps.
                    </p>

                    <div class="mt-8 grid gap-6 md:grid-cols-3">

                        {{-- Step 1 --}}
                        <div
                            class="group rounded-[28px] border border-slate-200 bg-white p-6 text-center shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                            <div
                                class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-50 text-blue-600">

                                <i class="fa-solid fa-image text-2xl"></i>

                            </div>

                            <h4 class="mt-5 text-lg font-bold text-slate-800">
                                Payment Received
                            </h4>

                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                We've received your payment screenshot successfully.
                            </p>

                        </div>

                        {{-- Step 2 --}}
                        <div
                            class="group rounded-[28px] border border-slate-200 bg-white p-6 text-center shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                            <div
                                class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">

                                <i class="fa-solid fa-user-check text-2xl"></i>

                            </div>

                            <h4 class="mt-5 text-lg font-bold text-slate-800">
                                Verification
                            </h4>

                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                Our administrator will verify your payment and profile details.
                            </p>

                        </div>

                        {{-- Step 3 --}}
                        <div
                            class="group rounded-[28px] border border-slate-200 bg-white p-6 text-center shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                            <div
                                class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">

                                <i class="fa-solid fa-heart text-2xl"></i>

                            </div>

                            <h4 class="mt-5 text-lg font-bold text-slate-800">
                                Profile Published
                            </h4>

                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                Once approved, your profile will become visible in the Matrimony search.
                            </p>

                        </div>

                    </div>

                </div>

                {{-- Divider --}}
                <div class="mx-auto mt-12 h-px max-w-3xl bg-gradient-to-r from-transparent via-slate-300 to-transparent"></div>

                {{-- Footer Message --}}
                <div class="mt-10 text-center">

                    <h3 class="text-3xl font-bold text-slate-800">
                        Thank You for Registering ❤️
                    </h3>

                    <p class="mx-auto mt-4 max-w-2xl text-base leading-8 text-slate-500">
                        We appreciate your trust in us. Our team will process your registration
                        as quickly as possible. We wish you all the very best in finding your
                        perfect life partner.
                    </p>

                </div>

                {{-- Buttons --}}
                <div class="mx-auto mt-12 flex max-w-2xl flex-col gap-4 sm:flex-row">

                    <a href="{{ route('welcome') }}"
                       class="inline-flex flex-1 items-center justify-center gap-3 rounded-2xl bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 px-6 py-4 text-sm font-bold text-white shadow-lg shadow-emerald-200 transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                        <i class="fa-solid fa-house"></i>

                        Back to Home

                    </a>

                    <a href="{{ route('profile-register.create') }}"
                       class="inline-flex flex-1 items-center justify-center gap-3 rounded-2xl border border-slate-200 bg-white px-6 py-4 text-sm font-semibold text-slate-700 shadow-sm transition duration-300 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700">

                        <i class="fa-solid fa-plus"></i>

                        Register Another Profile

                    </a>

                </div>

            </div>

        </div>

    </div>

@endsection
