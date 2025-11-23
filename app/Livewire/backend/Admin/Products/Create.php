<?php

namespace App\Livewire\Backend\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Str;

class Create extends Component
{
    public $title, $price, $status = 1;

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'price' => 'required|numeric'
        ]);

        Product::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title) . '-' . uniqid(),  // FIXED
            'price' => $this->price,
            'status' => $this->status
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully');
    }

    public function render()
    {
        return view('livewire.backend.admin.products.create');
    }
}
