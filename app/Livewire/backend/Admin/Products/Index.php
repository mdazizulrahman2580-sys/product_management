<?php

namespace App\Livewire\Backend\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;

class Index extends Component
{

    public $products;

    public function mount()
    {
        $this->products = Product::latest()->get();
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        $this->products = Product::latest()->get(); // Refresh
        session()->flash('success', 'Product deleted successfully.');


    }

    public function render()
    {

        return view('livewire.backend.admin.products.index');
    }
}
