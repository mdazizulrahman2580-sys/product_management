<?php

namespace App\Livewire\Backend\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $title, $price, $description, $discount_price, $avatar ,$status = 1;

 public function save()
{
    $this->validate([
        'title' => 'required',
        'price' => 'required|numeric',
        'avatar' => 'nullable|image|max:2048',
    ]);

    // File upload handling
    $path = null;
    if ($this->avatar) {
        $path = $this->avatar->store('products', 'public');
    }

    Product::create([
        'title' => $this->title,
        'slug' => Str::slug($this->title) . '-' . uniqid(),
        'price' => $this->price,
        'description' => $this->description,
        'discount_price' => $this->discount_price,
        'avatar' => $path, // FIXED: correct storage path
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
