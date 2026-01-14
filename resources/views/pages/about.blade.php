<x-layouts.app>
    {{-- What is Sellverse Section --}}
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-12">
        <div class="relative bg-pastel-blue py-16 px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl mb-6">
                What is Sellverse?
            </h1>
            <p class="max-w-3xl mx-auto text-xl text-white/90 leading-relaxed">
                Sellverse is a student marketplace website created exclusively for the NU Fairview community. It serves as a centralized digital platform where NU Fairview student entrepreneurs can showcase their products and where students can easily discover and support campus-based businesses.
            </p>
        </div>
    </div>

    {{-- Mission Section --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="bg-white p-8 md:p-12 rounded-2xl shadow-sm border border-slate-100 text-center relative overflow-hidden">
            {{-- Decorative background element --}}
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-pastel-blue to-pastel-cream"></div>
            
            <h2 class="text-3xl font-bold text-slate-800 sm:text-4xl mb-8">Mission</h2>
            <p class="text-lg text-slate-600 max-w-4xl mx-auto leading-relaxed">
                At Sellverse, we believe in the power of connection within the NU Fairview community. Our mission is to create a secure, organized, and easy-to-use digital marketplace where student entrepreneurs can thrive and fellow students can conveniently discover and support campus-based businesses. By bringing student-run shops together in one centralized platform, Sellverse moves beyond scattered social media pages to provide a seamless and enjoyable buying and selling experience for everyone.
            </p>
        </div>
    </div>

    {{-- Team Section --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-800 sm:text-4xl mb-6">About the Team</h2>
            <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                Sellverse is developed and managed by NU Fairview students who aim to create a platform that supports student initiatives, entrepreneurship, and collaboration within the campus community.
            </p>
        </div>

        {{-- Team Members Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12 justify-center">
            @foreach([
                'Gabriel Vincent Acbay', 
                'John Andrei Abalahon', 
                'Krizzie Yvonne Ang', 
                'Tanya Grace Hipolito', 
                'Jaymae Jamila', 
                'Princess Jeanne Marcelo', 
                'Reign Nicole Pelobello'
            ] as $member)
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 text-center hover:shadow-md transition-all hover:-translate-y-1">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-pastel-blue-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800">{{ $member }}</h3>
                    <p class="text-sm text-slate-500 mt-1">Team Member</p>
                </div>
            @endforeach
        </div>

        <div class="bg-pastel-blue-light/30 rounded-2xl p-8 text-center border border-pastel-blue/10">
             <p class="text-lg text-slate-700 max-w-3xl mx-auto italic font-medium">
                "Together, the team is committed to building a student-centered marketplace that promotes accessibility, convenience, and support for NU Fairview student entrepreneurs."
            </p>
        </div>
    </div>
</x-layouts.app>
