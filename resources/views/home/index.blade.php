@extends('components.App')
@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('page_subtitle', "Welcome back, here's what's happening today.")

@section('page_actions')
    <button class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium hover:bg-slate-50">Export</button>
    <button class="rounded-lg bg-sky-500 px-4 py-2 text-sm font-medium text-white hover:bg-sky-600">+ New Appointment</button>
@endsection

@section('content')
    @php
        $stats = [
            ['Total Patients', number_format($data), '+12% this month', 'bg-sky-100 text-sky-600', 'M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-4.13a4 4 0 100-8 4 4 0 000 8z'],
            ['Appointments Today', '64', '8 pending', 'bg-emerald-100 text-emerald-600', 'M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z'],
            ['Available Doctors', '38', '5 on leave', 'bg-violet-100 text-violet-600', 'M12 14a4 4 0 100-8 4 4 0 000 8zm-7 8a7 7 0 0114 0'],
            ['Free Beds', '47 / 210', '78% occupied', 'bg-amber-100 text-amber-600', 'M3 18v-7a2 2 0 012-2h14a2 2 0 012 2v7M3 18h18M3 14h18'],
        ];

        $appointments = [
            ['Ahmed Hassan', 'Cardiology', 'Dr. Sara Ali', '09:00 AM', 'Confirmed'],
            ['Mona Khaled', 'Pediatrics', 'Dr. Omar Nabil', '09:30 AM', 'In Progress'],
            ['Youssef Adel', 'Orthopedics', 'Dr. Hany Samir', '10:15 AM', 'Pending'],
            ['Nourhan Fathy', 'Dermatology', 'Dr. Laila Magdy', '11:00 AM', 'Confirmed'],
            ['Mahmoud Ibrahim', 'Neurology', 'Dr. Tarek Fouad', '11:45 AM', 'Cancelled'],
        ];

        $badge = [
            'Confirmed'   => 'bg-emerald-100 text-emerald-700',
            'In Progress' => 'bg-sky-100 text-sky-700',
            'Pending'     => 'bg-amber-100 text-amber-700',
            'Cancelled'   => 'bg-rose-100 text-rose-700',
        ];

        $departments = [
            ['Emergency', 92, 'bg-rose-500'],
            ['Cardiology', 74, 'bg-sky-500'],
            ['Pediatrics', 58, 'bg-emerald-500'],
            ['Orthopedics', 66, 'bg-violet-500'],
            ['ICU', 85, 'bg-amber-500'],
        ];
    @endphp

    {{-- Stat cards --}}
    <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ($stats as [$title, $value, $note, $color, $icon])
            <div class="flex items-center gap-4 rounded-xl bg-white p-5 shadow-sm">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl {{ $color }}">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="{{ $icon }}"/></svg>
                </div>
                <div>
                    <p class="text-sm text-slate-500">{{ $title }}</p>
                    <p class="text-2xl font-semibold">{{ $value}}</p>
                    <p class="text-xs text-slate-400">{{ $note }}</p>
                </div>
            </div>
        @endforeach
    </section>

    <section class="grid grid-cols-1 gap-6 xl:grid-cols-3">

        {{-- Appointments table --}}
        <div class="overflow-hidden rounded-xl bg-white shadow-sm xl:col-span-2">
            <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
                <h2 class="font-semibold">Today's Appointments</h2>
                <a href="{{ url('appointments') }}" class="text-sm font-medium text-sky-600 hover:underline">View all</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="px-5 py-3">Patient</th>
                            <th class="px-5 py-3">Department</th>
                            <th class="px-5 py-3">Doctor</th>
                            <th class="px-5 py-3">Time</th>
                            <th class="px-5 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($appointments as [$patient, $dept, $doctor, $time, $status])
                            <tr class="hover:bg-slate-50">
                                <td class="px-5 py-3 font-medium">{{ $patient }}</td>
                                <td class="px-5 py-3 text-slate-600">{{ $dept }}</td>
                                <td class="px-5 py-3 text-slate-600">{{ $doctor }}</td>
                                <td class="px-5 py-3 text-slate-600">{{ $time }}</td>
                                <td class="px-5 py-3">
                                    <span class="rounded-full px-2.5 py-1 text-xs font-medium {{ $badge[$status] }}">{{ $status }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Department occupancy --}}
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <h2 class="mb-4 font-semibold">Department Occupancy</h2>
            <div class="space-y-4">
                @foreach ($departments as [$name, $percent, $color])
                    <div>
                        <div class="mb-1 flex justify-between text-sm">
                            <span class="text-slate-600">{{ $name }}</span>
                            <span class="font-medium">{{ $percent }}%</span>
                        </div>
                        <div class="h-2 overflow-hidden rounded-full bg-slate-100">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Quick actions --}}
    <section class="grid grid-cols-2 gap-4 md:grid-cols-4">
        @foreach (['Add Patient', 'Book Appointment', 'Admit Patient', 'Generate Invoice'] as $action)
            <button class="rounded-xl border-2 border-dashed border-slate-300 bg-white/50 px-4 py-6 text-sm font-medium text-slate-600 transition hover:border-sky-400 hover:bg-white hover:text-sky-600">
                {{ $action }}
            </button>
        @endforeach
    </section>
@endsection