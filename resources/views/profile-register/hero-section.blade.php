<header class="relative overflow-hidden border-b border-rose-100 bg-gradient-to-r from-rose-50 via-white to-violet-50">

    <div class="relative mx-auto flex max-w-[1550px] flex-col items-center justify-between gap-4 px-4 py-4 sm:h-24 sm:flex-row sm:px-6">

        {{-- Logo --}}
        <div class="flex items-center gap-3 sm:gap-4">

            <div
                class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white shadow-md sm:h-14 sm:w-14">

                <img
                    src="{{ asset('images/logo.jpg') }}"
                    class="h-8 w-8 rounded-lg object-cover sm:h-10 sm:w-10"
                    alt="Logo">

            </div>

            <div>

                <h1 class="text-lg font-bold text-slate-800 sm:text-xl">
                    Saiva Makkal Peravai
                </h1>

                <p class="text-xs text-slate-500 sm:text-sm">
                    Matrimony Registration Portal
                </p>

            </div>

        </div>

        {{-- Home --}}
        <a href="{{ route('welcome') }}"
           class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:border-emerald-300 hover:text-emerald-600 hover:shadow-md">

            <i class="fa-solid fa-house"></i>

            Home

        </a>

    </div>

</header>
{{-- Floating Hearts --}}
<div class="pointer-events-none absolute inset-0 overflow-hidden">


    <i class="fa-solid fa-heart floating-heart absolute left-[3%] top-3 text-[8px] text-pink-200 opacity-20"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[8%] top-12 text-[16px] text-pink-300 opacity-40 delay-500"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[14%] top-6 text-[10px] text-rose-300 opacity-30 delay-1000"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[20%] top-14 text-[22px] text-pink-400 opacity-30 delay-1500"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[28%] top-5 text-[12px] text-red-300 opacity-25 delay-2000"></i>

    <i class="fa-solid fa-heart floating-heart absolute left-[35%] top-10 text-[18px] text-fuchsia-300 opacity-30 delay-2500"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[42%] top-3 text-[9px] text-pink-200 opacity-20 delay-3000"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[48%] top-14 text-[24px] text-pink-400 opacity-40 delay-3500"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[54%] top-7 text-[13px] text-rose-200 opacity-25 delay-4000"></i>

    <i class="fa-solid fa-heart floating-heart absolute left-[18%] top-8 text-[5px] text-pink-200 opacity-20"></i>

    <i class="fa-solid fa-heart floating-heart absolute right-[25%] top-5 text-[6px] text-rose-300 opacity-20 delay-3000"></i>

    <i class="fa-solid fa-heart floating-heart absolute left-[72%] bottom-6 text-[5px] text-pink-300 opacity-15 delay-5000"></i>

    <i class="fa-solid fa-heart floating-heart absolute left-[60%] top-4 text-[20px] text-pink-300 opacity-35 delay-4500"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[66%] top-13 text-[10px] text-red-200 opacity-20 delay-5000"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[72%] top-5 text-[15px] text-fuchsia-300 opacity-30 delay-5500"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[78%] top-12 text-[11px] text-pink-200 opacity-25 delay-6000"></i>

    <i class="fa-solid fa-heart floating-heart absolute left-[84%] top-4 text-[26px] text-pink-400 opacity-35 delay-6500"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[90%] top-10 text-[14px] text-rose-300 opacity-30 delay-7000"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[95%] top-2 text-[18px] text-purple-300 opacity-30 delay-7500"></i>

    {{-- Lower Layer --}}
    <i class="fa-solid fa-heart floating-heart absolute left-[10%] bottom-4 text-[28px] text-pink-300 opacity-30 delay-8000"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[22%] bottom-10 text-[11px] text-rose-200 opacity-25 delay-8500"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[37%] bottom-5 text-[18px] text-purple-300 opacity-25 delay-9000"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[51%] bottom-8 text-[10px] text-red-300 opacity-20 delay-[9500ms]"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[63%] bottom-3 text-[26px] text-pink-400 opacity-30 delay-[10000ms]"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[75%] bottom-9 text-[14px] text-fuchsia-300 opacity-25 delay-[10500ms]"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[86%] bottom-5 text-[20px] text-pink-300 opacity-30 delay-[11000ms]"></i>
    <i class="fa-solid fa-heart floating-heart absolute left-[93%] bottom-12 text-[9px] text-rose-200 opacity-20 delay-[11500ms]"></i>

