@extends('components.App')

@section('title', 'Add Patient')
@section('page_title', 'Add Patient')
@section('page_subtitle', 'Fill in the patient details below.')

@section('page_actions')
    <a href="{{ url('patients') }}"
       class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium hover:bg-slate-50">
        &larr; Back to Patients
    </a>
@endsection

@section('content')
    <div class="w-full rounded-xl bg-white p-6 shadow-sm">
        <form action="{{ url('patients') }}" method="POST" action="patinets" class="space-y-5">
            @csrf

            {{-- Name --}}
            <div>
                <label for="name" class="mb-1 block text-sm font-medium text-slate-700">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       placeholder="e.g. Ahmed Hassan"
                       class="w-full rounded-lg border bg-slate-50 px-3 py-2.5 text-sm focus:outline-none focus:ring-2
                              {{ $errors->has('name') ? 'border-rose-400 focus:ring-rose-100' : 'border-slate-200 focus:border-sky-400 focus:ring-sky-100' }}">
                @error('name')
                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                {{-- Phone --}}
                <div>
                    <label for="phone" class="mb-1 block text-sm font-medium text-slate-700">Phone</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                           placeholder="01X XXXX XXXX"
                           class="w-full rounded-lg border bg-slate-50 px-3 py-2.5 text-sm focus:outline-none focus:ring-2
                                  {{ $errors->has('phone') ? 'border-rose-400 focus:ring-rose-100' : 'border-slate-200 focus:border-sky-400 focus:ring-sky-100' }}">
                    @error('phone')
                        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Age --}}
                <div>
                    <label for="age" class="mb-1 block text-sm font-medium text-slate-700">Age</label>
                    <input type="number" id="age" name="age" value="{{ old('age') }}" min="0" max="120"
                           placeholder="e.g. 34"
                           class="w-full rounded-lg border bg-slate-50 px-3 py-2.5 text-sm focus:outline-none focus:ring-2
                                  {{ $errors->has('age') ? 'border-rose-400 focus:ring-rose-100' : 'border-slate-200 focus:border-sky-400 focus:ring-sky-100' }}">
                    @error('age')
                        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Buttons --}}
            <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-5">
                <a href="{{ url('patients') }}"
                   class="rounded-lg border border-slate-200 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">
                    Cancel
                </a>
                <button type="submit"
                        class="rounded-lg bg-sky-500 px-5 py-2 text-sm font-medium text-white hover:bg-sky-600">
                    Save Patient
                </button>
            </div>
        </form>
    </div>
@endsection