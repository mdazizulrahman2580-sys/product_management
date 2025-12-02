@extends('layouts.app')

@section('content')
<div class="font-sans"> {{-- Ensure a consistent font is applied, assuming 'font-sans' is available --}}

    <x-navbar />

    <div class="max-w-7xl mx-auto py-12">

        {{-- Breadcrumb (Retained) --}}
        <div class="breadcrumbs text-sm p-6 text-gray-500">
            <ul>
                <li><a href="{{ route('frontend.home')}}">Home</a></li>
                <li><a href="{{route('frontend.shop')}}">Shop</a></li>
                <li><a>{{ $product->category->name ?? 'Category' }}</a></li>
                <li class="font-bold text-black"><a>{{ $product->name }}</a></li>
            </ul>
        </div>

        {{-- Product Page --}}

        
<div class="flex flex-col md:flex-row p-6">

            {{-- Product Images - Two columns for thumbnails, one for main image --}}
            <div class="flex flex-col md:flex-row md:w-3/5 gap-4">
                {{-- Thumbnails (Avatar) - Vertically stacked on desktop --}}
<div class="flex md:flex-col gap-4">

    {{-- Avatar --}}
 <div class="border w-24 h-24 rounded-xl overflow-hidden shadow mb-3">
    @if($product->avatar)
        <img src="{{ asset('storage/'.$product->avatar) }}"
             wire:click="changeMainImage(
                '{{ $product->avatar }}',
                '{{ $product->title }}',
                '{{ $product->price }}',
                '{{ $product->description }}'
             )"
             class="w-full h-full object-cover cursor-pointer">
    @else
        <div class="w-full h-full flex items-center justify-center text-gray-400">
            No Image
        </div>
    @endif
</div>
@foreach($imagelist as $img)
    <div class="border w-24 h-24 rounded-xl overflow-hidden shadow mb-3">
        @if($img)
            <img src="{{ asset('storage/' . $img) }}"
                 wire:click="changeMainImage(
                    '{{ $img }}',
                    '{{ $product->title }}',
                    '{{ $product->price }}',
                    '{{ $product->description }}'
                 )"
                 class="w-full h-full object-cover cursor-pointer">
        @else
            <div class="w-full h-full flex items-center justify-center text-gray-400">
                No Image
            </div>
        @endif
    </div>
@endforeach


</div>



                {{-- Main Image --}}
                <div class="flex-grow">
     <img src="{{ $mainImage }}" class="rounded-2xl shadow w-full">

