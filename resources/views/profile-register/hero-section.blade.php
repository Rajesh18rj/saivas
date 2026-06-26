
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
                <div class="flex items-start justify-between gap-6">

                    <div class="flex gap-4">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-green-500 to-emerald-400 shadow-lg">

                            <i class="fa-solid fa-qrcode text-2xl text-white"></i>

                        </div>

                        <div>

                            <h3 class="text-[22px] font-bold tracking-tight text-[#059669]">
                                Scan & Pay
                            </h3>

                            <p class="mt-2 max-w-xs text-[11px] leading-7 text-slate-500">
                                Scan the QR Code using any UPI app to pay the registration fee.
                            </p>

                        </div>

                    </div>

                    {{-- QR CARD --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-3 shadow-md">

                        {{-- Replace with your QR image --}}
                        <img
                            src="{{ asset('images/qr.png') }}"
                            class="h-28 w-28 rounded-xl object-cover"
                            alt="QR">

                    </div>

                </div>

                {{-- Registration Fee --}}
                <div class="mt-8 rounded-2xl border border-green-100 bg-gradient-to-br from-green-50 to-white p-6">

        <span class="text-sm font-semibold uppercase tracking-widest text-green-700">

            Registration Fee

        </span>

                    <h2 class="mt-2 text-3xl font-extrabold text-[#16A34A]">

                        ₹500

                    </h2>

                </div>

                {{-- Account Details --}}
                <div class="mt-6 space-y-4">

                    {{-- Holder --}}
                    <div class="flex items-center rounded-2xl border border-slate-200 bg-white p-3.5 shadow-sm">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-violet-100">

                            <i class="fa-solid fa-user text-violet-600"></i>

                        </div>

                        <div class="ml-4">

                            <p class="text-sm text-slate-500">
                                Account Holder Name
                            </p>

                            <h4 class="font-bold text-slate-900">
                                Demo Matrimony
                            </h4>

                        </div>

                    </div>

                    {{-- UPI --}}
                    <div class="flex items-center justify-between rounded-2xl border border-slate-200 bg-white p-3.5 shadow-sm">

                        <div class="flex items-center">

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-100">

                                <i class="fa-solid fa-wallet text-orange-600"></i>

                            </div>

                            <div class="ml-4">

                                <p class="text-sm text-slate-500">
                                    UPI ID
                                </p>

                                <h4
                                    id="upiID"
                                    class="font-bold text-slate-900">

                                    demo@upi

                                </h4>

                            </div>

                        </div>

                        <button
                            onclick="copyUPI()"
                            class="rounded-xl bg-blue-50 px-4 py-2 font-semibold text-blue-600 transition hover:bg-blue-100">

                            Copy

                        </button>

                    </div>

                    {{-- Bank --}}
                    <div class="flex items-center rounded-2xl border border-slate-200 bg-white p-3.5 shadow-sm">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100">

                            <i class="fa-solid fa-building-columns text-blue-600"></i>

                        </div>

                        <div class="ml-4">

                            <p class="text-sm text-slate-500">
                                Bank Name
                            </p>

                            <h4 class="font-bold text-slate-900">
                                State Bank Of India
                            </h4>

                        </div>

                    </div>

                </div>

                {{-- Copy Box --}}
                <div class="mt-6 flex items-center justify-between rounded-2xl bg-blue-50 px-5 py-4">

                    <div>

                        <p class="text-xs uppercase tracking-widest text-blue-500">

                            UPI ID

                        </p>

                        <h4 class="font-bold text-blue-700">

                            demo@upi

                        </h4>

                    </div>

                    <button
                        onclick="copyUPI()"
                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-white shadow">

                        <i class="fa-regular fa-copy text-blue-600"></i>

                    </button>

                </div>

                {{-- Success Alert --}}
                <div class="mt-8 rounded-2xl border border-green-200 bg-green-50 p-3.5">

                    <div class="flex items-start gap-4">

                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-600">

                            <i class="fa-solid fa-check text-white"></i>

                        </div>

                        <p class="text-[11px] leading-7 text-green-700">

                            After payment, upload the payment screenshot in the form below.

                        </p>

                    </div>

                </div>

            </div>

            <script>

                function copyUPI(){

                    navigator.clipboard.writeText(
                        document.getElementById('upiID').innerText
                    );

                    alert('UPI ID Copied');

                }

            </script>
        </div>

    </div>

</div>
