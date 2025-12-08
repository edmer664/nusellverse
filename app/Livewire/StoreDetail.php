<?php

namespace App\Livewire;

use App\Models\Store;
use Livewire\Component;

class StoreDetail extends Component
{
    public Store $store;

    public function mount(Store $store)
    {
        $this->store = $store;
    }

    public function render()
    {
        return view('livewire.store-detail', [
            'products' => $this->store->products,
        ]);
    }
}
