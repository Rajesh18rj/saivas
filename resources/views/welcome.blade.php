<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saivaperumakkalperavai – Matrimony Registration</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root {
            --saffron: #E8550A;
            --saffron-light: #FFF0E8;
            --crimson: #9B1C1C;
            --gold: #C8860A;
            --gold-light: #FEF3C7;
            --cream: #FDFAF5;
            --ink: #1C1410;
            --muted: #6B5E52;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--cream);
            color: var(--ink);
        }

        /* ── DISPLAY FONT ── */
        .font-display { font-family: 'Playfair Display', Georgia, serif; }

        /* ── HERO ── */
        .hero-section {
            min-height: 100svh;
            background:
                linear-gradient(160deg, rgba(28, 20, 16, 0.82) 0%, rgba(155, 28, 28, 0.55) 60%, rgba(200, 134, 10, 0.35) 100%),
                url('https://images.unsplash.com/photo-1601136591272-21f3e5f68abe?q=80&w=1920&auto=format&fit=crop') center/cover no-repeat;
            position: relative;
            overflow: hidden;
        }
        .hero-section::after {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
        }

        /* ── NAV GLASS ── */
        .nav-glass {
            background: rgba(28, 20, 16, 0.45);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        /* ── KOLAM ACCENT ── */
        .kolam-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--gold);
            display: inline-block;
        }

        /* ── CARDS ── */
        .feature-card {
            background: #fff;
            border: 1px solid rgba(200, 134, 10, 0.15);
            border-radius: 20px;
            transition: transform 0.22s ease, box-shadow 0.22s ease;
        }
        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 24px 48px rgba(28, 20, 16, 0.10);
        }

        .stat-card {
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.18);
            border-radius: 18px;
        }

        /* ── HIGHLIGHT PANEL ── */
        .panel-glass {
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(200,134,10,0.2);
            border-radius: 28px;
            box-shadow: 0 32px 80px rgba(28, 20, 16, 0.12);
        }

        /* ── SECTION CHIP ── */
        .section-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--saffron-light);
            color: var(--saffron);
            border: 1px solid rgba(232, 85, 10, 0.2);
            border-radius: 100px;
            padding: 6px 16px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        /* ── STEP CONNECTOR ── */
        .step-line {
            position: absolute;
            top: 28px;
            left: calc(50% + 40px);
            width: calc(100% - 80px);
            height: 1px;
            background: linear-gradient(90deg, var(--gold), transparent);
        }

        /* ── CTA SECTION ── */
        .cta-section {
            background:
                linear-gradient(135deg, rgba(28,20,16,0.96) 0%, rgba(155,28,28,0.85) 100%),
                url('https://images.unsplash.com/photo-1604017011826-d3b4c23f8914?q=80&w=1200&auto=format&fit=crop') center/cover no-repeat;
            border-radius: 32px;
        }

        /* ── BTN ── */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, var(--saffron), var(--gold));
            color: #fff;
            font-weight: 700;
            font-size: 14px;
            padding: 14px 28px;
            border-radius: 14px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            box-shadow: 0 8px 24px rgba(232, 85, 10, 0.35);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(232, 85, 10, 0.45);
        }

        .btn-outline-white {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.1);
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            padding: 14px 28px;
            border-radius: 14px;
            border: 1px solid rgba(255,255,255,0.25);
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            backdrop-filter: blur(8px);
        }
        .btn-outline-white:hover {
            background: rgba(255,255,255,0.18);
        }

        /* ── PHOTO COLLAGE ── */
        .photo-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 200px 160px;
            gap: 10px;
        }
        .photo-grid img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 16px;
        }
        .photo-grid .span-2 {
            grid-column: span 2;
            height: 200px;
        }

        /* ── LOGO PLACEHOLDER ── */
        .logo-slot {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: rgba(255,255,255,0.12);
            border: 1.5px dashed rgba(255,255,255,0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.5);
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-align: center;
            line-height: 1.2;
            flex-shrink: 0;
            text-transform: uppercase;
        }

        /* ── GALLERY ROW ── */
        .gallery-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }
        .gallery-row img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 18px;
        }

        /* ── FOOTER ── */
        .footer-band {
            background: var(--ink);
            color: rgba(255,255,255,0.6);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .gallery-row { grid-template-columns: 1fr; }
            .gallery-row img { height: 180px; }
            .photo-grid { grid-template-rows: 160px 130px; }
        }
        @media (max-width: 640px) {
            .photo-grid .span-2 { height: 160px; }
        }

        /* ── BADGE ── */
        .badge-live {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 100px;
            padding: 7px 14px;
            font-size: 12.5px;
            font-weight: 500;
            color: rgba(255,255,255,0.9);
            backdrop-filter: blur(8px);
        }
        .live-dot {
            width: 7px; height: 7px;
            border-radius: 50%;
            background: #4ADE80;
            box-shadow: 0 0 0 3px rgba(74,222,128,0.25);
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        /* ── DIVIDER MOTIF ── */
        .divider-motif {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--gold);
            font-size: 18px;
        }
        .divider-motif::before,
        .divider-motif::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(200,134,10,0.3), transparent);
        }
    </style>
