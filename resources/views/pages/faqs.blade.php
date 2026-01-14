<x-layouts.app title="Frequently Asked Questions">
    <div class="max-w-4xl mx-auto py-10">
        <h1 class="text-3xl font-bold text-center text-pastel-blue mb-10">Frequently Asked Questions</h1>
        
        <div class="space-y-4" x-data="{ active: null }">
            
            {{-- FAQ Item 1 --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <button 
                    @click="active = (active === 1 ? null : 1)" 
                    class="w-full flex justify-between items-center p-6 text-left focus:outline-none"
                    :class="active === 1 ? 'bg-slate-50' : ''"
                >
                    <span class="font-bold text-lg text-slate-800">What is Sellverse?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pastel-blue transform transition-transform duration-200" :class="active === 1 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div 
                    x-show="active === 1" 
                    x-collapse 
                    class="p-6 pt-0 text-slate-600 leading-relaxed"
                    style="display: none;"
                >
                    Sellverse is an online marketplace exclusively for the National University Fairview community, where students can browse and support student-run businesses selling food, clothing, and accessories.
                </div>
            </div>

            {{-- FAQ Item 2 --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <button 
                    @click="active = (active === 2 ? null : 2)" 
                    class="w-full flex justify-between items-center p-6 text-left focus:outline-none"
                    :class="active === 2 ? 'bg-slate-50' : ''"
                >
                    <span class="font-bold text-lg text-slate-800">Who can use Sellverse?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pastel-blue transform transition-transform duration-200" :class="active === 2 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div 
                    x-show="active === 2" 
                    x-collapse 
                    class="p-6 pt-0 text-slate-600 leading-relaxed"
                    style="display: none;"
                >
                    Sellverse is open only to bona fide NU Fairview students. Both buyers and sellers must be part of the NU Fairview community.
                </div>
            </div>

            {{-- FAQ Item 3 --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <button 
                    @click="active = (active === 3 ? null : 3)" 
                    class="w-full flex justify-between items-center p-6 text-left focus:outline-none"
                    :class="active === 3 ? 'bg-slate-50' : ''"
                >
                    <span class="font-bold text-lg text-slate-800">What products are available on Sellverse?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pastel-blue transform transition-transform duration-200" :class="active === 3 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div 
                    x-show="active === 3" 
                    x-collapse 
                    class="p-6 pt-0 text-slate-600 leading-relaxed"
                    style="display: none;"
                >
                    Sellverse currently features student-run businesses offering food, clothing, and accessories. Other product categories are not supported at this time.
                </div>
            </div>

            {{-- FAQ Item 4 --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <button 
                    @click="active = (active === 4 ? null : 4)" 
                    class="w-full flex justify-between items-center p-6 text-left focus:outline-none"
                    :class="active === 4 ? 'bg-slate-50' : ''"
                >
                    <span class="font-bold text-lg text-slate-800">How do I become a seller on Sellverse?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pastel-blue transform transition-transform duration-200" :class="active === 4 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div 
                    x-show="active === 4" 
                    x-collapse 
                    class="p-6 pt-0 text-slate-600 leading-relaxed"
                    style="display: none;"
                >
                    Student entrepreneurs with continuous business operations may register as sellers by providing basic business details for verification.
                </div>
            </div>

            {{-- FAQ Item 5 --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <button 
                    @click="active = (active === 5 ? null : 5)" 
                    class="w-full flex justify-between items-center p-6 text-left focus:outline-none"
                    :class="active === 5 ? 'bg-slate-50' : ''"
                >
                    <span class="font-bold text-lg text-slate-800">Does Sellverse handle payments and deliveries?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pastel-blue transform transition-transform duration-200" :class="active === 5 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div 
                    x-show="active === 5" 
                    x-collapse 
                    class="p-6 pt-0 text-slate-600 leading-relaxed"
                    style="display: none;"
                >
                    Sellverse serves as a marketplace for showcasing products and connecting buyers and sellers. Payment and delivery arrangements are coordinated directly between the buyer and the seller.
                </div>
            </div>

             {{-- FAQ Item 6 --}}
             <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <button 
                    @click="active = (active === 6 ? null : 6)" 
                    class="w-full flex justify-between items-center p-6 text-left focus:outline-none"
                    :class="active === 6 ? 'bg-slate-50' : ''"
                >
                    <span class="font-bold text-lg text-slate-800">Is Sellverse safe to use?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pastel-blue transform transition-transform duration-200" :class="active === 6 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div 
                    x-show="active === 6" 
                    x-collapse 
                    class="p-6 pt-0 text-slate-600 leading-relaxed"
                    style="display: none;"
                >
                    Sellverse promotes a secure and community-based environment. However, users are encouraged to transact responsibly and verify seller information before making purchases.
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>