@extends('components.App')

@section('title', 'Departments')
@section('page_title', 'Departments')
@section('page_subtitle', 'Manage hospital departments.')

@section('page_actions')
    <button type="button" onclick="openModal()"
            class="rounded-lg bg-sky-500 px-4 py-2 text-sm font-medium text-white hover:bg-sky-600">
        + Add Department
    </button>
@endsection

@section('content')

    {{-- رسالة نجاح بعد الإضافة (لو عملت ->with('success', '...') في الـ Controller) --}}
    @if (session('success'))
        <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="overflow-hidden rounded-xl bg-white shadow-sm">
        <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
            <h2 class="font-semibold">All Departments</h2>
            <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-600">
                {{ $data->count() }} total
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="px-5 py-3">#</th>
                        <th class="px-5 py-3">Name</th>
                        <th class="px-5 py-3">Created At</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($data as $department)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-3 text-slate-500">{{ $loop->iteration }}</td>
                            <td class="px-5 py-3 font-medium">{{ $department->name }}</td>
                            <td class="px-5 py-3 text-slate-600">{{ $department->created_at?->format('Y-m-d') }}</td>
                            <td class="px-5 py-3 text-right">
                                <a href="#" class="text-sky-600 hover:underline">Edit</a>
                                <form action="{{ route('departments.destroy' , $department->id) }}" method="POST" class="ml-3 inline"
                                      onsubmit="return confirm('Delete this department?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-12 text-center text-slate-400">
                                No departments yet. Click "Add Department" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal --}}
    <div id="departmentModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/50" onclick="closeModal()"></div>

        <div class="relative w-full max-w-md rounded-xl bg-white shadow-xl">
            <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
                <h3 class="font-semibold">Add Department</h3>
                <button type="button" onclick="closeModal()" class="rounded-md p-1 text-slate-400 hover:bg-slate-100 hover:text-slate-600" aria-label="Close">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M6 6l12 12M18 6L6 18"/></svg>
                </button>
            </div>

            <form action="{{ url('departments') }}" method="POST">
                @csrf
                <div class="p-5">
                    <label for="dept_name" class="mb-1 block text-sm font-medium text-slate-700">Department Name</label>
                    <input type="text" id="dept_name" name="name" value="{{ old('name') }}"
                           placeholder="e.g. Cardiology"
                           class="w-full rounded-lg border bg-slate-50 px-3 py-2.5 text-sm focus:outline-none focus:ring-2
                                  {{ $errors->has('name') ? 'border-rose-400 focus:ring-rose-100' : 'border-slate-200 focus:border-sky-400 focus:ring-sky-100' }}">
                    @error('name')
                        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3 border-t border-slate-100 px-5 py-4">
                    <button type="button" onclick="closeModal()"
                            class="rounded-lg border border-slate-200 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">
                        Cancel
                    </button>
                    <button type="submit"
                            class="rounded-lg bg-sky-500 px-5 py-2 text-sm font-medium text-white hover:bg-sky-600">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    const modal = document.getElementById('departmentModal');

    function openModal() {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.getElementById('dept_name').focus();
    }

    function closeModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

    @if ($errors->any())
        openModal();
    @endif
</script>
@endpush