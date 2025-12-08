<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductModal extends Component
{
    public bool $isOpen = false;
    public ?Product $product = null;

    #[On('open-product-modal')] 
    public function openModal($productId)
    {
        // Handle if productId is passed as an array (Livewire event payload behavior)
        if (is_array($productId) && isset($productId['productId'])) {
            $productId = $productId['productId'];
        }
        
        $this->product = Product::find($productId);
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->product = null;
    }

    public function render()
    {
        return view('livewire.product-modal');
    }
}
