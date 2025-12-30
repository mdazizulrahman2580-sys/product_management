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
                 <a href="{{route('frontend.shop')}}"><option>Shop</option></a>
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

       <div class="w-full sm:w-[120px] md:w-[200px] lg:w-[300px] xl:w-[450px]">
        
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

     <div class="w-full md:w-auto text-sm mb-2 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                                                 <a href="{{ route('frontend.cart') }}" class="relative">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-700" viewBox="0 0 24 24" fill="currentColor">
        <path d="M3 3h2l3.6 7.59-1.35 2.44A2 2 0 0 0 9 16h10v-2H9.42a.25.25 0 0 1-.22-.13l.03-.06L10.1 13h7.45a2 2 0 0 0 1.8-1.1l3.24-6.49A1 1 0 0 0 21.7 4H5.21l-.94-2H1V3z"/>
    </svg>

    <!-- Dynamic Cart Count -->
    <span 
        class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full">
        {{ \App\Models\CartItem::where('user_id', Auth::id())->count() }}
    </span>
</a>

                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                          
   

                        @endif
                    @endauth
                </nav>
            @endif
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


