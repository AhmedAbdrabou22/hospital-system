@php
    // [label, path, icon svg path]
    // 'path' is matched with request()->is() so it works even before routes exist.
    // Later you can switch href to route('patients.index') etc.
    $menu = [
        ['Dashboard',    '/',            'M3 12l9-9 9 9M5 10v10h14V10'],
        ['Departments',  'departments',  'M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6'],
        ['Patients',     'patients',     'M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-4.13a4 4 0 100-8 4 4 0 000 8z'],
        ['Doctors',      'doctors',      'M12 14a4 4 0 100-8 4 4 0 000 8zm-7 8a7 7 0 0114 0'],
        ['Appointments', 'appointments', 'M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z'],
        ['Rooms & Beds', 'rooms',        'M3 18v-7a2 2 0 012-2h14a2 2 0 012 2v7M3 18h18M3 14h18'],
        ['Pharmacy',     'pharmacy',     'M19 14l-7 7-7-7a5 5 0 017-7 5 5 0 017 7z'],
        ['Laboratory',   'laboratory',   'M9 3h6M10 3v6l-5 9a2 2 0 002 3h10a2 2 0 002-3l-5-9V3'],
        ['Billing',      'billing',      'M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3-2 2 2 2-2 2 2 2-2 3 2z'],
        ['Reports',      'reports',      'M9 17v-6m4 6V7m4 10v-3M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z'],
        ['Settings',     'settings',     'M12 15a3 3 0 100-6 3 3 0 000 6zM19.4 15a1.7 1.7 0 00.3 1.8l.1.1a2 2 0 11-2.8 2.8l-.1-.1a1.7 1.7 0 00-1.8-.3 1.7 1.7 0 00-1 1.5V21a2 2 0 11-4 0v-.1a1.7 1.7 0 00-1.1-1.5 1.7 1.7 0 00-1.8.3l-.1.1a2 2 0 11-2.8-2.8l.1-.1a1.7 1.7 0 00.3-1.8 1.7 1.7 0 00-1.5-1H3a2 2 0 110-4h.1a1.7 1.7 0 001.5-1.1 1.7 1.7 0 00-.3-1.8l-.1-.1a2 2 0 112.8-2.8l.1.1a1.7 1.7 0 001.8.3H9a1.7 1.7 0 001-1.5V3a2 2 0 114 0v.1a1.7 1.7 0 001 1.5 1.7 1.7 0 001.8-.3l.1-.1a2 2 0 112.8 2.8l-.1.1a1.7 1.7 0 00-.3 1.8V9a1.7 1.7 0 001.5 1H21a2 2 0 110 4h-.1a1.7 1.7 0 00-1.5 1z'],
    ];
@endphp

<aside id="sidebar"
       class="fixed inset-y-0 left-0 z-40 flex w-64 -translate-x-full flex-col bg-slate-900 text-slate-300 transition-transform duration-200 lg:translate-x-0">

    <a href="{{ url('/') }}" class="flex h-16 items-center gap-3 border-b border-slate-800 px-6">
        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-500 text-white">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M12 5v14M5 12h14"/></svg>
        </div>
        <span class="text-lg font-semibold text-white">MediCare<span class="text-sky-400">+</span></span>
    </a>

    <nav class="flex-1 space-y-1 overflow-y-auto px-3 py-4">
        @foreach ($menu as [$label, $path, $icon])
            @php $active = $path === '/' ? request()->is('/') : request()->is($path, $path . '/*'); @endphp
            <a href="{{ url($path) }}"
               @if ($active) aria-current="page" @endif
               class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition
                      {{ $active ? 'bg-sky-500 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="{{ $icon }}"/></svg>
                {{ $label }}
            </a>
        @endforeach
    </nav>

    <div class="border-t border-slate-800 p-4">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-sky-500 font-semibold text-white">A</div>
            <div class="text-sm">
                <p class="font-medium text-white">Admin</p>
                <p class="text-xs text-slate-400">Hospital Manager</p>
            </div>
        </div>
    </div>
</aside>