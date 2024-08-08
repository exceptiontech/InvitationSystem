<?php /* {{-- <div>
  <section class="features"> --}}
<!-- ======= Our Portfolio Section ======= -->
{{--  <section class="breadcrumbs">
          <div class="container">

            <div class="d-flex justify-content-between align-items-center">
              <h2>Portfolio Details</h2>
              <ol>
                <li><a href="index.html">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li>Portfolio Details</li>
              </ol>
            </div>

          </div>
        </section><!-- End Our Portfolio Section -->  --}}

<!-- ======= Portfolio Details Section ======= -->
{{-- <div class="container">

            <div class="row border justify-content-between rounded my-5 p-0 overflow-hidden" data-aos="fade-up">
              <div class="col-lg-6  m-0 p-0">

                <img src="{{ img_chk_exist($our_services->img)}}"  class="img-fluid m-0 p-0" alt="">
              </div>
              <div class="pt-4 col-lg-6 px-4 py-5">
                <h2 class="m-3">{{ app()->getLocale()=='ar' ? $our_services->name :$our_services->name_en }}</h2>
                <p class="p-2 font-size-sm">
                    {!! app()->getLocale()=='ar' ? $our_services->details :$our_services->details_en !!}
                </p>
                <ul>
                  @php
                    $service_desc_list = explode(',', app()->getLocale()=='ar' ?$our_services->service_desc : $our_services->service_desc_en );
                  @endphp
                  @foreach ($service_desc_list as $service_desc_item)
                    <li><i class="bi bi-check"></i> {{ $service_desc_item }}</li>
                  @endforeach
                </ul>
                <a href="{{ route('contact-us') }}" class="btn-get-started text-dark animate__animated animate__fadeInUp text-decoration-none shadow shadow">{{ app()->getLocale()=='ar' ? 'تواصل معنا' : 'Contact Us' }}</a>
              </div>
            </div>

          </div>
        </section>
        <!-- End Portfolio Details Section -->
         <!-- ======= Start work samples Section ======= -->
         <section class="work_samples" data-aos="fade-up">
          <div class="container">
            <div class="section-title">
              <h2 class="mb-4">{{ app()->getLocale()=='ar' ? "من أعمالنا" :"Work Samples" }}</h2>
            </div>

              <div class="row" data-aos-easing="ease-in-out" data-aos-duration="500">
               @foreach ($work_samples as $work_sample)
                <div class="col-lg-4">
                  <div class="item border my-2 d-flex flex-column">
                      <div class="item-head w-100 bg-light p-3 d-flex justify-content-between align-items-center">
                        <h5 class="m-0" style="font-size: 20px; font-weight: 500">{{ app()->getLocale() == 'ar' ? $work_sample->name : $work_sample->name_en }}</h5>
                        <a href="{{ url_chk($work_sample->url_link) }}" target="_blank" class="text-dark"><i class="fa-solid fa-link" style="font-size: 22px"></i></a>
                      </div>
                      <div class="image">
                        <img src="{{ img_chk_exist($work_sample->img) }}"  class="img-fluid portfolio-img" alt="{{ app()->getLocale() == 'ar' ? $work_sample->name : $work_sample->name_en }}" title="{{ app()->getLocale() == 'ar' ? $work_sample->name : $work_sample->name_en }}">
                      </div>
                  </div>
                </div>
              @endforeach
            </div>
            {{-- <div class="row">
              <div class="col-12 d-flex justify-content-center align-content-around my-4">
                <a href="{{ route('portofilos') }}" class="btn-get-started text-dark animate__animated animate__fadeInUp text-decoration-none shadow shadow">{{ app()->getLocale()=='ar' ? 'عرض المزيد' : 'Show More' }}</a>
              </div>
            </div> --}}

          </div>
        </section> --}}
{{-- ========   End work samples section  =========== --}}

<!-- =============== Portfolio Section ================== -->
{{-- @if (count($portfolios) > 0)
        <section class="portfolio" style="">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                  <div class="section-title">
                    <h2>{{  app()->getLocale()=='ar' ?  " معرض  " : "  portofolio " }}{{ app()->getLocale()=='ar' ?  " $category->name " : " $category->name_en  " }}</h2>
                  </div>
              </div>
            </div>

            <div class="row" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
              @foreach ($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 my-2">
                  <div class="portfolio-item border rounded" style="overflow: hidden">
                    <div class="w-100 h-100">
                      <img  src="{{ img_chk_exist(@$portfolio->img_thumbnail)}}" class="img-fluid" alt="{{ @$portfolio->name }}" >
                    </div>
                    <div class="portfolio-info">
                      <h3> {{ @$portfolio->name }}</h3>
                      <div>
                        <a href="{{ img_chk_exist(@$portfolio->img)}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ @$portfolio->name }}">
                          <i class="bx bx-plus"></i>
                        </a>
                        <a href=" {{ @$portfolio->url_link }} " title="{{ @$portfolio->url_link }}">
                          <i class="bx bx-link"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </section>
        @endif --}}
<!-- =========== End Portfolio Section  ================== -->


<!-- ============  Pricing Section ==================== -->
{{-- @if (count($payments))
        <section class="pricing section-bg" data-aos="fade-up">
          <div class="container">

            <div class="section-title">
                @if (is_null($category) == 0)
                  <h2>{{  app()->getLocale()=='ar' ?  "  اسعار باقات  $category->name  " : "  $category->name_en  prices " }}</h2>
                @endif
            </div>

            <div class="row no-gutters">

                @foreach ($payments as $index => $payment)
                @if (($index + 1) % 2 == 0)
                @php
                $i='featured';

                @endphp
               @else
               @php
               $i=null;

               @endphp
               @endif
               <div class="col-lg-4 box color {{ @$i }}"  >
                        <div><h3>{{ $payment->type }}</h3>
                        <h4>${{ $payment->price }}<span>per month</span></h4>
                        </div>
                            @php
                            $segments=  explode(',' , "$payment->details"  );
                            @endphp --}}
{{--  @dd($segments)  --}}
{{-- @foreach ($segments as $segment)
                            @if (app()->getLocale() == 'ar')
                            <ul style="  text-align: right; " ><li><i style="color:rgb(60, 15, 97)" class="bx bx-check"> &nbsp;   {{  $segment}}</i></li></ul>
                            @else
                            <ul style="  text-align: left;   " ><li><i style="color:rgb(60, 15, 97)" class="bx bx-check"> &nbsp;   {{  $segment}}</i></li></ul>
                            @endif
                            @endforeach
                        <a href="#" class="get-started-btn">{{  app()->getLocale()=='ar' ?  "  اشترك الان     " : "    Get it now  " }}</a>
                      </div>

                  @endforeach
            </div>
          </div>
        </section><!-- End Pricing Section -->
        @endif
      </section><!-- End #section -->

</div> --}}

*/
?>
<div>
    <div class="page-content bg-white">
        <div class="page-content bg-white">
            <!-- Inner Banner -->
            <div class="page-banner ovbl-dark" style="background-image:url({{ asset('new/images/back01.jpg') }});">
                <div class="container">
                    <div class="page-banner-entry text-center">
                        <h1><span>{{ app()->getLocale() == 'en' ? $category->name_en : $category->name }}</span></h1>
                        <!-- Breadcrumb row -->
                        <nav aria-label="breadcrumb" class="breadcrumb-row">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home_home') }}"><i
                                            class="las la-home"></i>{{ __('ms_lang.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('ms_lang.our_services') }}
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ app()->getLocale() == 'en' ? $category->name_en : $category->name }}</li>

                            </ul>
                        </nav>
                        <!-- Breadcrumb row END -->
                    </div>
                </div>
            </div>
            <!-- Inner Banner -->
            <div class="page-content bg-white">
                <!-- About US -->
                <section class="about-sec">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-40">
                                <div class="heading-bx">
                                    <h2 class="title">
                                        @if (app()->getLocale() == 'en')
                                            {{ $category->name_en }}
                                        @else
                                            {{ $category->name }}
                                        @endif
                                    </h2>
                                    <p class="text-justify" style="text-align: justify;">
                                        @if (app()->getLocale() == 'en')
                                            {!! $category->details_en !!}
                                        @else
                                            {!! $category->details !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 no-desk">
                                <div class="about-media">
                                    <div class="media">
                                        <img loading="lazy" src="{{ img_chk_exist($category->img) }}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="price ps-price">
                    <svg id="curve" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 60"
                        preserveAspectRatio="none">
                        <path class="cls-1" d="M 0 0 h 80 v 30 Q 60 10, 40 30 T 0 30 Z" />
                    </svg>
@if (count($payments) > 0)
                    <div class="container">
                        <div class="heading-bx d-lg-flex d-md-block align-items-center justify-content-center">
                                <div class="clearfix">
                                    <h2 class="title mb-0">
                                        {{-- {{__('ms_lang.Professional website design plans')}} --}}
                                        {{ app()->getLocale() == 'en' ? $category->name_en : $category->name }}
                                    </h2>
                                </div>
                        </div>
                        <ul role="tablist" aria-owns="nav-tab1 nav-tab2 nav-tab3 nav-tab4" class="nav nav-tabs"
                            id="nav-tab-with-nested-tabs">
                            @foreach ($payments as $index => $payment)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link {{ $index == 0 ? 'active' : '' }} "
                                        {{ $index == 0 ? 'aria-current="page"' : '' }}
                                        id="nav-tab{{ ++$index }}"
                                        href="{{ $index == 0 ? '#home' : '#menu' . $payment->id }}"
                                        data-bs-toggle="tab"
                                        data-bs-target="{{ $index == 0 ? '#home' : '#menu' . $payment->id }}"
                                        role="tab"
                                        aria-controls="{{ $index == 0 ? 'home' : 'menu' . $payment->id }}"
                                        aria-selected="{{ $index == 0 ? 'true' : 'false' }}">{{ app()->getLocale() == 'en' ? $payment->name_en : $payment->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
    @foreach ($payments as $index => $payment)
        @if ($index == 0)
                            <div id="{{ $index == 0 ? 'home' : 'menu' . $payment->id }}"
                                class="tab-pane fade {{ $index == 0 ? 'in active' : '' }}">
                                <div class="row align-items-center">

                                    <div class="col-md-5 col-12">
                                        <div class="co-omg an-right">
                                            <img loading="lazy" src="{{ img_chk_exist($payment->img) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-12">
                                        <div class="block an-left">
                                            <ul>
                                                @foreach (explode(',', $payment->details) as $det)
                                                    <li>{{ $det }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="bac-price">
                                            <h3>سعر الباقة</h3>
                                            <p> {{ $payment->price_ryial }} ريال <span class="od-price1" style="text-decoration:none!important">{{ $payment->price_dolar }} دولار </span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="left-bt">
                                            <a href="https://wa.me/{{ $whatsapp[0] }}"  class="theme-btn btn-style-one hvr-dark">
                                                {{__('ms_lang.Order now')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
        @endif
                            <div id="menu{{ $payment->id }}" class="tab-pane fade">
                                <div class="row align-items-center">
                                    <div class="col-md-5 col-12">
                                        <div class="co-omg an-right">
                                            <img loading="lazy" src="{{ img_chk_exist($payment->img) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-12">
                                        <div class="block an-left">
                                            <ul>
                                                @foreach (explode(',', $payment->details) as $det)
                                                    <li>{{ $det }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="bac-price">
                                            <h3>سعر الباقة</h3>
                                            <p> {{ $payment->price_ryial }} ريال <span class="od-price1" style="text-decoration:none!important">{{ $payment->price_dolar }} دولار </span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="left-bt">
                                            <a href="https://wa.me/+201551451595" class="theme-btn btn-style-one hvr-dark">
                                                {{__('ms_lang.Order now')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
    @endforeach
                        </div>
                    </div>
@endif
                    <svg id="curve2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 60"
                        preserveAspectRatio="none">
                        <path class="cls-2" d="M 0 0 h 80 v 30 Q 60 10, 40 30 T 0 30 Z" />
                    </svg>
                </div>
@if (count($work_samples) > 0)
                <!-- Project Section Start -->
                <section class="some-projects">
                    <div class="section-content">
                        <div class="container">
                            <div class="heading-bx d-lg-flex d-md-block align-items-end justify-content-between">
                                <div class="clearfix">
                                    <h2 class="title mb-0">{{ __('ms_lang.One of our works is in') }}
                                        {{ app()->getLocale() == 'en' ? $category->name_en : $category->name }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="project-item-style1-wrapper">
                                        <div class="owl-carousel projects_5col custom-nav">
                                                @foreach ($work_samples as $work_sample)
                                                    @php
                                                        $result_name=$work_sample->name;
                                                        if(app()->getLocale() == 'en')
                                                        {
                                                            $result_name=$work_sample->name_en;
                                                        }
                                                    @endphp
                                                    <div class="case-block">
                                                        <a @if(!empty($work_sample->url_link)) href="{{ $work_sample->url_link }}" target="_blank" @endif >
                                                            <div class="inner-box">
                                                                <div class="ige">
                                                                    <div class="der-img">
                                                                        <img src="{{ img_chk_exist($work_sample->img) }}" class="wp-post-image" title="{{ $result_name }}" alt="{{ $result_name }}">
                                                                    </div>
                                                                    <div class="overlay-box">
                                                                        <div class="tie">
                                                                            {{ $result_name }}
                                                                        </div>
                                                                        <h4>{{ $result_name }}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Project Section End -->
@endif
                <!-- Call to Action Start -->
                <div class="call-to-action">
                    <div class="container">
                        <div class="call-to-action-inner">
                            <div class="call-to-action-left">
                                <div class="call-to-action-icon">
                                    <span class="webexflaticon base-icon-chat1"></span>
                                </div>
                                <div class="call-to-action-content">
                                    <h2 class="call-to-action-title">{{ __('ms_lang.Do you have any project you would like to implement?') }}</h2>
                                </div>
                            </div>
                            <div class="call-to-action-btn-box mrt-15 mrt-md-30">
                                <a href="{{ route('subscribe') }}"
                                    class="theme-btn btn-style-one hvr-dark">{{__('ms_lang.Order now')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Call to Action End -->
@if(count($features))
                <section class="seo-tool">
                    <div class="container">
                        <div class="heading-bx d-lg-flex d-md-block align-items-end justify-content-between">
                            <div class="clearfix">
                                <h2 class="title mb-0"> {{ __('ms_lang.featuress') }} {{ app()->getLocale() == 'en' ? $category->name_en : $category->name }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <ul class="row justify-content-center">
                            @php
                                $feature_l=1;
                            @endphp
                            @foreach ($features as $feature)
                                <div class="colfive wow fadeInUp" data-wow-duration="{{ round(($feature_l/2.2),2) }}s" data-wow-delay="{{ round(($feature_l/2.4),2) }}s">
                                    <div class="features-item">
                                        <img loading="lazy" src="{{ asset('new/images/' . $feature->img) }}" alt="{{ app()->getLocale() == 'en' ? $feature->name_en : $feature->name }}" title="{{ app()->getLocale() == 'en' ? $feature->name_en : $feature->name }}"><span>{{ app()->getLocale() == 'en' ? $feature->name_en : $feature->name }}</span>
                                    </div>
                                </div>
                                @php
                                    $feature_l+=0.7;
                                @endphp
                            @endforeach
                        </ul>
                    </div>
                </section>
@endif
            </div>
        </div>
