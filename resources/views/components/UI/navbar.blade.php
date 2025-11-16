<header class="bg-white  py-4 fixed top-0 left-0 right-0 w-full">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex justify-between items-center  ">


      <div class="flex items-center space-x-3">
        <a href="#" class="text-2xl font-bold text-gray-800">
          SHOP.CO
        </a>
      </div>


      <nav class="hidden md:flex flex-1  md:col-auto justify-center gap-4">
        <ul class="flex items-center space-x-10">
          <li>
            <select class="select select-sm select-bordered border-gray-300 text-base font-medium text-gray-600 hover:text-red-500 transition">
                 <a href="{{route('shop')}}"><option>Shop</option></a>
              <option>Item</option>
              <option>Bun</option>
              <option>Yarn</option>
            </select>
          </li>
          <li>
            <a href="#" class="text-gray-600 hover:text-red-500 font-medium text-base transition duration-200">On Sale</a>
          </li>
          <li>
            <a href="#" class="text-gray-600 hover:text-red-500 font-medium text-base transition duration-200">New Arrivals</a>
          </li>
          <li>
            <a href="#" class="text-gray-600 hover:text-red-500 font-medium text-base transition duration-200">Brands</a>
          </li>
        </ul>
      </nav>

      <div class="flex items-center gap-4">

        <div class="hidden md:block  w-full md:w-[100px] lg:w-[350px] xl:w-[450px]">
          <label class="input flex items-center gap-2 h-10 w-full border rounded-lg px-3">
            <svg class="h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.3-4.3"></path>
              </g>
            </svg>
            <input type="search" required placeholder="Search"
              class="flex-1 h-full outline-none bg-transparent text-sm" />
          </label>
        </div>



        <div class=" hidden md:flex  gap-4 justify-center ">
          <img src="{{ asset('image/Frame.png') }}" alt="Frame" class="h-5 w-auto ">
          <img src="{{ asset('image/Vector.png') }}" alt="Vector" class="h-5 w-auto">
        </div>


    <div class="md:hidden drawer drawer-end flex">
  <input id="mobile-drawer" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content   drawer-left">
    <!-- Page content here -->
     <label for="mobile-drawer" class="btn btn-ghost btn-square drawer-button">
      <svg xmlns="http://www.w3.org/2000/svg" class="min-w-6 h-6" fill="none"
           viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </label>
  </div>

  <div class="drawer-side">
    <label for="mobile-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
    <ul class="menu bg-base-200 min-h-full w-80 p-4">
      <!-- Sidebar content here -->

      <li><a><label class="input flex items-center gap-2 h-10 w-full border rounded-lg px-3">
            <svg class="h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.3-4.3"></path>
              </g>
            </svg>
            <input type="search" required placeholder="Search"
              class="flex-1 h-full outline-none bg-transparent text-sm" />
              <img src="{{ asset('image/Frame.png') }}" alt="Frame" class="h-5 w-auto ">
          <img src="{{ asset('image/Vector.png') }}" alt="Vector" class="h-5 w-auto">
          </label></a></li>

      <li><a>On Sell</a></li>
      <li><a>New Arrivels</a></li>
      <li><a>Brands</a></li>
    </ul>
  </div>
</div>


      </div>

    </div>
  </div>
</header>

