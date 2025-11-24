<?php


namespace App\Livewire\Backend\Admin\Order;

use Livewire\Component;
use App\Models\Order;

class Show extends Component
{
    public $id;
    public $order;

public function mount($id)
{
    $this->id = $id;
    $this->order = Order::with('items')->findOrFail($id);
}

    public function render()
    {
        return view('livewire.backend.admin.order.show', [
            'order' => $this->order,
        ]);
    }
}
