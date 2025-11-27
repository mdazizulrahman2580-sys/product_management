@extends('layouts.app')
@section('content')
<x-navbar/>

<div class="container mx-auto py-8">


   <div class="container mx-auto">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-base-200 flex items-center py-16">
  <div class="flex flex-col-reverse lg:flex-row-reverse items-center gap-10">


    <div class="w-full lg:w-1/2 mt-10 lg:mt-0 flex justify-center">
      <img
        src="{{ asset('image/Rectangle_2.png') }}"
        class="object-cover w-full max-w-md h-auto rounded-lg "
        alt="Hero Image"
      />
    </div>



    <div class="w-full lg:w-1/2 text-center lg:text-left">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold leading-tight text-gray-900">
        FIND CLOTHES <br class="hidden sm:block" /> THAT MATCHES <br class="hidden sm:block" /> YOUR STYLE
      </h1>
      <p class="mt-6 text-gray-600 text-base sm:text-lg leading-relaxed">
        Browse through our diverse range of meticulously crafted garments, designed to bring out your individuality and cater to your sense of style.
      </p>

      <button class="mt-8 btn bg-black px-8 py-3 rounded-full text-white font-semibold hover:bg-gray-800 transition">
        Shop Now
      </button>

      <div class="mt-12 flex flex-col sm:flex-row sm:justify-center lg:justify-start gap-6 sm:gap-10 text-center">
        <div>
          <p class="text-2xl sm:text-3xl font-bold">200+</p>
          <p class="text-sm text-gray-500">International Brands</p>
        </div>
        <div class="sm:border-l border-gray-300 sm:pl-10">
          <p class="text-2xl sm:text-3xl font-bold">2,000+</p>
          <p class="text-sm text-gray-500">High-Quality Products</p>
        </div>
        <div class="sm:border-l border-gray-300 sm:pl-10">
          <p class="text-2xl sm:text-3xl font-bold">30,000+</p>
          <p class="text-sm text-gray-500">Happy Customers</p>
        </div>
      </div>
    </div>

  </div>
</div>




<div class="max-w-7xl mx-auto px-4 bg-black py-8">
  <div class="mx-auto flex flex-wrap justify-center items-center gap-10 sm:gap-16">
    <h2 class="text-white text-3xl font-bold hidden">Brands</h2>

    <span class="text-white text-3xl font-serif tracking-widest">VERSACE</span>
    <span class="text-white text-3xl font-serif tracking-widest">ZARA</span>
    <span class="text-white text-3xl font-serif tracking-widest">GUCCI</span>
    <span class="text-white text-3xl font-serif tracking-widest font-extrabold">PRADA</span>
    <span class="text-white text-3xl font-light tracking-wide font-sans">Calvin&nbsp;Klein</span>
  </div>
</div>

</div>
{{-- 222 --}}

  <section class="max-w-7xl mx-auto px-4 py-16 bg-white">
  <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-12 tracking-wide">
    NEW ARRIVALS
  </h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

   <a href="{{ route('product-details') }}"
   class="bg-gray-50 p-4 text-center rounded-2xl shadow hover:shadow-lg transition">
    <img src="{{ asset('image/image 7.png') }}" alt="T-shirt" class="rounded-xl mx-auto mb-4">
    <h3 class="text-gray-800 font-semibold text-lg">T-shirt with Tape Details</h3>
    <div class="flex items-center justify-center text-yellow-400 text-sm my-1">⭐ 4.5/5</div>
    <p class="text-gray-800 font-bold">$120</p>
   </a>

    <a href="{{route('product-details', )}}" class="bg-gray-50 p-4 text-center trounded-2xl shadow hover:shadow-lg transition">
      <img src="{{ asset('image/image 10.png') }}" alt="Jeans" class="rounded-xl mx-auto mb-4">
      <h3 class="text-gray-800 font-semibold text-lg">Skinny Fit Jeans</h3>
      <div class="flex items-center justify-center text-yellow-400 text-sm my-1">⭐ 3.8/5</div>
      <div class="flex items-center justify-center gap-2">
        <p class="text-gray-800 font-bold">$240</p>
        <p class="text-gray-400 line-through">$260</p>
        <span class="text-red-500 text-sm font-semibold">-20%</span>
      </div>
     </a>

    <a href="{{route('product-details', )}}" class="bg-gray-50 p-4 text-center rounded-2xl shadow hover:shadow-lg transition">
      <img src="{{ asset('image/image 10.png') }}" alt="Shirt" class="rounded-xl mx-auto mb-4">
      <h3 class="text-gray-800 font-semibold text-lg">Checkered Shirt</h3>
      <div class="flex items-center justify-center text-yellow-400 text-sm my-1">⭐ 4.5/5</div>
      <p class="text-gray-800 font-bold">$180</p>
    </a>

    <a href="{{route('product-details', )}}" class="bg-gray-50 p-4 rounded-2xl text-center shadow hover:shadow-lg transition">
      <img src="{{ asset('image/image 9.png') }}" alt="Striped T-shirt" class="rounded-xl mx-auto mb-4">
      <h3 class="text-gray-800 font-semibold text-lg">Sleeve Striped T-shirt</h3>
      <div class="flex items-center justify-center text-yellow-400 text-sm my-1">⭐ 4.1/5</div>
      <div class="flex items-center justify-center gap-2">
        <p class="text-gray-800 font-bold">$130</p>
        <p class="text-gray-400 line-through">$160</p>
        <span class="text-red-500 text-sm font-semibold">-20%</span>
      </div>
    </a>
  </div>

  <div class="flex justify-center mt-10">
    <button class="px-8 py-3 border border-gray-800 rounded-full font-semibold hover:bg-gray-800 hover:text-white transition">
      View All
    </button>
  </div>
