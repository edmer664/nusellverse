<div>
    <div 
        x-data="{ show: @entangle('isOpen') }"
        x-show="show"
        x-on:keydown.escape.window="show = false; $wire.closeModal()"
        class="relative z-[100]"
        aria-labelledby="modal-title" 
        role="dialog" 
        aria-modal="true"
        style="display: none;"
    >
        {{-- Backdrop --}}
        <div 
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-slate-900/75 backdrop-blur-sm transition-opacity"
            @click="show = false; $wire.closeModal()"
        ></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div 
                    x-show="show"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-4xl"
                >
                    @if($product)
                        <div class="absolute right-4 top-4 z-20">
                            <button type="button" @click="show = false; $wire.closeModal()" class="rounded-full bg-white/80 p-2 text-slate-400 hover:text-slate-500 focus:outline-none hover:bg-slate-100 transition-colors">
                                <span class="sr-only">Close</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div class="flex flex-col md:flex-row">
                            {{-- Image Column --}}
                            <div class="w-full md:w-1/2 bg-slate-50 p-8 flex items-center justify-center">
                                @if($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="max-h-[400px] object-contain drop-shadow-lg">
                                @else
                                    <div class="w-full h-64 flex items-center justify-center text-slate-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            {{-- Details Column --}}
                            <div class="w-full md:w-1/2 p-8 md:p-12">
                                <h3 class="text-3xl font-bold text-slate-900 mb-2">{{ $product->name }}</h3>
                                <div class="flex items-center gap-2 mb-6">
                                    <span class="text-2xl font-bold text-pastel-blue">${{ number_format($product->price, 2) }}</span>
                                    <span class="text-xs font-bold bg-green-100 text-green-700 px-2 py-1 rounded-full uppercase tracking-wide">In Stock</span>
                                </div>
                                
                                <div class="prose prose-slate mb-8 max-h-[300px] overflow-y-auto pr-4 custom-scrollbar">
                                    <div class="text-slate-600 leading-relaxed">{!! $product->description !!}</div>
                                </div>

                                <div class="space-y-4 pt-6 border-t border-slate-100">
                                    <button class="w-full bg-pastel-blue hover:bg-pastel-blue-dark text-white font-bold py-4 px-6 rounded-xl transition-all hover:shadow-lg flex items-center justify-center gap-2 text-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        Order Now
                                    </button>
                                    <div class="text-center">
                                        <span class="text-xs text-slate-400">Sold by </span>
                                        <a href="{{ route('stores.show', $product->store_id) }}" class="text-sm font-bold text-slate-600 hover:text-pastel-blue transition-colors">
                                            {{ $product->store->name ?? 'Unknown Store' }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="p-12 text-center">
                            <svg class="animate-spin h-8 w-8 text-pastel-blue mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
