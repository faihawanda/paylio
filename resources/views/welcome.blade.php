<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paylio Landing Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  {{-- Remix Icon --}}
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Lexend', sans-serif;
    }
  </style>
</head>
<body class="bg-white min-h-screen flex flex-col justify-between overflow-x-hidden overflow-y-hidden relative">

  <main class="max-w-8xl w-full mx-auto px-8 pt-12 md:px-16 lg:px-24 flex-1 flex flex-col justify-center z-10">
    
    <div class="flex items-center space-x-2 text-[#0f233c] font-bold text-3xl tracking-tight mb-16">
        <div class="flex justify-center items-center gap-2">
            <i class="ri-wallet-3-fill text-5xl text-[#0f233c]"></i>
            <span class="text-4xl font-bold text-[#0f233c]">Paylio</span>
        </div>
    </div>

    <div class="inline-flex items-center space-x-2 bg-[#f4f5f7] text-[#4a5568] px-4 py-2 rounded-full text-base font-light w-fit mb-14 shadow-sm">
      <span class="w-2 h-2 rounded-full bg-[#4a5568]"></span>
      <span>Try it now: for your own company</span>
    </div>

    <h1 class="text-[#0f233c] text-4xl md:text-5xl lg:text-7xl font-semibold max-w-6xl mb-6">
      Your partner in smarter financial decisions
    </h1>

    <p class="text-[#718096] text-lg md:text-xl max-w-4xl mb-28 font-normal">
      Start managing your company payroll with a faster and simpler system
    </p>

    <div class="flex flex-col sm:flex-row gap-6 mb-16">
      
      <a href="{{ route('login') }}" class="flex flex-col items-center justify-center border-4 border-[#d2e3e8] rounded-2xl p-8 w-60 h-60 hover:border-[#4a7a8c] transition-colors group">
        <i class="ri-login-box-line text-8xl mb-5 text-[#4a7a8c]"></i>
        <span class="text-[#4a7a8c] font-bold text-xl mb-1">Login</span>
        <span class="text-[#a0aec0] font-light text-sm text-center">Access your dashboard</span>
      </a>

      <a href="{{ route('register') }}" class="flex flex-col items-center justify-center border-4 border-[#d2e3e8] rounded-2xl p-8 w-60 h-60 hover:border-[#4a7a8c] transition-colors group">
        <i class="ri-user-add-line text-8xl mb-5 text-[#4a7a8c]"></i>
        <span class="text-[#4a7a8c] font-bold text-xl mb-1">Register</span>
        <span class="text-[#a0aec0] font-light text-sm text-center">Start your journey</span>
      </a>

    </div>

  </main>

  <div class="absolute right-16 bottom-0 top-0 w-1/2 hidden lg:flex items-end justify-end pointer-events-none select-none">
    <img 
      src="{{ asset('image/welcome-illustration.png') }}" 
      alt="Illustration Character" 
      class="h-[95vh] w-full object-contain object-right-bottom transform translate-x-5 translate-y-4"
      onerror="this.onerror=null; this.src='https://illustrations.popsy.co/flat/man-walking.svg';"
    />
  </div>

</body>
</html>