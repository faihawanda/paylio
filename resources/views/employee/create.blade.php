@extends('layouts.app')

@section('content')
    {{-- ===== HEADER ===== --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Add Employee Data</h1>
        <p class="text-gray-500">Manage employee information and their complete details</p>
    </div>

    {{-- ===== FORM SECTION ===== --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('karyawan.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input name="name" type="text" id="name" value="{{ old('name') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="nip" class="block text-sm font-medium text-gray-700">Employee ID</label>
                    <input name="nip" type="text" id="nip" value="{{ old('nip') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('nip')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                    <input name="position" type="text" id="position" value="{{ old('position') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('position')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="salary" class="block text-sm font-medium text-gray-700">Base Salary</label>
                    <input name="salary" type="number" id="salary" value="{{ old('salary') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('salary')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="join_date" class="block text-sm font-medium text-gray-700">Join Date</label>
                    <input name="join_date" type="date" id="join_date" value="{{ old('join_date') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('join_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="inline-flex items-center gap-1.5 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                    Save Data
                </button>
            </div>
        </form>
    </div>
    
@endsection
