<?php
namespace App\Livewire\Backend\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
   use WithFileUploads;
    public $product;
    public $title, $price, $status, $description, $discount_price, $avatar;

    public function mount($id)
    {
        $this->product = Product::findOrFail($id);

        $this->title = $this->product->title;
        $this->price = $this->product->price;
        $this->status = $this->product->status;
        $this->description = $this->product->description;
        $this->discount_price = $this->product->discount_price;
        $this->avatar = $this->product->avatar;
    }

    public function update()
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


        $this->product->update([
            'title' => $this->title,
            'price' => $this->price,
            'status' => $this->status,
            'description'=>$this->description,
            'discount_price'=>$this->discount_price,
            'slug' => Str::slug($this->title) . '-' . uniqid(),
            'status' => $this->status,
            'avatar'=>$path
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }

    public function render()
    {
        return view('livewire.backend.admin.products.edit');
    }
}
