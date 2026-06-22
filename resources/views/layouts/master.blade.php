<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Matrimony Admin' }}</title>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">

<div class="min-h-screen bg-[#f5f7fb]">
    {{-- Sidebar --}}
    @include('layouts.partials.sidebar')

    {{-- Mobile sidebar overlay --}}
    <div id="mobileSidebarOverlay" class="fixed inset-0 z-40 hidden bg-slate-900/40 lg:hidden"></div>

    {{-- Main content --}}
    <div class="lg:pl-[290px] min-h-screen flex flex-col">
        @include('layouts.partials.header')

        <main class="flex-1 px-4 py-5 sm:px-6 lg:px-8 lg:py-8">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
