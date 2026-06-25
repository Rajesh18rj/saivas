<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Matrimony Profile Registration' }}</title>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(16,185,129,0.10),_transparent_32%),radial-gradient(circle_at_right,_rgba(6,182,212,0.08),_transparent_28%),#f8fafc] text-slate-800">

{{-- ===================================================== --}}
{{-- PUBLIC TOP BAR --}}
{{-- ===================================================== --}}
<header class="sticky top-0 z-40 border-b border-white/60 bg-white/75 backdrop-blur-xl">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-rose-500 via-pink-500 to-amber-500 text-white shadow-lg shadow-emerald-200/50">
                <i class="fa-solid fa-heart text-sm"></i>
            </div>

            <div>
                <h1 class="text-base font-black tracking-wide text-slate-900 sm:text-lg">
                    Saiva Makkal Peravai
                </h1>
                <p class="text-xs text-slate-500 sm:text-sm">
                    Profile Registration
                </p>
            </div>
        </div>

        <div class="hidden items-center gap-3 sm:flex">
            <a href="{{ url('/') }}"
               class="inline-flex items-center gap-2 rounded-2xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">
                <i class="fa-solid fa-house text-xs"></i>
                Home
            </a>

            <a href="{{ route('profile-register.create') }}"
               class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-rose-500 via-pink-500 to-amber-500 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-200/60 transition hover:translate-y-[-1px] hover:shadow-xl">
                <i class="fa-solid fa-user-plus text-xs"></i>
                Register Profile
            </a>
        </div>
    </div>
</header>

{{-- ===================================================== --}}
{{-- PAGE CONTENT --}}
{{-- ===================================================== --}}
<main class="min-h-[calc(100vh-140px)]">
    @yield('content')
</main>

{{-- ===================================================== --}}
{{-- PUBLIC FOOTER --}}
{{-- ===================================================== --}}
<footer class="border-t border-slate-200/80 bg-white/70 backdrop-blur">
    <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-6 text-sm text-slate-500 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
        <p>
            © {{ now()->year }} saivamakkalperavai. All rights reserved.
        </p>

        <div class="flex flex-wrap items-center gap-4">
                <span class="inline-flex items-center gap-2">
                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                    Profile Registration
                </span>

            <span class="inline-flex items-center gap-2">
                    <span class="h-2 w-2 rounded-full bg-cyan-500"></span>
                    Admin Approval Required
                </span>
        </div>
    </div>
</footer>

{{-- ===================================================== --}}
{{-- SWEET ALERTS --}}
{{-- ===================================================== --}}
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#f0fdf4',
                color: '#14532d',
                iconColor: '#22c55e',
                customClass: {
                    popup: 'rounded-2xl border border-emerald-200 shadow-[0_18px_45px_rgba(16,185,129,0.18)] px-3 py-2',
                    title: 'text-sm font-semibold'
                }
            });
        });
    </script>
@endif

@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: @json(session('error')),
                showConfirmButton: false,
                timer: 3200,
                timerProgressBar: true,
                background: '#fef2f2',
                color: '#991b1b',
                iconColor: '#ef4444',
                customClass: {
                    popup: 'rounded-2xl border border-rose-200 shadow-[0_18px_45px_rgba(239,68,68,0.16)] px-3 py-2',
                    title: 'text-sm font-semibold'
                }
            });
        });
    </script>
@endif

@stack('scripts')
</body>
</html>
