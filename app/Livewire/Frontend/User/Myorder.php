<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class Myorder extends Component
{
     public $orders;
    public function render()
    {
       $this->orders = Order::where('user_id', Auth::id())
                        ->latest()->get();

        return view('livewire.frontend.user.myorder');
    }
}
