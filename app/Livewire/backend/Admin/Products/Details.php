<?php

namespace App\Livewire\Backend\Admin\Products;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

class Details extends Component
{
    use WithFileUploads;

    public $product;
    public $productId;

    public $colors = [];
    public $sizes = [];

    public $selectedImage;
    public $selectedColor;
    public $selectedSize;

    public $quantity = 1;

    public $mainImage;
    public $mainTitle;
    public $mainPrice;
    public $mainDescription;

    public $image_1;
    public $image_2;
    public $avatar;
public $imagelist = [];

    protected $rules = [
        'image_1' => 'nullable|image|max:2048',
        'image_2' => 'nullable|image|max:2048',
        'avatar'  => 'nullable|image|max:2048',
    ];

    public function mount($id)
    {


        $this->product = Product::findOrFail($id);

        // Product ID
        $this->productId = $id;
        $this->imagelist = [
 
    $this->product->image_1,
    $this->product->image_2,
];
        // DEFAULT MAIN IMAGE
        if ($this->product->avatar) {
            $this->mainImage = asset('storage/' . $this->product->avatar);
        } elseif ($this->product->image_1) {
            $this->mainImage = asset('storage/' . $this->product->image_1);
        } elseif ($this->product->image_2) {
            $this->mainImage = asset('storage/' . $this->product->image_2);
        } else {
            $this->mainImage = null;
        }

        // DEFAULT CONTENT
        $this->mainTitle = $this->product->title;
        $this->mainPrice = $this->product->price;
        $this->mainDescription = $this->product->description;

        // COLORS / SIZES FIX
      $this->product->colors = is_array($this->product->colors) ? $this->product->colors : 
        ['#4f6d4a', '#212121', '#283350']; // Added fallback colors
        $this->product->sizes  = is_array($this->product->sizes)  ? $this->product->sizes  : ['Small', 'Medium', 'Large', 'X-Large']; // Added fallback sizes

        // Default Selections
        $this->selectedColor = $this->product->colors[0] ?? null;
        $this->selectedSize  = $this->product->sizes[2] ?? 'Large'; // Set default size to 'Large' to ma
        $this->selectedSize  = in_array($this->selectedSize, $this->product->sizes) ? $this->selectedSize : $this->product->sizes[0] ?? null;
        // DEFAULT SELECTED COLOR & SIZE
        $this->selectedColor = $this->colors[0] ?? null;
        $this->selectedSize  = $this->sizes[0] ?? null;
    }

    // MAIN IMAGE CHANGER
    public function changeMainImage($image, $title, $price, $description)
    {
        $this->mainImage = asset('storage/' . $image);
        $this->mainTitle = $title;
        $this->mainPrice = $price;
        $this->mainDescription = $description;
    }



    // QTY + -
    public function increaseQty()
    {
        $this->quantity++;
    }

    public function decreaseQty()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    // ADD TO CART
    public function addToCart()
    {
        session()->flash('message', 'Added To Cart Successfully!');
    }

    public function render()
    {
        return view('livewire.backend.admin.products.details', [
            'product' => $this->product,
        ]);
    }
}
