<?php


namespace App\Livewire\Backend\Admin\Order;

use Livewire\Component;
use App\Models\Order;

class Show extends Component
{
    public $orderId;
    public $order;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
        $this->order = Order::with('items')->findOrFail($orderId);
    }

    public function render()
    {
        return view('livewire.backend.admin.order.show', [
            'order' => $this->order,
        ]);
    }
}
