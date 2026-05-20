<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>{{ $title ?? 'Payroll App' }}</title>
   {{-- Remix Icon --}}
   <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
   {{-- Google Font --}}
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 antialiased" style="font-family: 'Lexend', sans-serif;">

   <div class="flex min-h-screen">

       {{-- ===== SIDEBAR ===== --}}
       <aside class="w-64 bg-[#1F2531] shadow-md flex flex-col">

           {{-- Logo --}}
           <div class="h-20 flex items-center justify-center">
                <div class="flex justify-center items-center gap-2">
                    <i class="ri-wallet-3-fill text-3xl text-white"></i>
                    <span class="text-2xl font-bold text-white">Paylio</span>
                </div>
           </div>

           {{-- Menu --}}
           <nav class="flex-1 px-4 py-10 space-y-1">

               <p class="text-xs font-semibold text-white/50 uppercase tracking-wider mb-3">Main Menu</p>

               <a href="{{ route('dashboard') }}"
                  class="flex items-center gap-3 px-5 py-3 rounded-lg text-sm font-medium
                         {{ request()->routeIs('dashboard') ? 'bg-[#0F131C] text-white' : 'text-gray-600 hover:bg-[#0F131C] hover:text-white' }}">
                    <i class="ri-dashboard-fill text-xl"></i>
                   Dashboard
               </a>

               
               <a href="{{ route('karyawan.index') }}"
                  class="flex items-center gap-3 px-5 py-3 rounded-lg text-sm font-medium
                         {{ request()->routeIs('karyawan.*') ? 'bg-[#0F131C] text-white' : 'text-gray-600 hover:bg-[#0F131C] hover:text-white' }}">
                    <i class="ri-team-fill text-xl"></i>
                   Employee Data
               </a>

               <a href="{{ route('gaji.index') }}"
                  class="flex items-center gap-3 px-5 py-3 rounded-lg text-sm font-medium
                         {{ request()->routeIs('gaji.*') ? 'bg-[#0F131C] text-white' : 'text-gray-600 hover:bg-[#0F131C] hover:text-white' }}">
                    <i class="ri-bill-fill text-xl"></i>
                   Payroll
               </a>
           </nav>

           {{-- User Info + Logout --}}
           <div>
               <div class="flex items-center gap-3 mb-3 bg-[#2D3545] py-4 px-3">
                   <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-semibold text-sm">
                       {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                   </div>
                   <div class="flex-1 min-w-0">
                       <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</p>
                       <p class="text-xs text-white/75">{{ auth()->user()->role_as == 0 ? 'HRD / Admin' : 'Karyawan' }}</p>
                   </div>
               </div>
               <form method="POST" action="{{ route('logout') }}" class="px-2 py-1 pb-3">
                   @csrf
                   <button type="submit"
                           class="w-full flex items-center gap-2 px-5 py-3 rounded-lg text-sm text-red-500 hover:bg-white font-medium transition">
                       <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                       </svg>
                       Logout
                   </button>
               </form>
           </div>

       </aside>
       {{-- ===== END SIDEBAR ===== --}}

       {{-- ===== MAIN CONTENT ===== --}}
       <div class="flex-1 flex flex-col">

           {{-- Topbar --}}
           <header class="h-16 bg-white flex items-center justify-between px-6">
               <h1 class="text-lg font-semibold text-gray-800">{{ $title ?? 'Dashboard' }}</h1>
               <span class="text-sm text-gray-400">{{ now()->translatedFormat('l, d F Y') }}</span>
           </header>

           {{-- Page Content --}}
           <main class="flex-1 p-6 overflow-auto">
               @yield('content')
           </main>

       </div>
       {{-- ===== END MAIN CONTENT ===== --}}

   </div>

</body>
</html>
