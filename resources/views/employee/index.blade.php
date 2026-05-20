@extends('layouts.app')

@section('content')
    {{-- ===== HEADER ===== --}}
    <div class="mb-8 px-3">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Employee Data</h1>
        <p class="text-gray-500">Manage employee information and their complete details</p>
    </div>

    {{-- Alert Message --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- ===== TABLE SECTION ===== --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

        {{-- Header dengan Tombol Tambah --}}
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="text-base font-semibold text-gray-700">Employee List</h2>
            {{-- {{ route('karyawan.create') }} --}}
            <a href="{{ route('karyawan.create') }}"
                class="inline-flex items-center gap-1.5 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Employee
            </a>
        </div>

        {{-- Search & Filter --}}
        <div class="px-6 py-4 border-b border-gray-100 flex gap-3">
            <div class="flex-1">
                <input type="text" placeholder="Search employee name or ID..."
                    class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <button class="px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
            </button>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-3 text-left font-semibold">No</th>
                        <th class="px-6 py-3 text-left font-semibold">Name</th>
                        <th class="px-6 py-3 text-left font-semibold">Employee ID</th>
                        <th class="px-6 py-3 text-left font-semibold">Position</th>
                        <th class="px-6 py-3 text-left font-semibold">Base Salary</th>
                        <th class="px-6 py-3 text-center font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($employees as $employee)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-400">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $employee->name }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $employee->nip }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $employee->position }}</td>
                            <td class="px-6 py-4 text-gray-600">Rp {{ number_format($employee->salary, 0, '.', '.') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- Tambah Gaji Button --}}
                                    <a href="{{ route('gaji.create', $employee->id) }}"
                                        class="inline-flex items-center justify-center px-3 pb-2 pt-0.5 text-green-600 bg-green-50 rounded-lg hover:bg-green-100 transition text-xs font-medium">
                                        <i class="ri-wallet-3-line text-base w-4 h-4"></i>

                                    </a>

                                    {{-- Edit Button --}}
                                    <a href="{{ route('karyawan.edit', $employee->id) }}"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 text-yellow-600 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition text-xs font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    {{-- Delete Button --}}
                                    <button type="button"
                                        onclick="openDeleteModal('{{ $employee->nama }}', '{{ route('karyawan.destroy', $employee->id) }}')"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition text-xs font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No employee data available</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>
    {{-- ===== END TABLE SECTION ===== --}}

    {{-- DELETE MODAL --}}
    <div id="deleteModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500/75" aria-hidden="true" onclick="closeDeleteModal()"></div>
    
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    
            <div class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6 animate-fade-in">
                <div class="sm:flex sm:items-start">
                    <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                        <i class="ri-delete-bin-7-line text-2xl text-red-600"></i>
                    </div>
                    
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900" id="modal-title">Delete Employee Data</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Are you sure you want to delete this data?<br><span id="employeeName" class="font-semibold text-gray-700"></span> This action cannot be undone.
                            </p>
                        </div>
                    </div>
                </div>
    
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse gap-2">
                    <form id="deleteForm" action="" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none sm:w-auto">
                            Yes, Delete
                        </button>
                    </form>
                    <button type="button" onclick="closeDeleteModal()" class="mt-3 inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function openDeleteModal(name, actionUrl) {
            // Isi nama karyawan dan action form secara dinamis
            document.getElementById('employeeName').innerText = name;
            document.getElementById('deleteForm').action = actionUrl;
            
            // Munculkan modal
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('hidden');
        }
    
        function closeDeleteModal() {
            // Sembunyikan modal
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
        }
    </script>
    {{-- END DELETE MODAL --}}
    
@endsection
