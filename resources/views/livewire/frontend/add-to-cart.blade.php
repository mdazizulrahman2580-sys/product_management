
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
<div class="mt-6">

    {{-- Color --}}
    <div class="mb-4">
        <p class="font-bold mb-2">Select Color:</p>
        <div class="flex gap-2">
            @foreach($product->colors ?? [] as $color)
                <button wire:click="$set('selectedColor','{{ $color }}')"
                    class="w-8 h-8 rounded-full border
                    {{ $selectedColor == $color ? 'border-black ring-2 ring-black' : 'border-gray-300' }}"
                    style="background: {{ $color }};">
                </button>
            @endforeach
        </div>
    </div>

    {{-- Size --}}
    <div class="mb-6">
        <p class="font-bold mb-2">Select Size:</p>
        <div class="flex gap-3">
            @foreach($product->sizes ?? [] as $size)
                <button wire:click="$set('selectedSize','{{ $size }}')"
                    class="px-4 py-2 rounded-lg
                    {{ $selectedSize == $size ? 'bg-black text-white' : 'bg-gray-200' }}">
                    {{ $size }}
                </button>
            @endforeach
        </div>
    </div>


    {{-- Quantity & Add Button --}}
    <div class="flex gap-4">

        {{-- Quantity --}}
        <div class="flex items-center border rounded-full w-32">
            <button wire:click="decrease" class="px-4 text-xl">-</button>
            <span class="flex-grow text-center font-bold">{{ $quantity }}</span>
            <button wire:click="increase" class="px-4 text-xl">+</button>
        </div>

        {{-- Add to Cart --}}
        <button wire:click="addToCart"
            class="flex-grow bg-black text-white py-3 rounded-full font-bold">
            Add to Cart
        </button>
    </div>


    {{-- Message --}}
    @if(session()->has('message'))
        <p class="text-green-600 font-semibold mt-3">{{ session('message') }}</p>
    @endif


</div>

    
   
</div>