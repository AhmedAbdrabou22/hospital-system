<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') | {{ config('app.name', 'Hospital') }}</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @endif

    @stack('styles')
</head>

<body class="bg-slate-100 text-slate-800 antialiased">

    <div class="flex min-h-screen">

        {{-- Mobile overlay --}}
        <div id="overlay" class="fixed inset-0 z-30 hidden bg-slate-900/50 lg:hidden"></div>

        {{-- Sidebar --}}
        @include('components.Sidebar')

        {{-- Main --}}
        <div class="flex flex-1 flex-col lg:pl-64">

            {{-- Navbar --}}
            @include('components.navbar')
            {{-- Page content --}}
            <main class="flex-1 space-y-6 p-4 sm:p-6">

                {{-- Page header (optional per page) --}}
                @hasSection('page_title')
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <h1 class="text-2xl font-semibold">@yield('page_title')</h1>
                        @hasSection('page_subtitle')
                        <p class="text-sm text-slate-500">@yield('page_subtitle')</p>
                        @endif
                    </div>
                    <div class="flex gap-2">@yield('page_actions')</div>
                </div>
                @endif

                @yield('content')
            </main>

            <footer class="border-t border-slate-200 bg-white px-6 py-4 text-center text-xs text-slate-500">
                &copy; {{ date('Y') }} {{ config('app.name', 'Hospital') }}. All rights reserved.
            </footer>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const toggle = () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        };
        document.getElementById('menuBtn').addEventListener('click', toggle);
        overlay.addEventListener('click', toggle);
    </script>

    @stack('scripts')
</body>

</html>