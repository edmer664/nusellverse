<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Store;
use Livewire\Component;

class GlobalSearch extends Component
{
    public $query = '';

    public $results = [];

    public function updatedQuery()
    {
        $this->results = [];

        if (strlen($this->query) < 2) {
            return;
        }

        $stores = Store::where('name', 'like', '%'.$this->query.'%')
            ->take(3)
            ->get()
            ->map(function ($store) {
                return [
                    'type' => 'Store',
                    'name' => $store->name,
                    'url' => route('stores.show', $store),
                    'image' => $store->logo,
                ];
            });

        $products = Product::where('name', 'like', '%'.$this->query.'%')
            ->take(5)
            ->get()
            ->map(function ($product) {
                return [
                    'type' => 'Product',
                    'id' => $product->id, // For modal
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                    'store_name' => $product->store->name,
                ];
            });

        $this->results = $stores->concat($products)->values()->all();
    }

    public function render()
    {
        return view('livewire.global-search');
    }
}
