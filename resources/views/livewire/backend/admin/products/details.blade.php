
@extends('layouts.app')
@section('content')
<div>
    {{-- The whole world belongs to you. --}}

<div>

    <x-navbar />

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

        {{-- Product Page --}}
        <div class="flex flex-col md:flex-row">

            {{-- Product Images --}}
            <div class="flex md:flex-col gap-4 p-6">
                @foreach($product->images as $img)
                    <div class="flex">
                        <img src="{{ asset('uploads/products/'.$img) }}" class="rounded-2xl shadow w-32">
                    </div>
                @endforeach
            </div>


            {{-- Main Image --}}
            <div class="p-4">
                <img src="{{ asset('uploads/products/'.$product->main_image) }}"
                     class="rounded-2xl shadow w-full">
            </div>

            {{-- Product Details --}}
            <div class="max-w-xl mx-auto p-4">

                <h1 class="text-4xl font-extrabold uppercase">{{ $product->name }}</h1>

                {{-- Rating --}}
                <div class="flex items-center mb-4">
                    <span class="text-yellow-500">⭐ {{ $product->rating }}/5</span>
                </div>

                {{-- Prices --}}
                <div class="flex items-center mb-4">
                    <span class="text-4xl font-bold">${{ $product->selling_price }}</span>

                    @if($product->original_price)
                        <span class="text-xl line-through text-gray-400 ml-3">
                            ${{ $product->original_price }}
                        </span>
                        <span class="bg-red-200 text-red-600 px-2 py-1 rounded-full ml-2">
                            -{{ $product->discount }}%
                        </span>
                    @endif
                </div>

                {{-- Description --}}
                <p class="text-gray-600">{{ $product->description }}</p>

                {{-- Colors --}}
                <div class="mt-6">
                    <p class="font-medium mb-2">Select Color</p>
                    <div class="flex space-x-3">
                        @foreach($product->colors as $color)
                            <button wire:click="$set('selectedColor','{{ $color }}')"
                                class="w-8 h-8 rounded-full border
                                {{ $selectedColor == $color ? 'border-black' : 'border-gray-300' }}"
                                style="background: {{ $color }}">
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Sizes --}}
                <div class="mt-6">
                    <p class="font-medium mb-2">Choose Size</p>
                    <div class="flex gap-3">
                        @foreach($product->sizes as $size)
                            <button wire:click="$set('selectedSize','{{ $size }}')"
                                class="px-6 py-2 rounded-lg
                                {{ $selectedSize == $size ? 'bg-black text-white' : 'bg-gray-200 text-gray-700' }}">
                                {{ $size }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Quantity --}}
                <div class="flex items-center mt-6 bg-gray-100 p-2 rounded-lg w-40">
                    <button wire:click="decreaseQty" class="px-3">-</button>
                    <span class="px-4">{{ $quantity }}</span>
                    <button wire:click="increaseQty" class="px-3">+</button>
                </div>

                {{-- Add to Cart --}}
                <button wire:click="addToCart"
                        class="mt-4 w-full bg-black text-white py-3 rounded-lg">
                    Add to Cart
                </button>

                @if(session()->has('message'))
                    <p class="text-green-500 mt-3">{{ session('message') }}</p>
                @endif

            </div>

        </div>

    </div>

    <x-footer />

</div>



</div>


    @endsection
