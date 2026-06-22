@extends('layouts.master')

@php
    $title = 'Dashboard';
    $pageTitle = 'Dashboard';
@endphp

@section('content')
    <div class="space-y-6">

        <section class="overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-sm">
            <div class="grid grid-cols-1 xl:grid-cols-12">

                {{-- LEFT SIDE --}}
                <div class="relative xl:col-span-8">
                    {{-- soft background --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-rose-50 via-white to-amber-50"></div>
                    <div class="absolute right-10 top-10 h-32 w-32 rounded-full bg-rose-100/60 blur-3xl"></div>
                    <div class="absolute bottom-0 left-1/3 h-28 w-28 rounded-full bg-amber-100/70 blur-3xl"></div>

                    <div class="relative z-10 px-6 py-8 sm:px-8 sm:py-9">
                        <div class="flex items-start gap-5">
                            <div
                                class="flex h-16 w-16 shrink-0 items-center justify-center rounded-[24px] bg-white text-rose-500 shadow-md ring-1 ring-rose-100">
                                <i class="fa-solid fa-house-chimney-window text-xl"></i>
                            </div>

                            <div class="min-w-0">
                                <span
                                    class="inline-flex items-center rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-emerald-600">
                                    Welcome
                                </span>

                                <h1 class="mt-4 text-2xl font-bold tracking-[0.05em] text-slate-800 sm:text-3xl xl:text-[2.25rem] xl:leading-tight">
                                    Welcome to
                                    <span class="bg-gradient-to-r from-rose-500 via-pink-500 to-amber-500 bg-clip-text text-transparent">
        Saivas
    </span>
                                    <span class="text-slate-800">Admin Dashboard</span>
                                </h1>

                                <p class="mt-3 max-w-3xl text-sm leading-7 text-slate-500 sm:text-[15px]">
                                    Manage matrimony profiles, maintain records, and organize your profile database from one clean admin workspace.
                                </p>

                                {{-- elegant soft cards --}}
                                <div class="mt-7 grid grid-cols-1 gap-3 sm:grid-cols-3">
                                    <div class="rounded-2xl border border-white/80 bg-white/90 px-4 py-4 shadow-sm backdrop-blur">
                                        <div class="flex items-center gap-3">
                                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                                                <i class="fa-solid fa-address-card text-sm"></i>
                                            </span>
                                            <div>
                                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">
                                                    Module
                                                </p>
                                                <p class="text-sm font-semibold text-slate-700">
                                                    Profiles
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rounded-2xl border border-white/80 bg-white/90 px-4 py-4 shadow-sm backdrop-blur">
                                        <div class="flex items-center gap-3">
                                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                                                <i class="fa-solid fa-filter text-sm"></i>
                                            </span>
                                            <div>
                                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">
                                                    Focus
                                                </p>
                                                <p class="text-sm font-semibold text-slate-700">
                                                    Filters
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rounded-2xl border border-white/80 bg-white/90 px-4 py-4 shadow-sm backdrop-blur">
                                        <div class="flex items-center gap-3">
                                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                                                <i class="fa-solid fa-shield-halved text-sm"></i>
                                            </span>
                                            <div>
                                                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">
                                                    Access
                                                </p>
                                                <p class="text-sm font-semibold text-slate-700">
                                                    Admin Panel
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT SIDE --}}
                <div class="border-t border-slate-100 bg-gradient-to-b from-slate-50 to-white xl:col-span-4 xl:border-l xl:border-t-0">
                    <div class="h-full px-6 py-8 sm:px-8 sm:py-9">

                        {{-- Workspace header --}}
                        <div class="rounded-[28px] border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="flex items-center gap-4">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-50 text-slate-700 ring-1 ring-slate-100">
                                    <i class="fa-solid fa-briefcase text-lg"></i>
                                </div>

                                <div>
                                    <p class="text-base font-bold tracking-tight text-slate-800">
                                        Admin Workspace
                                    </p>
                                    <p class="text-sm text-slate-500">
                                        Quick overview of this panel
                                    </p>
                                </div>
                            </div>

                            <div class="mt-6 space-y-3">
                                <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                    <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">
                                        Current Section
                                    </p>
                                    <p class="mt-1 text-sm font-semibold text-slate-700">
                                        Dashboard
                                    </p>
                                </div>

                                <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                    <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">
                                        Management
                                    </p>
                                    <p class="mt-1 text-sm font-semibold text-slate-700">
                                        Profiles & Records
                                    </p>
                                </div>

                                <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                    <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">
                                        System Access
                                    </p>
                                    <p class="mt-1 text-sm font-semibold text-slate-700">
                                        Administrator Panel
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection
