<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class AddToCart extends Component
{
    public $product;
    public $quantity = 1;
    public $selectedColor;
    public $selectedSize;

    public function mount($product)
    {
        $this->product = $product;
        
        // Default color/size
        $this->selectedColor = $product->colors[0] ?? null;
        $this->selectedSize = $product->sizes[0] ?? null;
    }

    public function increase() { $this->quantity++; }
   
    public function decrease()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        if (!Auth::check()) {
            session()->flash('message', 'Please login first');
            return;
        }

        $price = $this->product->price;
        $total = $price * $this->quantity;

        CartItem::create([
            'user_id'     => Auth::id(),
            'product_id'  => $this->product->id,
            'quantity'    => $this->quantity,
            'color'       => $this->selectedColor,
            'size'        => $this->selectedSize,
            'price'       => $price,
            'total'       => $total,
            'image'       => $this->product->avatar,
            'title'       => $this->product->name,
        ]);

        session()->flash('message', 'Product added to your cart!');
    }
    

    public function render()
    {
        return view('livewire.frontend.add-to-cart');
    }
}