</head>
<body>

{{-- ========================= STICKY NAV ========================= --}}
<header class="nav-glass fixed inset-x-0 top-0 z-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-18">

            {{-- LOGO SLOT + BRAND --}}
            <a href="/" class="flex items-center gap-3 min-w-0">
                {{-- ★ DROP YOUR LOGO IMAGE HERE ★
                     Replace this div with:
                     <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-12 rounded-xl object-contain">
                --}}
                <div class="logo-slot">
                    <span>Your<br>Logo</span>
                </div>
                <div class="min-w-0">
                    <p class="font-display text-white font-bold text-base sm:text-lg leading-tight tracking-tight truncate">
                        Saivaperumakkalperavai
                    </p>
                    <p class="text-[10px] font-medium uppercase tracking-widest text-white/50 truncate">
                        Matrimony Registration
                    </p>
                </div>
            </a>

            {{-- NAV LINKS --}}
            <nav class="hidden md:flex items-center gap-1">
                <a href="#about" class="px-4 py-2 rounded-xl text-sm font-medium text-white/75 hover:text-white hover:bg-white/10 transition">About</a>
                <a href="#how-it-works" class="px-4 py-2 rounded-xl text-sm font-medium text-white/75 hover:text-white hover:bg-white/10 transition">How it Works</a>
                <a href="#gallery" class="px-4 py-2 rounded-xl text-sm font-medium text-white/75 hover:text-white hover:bg-white/10 transition">Gallery</a>
            </nav>

            {{-- MOBILE CTA --}}
            <a href="#" class="btn-primary md:hidden !py-2 !px-4 !text-sm">
                <i class="fa-solid fa-user-plus text-xs"></i>
                Register
            </a>
        </div>
    </div>
</header>