</div>

<style>
    @keyframes floatHeart {

        0% {
            transform: translateY(0) translateX(0) scale(1);
            opacity: .15;
        }

        25% {
            transform: translateY(-6px) translateX(-3px) scale(1.08);
        }

        50% {
            transform: translateY(-14px) translateX(3px) scale(1.18);
            opacity: .45;
        }

        75% {
            transform: translateY(-6px) translateX(-2px) scale(1.08);
        }

        100% {
            transform: translateY(0) translateX(0) scale(1);
            opacity: .15;
        }

    }

    .floating-heart{
        animation: floatHeart 6s ease-in-out infinite;
    }

    .delay-500{animation-delay:.5s;}
    .delay-1000{animation-delay:1s;}
    .delay-1500{animation-delay:1.5s;}
    .delay-2000{animation-delay:2s;}
    .delay-2500{animation-delay:2.5s;}
    .delay-3000{animation-delay:3s;}
    .delay-3500{animation-delay:3.5s;}
    .delay-4000{animation-delay:4s;}
    .delay-4500{animation-delay:4.5s;}
    .delay-5000{animation-delay:5s;}
    .delay-5500{animation-delay:5.5s;}
    .delay-6000{animation-delay:6s;}
    .delay-6500{animation-delay:6.5s;}
    .delay-7000{animation-delay:7s;}
    .delay-7500{animation-delay:7.5s;}

    .floating-heart{
        animation: floatHeart 5s ease-in-out infinite;
    }

    .delay-500{
        animation-delay:.5s;
    }

    .delay-1000{
        animation-delay:1s;
    }

    .delay-2000{
        animation-delay:2s;
    }

    .delay-3000{
        animation-delay:3s;
    }
