<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Nusellverse' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-pastel-cream font-sans text-slate-800 antialiased">
    <div class="min-h-screen flex flex-col">
        {{-- Header --}}
        <header class="bg-pastel-blue sticky top-0 z-50 shadow-md">
            <div class="container mx-auto px-4 py-4 md:py-6 flex items-center justify-between">
                {{-- Logo & Name --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform">
                        <span class="text-pastel-blue text-xl font-bold">N</span>
                    </div>
                    <span class="text-white text-2xl font-bold tracking-tight shadow-black/5 drop-shadow-sm">Nusellverse</span>
                </a>

                {{-- Desktop Nav --}}
                <nav class="hidden md:flex items-center gap-8 text-white font-medium">
                    <a href="{{ route('home') }}" class="hover:text-pastel-yellow transition-colors">Home</a>
                    <a href="#" class="hover:text-pastel-yellow transition-colors">About</a>
                </nav>

                {{-- Search & Mobile Menu --}}
                <div class="flex items-center gap-4">
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Search stores or products..." 
                            class="bg-white/20 border-none rounded-full px-4 py-2 text-white placeholder-white/70 focus:ring-2 focus:ring-pastel-yellow focus:bg-white/30 transition-all w-64 text-sm"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 absolute right-3 top-1/2 -translate-y-1/2 text-white/70">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                    <button class="md:hidden text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        {{-- Main Content --}}
        <main class="flex-grow container mx-auto px-4 py-8">
            {{ $slot }}
        </main>

        {{-- Footer --}}
        <footer class="bg-pastel-blue-dark text-white py-8 mt-auto">
            <div class="container mx-auto px-4 text-center">
                <p class="font-medium">&copy; {{ date('Y') }} Nusellverse. All rights reserved.</p>
                <div class="mt-4 flex justify-center gap-6 text-sm opacity-80">
                    <a href="#" class="hover:underline">Privacy Policy</a>
                    <a href="#" class="hover:underline">Terms of Service</a>
                </div>
            </div>
        </footer>
    </div>
    
</body>
</html>
