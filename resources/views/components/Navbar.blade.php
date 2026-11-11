<header class="sticky top-0 z-20 flex h-16 items-center justify-between border-b border-slate-200 bg-white px-4 sm:px-6">
    <div class="flex items-center gap-3">
        <button id="menuBtn" type="button" class="rounded-md p-2 text-slate-600 hover:bg-slate-100 lg:hidden" aria-label="Toggle menu">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <div class="relative hidden sm:block">
            <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path stroke-linecap="round" d="M21 21l-4.3-4.3"/></svg>
            <input type="text" placeholder="Search patients, doctors, records..."
                   class="w-72 rounded-lg border border-slate-200 bg-slate-50 py-2 pl-9 pr-3 text-sm focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-100 lg:w-96">
        </div>
    </div>

    <div class="flex items-center gap-3">
        <button type="button" class="relative rounded-full p-2 text-slate-500 hover:bg-slate-100" aria-label="Notifications">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 11-6 0"/></svg>
            <span class="absolute right-1.5 top-1.5 h-2 w-2 rounded-full bg-rose-500"></span>
        </button>
        <div class="hidden items-center gap-2 border-l border-slate-200 pl-3 sm:flex">
            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-sky-100 font-semibold text-sky-600">A</div>
            <div class="text-sm leading-tight">
                <p class="font-medium">Admin</p>
                <p class="text-xs text-slate-500">admin@hospital.com</p>
            </div>
        </div>
    </div>
</header>