{{-- ========================= HERO ========================= --}}
<section class="hero-section flex flex-col justify-center pt-16">
    <div class="relative z-10 mx-auto max-w-7xl w-full px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-center">

            {{-- LEFT --}}
            <div class="lg:col-span-6 xl:col-span-7">
                <div class="badge-live mb-6 w-fit">
                    <span class="live-dot"></span>
                    Trusted Matrimony Registration Platform
                </div>

                <h1 class="font-display text-white text-4xl sm:text-5xl xl:text-6xl font-black leading-[1.06]">
                    Find your <span style="color: #F8C87A;">perfect match</span> with our community
                </h1>
                <p class="mt-6 text-white/70 text-base sm:text-lg leading-relaxed max-w-xl">
                    Register your bride or groom profile with complete personal, family, education, occupation, horoscope and location details — all in one place.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="#" class="btn-primary">
                        <i class="fa-solid fa-address-card text-sm"></i>
                        Register Your Profile
                    </a>
                    <a href="#about" class="btn-outline-white">
                        <i class="fa-solid fa-circle-info text-sm"></i>
                        Learn More
                    </a>
                </div>

                {{-- STATS ROW --}}
                <div class="mt-10 grid grid-cols-3 gap-3 max-w-sm">
                    <div class="stat-card px-4 py-4 text-center">
                        <p class="font-display text-white text-2xl font-bold">500+</p>
                        <p class="text-white/55 text-xs mt-1 leading-tight">Profiles<br>Registered</p>
                    </div>
                    <div class="stat-card px-4 py-4 text-center">
                        <p class="font-display text-white text-2xl font-bold">100%</p>
                        <p class="text-white/55 text-xs mt-1 leading-tight">Verified<br>Community</p>
                    </div>
                    <div class="stat-card px-4 py-4 text-center">
                        <p class="font-display text-white text-2xl font-bold">Free</p>
                        <p class="text-white/55 text-xs mt-1 leading-tight">Profile<br>Registration</p>
                    </div>
                </div>
            </div>

            {{-- RIGHT – GLASS CARD --}}
            <div class="lg:col-span-6 xl:col-span-5">
                <div class="panel-glass p-6 sm:p-7">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="background: linear-gradient(135deg, var(--saffron), var(--gold));">
                            <i class="fa-solid fa-id-card text-white text-sm"></i>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest" style="color: var(--saffron);">Profile Registration</p>
                            <h2 class="text-lg font-bold text-slate-900 leading-tight">What you can submit</h2>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        @php
                            $items = [
                                ['icon' => 'fa-user',            'color' => '#E8550A', 'bg' => '#FFF0E8', 'title' => 'Personal Details',     'desc' => 'Name, DOB, height, gender'],
                                ['icon' => 'fa-users',           'color' => '#C8860A', 'bg' => '#FEF3C7', 'title' => 'Family Details',        'desc' => 'Father name & family info'],
                                ['icon' => 'fa-graduation-cap',  'color' => '#4F46E5', 'bg' => '#EEF2FF', 'title' => 'Education',             'desc' => 'Qualification & academics'],
                                ['icon' => 'fa-briefcase',       'color' => '#059669', 'bg' => '#ECFDF5', 'title' => 'Occupation & Salary',  'desc' => 'Job role & income range'],
                                ['icon' => 'fa-star',            'color' => '#DB2777', 'bg' => '#FDF2F8', 'title' => 'Star & Horoscope',     'desc' => 'Rasi, nakshatra details'],
                                ['icon' => 'fa-location-dot',   'color' => '#0891B2', 'bg' => '#ECFEFF', 'title' => 'Native & Work Place',  'desc' => 'Location for matching'],
                            ];
                        @endphp
                        @foreach($items as $item)
                            <div class="rounded-2xl border p-3.5 transition hover:shadow-sm" style="border-color: rgba(0,0,0,0.07); background: #fafaf9;">
                                <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background: {{ $item['bg'] }};">
                                    <i class="fa-solid {{ $item['icon'] }} text-sm" style="color: {{ $item['color'] }};"></i>
                                </div>
                                <p class="mt-2.5 text-sm font-semibold text-slate-800">{{ $item['title'] }}</p>
                                <p class="mt-0.5 text-xs text-slate-400 leading-snug">{{ $item['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>

                    <a href="#" class="mt-5 btn-primary w-full justify-center">
                        <i class="fa-solid fa-user-plus text-sm"></i>
                        Register Now — It's Free
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- WAVE --}}
    <div class="relative z-10 w-full overflow-hidden leading-none" style="height: 60px;">
        <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width:100%;height:100%;display:block;">
            <path d="M0,40 C360,0 1080,60 1440,20 L1440,60 L0,60 Z" fill="#FDFAF5"/>
        </svg>
    </div>
</section>


{{-- ========================= GALLERY ROW ========================= --}}
<section id="gallery" class="py-16 sm:py-20" style="background: var(--cream);">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <div class="divider-motif">
                <i class="fa-solid fa-om"></i>
            </div>
            <p class="mt-4 text-sm font-semibold uppercase tracking-widest" style="color: var(--gold);">Our Community</p>
            <h2 class="font-display text-3xl sm:text-4xl font-bold mt-2" style="color: var(--ink);">Celebrating sacred unions</h2>
        </div>

        <div class="gallery-row">
            <img src="{{ asset('images/img1.jpg') }}"
                 alt="Traditional wedding" >
            <img src="{{ asset('images/img3.jpg') }}"
                 alt="Wedding ceremony">
            <img src="{{ asset('images/img2.jpg') }}"
                 alt="Couple celebration">
        </div>
    </div>
</section>


{{-- ========================= ABOUT ========================= --}}
<section id="about" class="py-20 sm:py-24" style="background: #fff;">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-12 items-center">

            {{-- PHOTO COLLAGE --}}
            <div class="lg:col-span-5">
                <div class="photo-grid">
                    <img class="span-2" src="{{ asset('images/img4.jpg') }}" alt="Wedding decoration" >
                    <img src="{{ asset('images/img5.jpg') }}" alt="Floral mandap">
                    <img src="{{ asset('images/img6.jpg') }}" alt="Traditional attire">
                </div>
                {{-- FLOATING BADGE --}}
                <div class="mt-4 inline-flex items-center gap-3 bg-white border rounded-2xl px-5 py-3.5 shadow-lg" style="border-color: rgba(200,134,10,0.2);">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="background: var(--gold-light);">
                        <i class="fa-solid fa-heart text-sm" style="color: var(--saffron);"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold" style="color: var(--ink);">Trusted since 2010</p>
                        <p class="text-xs" style="color: var(--muted);">Serving the Saiva community</p>
                    </div>
                </div>
            </div>

            {{-- TEXT --}}
            <div class="lg:col-span-7">
                <span class="section-chip">About us</span>
                <h2 class="font-display text-3xl sm:text-4xl font-bold mt-5 leading-tight" style="color: var(--ink);">
                    A trusted space for our community's matrimonial journey
                </h2>
                <p class="mt-5 text-base leading-8" style="color: var(--muted);">
                    Saivaperumakkalperavai is designed to collect and organize matrimonial profiles in a structured, respectful way. Families and individuals can register bride or groom profiles with complete personal, family, education, occupation, salary, star and location details — all needed for meaningful matrimony matching within our community.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-4">
                    <div class="feature-card p-5">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center" style="background: var(--saffron-light);">
                            <i class="fa-solid fa-file-signature text-lg" style="color: var(--saffron);"></i>
                        </div>
                        <h3 class="mt-4 font-bold text-slate-800">Structured Registration</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-500">Submit all matrimonial details in a clean, step-by-step flow designed for ease.</p>
                    </div>
                    <div class="feature-card p-5">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center" style="background: var(--gold-light);">
                            <i class="fa-solid fa-magnifying-glass text-lg" style="color: var(--gold);"></i>
                        </div>
                        <h3 class="mt-4 font-bold text-slate-800">Better Match Data</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-500">Star, education, salary, and location details enable refined, compatible filtering.</p>
                    </div>
                    <div class="feature-card p-5">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center" style="background: #ECFDF5;">
                            <i class="fa-solid fa-shield-heart text-lg" style="color: #059669;"></i>
                        </div>
                        <h3 class="mt-4 font-bold text-slate-800">Safe & Private</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-500">Profile details shared only within the Saivaperumakkalperavai community network.</p>
                    </div>
                    <div class="feature-card p-5">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center" style="background: #EEF2FF;">
                            <i class="fa-solid fa-hands-holding-heart text-lg" style="color: #4F46E5;"></i>
                        </div>
                        <h3 class="mt-4 font-bold text-slate-800">Community Focused</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-500">Built specifically for the Saiva community's traditions, values, and matching needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ========================= HOW IT WORKS ========================= --}}
<section id="how-it-works" class="py-20 sm:py-24" style="background: var(--cream);">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="section-chip">How it works</span>
            <h2 class="font-display text-3xl sm:text-4xl font-bold mt-5" style="color: var(--ink);">
                Register your profile in 3 simple steps
            </h2>
            <p class="mt-4 text-slate-500 text-base">A clean, guided flow for both bride and groom profile registration.</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            {{-- Step 1 --}}
            <div class="feature-card p-7 relative">
                <div class="flex items-center gap-4 mb-5">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center shrink-0" style="background: var(--saffron-light);">
                        <i class="fa-solid fa-file-pen text-xl" style="color: var(--saffron);"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest" style="color: var(--gold);">Step 01</span>
                        <h3 class="text-lg font-bold text-slate-800">Open Registration</h3>
                    </div>
                </div>
                <p class="text-sm leading-7 text-slate-500">Visit the platform and open the matrimony registration form to begin your profile creation journey.</p>
                <img src="https://images.unsplash.com/photo-1586281380349-632531db7ed4?q=80&w=600&auto=format&fit=crop"
                     alt="Open form" class="mt-5 w-full h-36 object-cover rounded-xl" loading="lazy">
            </div>

            {{-- Step 2 --}}
            <div class="feature-card p-7">
                <div class="flex items-center gap-4 mb-5">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center shrink-0" style="background: var(--gold-light);">
                        <i class="fa-solid fa-pen-to-square text-xl" style="color: var(--gold);"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest" style="color: var(--gold);">Step 02</span>
                        <h3 class="text-lg font-bold text-slate-800">Fill Your Details</h3>
                    </div>
                </div>
                <p class="text-sm leading-7 text-slate-500">Enter personal, family, education, salary, horoscope star and location details into the guided form.</p>
                <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=600&auto=format&fit=crop"
                     alt="Fill details" class="mt-5 w-full h-36 object-cover rounded-xl" loading="lazy">
            </div>

            {{-- Step 3 --}}
            <div class="feature-card p-7">
                <div class="flex items-center gap-4 mb-5">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center shrink-0" style="background: #ECFDF5;">
                        <i class="fa-solid fa-paper-plane text-xl" style="color: #059669;"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest" style="color: var(--gold);">Step 03</span>
                        <h3 class="text-lg font-bold text-slate-800">Submit Profile</h3>
                    </div>
                </div>
                <p class="text-sm leading-7 text-slate-500">Review and submit your profile. It will be visible to our community for matrimony matching right away.</p>
                <img src="https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?q=80&w=600&auto=format&fit=crop"
                     alt="Submit profile" class="mt-5 w-full h-36 object-cover rounded-xl" loading="lazy">
            </div>
        </div>
    </div>
</section>


{{-- ========================= CTA STRIP ========================= --}}
<section class="py-16 sm:py-20" style="background: #fff;">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="cta-section px-8 py-14 sm:px-12 sm:py-16 overflow-hidden relative">

            {{-- Decorative circles --}}
            <div class="pointer-events-none absolute -right-16 -top-16 w-72 h-72 rounded-full opacity-10" style="background: radial-gradient(circle, #C8860A, transparent);"></div>
            <div class="pointer-events-none absolute -left-12 -bottom-12 w-64 h-64 rounded-full opacity-10" style="background: radial-gradient(circle, #E8550A, transparent);"></div>

            <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                <div class="max-w-xl">
                    <span class="section-chip !bg-white/10 !text-amber-200 !border-white/20">Saivaperumakkalperavai</span>
                    <h2 class="font-display text-3xl sm:text-4xl font-bold text-white mt-5 leading-tight">
                        Begin your matrimony registration journey today
                    </h2>
                    <p class="mt-4 text-white/65 text-base leading-8">
                        Create a complete bride or groom profile with all the essential details needed for meaningful matrimonial matching in our community.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 shrink-0">
                    <a href="#" class="btn-primary">
                        <i class="fa-solid fa-user-plus text-sm"></i>
                        Register Now
                    </a>
                    <a href="#about" class="btn-outline-white">
                        <i class="fa-solid fa-circle-info text-sm"></i>
                        About Platform
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ========================= FOOTER ========================= --}}
<footer class="footer-band">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            {{-- BRAND + LOGO --}}
            <div class="flex items-center gap-3">
                {{-- ★ DROP YOUR LOGO IMAGE HERE ★
                     Replace this div with:
                     <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 rounded-xl object-contain">
                --}}
                <div class="w-10 h-10 rounded-xl border border-white/15 flex items-center justify-center shrink-0" style="background: rgba(255,255,255,0.08);">
                    <span class="text-[9px] font-semibold text-white/40 uppercase leading-tight text-center">Logo</span>
                </div>
                <div>
                    <p class="font-display text-white font-bold text-sm">Saivaperumakkalperavai</p>
                    <p class="text-xs mt-0.5" style="color: rgba(255,255,255,0.4);">Matrimony profile registration platform</p>
                </div>
            </div>

            {{-- LINKS --}}
            <nav class="flex flex-wrap items-center gap-2">
                <a href="#about" class="px-3 py-2 rounded-xl text-sm font-medium transition hover:bg-white/10" style="color: rgba(255,255,255,0.55);">About</a>
                <a href="#how-it-works" class="px-3 py-2 rounded-xl text-sm font-medium transition hover:bg-white/10" style="color: rgba(255,255,255,0.55);">How it Works</a>
                <a href="#gallery" class="px-3 py-2 rounded-xl text-sm font-medium transition hover:bg-white/10" style="color: rgba(255,255,255,0.55);">Gallery</a>
                <a href="#" class="btn-primary !py-2 !px-4 !text-sm ml-2">
                    <i class="fa-solid fa-user-plus text-xs"></i>
                    Register
                </a>
            </nav>
        </div>

        <div class="border-t mt-8 pt-6 text-center text-xs" style="border-color: rgba(255,255,255,0.08); color: rgba(255,255,255,0.3);">
            &copy; {{ date('Y') }} Saivaperumakkalperavai. All rights reserved.
        </div>
    </div>
</footer>

</body>
</html>
