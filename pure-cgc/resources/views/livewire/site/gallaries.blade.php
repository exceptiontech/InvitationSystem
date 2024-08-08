
  <!--Start Partner-->
  <div class="partner pb-3">
    <div class="head pb-5 my-5">
            @if (isset($staticPage))
            @if (app()->getLocale() == 'ar')
      <h3 class="text-center">{{$staticPage->name}} </h3>
            @endif
            @else

      <h3 class="text-center">{{$staticPage->name_en}}</h3>
            @endif
    </div>
    <div class="container">
      <!-- Swiper -->
      <div class="swiper mySwipers">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="./images/our-work/1.jpg" alt="" />
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- <div class="swiper-pagination"></div> -->
      </div>
    </div>
  </div>