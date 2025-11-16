
 <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center mb-12">
        <h1 class="text-3xl sm:text-5xl font-extrabold text-gray-900 mb-4">Choose your plan</h1>
        <p class="text-base sm:text-lg text-gray-600 max-w-3xl mx-auto">
            Lorem ipsum dolor sit amet consectetur. Quis tortor gravida nibh arcu id purus ullamcorper. Vel vel erat semper augue.

        </p>
    </div>

        <div class="swiper mySwiper   ">
            <div class="swiper-wrapper ">

                {{-- 111 --}}
            <div class="swiper-slide  shadow-3xl rounded-xl bg-white flex items-center justify-center p-8 text-gray-800 text-xl  ">

     <div class="bg-white rounded-xl p-6 shadow border">
      <div class="flex items-center mb-3">
        <div class="flex text-yellow-400 text-xl">★★★★★</div>
      </div>
      <p class="font-semibold mb-1">
        Sarah M. <span class="text-green-600 text-lg">●</span>
      </p>
      <p class="text-sm text-gray-600">
        “I’m blown away by the quality and style of the clothes I received from Shop.co. From casual wear to elegant dresses, every piece I’ve bought has exceeded my expectations and so happy to recommend .”
      </p>
    </div>
          </div>

          {{-- 222 slyder --}}

         <div class="swiper-slide bg-white flex items-center justify-center p-8 text-gray-800 text-xl ">

     <div class="bg-white rounded-xl p-6 shadow border">
      <div class="flex items-center mb-3">
        <div class="flex text-yellow-400 text-xl">★★★★★</div>
      </div>
      <p class="font-semibold mb-1">
        Alex K. <span class="text-green-600 text-lg">●</span>
      </p>
      <p class="text-sm text-gray-600">
        “Finding clothes that align with my personal style used to be a challenge until I discovered Shop.co. The range of options they offer is truly remarkable, catering to a variety of tastes and occasions.”
      </p>
    </div>
                </div>

                {{-- 33 --}}
        <div class="swiper-slide bg-white flex items-center justify-center p-8 text-gray-800 text-xl ">
     <div class="bg-white rounded-xl p-6 shadow border">
       <div class="flex items-center mb-3">
        <div class="flex text-yellow-400 text-xl">★★★★★</div>
      </div>
      <p class="font-semibold mb-1">
        James L. <span class="text-green-600 text-lg">●</span>
      </p>
      <p class="text-sm text-gray-600">
        “As someone who’s always on the lookout for unique fashion pieces, I’m thrilled to have stumbled upon Shop.co. The selection of clothes is not only diverse but also on-point with the latest trends.”
      </p>
    </div>

                </div>



            </div>

            <div class="swiper-pagination mt-4"></div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 20,


    breakpoints: {
      768: {
        slidesPerView: 1,
        spaceBetween: 24,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },

    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
  });
</script>




