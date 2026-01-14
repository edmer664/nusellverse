<?php

namespace App\Livewire;

use App\Models\Store;
use Livewire\Component;

class StoreDetail extends Component
{
    public Store $store;
    public $minPrice;
    public $maxPrice;

    public function mount(Store $store)
    {
        $this->store = $store;
    }

    public function render()
    {
        $products = $this->store->products()
            ->when($this->minPrice, fn($query) => $query->where('price', '>=', $this->minPrice))
            ->when($this->maxPrice, fn($query) => $query->where('price', '<=', $this->maxPrice))
            ->get();

        $reviews = $this->store->reviews()->latest()->get();

        return view('livewire.store-detail', [
            'products' => $products,
            'reviews' => $reviews,
        ]);
    }
}
