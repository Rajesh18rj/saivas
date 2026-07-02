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

    <div class="grid lg:grid-cols-[1.15fr_0.85fr]">

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

            <div class="relative mt-14">

                {{-- Desktop Timeline --}}
                <div class="hidden lg:flex items-start justify-evenly gap-3">

                    {{-- STEP 1 --}}
                    <div class="w-28 text-center">

                        <div class="relative mx-auto w-fit">

                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#F4EEFF]">

                                <i class="fa-solid fa-pen-to-square text-lg text-[#7C3AED]"></i>

                            </div>

                            <div class="absolute -bottom-2 left-0 flex h-7 w-7 items-center justify-center rounded-full bg-[#6D28D9] text-xs font-bold text-white">
                                1
                            </div>

                        </div>

                        <h4 class="mt-7 text-[13px] font-bold text-slate-900">
                            Fill Your Details
                        </h4>

                        <p class="mt-2 text-[11px] leading-7 text-slate-500">
                            Provide accurate information
                        </p>

                    </div>

                    {{-- ARROW --}}
                    <div class="mt-9 flex flex-1 items-center px-2">

                        <div class="h-px flex-1 border-t-2 border-dashed border-slate-300"></div>

                        <i class="fa-solid fa-arrow-right mx-2 text-slate-400"></i>

                    </div>

                    {{-- STEP 2 --}}
                    <div class="w-28 text-center">

                        <div class="relative mx-auto w-fit">

                            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#EAFBF1]">

                                <i class="fa-solid fa-qrcode text-lg text-[#10B981]"></i>

                            </div>

                            <div class="absolute -bottom-2 left-0 flex h-7 w-7 items-center justify-center rounded-full bg-[#10B981] text-xs font-bold text-white">
                                2
                            </div>

                        </div>

                        <h4 class="mt-7 text-[13px] font-bold text-slate-900">
                            Scan & Pay
                        </h4>

                        <p class="mt-2 text-[11px] leading-7 text-slate-500">
                            Scan the QR code and make payment
                        </p>

                    </div>

                    {{-- ARROW --}}
                    <div class="mt-9 flex flex-1 items-center px-2">

                        <div class="h-px flex-1 border-t-2 border-dashed border-slate-300"></div>

                        <i class="fa-solid fa-arrow-right mx-2 text-slate-400"></i>

                    </div>

                    {{-- STEP 3 --}}
                    <div class="w-28 text-center">

                        <div class="relative mx-auto w-fit">

                            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#EDF6FF]">

                                <i class="fa-solid fa-cloud-arrow-up text-lg text-[#2563EB]"></i>

                            </div>

                            <div class="absolute -bottom-2 left-0 flex h-7 w-7 items-center justify-center rounded-full bg-[#2563EB] text-xs font-bold text-white">
                                3
                            </div>

                        </div>

                        <h4 class="mt-7 text-[13px] font-bold text-slate-900">
                            Upload Proof
                        </h4>

                        <p class="mt-2 text-[11px] leading-7 text-slate-500">
                            Upload payment screenshot
                        </p>

                    </div>

                    {{-- ARROW --}}
                    <div class="mt-9 flex flex-1 items-center px-2">

                        <div class="h-px flex-1 border-t-2 border-dashed border-slate-300"></div>

                        <i class="fa-solid fa-arrow-right mx-2 text-slate-400"></i>

                    </div>

                    {{-- STEP 4 --}}
                    <div class="w-28 text-center">

                        <div class="relative mx-auto w-fit">

                            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#FFF3EA]">

                                <i class="fa-solid fa-shield-halved text-lg text-[#EA580C]"></i>

                            </div>

                            <div class="absolute -bottom-2 left-0 flex h-7 w-7 items-center justify-center rounded-full bg-[#EA580C] text-xs font-bold text-white">
                                4
                            </div>

                        </div>

                        <h4 class="mt-7 text-[13px] font-bold text-slate-900">
                            Admin Approval
                        </h4>

                        <p class="mt-2 text-[11px] leading-7 text-slate-500">
                            We verify and activate your profile
                        </p>

                    </div>

                </div>

                {{-- Mobile Timeline --}}
                <div class="space-y-8 lg:hidden">

                    @php
                        $steps = [
                            ['icon'=>'fa-pen-to-square','bg'=>'bg-violet-100','text'=>'text-violet-600','title'=>'Fill Your Details','desc'=>'Provide accurate information'],
                            ['icon'=>'fa-qrcode','bg'=>'bg-green-100','text'=>'text-green-600','title'=>'Scan & Pay','desc'=>'Scan the QR code and make payment'],
                            ['icon'=>'fa-cloud-arrow-up','bg'=>'bg-blue-100','text'=>'text-blue-600','title'=>'Upload Proof','desc'=>'Upload payment screenshot'],
                            ['icon'=>'fa-shield-halved','bg'=>'bg-orange-100','text'=>'text-orange-600','title'=>'Admin Approval','desc'=>'We verify and activate your profile'],
                        ];
                    @endphp

                    @foreach($steps as $index=>$step)

                        <div class="flex gap-3.5">

                            <div class="relative">

                                <div class="flex h-16 w-16 items-center justify-center rounded-full {{ $step['bg'] }}">

                                    <i class="fa-solid {{ $step['icon'] }} text-2xl {{ $step['text'] }}"></i>

                                </div>

                                <div class="absolute -bottom-1 -left-1 flex h-6 w-6 items-center justify-center rounded-full bg-slate-900 text-[11px] font-bold text-white">

                                    {{ $index+1 }}

                                </div>

                            </div>

                            <div>

                                <h4 class="text-[13px] font-bold text-slate-900">

                                    {{ $step['title'] }}

                                </h4>

                                <p class="mt-1 text-slate-500">

                                    {{ $step['desc'] }}

                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

            <div class="mt-16 rounded-2xl border border-blue-200 bg-[#EFF7FF] p-3.5">

                <div class="flex items-start gap-4">

                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600">

                        <i class="fa-solid fa-circle-info text-white"></i>

                    </div>

                    <p class="text-[11px] leading-7 text-blue-700">

                        Your profile will be visible to other members only after admin approval.

                    </p>

                </div>

            </div>
        </div>

        {{-- RIGHT SIDE --}}
        <div
            class="border-l border-slate-200 bg-gradient-to-br from-green-50 via-white to-green-50 p-8 lg:p-8">

            {{-- ============================= --}}
            {{-- RIGHT PANEL --}}
            {{-- ============================= --}}

            <div>

                {{-- Header --}}
                <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">

                    {{-- Left --}}
                    <div class="flex items-start gap-3">

                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-green-500 to-emerald-400 shadow-lg sm:h-14 sm:w-14">

                            <i class="fa-solid fa-qrcode text-xl text-white sm:text-2xl"></i>

                        </div>

                        <div>

                            <h3 class="text-xl font-bold tracking-tight text-[#059669] sm:text-[22px]">
                                Scan & Pay
                            </h3>

                            <p class="mt-2 max-w-xs text-sm leading-6 text-slate-500">
                                Scan the QR code below with any UPI app to securely complete your registration payment.
                            </p>

                        </div>

                    </div>

                    {{-- QR --}}
                    <div class="flex justify-center sm:block">

                        <div class="rounded-2xl border border-slate-200 bg-white p-2 shadow-md sm:p-3">

                            <img
                                src="{{ asset('images/qr.png') }}"
                                alt="QR"
                                class="h-28 w-28 rounded-xl object-cover sm:h-28 sm:w-28">

                        </div>

                    </div>

                </div>

                {{-- Registration Fee --}}
                <div class="mt-8 rounded-2xl border border-green-100 bg-gradient-to-br from-green-50 to-white p-3">

                <span class="text-xs font-semibold uppercase tracking-widest text-green-700">

                    Registration Fee

                </span>

                    <h2 class="mt-2 text-2xl font-extrabold text-[#16A34A]">

                        ₹500

                    </h2>

                </div>

                {{-- Account Details --}}
                <div class="mt-4 space-y-2">

                    {{-- Account Holder --}}
                    <div class="group flex items-center rounded-xl border border-slate-200 bg-white px-3 py-2 transition-all duration-200 hover:border-violet-200 hover:shadow-md">

                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-50 text-violet-600">
                            <i class="fa-solid fa-user text-sm"></i>
                        </div>

                        <div class="ml-3 flex-1 leading-tight">
                            <p class="text-[10px] font-medium uppercase tracking-wide text-slate-400">
                                Account Holder
                            </p>

                            <p class="mt-0.5 text-sm font-semibold text-slate-800">
                                Demo Matrimony
                            </p>
                        </div>

                    </div>

                    {{-- UPI --}}
                    <div class="group flex items-center rounded-xl border border-slate-200 bg-white px-3 py-2 transition-all duration-200 hover:border-blue-200 hover:shadow-md">

                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-orange-50 text-orange-600">
                            <i class="fa-solid fa-wallet text-sm"></i>
                        </div>

                        <div class="ml-3 flex-1 leading-tight">

                            <p class="text-[10px] font-medium uppercase tracking-wide text-slate-400">
                                UPI ID
                            </p>

                            <p id="upiID"
                               class="mt-0.5 text-sm font-semibold text-slate-800">
                                demo@upi
                            </p>

                        </div>

                        <button
                            id="copyBtn"
                            onclick="copyUPI()"
                            class="flex items-center gap-1 rounded-lg border border-blue-100 bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-600 transition-all hover:bg-blue-100">

                            <i class="fa-regular fa-copy text-xs"></i>

                            <span id="copyText">
                Copy
            </span>

                        </button>

                    </div>

                    {{-- Bank --}}
                    <div class="group flex items-center rounded-xl border border-slate-200 bg-white px-3 py-2 transition-all duration-200 hover:border-blue-200 hover:shadow-md">

                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-50 text-sky-600">
                            <i class="fa-solid fa-building-columns text-sm"></i>
                        </div>

                        <div class="ml-3 flex-1 leading-tight">

                            <p class="text-[10px] font-medium uppercase tracking-wide text-slate-400">
                                Bank
                            </p>

                            <p class="mt-0.5 text-sm font-semibold text-slate-800">
                                State Bank Of India
                            </p>

                        </div>

                    </div>

                </div>

                {{-- Copy Box --}}
                <div class="mt-3 flex items-center justify-between rounded-xl border border-blue-100 bg-gradient-to-r from-blue-50 to-indigo-50 px-3 py-2.5">

                    <div>

                        <p class="text-[10px] font-medium uppercase tracking-widest text-blue-500">
                            UPI ID
                        </p>

                        <p class="text-sm font-semibold text-slate-800">
                            demo@upi
                        </p>

                    </div>

                    <button
                        onclick="copyUPI()"
                        class="flex h-9 w-9 items-center justify-center rounded-lg bg-white shadow-sm transition hover:scale-105 hover:shadow">

                        <i class="fa-regular fa-copy text-blue-600"></i>

                    </button>

                </div>

                {{-- Success Box --}}
                <div class="mt-3 flex items-center gap-3 rounded-xl border border-green-200 bg-gradient-to-r from-green-50 to-emerald-50 px-3 py-2.5">

                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-green-500 text-white">

                        <i class="fa-solid fa-check text-xs"></i>

                    </div>

                    <p class="text-[11px] leading-5 text-green-700">

                        Upload the payment screenshot after completing the payment.

                    </p>

                </div>
            </div>

            <script>
                const copyUPI = async () => {

                    const upi = document.getElementById('upiID').textContent.trim();

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

                        text.textContent = 'Copied';

                        btn.innerHTML = `
            <i class="fa-solid fa-check text-xs"></i>
            <span>Copied</span>
        `;

                        setTimeout(() => {

                            btn.innerHTML = `
                <i class="fa-regular fa-copy text-xs"></i>
                <span>Copy</span>
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
                        console.error('Failed to copy UPI ID:', error);
                    }

                };
            </script>
        </div>

    </div>

</div>
