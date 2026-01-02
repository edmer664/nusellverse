<x-layouts.app>
    {{-- Hero Section --}}
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-12">
        <div class="relative bg-pastel-blue py-16 px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl mb-4">
                Reimagining the Marketplace
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-white/90">
                Connecting unique sellers with passionate buyers in a vibrant digital universe.
            </p>
        </div>
    </div>

    {{-- Mission Section --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-800 sm:text-4xl">Our Mission</h2>
            <p class="mt-4 text-lg text-slate-600 max-w-3xl mx-auto">
                At SellVerse, we believe in the power of connection. Our mission is to create a seamless and secure digital marketplace where entrepreneurs can thrive and customers can discover hidden gems. We are dedicated to empowering small businesses and providing a delightful shopping experience for everyone.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Value 1 --}}
            <div class="bg-white p-8 rounded-xl shadow-sm border border-pastel-cream-dark/20 text-center hover:shadow-md transition-shadow">
                <div class="w-16 h-16 bg-pastel-cream rounded-full flex items-center justify-center mx-auto mb-6 text-pastel-blue-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-800 mb-3">Community First</h3>
                <p class="text-slate-600">
                    We build for people. We foster a supportive environment where sellers support each other and buyers feel at home.
                </p>
            </div>

            {{-- Value 2 --}}
            <div class="bg-white p-8 rounded-xl shadow-sm border border-pastel-cream-dark/20 text-center hover:shadow-md transition-shadow">
                <div class="w-16 h-16 bg-pastel-cream rounded-full flex items-center justify-center mx-auto mb-6 text-pastel-blue-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-800 mb-3">Trust & Security</h3>
                <p class="text-slate-600">
                    Your peace of mind is our priority. We ensure safe transactions, verified sellers, and reliable customer support.
                </p>
            </div>

            {{-- Value 3 --}}
            <div class="bg-white p-8 rounded-xl shadow-sm border border-pastel-cream-dark/20 text-center hover:shadow-md transition-shadow">
                <div class="w-16 h-16 bg-pastel-cream rounded-full flex items-center justify-center mx-auto mb-6 text-pastel-blue-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-800 mb-3">Innovation</h3>
                <p class="text-slate-600">
                    We constantly evolve to bring you the best tools and features, making buying and selling easier than ever before.
                </p>
            </div>
        </div>
    </div>

    {{-- CTA Section --}}
    <div class="bg-pastel-blue-light rounded-2xl p-8 md:p-12 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-slate-800 mb-4">Ready to join the SellVerse community?</h2>
        <p class="text-slate-700 mb-8 max-w-2xl mx-auto">
            Whether you're looking to start your own business or find something special, there's a place for you here.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-pastel-blue-dark hover:bg-slate-600 transition-colors">
                Start Shopping
            </a>
            {{-- Assuming there might be a register route or similar for sellers --}}
            <a href="#" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-pastel-blue-dark bg-white hover:bg-gray-50 transition-colors">
                Become a Seller
            </a>
        </div>
    </div>
</x-layouts.app>