<h1 class="text-3xl font-bold mt-4">{{ $mainTitle }}</h1>
<p class="text-red-600 text-xl font-bold mt-1">৳ {{ $mainPrice }}</p>
<p class="text-gray-600 mt-2">{{ $mainDescription }}</p>

                </div>
            </div>


            {{-- Product Details (Right Column) --}}
            <div class="md:w-2/5 md:pl-8 mt-8 md:mt-0">

                <h1 class="text-5xl font-extrabold uppercase mb-2 leading-none tracking-tight">{{ $product->name }}</h1>

                <div class="flex items-center mb-6">
                    {{-- Star Rating (Using full stars to mimic the image) --}}
                    <span class="text-black text-lg">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="{{ ($product->rating ?? 4.5) >= $i ? 'text-yellow-500' : 'text-gray-300' }}">★</span>
                        @endfor
                        {{-- Display numeric rating --}}
                         <span class="ml-2 font-medium">{{ $product->rating ?? 4.5 }}/5</span>
                         
                    </span>
                </div>

                {{-- Price --}}
                <div class="flex items-center mb-6">
                    {{-- Selling Price (Bolder and larger) --}}
                    <span class="text-4xl font-extrabold text-black mr-4">৳{{ $product->price}}</span>

                    @if($product->price)
                        {{-- Original Price (Crossed out) --}}
                        <span class="text-2xl line-through text-gray-400">
                            ৳{{ $product->original_price ?? 300 }}
                        </span>
                        {{-- Discount Tag --}}
                        <span class="text-red-600 ml-3 font-bold text-lg">
                            -{{ $product->discount_price ?? 40 }}%
                        </span>
                    @endif
                </div>

                {{-- Description --}}
                <p class="text-gray-600 mb-6">{{ $product->description ?? 'The graphic t-shirt which is perfect for any occasion. Crafted from a soft and breathable fabric, it offers superior comfort and style.' }}</p>

                <hr class="my-6">

                {{-- Colors --}}
                <div class="mt-6">
                    <p class="font-bold text-sm uppercase mb-2">Select Colors</p>

                    <div class="flex space-x-3">
                        @forelse($product->colors as $color)
                            {{-- For demonstration, let's assume the colors are 'darkgreen', 'navy', 'black' --}}
                            <button wire:click="$set('selectedColor','{{ $color }}')"
                                    class="w-8 h-8 rounded-full border-2 transition-all duration-200
                                    {{ $selectedColor == $color ? 'border-black ring-2 ring-offset-1 ring-black' : 'border-gray-300' }}"
                                    style="background-color: {{ $color }}">
                            </button>
                        @empty
                             {{-- Using the colors from the image as fallback for visual consistency --}}
                             <button wire:click="$set('selectedColor','{{ '#4f6d4a' }}')"
                                    class="w-8 h-8 rounded-full border-2 transition-all duration-200
                                    {{ $selectedColor == '#4f6d4a' ? 'border-black ring-2 ring-offset-1 ring-black' : 'border-gray-300' }}"
                                    style="background-color: #4f6d4a">
                            </button>
                            <button wire:click="$set('selectedColor','{{ '#212121' }}')"
                                    class="w-8 h-8 rounded-full border-2 transition-all duration-200
                                    {{ $selectedColor == '#212121' ? 'border-black ring-2 ring-offset-1 ring-black' : 'border-gray-300' }}"
                                    style="background-color: #212121">
                            </button>
                            <button wire:click="$set('selectedColor','{{ '#283350' }}')"
                                    class="w-8 h-8 rounded-full border-2 transition-all duration-200
                                    {{ $selectedColor == '#283350' ? 'border-black ring-2 ring-offset-1 ring-black' : 'border-gray-300' }}"
                                    style="background-color: #283350">
                            </button>
                        @endforelse
                    </div>
                </div>

                {{-- Sizes --}}
                <div class="mt-8">
                    <p class="font-bold text-sm uppercase mb-2">Choose Size</p>

                    <div class="flex gap-3">
                        @forelse($product->sizes as $size)
                            <button wire:click="$set('selectedSize','{{ $size }}')"
                                    class="px-6 py-2 rounded-lg font-bold text-sm uppercase transition-colors duration-200
                                    {{ $selectedSize == $size ? 'bg-black text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                                {{ $size }}
                            </button>
                        @empty
                             {{-- Using the sizes from the image as fallback for visual consistency --}}
                            <button wire:click="$set('selectedSize','Small')"
                                    class="px-6 py-2 rounded-lg font-bold text-sm uppercase bg-gray-100 text-gray-700 hover:bg-gray-200">
                                Small
                            </button>
                            <button wire:click="$set('selectedSize','Medium')"
                                    class="px-6 py-2 rounded-lg font-bold text-sm uppercase bg-gray-100 text-gray-700 hover:bg-gray-200">
                                Medium
                            </button>
                            <button wire:click="$set('selectedSize','Large')"
                                    class="px-6 py-2 rounded-lg font-bold text-sm uppercase bg-black text-white">
                                Large
                            </button>
                            <button wire:click="$set('selectedSize','X-Large')"
                                    class="px-6 py-2 rounded-lg font-bold text-sm uppercase bg-gray-100 text-gray-700 hover:bg-gray-200">
                                X-Large
                            </button>
                        @endforelse
                    </div>
                </div>
                
                <hr class="my-8">

                {{-- Quantity & Add to Cart Container --}}
                <div class="flex items-center gap-4">
                    {{-- Quantity --}}
                    <div class="flex items-center border border-gray-300 rounded-full w-32 h-12 overflow-hidden">
                        <button wire:click="decreaseQty" class="px-4 text-xl font-medium flex items-center justify-center h-full">-</button>
                        <span class="flex-grow text-center text-lg font-bold">{{ $quantity }}</span>
                        <button wire:click="increaseQty" class="px-4 text-xl font-medium flex items-center justify-center h-full">+</button>
                    </div>

                    {{-- Add to Cart --}}
                    <button wire:click="addToCart"
                            class="flex-grow bg-black text-white font-bold text-lg uppercase py-3 rounded-full hover:bg-gray-800 transition-colors duration-200 h-12">
                        Add to Cart
                    </button>
                </div>

                @if(session()->has('message'))
                    <p class="text-green-500 mt-3 font-medium">{{ session('message') }}</p>
                @endif

            </div>

        </div>

    </div>

    <x-footer />

</div>
@endsection