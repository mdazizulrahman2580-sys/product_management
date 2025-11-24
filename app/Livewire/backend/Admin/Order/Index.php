<?php


namespace App\Livewire\Backend\Admin\Order;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;

class Index extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        session()->flash('success', 'Order deleted.');
    }

    public function render()
    {
        $orders = Order::query()
            ->when($this->search, function ($q) {
                $q->where('customer_name', 'like', '%'.$this->search.'%')
                  ->orWhere('customer_email', 'like', '%'.$this->search.'%')
                  ->orWhere('status', 'like', '%'.$this->search.'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.backend.admin.order.index', [
            'orders' => $orders,
        ]);
    }
}
