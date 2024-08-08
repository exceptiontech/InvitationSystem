<div>
@if ($result_services)
    <!-- ======= Services Section ======= -->
    {{-- <section class="services">
      <div class="container">

        <div class="row">
        @foreach ($result_services as $result_service)
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay= "150">
            <div class="icon-box icon-box-cyan">
              <div class="icon">
                {!! $result_service->img_thumbnail !!}
              </div>
              <h4 class="title"><a href="">{{ app()->getLocale()=='ar' ? $result_service->name :$result_service->name_en }}</a></h4>
              <p class="description">{!! app()->getLocale()=='ar' ?  $result_service->details : $result_service->details_en!!}</p>
            </div>
          </div>
        @endforeach

        </div>

      </div>
    </section> --}}
    <!-- End Services Section -->
@endif


<!-- ======= Service Details Section ======= -->

    <div class="page-content bg-white">
            <!-- Inner Banner -->
            <div class="page-banner ovbl-dark" style="background-image:url({{asset('new/images/back01.jpg')}});">
                <div class="container">
                    <div class="page-banner-entry text-center">
                        <h1><span>الخدمات</span></h1>

                        <!-- Breadcrumb row -->
                        <nav aria-label="breadcrumb" class="breadcrumb-row">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home_home')}}"><i class="las la-home"></i>الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">الخدمات</li>


                            </ul>
                        </nav>
                        <!-- Breadcrumb row END -->
                    </div>
                </div>
            </div>
            <!-- Inner Banner -->


<section class="service-details mt-5">
  <div class="container">
    <div class="row gx-3">
@if ($result_briefs)
    @foreach ($result_briefs as $result_brief)

	{{--
          <div class="colfour d-flex align-items-stretch" data-aos="fade-up" >
<div class="blog-item">
                                                <a class="blog-img" href="{{ route('service',[$result_brief->id,title_2url(app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en)]) }}">
                                            <img class="img-full" src="{{ img_chk_exist($result_brief->img)}}" alt="{{ app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en}}">
                                        </a>
                                                <div class="blog-content">
                                                    <h3 class="title"><a href="{{ route('service',[$result_brief->id,title_2url(app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en)]) }}" title="{{ app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en}}">{{ app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en}}</a></h3>
                <p class="card-text">{!! app()->getLocale()=='ar' ? $result_brief->details :$result_brief->details_en !!}</p>

                                                    <ul class="blog-button-wrap">
                                                        <li>
                                                            <a class="btn btn-link p-0" href="{{ route('service',[$result_brief->id,title_2url(app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en)]) }}" title="{{ app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en}}">المزيد</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            </div>
											--}}


											          <div class="col-md-4 col-12 px-2">

											<div class="news-block style-two"><a href="{{ route('service',[$result_brief->id,title_2url(app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en)]) }}" title="{{ app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en}}">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="{{ img_chk_exist($result_brief->img)}}" alt="{{ app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en}}"></figure>

                                    </div>
                                    <div class="lower-content">

                                        <h4 class="title">{{ app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en}}</h4>
										<p class="card-text">{!! app()->getLocale()=='ar' ? $result_brief->details :$result_brief->details_en !!}</p>
                                        <div class="read-more"> المزيد <i class="fa fa-angle-left"></i></div>
                                    </div>
                                </div></a>
                            </div>
							    </div>

{{--
          <div class="col-md-3 d-flex align-items-stretch" data-aos="fade-up" >
            <div class="card border p-0">
              <div class="card-img border w-100">
                <img loading="lazy" src="{{ img_chk_exist($result_brief->img)}}" alt="{{ app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en }}" title="{{ app()->getLocale()=='ar' ? $result_brief->name :$result_brief->name_en }}">
              </div>
              <div class="card-body ">
                <h5 class="card-title"><a href="{{ route('service',[$result_brief->id,title_2url(app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en)]) }}">{{ app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en}}</a></h5>
                <p class="card-text">{!! app()->getLocale()=='ar' ? $result_brief->details :$result_brief->details_en !!}</p>
                <a href="{{ route('service',[$result_brief->id,title_2url(app()->getLocale()=='ar' ? $result_brief->name : $result_brief->name_en)]) }}" style="background: #18005a; font-weight:bolder;"  class="btn btn-sm  text-white animate__animated animate__fadeInUp text-decoration-none shadow shadow  text-center">{{ app()->getLocale()=='ar' ? 'عرض التفاصيل' : 'Show Details' }}</a>
              </div>
            </div>
          </div>
--}}
      @endforeach
     @endif



    </div>

  </div>
</section>



<!-- =========== End Service Details Section ============= -->

<!-- ======= Pricing Section ======= -->
<section class="pricing section-bg price-section" data-aos="fade-up">
  <div class="container">

    <div class="section-title">
      <h2>{{ app()->getLocale()=='ar' ?  "آخر العروض" : "Latest offers" }}</h2>
    </div>

    <div class="row">
     @foreach ($hosting as $index=>$hosting)
       @if (($index+1)%2 == 0)
        @php
          $i='featured';
        @endphp
       @else
        @php
         $i=null;
        @endphp
       @endif

{{--

       <div class="col-lg-4 box color {{ @$i }}"  >
          <div>
              <h3>{{ $hosting->name }}</h3>
              <h4>${{ $hosting->price }}<span>{{__('ms_lang.per month')}}</span></h4>
          </div>


<ul>
          @php
            $segments=  explode(',' , "$hosting->feature"  );
          @endphp
           @foreach ($segments as $segment)



            @if(app()->getLocale()=='ar')
                <li>
                  <i class="bx bx-check"></i>
                  &nbsp;{{$segment}}
                </li>
 @else
                <li>
                  <i class="bx bx-check"></i>
                  &nbsp;{{$segment}}
                </li>

            @endif
           @endforeach
</ul>
           <a href="hosts/{!! $hosting->id !!}" class="get-started-btn">{{ app()->getLocale()=='ar' ?  "ابدا الان " : "Get Started" }} </a>
        </div>
     @endforeach --}}

<div class="col-lg-4">
<div class="co-price">
                    <div class="price-table mrb-30">

                                                                        <div class="table-header">
                            <h4 class="pricing-plan-name">
{{ $hosting->name }}
                            </h4>
                            <h2 class="monthlyPrice">${{ $hosting->price }}<span>{{__('ms_lang.per month')}}</span></h2>
                        </div>
                        <div class="table-content">


              <ul class="list-items"  style="text-align: right;">
          @php
            $segments=  explode(',' , "$hosting->feature"  );
          @endphp
           @foreach ($segments as $segment)
            @if(app()->getLocale()=='ar')

                <li>
                  <i class="bx bx-check"></i>
                  &nbsp;{{$segment}}
                </li>

            @else

                <li>
                  <i class="bx bx-check"></i>
                  &nbsp;{{$segment}}
                </li>

            @endif
           @endforeach
  </ul>

                        </div>
                        <div class="table-footer">
                            <a href="https://api.whatsapp.com/send?phone=+201551451595&text={{$hosting->name}}" class="theme-btn btn-style-one hvr-dark">{{ app()->getLocale()=='ar' ?  "ابدا الان " : "Get Started" }}</a>
                        </div>

                    </div>
                </div>
        </div>
     @endforeach

    </div>


  </div>
</section>
    </div>
  </div>
