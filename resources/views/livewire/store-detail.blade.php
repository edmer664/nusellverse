<div class="space-y-12">
    
    {{-- Store Hero Section --}}
    <div class="relative bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
        <div class="h-32 md:h-48 bg-pastel-blue-light/50 w-full"></div>
        <div class="px-6 md:px-12 pb-8 relative">
            <div class="flex flex-col md:flex-row items-start md:items-end gap-6 -mt-16 mb-6">
                <div class="w-32 h-32 md:w-40 md:h-40 bg-white rounded-full p-2 shadow-lg flex-shrink-0">
                    @if($this->store->logo)
                        <img src="{{ Storage::url($this->store->logo) }}" alt="{{ $this->store->name }}" class="w-full h-full object-cover rounded-full">
                    @else
                        <div class="w-full h-full bg-pastel-cream rounded-full flex items-center justify-center text-4xl font-bold text-pastel-blue">
                             {{ substr($this->store->name, 0, 1) }}
                        </div>
                    @endif
                </div>
                <div class="flex-grow">
                    <h1 class="text-3xl md:text-5xl font-bold text-slate-800 mb-2">{{ $this->store->name }}</h1>
                    <div class="flex items-center gap-4 text-slate-600">
                        <div class="flex items-center gap-1 bg-yellow-100 text-yellow-700 px-2 py-1 rounded-md text-sm font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4 text-yellow-500">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                            </svg>
                            {{ number_format($this->store->rating, 1) }}
                        </div>
                        <span>&bullet;</span>
                        <span>{{ $this->store->created_at->format('M Y') }}</span>
                    </div>
                </div>
            </div>
            
            <div class="text-slate-600 max-w-3xl text-lg leading-relaxed">{!! $this->store->description ?? 'We provide quality products.' !!}</div>

            @if($this->store->order_instructions)
                <div class="mt-6 bg-pastel-cream p-4 rounded-lg border border-pastel-cream-dark">
                    <h4 class="font-bold text-slate-700 mb-1">Order Instructions</h4>
                    <div class="text-sm text-slate-600 prose prose-sm">{!! $this->store->order_instructions !!}</div>
                </div>
            @endif
        </div>
    </div>

    {{-- Products Grid --}}
    <section>
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div class="flex items-center gap-4 flex-grow">
                <h2 class="text-3xl font-bold text-pastel-blue-dark tracking-tight">Products</h2>
                <div class="h-1 flex-grow bg-gradient-to-r from-pastel-blue/30 to-transparent rounded-full hidden md:block"></div>
            </div>
            
            <div class="flex items-center gap-2 bg-white p-2 rounded-lg border border-slate-200 shadow-sm">
                <span class="text-sm font-medium text-slate-600 pl-2">Price:</span>
                <input type="number" wire:model.live.debounce.500ms="minPrice" placeholder="Min" class="w-24 rounded-md border-slate-200 text-sm focus:border-pastel-blue focus:ring-pastel-blue">
                <span class="text-slate-400">-</span>
                <input type="number" wire:model.live.debounce.500ms="maxPrice" placeholder="Max" class="w-24 rounded-md border-slate-200 text-sm focus:border-pastel-blue focus:ring-pastel-blue">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div @click="$dispatch('open-product-modal', { productId: {{ $product->id }} })" 
                     class="group bg-white rounded-xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-slate-100 cursor-pointer">
                    <div class="h-56 bg-white relative overflow-hidden flex items-center justify-center p-4">
                        @if($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="max-w-full max-h-full object-contain group-hover:scale-110 transition-transform duration-500">
                        @else
                           <div class="text-pastel-blue-dark bg-slate-50 w-full h-full flex items-center justify-center rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 opacity-50">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                           </div>
                        @endif
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                             <span class="bg-white/90 text-slate-800 px-4 py-2 rounded-full text-sm font-bold shadow-sm transform scale-95 group-hover:scale-100 transition-transform">View Details</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-slate-800 text-lg mb-1 line-clamp-1 group-hover:text-pastel-blue transition-colors">{{ $product->name }}</h3>
                        <p class="text-slate-500 text-xs mb-3 line-clamp-2">{{ \Str::limit(strip_tags($product->description), 200) }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-pastel-blue-dark">PHP {{ number_format($product->price, 2) }}</span>
                            <button class="bg-pastel-cream hover:bg-pastel-yellow text-slate-700 p-2 rounded-full transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center text-slate-400 bg-slate-50 rounded-xl border-dashed border-2 border-slate-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 mx-auto mb-4 opacity-50">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3.25h3M12 3a6 6 0 0 0-6 6v.008h12V9a6 6 0 0 0-6-6Z" />
                    </svg>
                    <p class="text-lg font-medium">No products found in this store yet.</p>
                </div>
            @endforelse
        </div>
    </section>

    @livewire('product-modal')
</div>
