<div class="space-y-12">
    
    {{-- Hero/Featured Products Carousel Section --}}
    <section>
        <h2 class="text-3xl font-bold text-pastel-blue-dark mb-6 tracking-tight">Featured Products</h2>
        
        <div class="relative w-full overflow-hidden rounded-2xl shadow-lg bg-white" x-data="{
            activeSlide: 0,
            slides: {{ $featuredProducts->count() }},
            next() { this.activeSlide = (this.activeSlide + 1) % this.slides },
            prev() { this.activeSlide = (this.activeSlide - 1 + this.slides) % this.slides },
            init() { setInterval(() => this.next(), 5000) }
        }">
            {{-- Slides --}}
            <div class="relative h-[600px] md:h-[500px] ">
                @foreach($featuredProducts as $index => $product)
                    <div class="absolute inset-0 transition-opacity duration-700 ease-in-out flex items-center justify-center bg-pastel-blue-light/20"
                        x-show="activeSlide === {{ $index }}"
                        x-transition:enter="opacity-0"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="opacity-100"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                    >
                        <div class="container mx-auto px-12 flex flex-col md:flex-row items-center gap-8">
                            <div class="w-full md:w-1/2 flex justify-center">
                                @if($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="max-h-[200px] md:max-h-[400px] object-contain drop-shadow-xl rounded-lg">
                                @else
                                    <div class="w-full h-[300px] bg-white/50 rounded-lg flex items-center justify-center text-pastel-blue-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="w-full md:w-1/2 text-center md:text-left space-y-4">
                                <span class="bg-pastel-yellow text-pastel-blue-dark px-3 py-1 rounded-full text-sm font-bold uppercase tracking-wide">Featured</span>
                                <h3 class="text-4xl md:text-5xl font-bold text-slate-800">{{ $product->name }}</h3>
                                <p class="text-lg text-slate-600 line-clamp-2">{!! $product->description !!}</p>
                                <div class="flex flex-col gap-4">
                                    <div class="flex items-center gap-3">
                                        <div class="text-3xl font-bold text-pastel-blue">PHP {{ number_format($product->price, 2) }}</div>
                                        @if($product->quantity > 0)
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-bold">In Stock</span>
                                        @else
                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-bold">Out of Stock</span>
                                        @endif
                                    </div>
                                    <div class="flex gap-3">
                                        <button @click="$dispatch('open-product-modal', { productId: {{ $product->id }} })" class="inline-block w-max bg-pastel-blue hover:bg-pastel-blue-dark text-white font-bold py-3 px-8 rounded-full transition-colors shadow-md hover:shadow-lg cursor-pointer">
                                            View Details
                                        </button>
                                        <button @click="$store.cart.toggle({id: {{ $product->id }}, name: `{{ $product->name }}`, price: {{ $product->price }}, image: `{{ $product->image ? Storage::url($product->image) : '' }}`})" 
                                                class="inline-block w-max font-bold py-3 px-8 rounded-full transition-colors shadow-md hover:shadow-lg cursor-pointer flex items-center gap-2"
                                                :class="$store.cart.has({{ $product->id }}) ? 'bg-red-100 text-red-600 hover:bg-red-200' : 'bg-white text-pastel-blue hover:bg-gray-50'">
                                            <span x-text="$store.cart.has({{ $product->id }}) ? 'Remove' : 'Add to Cart'"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Controls --}}
            <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/50 hover:bg-white text-slate-800 p-2 rounded-full shadow-md transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </button>
            <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/50 hover:bg-white text-slate-800 p-2 rounded-full shadow-md transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </button>
            
            {{-- Indicators --}}
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
                <template x-for="i in slides">
                    <button @click="activeSlide = i - 1" 
                        :class="activeSlide === i - 1 ? 'bg-pastel-blue w-8' : 'bg-slate-300 w-2 hover:bg-slate-400'"
                        class="h-2 rounded-full transition-all duration-300"></button>
                </template>
            </div>
        </div>
    </section>

    {{-- Store Grid Section --}}
    <section>
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-pastel-blue-dark tracking-tight">Meet Our Sellers</h2>
            <div class="h-1 flex-grow ml-6 bg-gradient-to-r from-pastel-blue/30 to-transparent rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($stores as $store)
                <a href="{{ route('stores.show', $store) }}" class="group bg-white rounded-xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-slate-100 block h-full flex flex-col">
                    <div class="h-48 bg-pastel-blue-light/30 relative overflow-hidden flex items-center justify-center p-6">
                        @if($store->logo)
                            <img src="{{ Storage::url($store->logo) }}" alt="{{ $store->name }}" class="w-32 h-32 object-contain drop-shadow-md group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center shadow-inner group-hover:scale-110 transition-transform duration-500">
                                <span class="text-4xl font-bold text-pastel-blue">{{ substr($store->name, 0, 1) }}</span>
                            </div>
                        @endif
                        <div class="absolute top-3 right-3 bg-white/80 backdrop-blur-sm px-2 py-1 rounded-md text-xs font-bold text-slate-600 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-3 h-3 text-yellow-400">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                            </svg>
                            {{ number_format($store->rating, 1) }}
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-pastel-blue transition-colors">{{ $store->name }}</h3>
                        <p class="text-slate-500 text-sm line-clamp-2 mb-4 flex-grow">{{ Str::limit(strip_tags($store->description ?? 'No description available.'), 200) }}</p>
                        <div class="flex items-center justify-between text-xs text-slate-400 border-t pt-4 border-slate-100">
                            <span>{{ $store->products_count }} Products</span>
                            <span class="group-hover:translate-x-1 transition-transform">Visit Store &rarr;</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    @livewire('product-modal')
</div>
