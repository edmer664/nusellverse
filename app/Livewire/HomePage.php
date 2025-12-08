<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Store;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page', [
            'stores' => Store::withCount('products')->get(),
            'featuredProducts' => Product::inRandomOrder()->take(10)->get(),
        ]);
    }
}