</section>

    {{-- database load --}}
   <div class="container mx-auto py-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @foreach($products as $product)
        <a href="{{ route('admin.admin.products.details', $product->id) }}"
           class="border p-4 rounded-lg shadow-md bg-white flex flex-col items-center text-center hover:shadow-xl transition">

            <img src="{{ asset('storage/' . $product->avatar) }}"
                 alt="{{ $product->name }}"
                 class="w-full h-full object-cover rounded mb-3">

            <p class="text-gray-800 font-medium mt-1">{{ $product->title }}</p>
            <p class="text-yellow-400 font-bold mt-1">⭐ {{ $product->discount_price }}</p>
            <p class="text-red-600 font-semibold text-lg">৳ {{ $product->price }}</p>
            <p class="text-gray-600 text-sm mt-1">{{ $product->description }}</p>

        </a>
        @endforeach

    </div>
</div>




    <section class="max-w-7xl mx-auto px-4 py-16 bg-white">
  <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-12 tracking-wide">
    TOP SELLING
  </h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

    <div class="bg-gray-50 p-4 text-center rounded-2xl shadow hover:shadow-lg transition">
      <img src="{{ asset('image/image 7 (1).png') }}" alt="T-shirt" class="rounded-xl mx-auto mb-4">
      <h3 class="text-gray-800 font-semibold text-lg">T-shirt with Tape Details</h3>
      <div class="flex items-center justify-center text-yellow-400 text-sm my-1">⭐ 4.5/5</div>
      <p class="text-gray-800 font-bold">$120</p>
    </div>

    <div class="bg-gray-50 p-4 text-center rounded-2xl shadow hover:shadow-lg transition">
      <img src="{{ asset('image/image 9 (1).png') }}" alt="Jeans" class="rounded-xl mx-auto mb-4">
      <h3 class="text-gray-800 font-semibold text-lg">Skinny Fit Jeans</h3>
      <div class="flex items-center justify-center text-yellow-400 text-sm my-1">⭐ 3.8/5</div>
      <div class="flex items-center justify-center gap-2">
        <p class="text-gray-800 font-bold">$240</p>
        <p class="text-gray-400 line-through">$260</p>
        <span class="text-red-500 text-sm font-semibold">-20%</span>
      </div>
    </div>

    <div class="bg-gray-50 p-4 text-center rounded-2xl shadow hover:shadow-lg transition">
      <img src="{{ asset('image/image 10.png') }}" alt="Shirt" class="rounded-xl mx-auto mb-4">
      <h3 class="text-gray-800 font-semibold text-lg">Checkered Shirt</h3>
      <div class="flex items-center justify-center text-yellow-400 text-sm my-1">⭐ 4.5/5</div>
      <p class="text-gray-800 font-bold">$180</p>
    </div>


    <div class="bg-gray-50 p-4  text-center rounded-2xl shadow hover:shadow-lg transition">
      <img src="{{ asset('image/image 9 (1).png') }}" alt="Striped T-shirt" class="rounded-xl mx-auto mb-4">
      <h3 class="text-gray-800 font-semibold text-lg">Sleeve Striped T-shirt</h3>
      <div class="flex items-center justify-center text-yellow-400 text-sm my-1">⭐ 4.1/5</div>
      <div class="flex items-center justify-center gap-2">
        <p class="text-gray-800 font-bold">$130</p>
        <p class="text-gray-400 line-through">$160</p>
        <span class="text-red-500 text-sm font-semibold">-20%</span>
      </div>
    </div>
  </div>

  <div class="flex justify-center mt-10">
    <button class="px-8 py-3 border border-gray-800 rounded-full font-semibold hover:bg-gray-800 hover:text-white transition">
      View All
    </button>
  </div>
</section>


<section class="max-w-7xl mx-auto px-4 py-16 bg-gray-50 rounded-3xl">
  <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-12 tracking-wide">
    BROWSE BY <span class="text-black">DRESS STYLE</span>
  </h2>

  <div class="grid grid-cols-3 gap-6">

    <div class=" col-span-1 relative group overflow-hidden rounded-2xl shadow-md hover:shadow-2xl transition">
      <img src="{{ asset('image/Frame 61.png') }}"
           alt="Casual"
           class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
      <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition"></div>
      <h3 class="absolute bottom-4 left-4 text-white text-2xl font-bold">Casual</h3>
    </div>

    <div class="col-span-2 relative group overflow-hidden rounded-2xl shadow-md hover:shadow-2xl transition">
      <img src="{{ asset('image/Frame 62.png') }}"
           alt="Formal"
           class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
      <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition"></div>
      <h3 class="absolute bottom-4 left-4 text-white text-2xl font-bold">Formal</h3>
    </div>
     </div>
    <!-- Party -->
    <div class=" grid grid-cols-3 gap-6 mt-6">

    <div class=" col-span-2 relative group overflow-hidden rounded-2xl shadow-md hover:shadow-2xl transition">
      <img src="{{ asset('image/Frame 63.png') }}"
           alt="Party"
           class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
      <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition"></div>
      <h3 class="absolute bottom-4 left-4 text-white text-2xl font-bold">Party</h3>
    </div>


    <div class=" col-span-1 relative group overflow-hidden rounded-2xl shadow-md hover:shadow-2xl transition">
      <img src="{{ asset('image/Frame 64.png') }}"
           alt="Gym"
           class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
      <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition"></div>
      <h3 class="absolute bottom-4 left-4 text-white text-2xl font-bold">Gym</h3>
    </div>
   </div>

</section>

<x-swiper/>

<x-footer/>


   </div>



@endsection



