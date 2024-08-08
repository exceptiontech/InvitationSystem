
<?php
        {{--  use App\Models\StaticPage;  --}}
        {{--  $results=StaticPage::whereIn('id',[4,5,6])->get();
        $why_we=StaticPage::where('id',3)->first();
        $about=StaticPage::where('id',7)->first();  --}}

?>
<div class="header">
    <div class="container">
      <div class="head">
        <h2>
          شركه بيور سوفت
          <span class="anim"></span>
        </h2>
      </div>
    </div>
  </div>
  <!--End Header-->
  <!--Start Cards-->
  <div class="cards">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 py-2">
          <div class="box wow fadeInUpBig" data-wow-delay="700ms">
          @if (app()->getLocale()=='ar')
                <h3>{{ $why_we->name }}</h3>
              @else
              <h3>{{ $why_we->name_en }}</h3>
              @endif
            <span>
                @if (isset($why_we))
                {!! app()->getLocale()=='ar' ?  $why_we->details : $why_we->details_en!!}
                @endif
            </span>
            <div class="btn">

            </div>
          </div>
        </div>

        @foreach ($result as $result)

        <div class="col-lg-3 col-md-6 col-sm-6 py-2">
          <div class="box text-center wow fadeInRightBig" data-wow-delay="500ms">
            <div class="icon">
              <i class="fa-solid fa-eye-low-vision"></i>
            </div>
            <h3>{{ app()->getLocale()=='ar' ?  $result->name : $result->name_en}}</h3>
            <span> {!! app()->getLocale()=='ar' ?  $result->details : $result->details_en!!}</span>
          </div>
        </div>

        @endforeach

      </div>
    </div>
  </div>
  <!--End Cards--><!--Start About-US-->
  <span class="about-hover"></span>
  <div class="about-us" id="about">
    <div class="container">
      <div class="info-about">
        <div class="details text-center">

          @if (app()->getLocale()=='ar')
          <h3 class="wow bounceInDown" data-wow-delay="1s" data-wow-duration="500ms"> {{ $about->name }}</h3>
          @else
          <h3 class="wow bounceInDown" data-wow-delay="1s" data-wow-duration="500ms"> {{ $about->name_en }}</h3>
          @endif
          <p class="wow bounceInLeft" data-wow-delay="1.5s" data-wow-duration="700ms">
                @if (isset($about))
                {!! app()->getLocale()=='ar' ?  $about->details : $why_we->details_en!!}
                @endif
          </p>
        </div>
      </div>
    </div>
  </div>
  <!--End About-US-->
  <!-- <div> </div> -->
  <!--start social-->
  <div class="parent-social">
    <div class="social">
      <div class="link face">
        <a target="_blank" href="https://www.facebook.com/puresoft.co/">
          visitNow
        </a>
      </div>
      <div class="icon face">
        <i class="fa-brands fa-facebook"></i>
      </div>
    </div>
    <div class="social">
      <div class="link linked">
        <a target="_blank" href="https://www.linkedin.com/company/pure-soft-co/">
          visitNow
        </a>
      </div>
      <div class="icon linked">
        <i class="fa-brands fa-linkedin"></i>
      </div>
    </div>
    <div class="social">
      <div class="link whats">
        <a target="_blank" href="https://pure-soft.com/">
          visitNow
        </a>
      </div>
      <div class="icon whats">
        <i class="fa-brands fa-whatsapp"></i>
      </div>
    </div>
    <div class="social">
      <div class="link instagram">
        <a target="_blank" href="https://www.instagram.com/puresoft_co/">
          visitNow
        </a>
      </div>
      <div class="icon instagram">
        <i class="fa-brands fa-instagram"></i>
      </div>
    </div>
    <div class="social">
      <div class="link youtube">
        <a target="_blank" href="https://pure-soft.com/">
          visitNow
        </a>
      </div>
      <div class="icon youtube">
        <i class="fa-brands fa-youtube"></i>
      </div>
    </div>
    <div class="social">
      <div class="link twitter">
        <a target="_blank" href="https://pure-soft.com/">
          visitNow
        </a>
      </div>
      <div class="icon twitter">
        <i class="fa-brands fa-twitter"></i>
      </div>
    </div>
  </div>
  <!--to top-->
  <div class="top" id="top">
    <i class="fa-solid fa-angles-up"></i>
  </div>
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <script src="{{asset('site/assets/vendor/js/jquery-3.5.1.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/js/all.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{asset('site/assets/vendor/js/typed.js')}}"></script>
   <script src="{{asset('site/assets/vendor/js/app.js')}}"></script> 
  <script src="{{asset('site/assets/vendor/js/wow.min.js')}}"></script>
  <script>
    new WOW().init();
  </script>
