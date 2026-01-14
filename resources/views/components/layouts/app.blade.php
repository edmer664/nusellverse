<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SellVerse' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-pastel-cream font-sans text-slate-800 antialiased">
    <div class="min-h-screen flex flex-col">
        {{-- Header --}}
        <header class="bg-pastel-blue sticky top-0 z-50 shadow-md" x-data="{ mobileMenuOpen: false }">
            <div class="container mx-auto px-4 py-4 md:py-6 flex items-center justify-between">
                {{-- Logo & Name --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <img src="{{ asset('logo.png') }}" alt="Nusellverse Logo" class="h-10 w-auto group-hover:scale-105 transition-transform">
                    <span class="text-white text-2xl font-bold tracking-tight shadow-black/5 drop-shadow-sm">SellVerse</span>
                </a>

                {{-- Desktop Nav --}}
                <nav class="hidden md:flex items-center gap-8 text-white font-medium">
                    <a href="{{ route('home') }}" class="hover:text-pastel-yellow transition-colors">Home</a>
                    <a href="{{ route('about') }}" class="hover:text-pastel-yellow transition-colors">About</a>
                </nav>

                {{-- Search & Mobile Menu --}}
                <div class="flex items-center gap-4">
                     {{-- Cart & Dropdown --}}
                    <div class="relative" x-data="{ cartOpen: false }">
                        <button @click="cartOpen = !cartOpen" class="text-white relative p-2 hover:bg-white/10 rounded-full transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            <span x-show="$store.cart.count > 0" class="absolute top-0 right-0 bg-red-500 text-white text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full" x-text="$store.cart.count" style="display: none;"></span>
                        </button>

                        <!-- Dropdown -->
                        <div x-show="cartOpen" 
                            @click.outside="cartOpen = false"
                            x-transition
                            class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-xl overflow-hidden z-50 border border-slate-100"
                            style="display: none;">
                            <div class="p-4 bg-pastel-blue text-white font-bold flex justify-between items-center">
                                <span>Your Cart</span>
                                <span class="text-xs bg-white/20 px-2 py-1 rounded-full" x-text="$store.cart.count + ' items'"></span>
                            </div>
                            <div class="max-h-96 overflow-y-auto">
                                <template x-if="$store.cart.count === 0">
                                    <div class="p-8 text-center text-slate-500">
                                        <p>Your cart is empty.</p>
                                    </div>
                                </template>
                                <template x-for="item in $store.cart.items" :key="item.id">
                                    <div 
                                        @click="cartOpen = false; $dispatch('open-product-modal', { productId: item.id })"
                                        class="flex items-center gap-4 p-4 border-b border-slate-50 hover:bg-slate-50 transition-colors cursor-pointer group"
                                    >
                                        {{-- Product Image --}}
                                        <div class="w-12 h-12 flex-shrink-0 bg-slate-100 rounded-md overflow-hidden flex items-center justify-center">
                                            <template x-if="item.image">
                                                <img :src="item.image" :alt="item.name" class="w-full h-full object-cover">
                                            </template>
                                            <template x-if="!item.image">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-400">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                                </svg>
                                            </template>
                                        </div>

                                        <div class="flex-grow">
                                            <h4 class="font-bold text-slate-800 text-sm line-clamp-1 group-hover:text-pastel-blue transition-colors" x-text="item.name"></h4>
                                            <div class="text-pastel-blue font-bold text-sm" x-text="'PHP ' + parseFloat(item.price).toLocaleString()"></div>
                                        </div>
                                        <button @click.stop="$store.cart.remove(item.id)" class="text-slate-400 hover:text-red-500 transition-colors p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </template>
                            </div>
                            <div class="p-4 border-t border-slate-100 bg-slate-50" x-show="$store.cart.count > 0">
                                <div class="flex justify-between items-center mb-0 font-bold text-slate-800">
                                    <span>Total</span>
                                    <span x-text="'PHP ' + $store.cart.total.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hidden md:block">
                        <livewire:global-search />
                    </div>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Mobile Menu --}}
            <div x-show="mobileMenuOpen" style="display: none;" x-transition class="md:hidden bg-pastel-blue border-t border-white/10 text-white p-4 space-y-4">
                <a href="{{ route('home') }}" class="block hover:text-pastel-yellow transition-colors">Home</a>
                <a href="{{ route('about') }}" class="block hover:text-pastel-yellow transition-colors">About</a>
                <div class="pt-2">
                    <livewire:global-search />
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
                <p class="font-medium">&copy; {{ date('Y') }} SellVerse. All rights reserved.</p>
                <div class="mt-4 flex justify-center gap-6 text-sm opacity-80">
                    <a href="{{ route('privacy') }}" class="hover:underline">Privacy Policy</a>
                    <a href="{{ route('terms') }}" class="hover:underline">Terms of Service</a>
                </div>
            </div>
        </footer>
    </div>
    
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('cart', {
                items: JSON.parse(localStorage.getItem('cart') || '[]'),
            
                add(product) {
                    if (!this.items.some(i => i.id === product.id)) {
                        this.items.push(product);
                        this.save();
                    }
                },
            
                remove(id) {
                    this.items = this.items.filter(i => i.id !== id);
                    this.save();
                },

                toggle(product) {
                    if (this.has(product.id)) {
                        this.remove(product.id);
                    } else {
                        this.add(product);
                    }
                },

                has(id) {
                    return this.items.some(i => i.id === id);
                },
            
                save() {
                    localStorage.setItem('cart', JSON.stringify(this.items));
                },

                get count() {
                    return this.items.length;
                },

                get total() {
                    return this.items.reduce((acc, item) => acc + parseFloat(item.price), 0);
                }
            });
        });
    </script>
</body>
</html>
