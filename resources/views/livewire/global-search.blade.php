<div class="relative w-full md:w-64" x-data="{ open: false }" @click.away="open = false">
    <div class="relative">
        <input 
            wire:model.live.debounce.300ms="query"
            @focus="open = true"
            @input="open = true"
            type="text" 
            placeholder="Search stores or products..." 
            class="w-full bg-white/20 border-none rounded-full px-4 py-2 text-white placeholder-white/70 focus:ring-2 focus:ring-pastel-yellow focus:bg-white/30 transition-all text-sm"
        >
        <div class="absolute right-3 top-1/2 -translate-y-1/2 text-white/70">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </div>
    </div>

    @if(strlen($query) >= 2)
        <div 
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-1"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-1"
            class="absolute top-full mt-2 w-full md:w-80 right-0 bg-white rounded-xl shadow-xl border border-slate-100 overflow-hidden z-[60]"
            style="display: none;"
        >
            @if(count($results) > 0)
                <div class="py-2">
                    @foreach($results as $result)
                        @if($result['type'] === 'Store')
                            <a href="{{ $result['url'] }}" class="block px-4 py-3 hover:bg-slate-50 transition-colors border-b border-slate-50 last:border-0 flex items-center gap-3">
                                <div class="w-10 h-10 bg-pastel-blue-light/30 rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                                     @if($result['image'])
                                        <img src="{{ Storage::url($result['image']) }}" class="w-full h-full object-cover">
                                     @else
                                        <span class="text-xs font-bold text-pastel-blue">{{ substr($result['name'], 0, 1) }}</span>
                                     @endif
                                </div>
                                <div>
                                    <div class="text-xs font-bold text-pastel-blue uppercase tracking-wider mb-0.5">Store</div>
                                    <div class="font-bold text-slate-800 text-sm">{{ $result['name'] }}</div>
                                </div>
                            </a>
                        @else
                            {{-- Product Result --}}
                            <div 
                                @click="open = false; $dispatch('open-product-modal', { productId: {{ $result['id'] }} })"
                                class="px-4 py-3 hover:bg-slate-50 transition-colors border-b border-slate-50 last:border-0 flex items-center gap-3 cursor-pointer"
                            >
                                <div class="w-10 h-10 bg-slate-100 rounded-lg flex items-center justify-center flex-shrink-0 overflow-hidden">
                                    @if($result['image'])
                                        <img src="{{ Storage::url($result['image']) }}" class="w-full h-full object-cover">
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                    @endif
                                </div>
                                <div class="flex-grow min-w-0">
                                    <div class="text-sm font-bold text-slate-800 truncate">{{ $result['name'] }}</div>
                                    <div class="text-xs text-slate-500 truncate">{{ $result['store_name'] }}</div>
                                </div>
                                <div class="font-bold text-pastel-blue text-sm whitespace-nowrap">
                                    ${{ number_format($result['price'], 2) }}
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="px-4 py-6 text-center text-slate-500 text-sm">
                    No results found for "{{ $query }}"
                </div>
            @endif
        </div>
    @endif
</div>
