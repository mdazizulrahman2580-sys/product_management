@extends('layouts.app')
@section('content')
<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="container mx-auto py-10">

    <h1 class="text-3xl font-bold mb-8">🛒 My Shopping Cart</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Cart Items -->
        <div class="md:col-span-2 space-y-4">

            @forelse($cartItems as $item)
                <div class="flex items-center gap-4 p-4 border rounded-xl shadow bg-white">

                    <!-- IMAGE -->
                    <img src="{{ asset('storage/' . $item->image) }}"
                         class="w-24 h-24 rounded-lg object-cover">

                    <!-- DETAILS -->
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold">{{ $item->title }}</h2>
                        <p class="text-gray-500 text-sm">Color: {{ $item->color }} | Size: {{ $item->size }}</p>

                        <p class="mt-1 font-bold text-red-600">৳ {{ $item->price }}</p>

                        <!-- Quantity Update -->
                        <div class="flex items-center gap-2 mt-2">
                            <button wire:click="decreaseQty({{ $item->id }})"
                                    class="px-3 py-1 bg-gray-200 rounded">-</button>

                            <span class="font-semibold">{{ $item->quantity }}</span>

                            <button wire:click="increaseQty({{ $item->id }})"
                                    class="px-3 py-1 bg-gray-200 rounded">+</button>
                        </div>
                    </div>

                    <!-- TOTAL -->
                    <div class="text-xl font-bold text-green-600">
                        ৳ {{ $item->total }}
                    </div>

                    <!-- REMOVE BUTTON -->
                    <button wire:click="removeItem({{ $item->id }})"
                            class="text-red-500 hover:text-red-700 text-xl">✖</button>

                </div>
            @empty
                <p class="text-gray-600">Your cart is empty.</p>
            @endforelse

        </div>

        <!-- Cart Summary -->
        <div class="p-6 bg-white shadow rounded-xl h-fit border">

            <h2 class="text-xl font-bold mb-4">Order Summary</h2>

            <div class="space-y-2">

                <div class="flex justify-between">
                    <span class="text-gray-600">Subtotal</span>
                    <span class="font-semibold">৳ {{ $subtotal }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-600">Shipping</span>
                    <span class="font-semibold">৳ 60</span>
                </div>

                <div class="flex justify-between text-lg font-bold border-t pt-3">
                    <span>Total</span>
                    <span>৳ {{ $subtotal + 60 }}</span>
                </div>

            </div>

            <button class="mt-6 w-full bg-green-600 text-white py-3 rounded-xl font-semibold hover:bg-green-700">
                Checkout
            </button>

        </div>

    </div>
</div>

</div>
@endsection