@extends('layouts.app')

@section('content')
    {{-- ===== HEADER ===== --}}
    <div class="mb-8 px-3">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Payroll</h1>
        <p class="text-gray-500">Manage employee salaries, payments, and payroll records efficiently</p>
    </div>

    {{-- Alert Message --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- ===== FILTER ===== --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 mb-6 flex flex-wrap items-center gap-3">
        <div class="flex items-center gap-2">
            <label class="text-sm text-gray-500 font-medium">Month</label>
            <select
                class="text-sm border border-gray-200 rounded-lg px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option>January</option>
                <option>February</option>
                <option>March</option>
                <option>April</option>
                <option selected>May</option>
                <option>June</option>
                <option>July</option>
                <option>August</option>
                <option>September</option>
                <option>October</option>
                <option>November</option>
                <option>December</option>
            </select>
        </div>
        <div class="flex items-center gap-2">
            <label class="text-sm text-gray-500 font-medium">Year</label>
            <select
                class="text-sm border border-gray-200 rounded-lg px-8 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option>2023</option>
                <option>2024</option>
                <option selected>2025</option>
            </select>
        </div>
        <button class="px-4 py-2 bg-gray-700 text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition">
            View
        </button>
    </div>

    {{-- ===== TABEL PENGGAJIAN ===== --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-base font-semibold text-gray-700">Payroll Data</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-3 text-left font-semibold">No</th>
                        <th class="px-6 py-3 text-left font-semibold">Name</th>
                        <th class="px-6 py-3 text-left font-semibold">Position</th>
                        <th class="px-6 py-3 text-right font-semibold">Base Salary</th>
                        <th class="px-6 py-3 text-right font-semibold">Allowance</th>
                        <th class="px-6 py-3 text-right font-semibold">Deductions</th>
                        <th class="px-6 py-3 text-right font-semibold">Net Salary</th>
                        <th class="px-6 py-3 text-center font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    :@forelse ($salaries as $salary)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-400">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="font-medium text-gray-800">{{ $salary->employee->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-500">{{ $salary->employee->position }}</td>
                            <td class="px-6 py-4 text-right text-gray-700">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-right text-green-600 font-medium">+ Rp {{ number_format($salary->tunjangan_makan + $salary->tunjangan_transportasi, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-right text-red-500 font-medium">- Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-right font-bold text-gray-800">Rp {{ number_format($salary->gaji_bersih, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    {{-- href="{{ route('gaji.show', $salary->id) }}" --}}
                                    {{-- Edit Button --}}
                                    <a href="{{ route('gaji.show', $salary->id) }}"
                                        class="inline-flex items-center gap-1.5 px-3 py-0.5 text-yellow-600 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition text-xs font-medium">
                                        <i class="ri-file-info-line text-base"></i>
                                    </a>

                                    {{-- Delete Button --}}
                                    <form action="{{ route('gaji.delete', $salary->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition text-xs font-medium">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No salary data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
    {{-- ===== END TABEL ===== --}}
@endsection
