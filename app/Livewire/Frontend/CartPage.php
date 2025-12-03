<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartPage extends Component
{
    public $subtotal = 0;

    public function render()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        $this->subtotal = $cartItems->sum('total');
        return view('livewire.frontend.cart-page', [
            'cartItems' => $cartItems
        ]);
    }

    // Increase Quantity
    public function increaseQty($id)
    {
        $item = CartItem::find($id);
        $item->quantity += 1;
        $item->total = $item->price * $item->quantity;
        $item->save();
    }

    // Decrease Quantity
    public function decreaseQty($id)
    {
        $item = CartItem::find($id);

        if ($item->quantity > 1) {
            $item->quantity -= 1;
            $item->total = $item->price * $item->quantity;
            $item->save();
        }
    }

    // Remove Cart Item
    public function removeItem($id)
    {
        CartItem::find($id)->delete();
    }
}
