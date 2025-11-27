@extends('layouts.app')

@section('content')
<x-navbar/>

<div class="max-w-7xl mx-auto py-12">

    {{-- Breadcrumb --}}
    <div class="breadcrumbs text-sm p-6">
     <ul>
        <li><a href="{{ route('frontend.home')}}">Home</a></li>
        <li><a href="{{route('frontend.shop')}}">Shop</a></li>
        <li><a>{{ $product->category->name ?? 'Category' }}</a></li>
        <li><a>{{ $product->name }}</a></li>
     </ul>
    </div>

    <div class="flex flex-col md:flex-row">

        {{-- Left Small Thumbnails --}}
        <div class="flex md:flex-col gap-4 p-6 order-2 md:order-1">
            @foreach ($product->images as $thumb)
                <div class="flex flex-row h-35 w-35 cursor-pointer">
                    <img src="{{ asset('uploads/products/'.$thumb->image) }}"
                         wire:click="$set('mainImage', '{{ $thumb->image }}')"
                         class="w-full md:w-3/4 rounded-2xl shadow">
                </div>
            @endforeach
        </div>

        {{-- Main Image --}}
        <div class="flex flex-col order-1 md:order-2 p-4">
            <img src="{{ asset('uploads/products/'.$mainImage) }}"
                 class="w-full md:w-3/2 md:h-115 rounded-2xl shadow">
        </div>

        {{-- Product Information --}}
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-6 order-3 md:order-3">

            <h1 class="text-4xl font-extrabold mb-4 uppercase">
                {{ $product->name }}
            </h1>

            {{-- Review Stars --}}
            <div class="flex items-center mb-4">
                <div class="flex text-yellow-400 space-x-0.5">
                    ⭐⭐⭐⭐☆
                </div>
                <span class="ml-2 text-gray-500 text-sm">({{ $product->reviews_count ?? 0 }} Reviews)</span>
            </div>

            {{-- Price --}}
            <div class="flex items-center mb-4 space-x-3">
                <span class="text-4xl font-extrabold text-gray-900">${{ $product->selling_price }}</span>

                @if($product->original_price > $product->selling_price)
                <span class="text-xl text-gray-400 line-through">${{ $product->original_price }}</span>
                <span class="bg-red-100 text-red-500 text-sm font-medium px-2 py-0.5 rounded-full">
                    -{{ intval((($product->original_price - $product->selling_price)/$product->original_price)*100) }}%
                </span>
                @endif
            </div>

            {{-- Short Description --}}
            <p class="text-gray-600 text-base mb-4 leading-relaxed">
                {{ $product->short_description }}
            </p>

            {{-- Colors --}}
            <div class="mb-8">
                <p class="text-gray-900 font-medium mb-4">Select Colors</p>
                <div class="flex space-x-3">
                    @foreach ($product->colors as $color)
                        <button
                           wire:click="selectColor('{{ $color }}')"
                           class="w-8 h-8 rounded-full border-2
                           @if($selectedColor == $color) border-gray-900 @endif"
                           style="background: {{ $color }}">
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- Sizes --}}
            <div class="mb-4">
                <p class="text-gray-900 font-medium mb-3">Choose Size</p>
                <div class="flex flex-wrap gap-3">
                    @foreach ($product->sizes as $size)
                        <button
                            wire:click="selectSize('{{ $size }}')"
                            class="px-6 py-2 rounded-lg
                            {{ $selectedSize == $size ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-700' }}">
                            {{ strtoupper($size) }}
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- Quantity + Add to Cart --}}
            <div class="flex flex-col sm:flex-row gap-4">

                {{-- Quantity --}}
                <div class="flex items-center justify-center bg-gray-100 rounded-lg px-2 py-2">
                    <button wire:click="decreaseQty" class="p-2 text-gray-600">-</button>
                    <span class="px-6 text-lg font-bold">{{ $quantity }}</span>
                    <button wire:click="increaseQty" class="p-2 text-gray-600">+</button>
                </div>

                {{-- Add to Cart --}}
                <button
                    wire:click="addToCart"
                    class="flex-1 bg-black text-white font-medium px-8 py-3 rounded-lg shadow-lg">
                    Add to Cart
                </button>
            </div>

        </div>
    </div>

</div>

{{-- Recommended Section --}}
<section class="max-w-7xl mx-auto px-4 py-16 bg-white">
  <h2 class="text-4xl font-extrabold text-center mb-12">You might also like</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    @foreach ($relatedProducts as $item)
      <div class="bg-gray-50 p-4 text-center rounded-2xl shadow hover:shadow-lg">
        <img src="{{ asset('uploads/products/'.$item->firstImage()) }}"
             class="rounded-xl mx-auto mb-4">

        <h3 class="text-gray-800 font-semibold text-lg">{{ $item->name }}</h3>

        <p class="text-gray-800 font-bold">${{ $item->selling_price }}</p>
      </div>
    @endforeach
  </div>
</section>

<x-footer/>

@endsection