</style>
<div

    class="overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-[0_20px_60px_rgba(15,23,42,0.08)]">

    <div class="grid ">

        {{-- LEFT SIDE --}}
        <div class="bg-white p-8 lg:p-8">

            {{-- ========================= --}}
            {{-- HOW IT WORKS --}}
            {{-- ========================= --}}

            <div>

                <h2 class="text-[26px] font-bold tracking-tight text-[#2A1654]">
                    How It Works
                </h2>

                <div class="mt-3 h-1.5 w-20 rounded-full bg-[#6D28D9]"></div>

            </div>

            @php
                $steps = [
                    ['icon'=>'fa-pen-to-square','from'=>'#FFE3A3','to'=>'#F2B705','badge'=>'#C98A00','glow'=>'rgba(242,183,5,0.55)','title'=>'Fill your details','desc'=>'Provide accurate information'],
                    ['icon'=>'fa-qrcode','from'=>'#FF9CB0','to'=>'#E8546B','badge'=>'#C43654','glow'=>'rgba(232,84,107,0.55)','title'=>'Scan and pay','desc'=>'Scan the QR code and make payment'],
                    ['icon'=>'fa-cloud-arrow-up','from'=>'#6FE0E3','to'=>'#1FA2A6','badge'=>'#137679','glow'=>'rgba(31,162,166,0.55)','title'=>'Upload proof','desc'=>'Upload your payment screenshot'],
                    ['icon'=>'fa-shield-halved','from'=>'#B79CFF','to'=>'#7B4FE0','badge'=>'#5A34B0','glow'=>'rgba(123,79,224,0.55)','title'=>'Admin approval','desc'=>'We verify and activate your profile'],
                ];
            @endphp

            <div class="relative mt-16">

                {{-- Desktop --}}
                <div class="hidden lg:block relative">
                    <div class="absolute left-[10%] right-[10%] top-10 h-[3px] rounded-full"
                         style="background-image: repeating-linear-gradient(to right, #F2B705 0 8px, transparent 8px 10px, #E8546B 10px 18px, transparent 18px 20px, #1FA2A6 20px 28px, transparent 28px 30px, #7B4FE0 30px 38px, transparent 38px 40px); background-size: 40px 3px; background-repeat: repeat-x;"></div>

                    <div class="relative grid grid-cols-4 gap-4">
                        @foreach($steps as $index => $step)
                            <div class="flex flex-col items-center text-center">
                                <div class="relative">
                                    <div class="flex h-20 w-20 items-center justify-center rounded-full"
                                         style="background:linear-gradient(145deg,{{ $step['from'] }},{{ $step['to'] }}); box-shadow:0 8px 18px -6px {{ $step['glow'] }};">
                                        <i class="fa-solid {{ $step['icon'] }} text-2xl text-white"></i>
                                    </div>
                                    <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 flex h-7 w-7 items-center justify-center rounded-full text-[12px] font-bold text-white"
                                         style="background: {{ $step['badge'] }};">
                                        {{ $index + 1 }}
                                    </div>
                                </div>
                                <h4 class="mt-7 text-[15px] font-semibold" style="color:#3D2645;">
                                    {{ $step['title'] }}
                                </h4>
                                <p class="mt-2 text-[12px] leading-6 text-slate-500">
                                    {{ $step['desc'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Mobile --}}
                <div class="lg:hidden relative space-y-9 pl-2">
                    <div class="absolute left-10 top-2 bottom-2 w-[3px]"
                         style="background-image: repeating-linear-gradient(to bottom, #F2B705 0 8px, transparent 8px 10px, #E8546B 10px 18px, transparent 18px 20px, #1FA2A6 20px 28px, transparent 28px 30px, #7B4FE0 30px 38px, transparent 38px 40px); background-size: 3px 40px;"></div>

                    @foreach($steps as $index => $step)
                        <div class="relative flex gap-4 items-start">
                            <div class="relative shrink-0">
                                <div class="flex h-[72px] w-[72px] items-center justify-center rounded-full"
                                     style="background:linear-gradient(145deg,{{ $step['from'] }},{{ $step['to'] }}); box-shadow:0 8px 18px -6px {{ $step['glow'] }};">
                                    <i class="fa-solid {{ $step['icon'] }} text-2xl text-white"></i>
                                </div>
                                <div class="absolute -bottom-1 -right-1 flex h-6 w-6 items-center justify-center rounded-full text-[11px] font-bold text-white"
                                     style="background: {{ $step['badge'] }};">
                                    {{ $index + 1 }}
                                </div>
                            </div>
                            <div class="pt-2">
                                <h4 class="text-[15px] font-semibold" style="color:#3D2645;">
                                    {{ $step['title'] }}
                                </h4>
                                <p class="mt-1 text-[12px] leading-6 text-slate-500">
                                    {{ $step['desc'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="mt-16 rounded-2xl p-4 pl-6 relative overflow-hidden"
                 style="background:linear-gradient(135deg,#FFF4D6 0%,#FFE7EE 50%,#EAFBFA 100%);">

                <div class="absolute left-0 top-0 bottom-0 w-[5px]"
                     style="background:linear-gradient(to bottom,#F2B705,#E8546B,#1FA2A6,#7B4FE0);"></div>

                <div class="flex items-start gap-4">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full"
                         style="background:linear-gradient(145deg,#8FE0DE,#1FA2A6); box-shadow:0 6px 14px -4px rgba(31,162,166,0.55);">
                        <i class="fa-solid fa-circle-info text-white text-[15px]"></i>
                    </div>
                    <p class="text-[12.5px] leading-7 pt-1.5" style="color:#3D2645;">
                        Your profile will be visible to other members only after
                        <span class="font-semibold" style="color:#137679;">admin approval</span>.
                    </p>
                </div>
            </div>
        </div>

    </div>

</div>
