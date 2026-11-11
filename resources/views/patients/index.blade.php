@extends('components.app')
@section('title', 'Patients')
@section('page_title', 'Patients')
@section('page_subtitle', 'Manage all registered patients.')

@section('page_actions')
<a href="{{route('patients.create')}}" class="rounded-lg bg-sky-500 px-4 py-2 text-sm font-medium text-white hover:bg-sky-600">+ Add Patient</a>
@endsection

@section('content')
<div class="overflow-hidden rounded-xl bg-white shadow-sm">
    <div class="border-b border-slate-100 p-4">
        <input type="text" placeholder="Filter patients..."
            class="w-full max-w-xs rounded-lg border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-100">
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                <tr>
                    <th class="px-5 py-3">#</th>
                    <th class="px-5 py-3">Name</th>
                    <th class="px-5 py-3">Age</th>
                    <th class="px-5 py-3">Phone</th>
                    <th class="px-5 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach ($data as $patient)
                <tr class="hover:bg-slate-50">
                    <td class="px-5 py-3 text-slate-500">{{$loop->iteration}}</td>
                    <td class="px-5 py-3 font-medium">{{ $patient->name }}</td>
                    <td class="px-5 py-3 text-slate-600">{{ $patient->age }}</td>
                    <td class="px-5 py-3 text-slate-600">{{ $patient->phone  }}</td>
                    <td class="px-5 py-3 text-right">
    <div class="flex items-center justify-end gap-3">

        <form action="{{ route('patients.destroy', $patient->id) }}"
              method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="text-sky-600 hover:underline">
                Delete
            </button>
        </form>

        <a href="#" class="text-slate-500 hover:underline">
            Edit
        </a>

    </div>
</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection