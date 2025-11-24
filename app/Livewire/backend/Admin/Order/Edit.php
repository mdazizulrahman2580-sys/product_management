<?php


namespace App\Livewire\Backend\Admin\Order;

use Livewire\Component;
use App\Models\Order;

class Edit extends Component
{
    public $order;
    public $customer_name, $customer_email, $status, $grand_total;

    public function mount($id)
    {
        $this->order = Order::findOrFail($id);
        $this->customer_name = $this->order->customer_name;
        $this->customer_email = $this->order->customer_email;
        $this->status = $this->order->status;
        $this->grand_total = $this->order->grand_total;
    }

    public function update()
    {
        $this->validate([
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'status' => 'required',
            'grand_total' => 'required|numeric',
        ]);

        $this->order->update([
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'status' => $this->status,
            'grand_total' => $this->grand_total,
        ]);

        session()->flash('success', 'Order updated successfully.');
        return redirect()->route('admin.orders.index');
    }

    public function render()
    {
        return view('livewire.backend.admin.order.edit');
    }
}
