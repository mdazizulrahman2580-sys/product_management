<?php

namespace App\Livewire\backend\Admin\Products;

use Livewire\Component;
use App\Models\Product;

class Details extends Component
{
    public $product;
    public $productId;

    public $quantity = 1;
    public $selectedColor;
    public $selectedSize;

    public function mount($id)
    {
        $this->productId = $id;

        // Product load
        $this->product = Product::findOrFail($id);

        // Ensure fields are arrays
        $this->product->images = $this->product->images ?? [];
        $this->product->colors = $this->product->colors ?? [];
        $this->product->sizes  = $this->product->sizes  ?? [];

        // Default selections
        $this->selectedColor = $this->product->colors[0] ?? null;
        $this->selectedSize  = $this->product->sizes[0] ?? null;
    }

    public function increaseQty()
    {
        $this->quantity++;
    }

    public function decreaseQty()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        session()->flash('message', 'Added To Cart Successfully!');
    }

    public function render()
    {
        return view('livewire.backend.admin.products.details');
    }
}

