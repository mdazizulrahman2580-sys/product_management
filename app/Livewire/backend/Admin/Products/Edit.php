<?php
namespace App\Livewire\Backend\Admin\Products;

use Livewire\Component;
use App\Models\Product;

class Edit extends Component
{
    public $product;
    public $title, $price, $status;

    public function mount($id)
    {
        $this->product = Product::findOrFail($id);

        $this->title = $this->product->title;
        $this->price = $this->product->price;
        $this->status = $this->product->status;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'price' => 'required|numeric'
        ]);

        $this->product->update([
            'title' => $this->title,
            'price' => $this->price,
            'status' => $this->status
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }

    public function render()
    {
        return view('livewire.backend.admin.products.edit');
    }
}
