{{-- <div>
    <main id="main"> --}}

{{--  <!-- ======= Our Portfolio Section ======= -->
        <section class="breadcrumbs">
          <div class="container">

            <div class="d-flex justify-content-between align-items-center">
              <h2>Our Portfolio</h2>
              <ol>
                <li><a href="index.html">Home</a></li>
                <li>Our Portfolio</li>
              </ol>
            </div>

          </div>
        </section><!-- End Our Portfolio Section -->  --}}

<!-- ======= Portfolio Section ======= -->
{{-- <section class="portfolio">
          <div class="container">

            <div class="row">
              <div class="col-lg-12">
                <ul id="portfolio-flters">
                  <li data-filter="*" class="filter-active"><button type="button" class="btn btn-primary">All</button>
                    </li>
                  @foreach ($categories as $categorie)
                  <li data-filter=".filter-{{ $categorie->id }}"><button type="button" class="btn btn-secondary"> {{ $categorie->name_en }}</button>
                   </li>
                  @endforeach --}}
{{--  <li data-filter=".filter-app">App</li>
                  <li data-filter=".filter-card">Card</li>
                  <li data-filter=".filter-web">Web</li>  --}}
{{-- </ul>
              </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
                @foreach ($portfolios as $portfolio)


                <div class="col-lg-4 col-md-6 portfolio-wrap {{'filter-'.$portfolio->category->id}}"> --}}
{{--  @dd($portfolio->category->name_en)  --}}
{{--  <div class="col-lg-4 col-md-6 portfolio-wrap filter-{{ $portfolio->category->name_en}}">  --}}
{{--  @dd($portfolio->category->name)  --}}
{{-- <div  class="portfolio-item">
                    <div  width="500" height="20" object-fit: fill; height="20">
                  <img  src="{{ img_chk_exist('thumbnail/'.@$portfolio->img_thumbnail)}}" class="img-fluid" alt="{{ @$portfolio->name }}" >
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
        </section><!-- End Portfolio Section -->

      </main><!-- End #main --></div> --}}


<div>
    <div class="page-content bg-white">


        <div class="page-content bg-white">
            <!-- Inner Banner -->
            <div class="page-banner ovbl-dark" style="background-image:url({{ asset('new/images/back01.jpg') }});">
                <div class="container">
                    <div class="page-banner-entry text-center">
                        <h1><span>{{__('ms_lang.our_works2')}}</span></h1>
                        <!-- Breadcrumb row -->
                        <nav aria-label="breadcrumb" class="breadcrumb-row">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home_home') }}"><i
                                            class="las la-home"></i>{{__('ms_lang.home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('ms_lang.our_works2')}}</li>
                            </ul>
                        </nav>
                        <!-- Breadcrumb row END -->
                    </div>
                </div>
            </div>
            <!-- Inner Banner -->


            <div class="page-content bg-white">


                <div class="proje-section">
                    <div class="container">
                        <div class="feature-filters filter-style1 text-center">
                            <ul class="filters" data-toggle="buttons">
                                <li data-filter="" class="btn active">
                                    <input type="radio">
                                    <a href="javascript:;"><span>{{__('ms_lang.All works')}}</span></a>
                                </li>
                                @if (count($categories))
                                    @foreach ($categories as $category )

                                        <li data-filter=".{{explode(' ',trim(@$category->name_en))[0]}}-ser"
                                            class="btn">

                                            <input type="radio">
                                            <a href="javascript:;"><span>
@if (app()->getLocale() == 'ar')
                                                        {{$category->name}}
                                                    @else
                                                        {{$category->name_en}}
                                                    @endif
</span></a>
                                        </li>
                                    @endforeach
                                @endif
                                {{-- <li data-filter=".web-ser" class="btn">
                                    <input type="radio">
                                    <a href="javascript:;"><span>تصميم مواقع</span></a>
                                </li>
                                <li data-filter=".host-ser" class="btn">
                                    <input type="radio">
                                    <a href="javascript:;"><span>استضافة</span></a>
                                </li>
                                <li data-filter=".domain-ser" class="btn">
                                    <input type="radio">
                                    <a href="javascript:;"><span>حجز دومين</span></a>
                                </li>

                                <li data-filter=".e-commerce-ser" class="btn">
                                    <input type="radio">
                                    <a href="javascript:;"><span>متجر الكتروني</span></a>
                                </li> --}}

                            </ul>
                        </div>
                        <ul class="row sp5 magnific-image mb-0" id="masonry">
                            @if (count($portfolios) > 0)
                                @foreach ($portfolios as $portfolio )
                                    <li class="action-card col-lg-4 col-md-6 col-sm-12 col-12 {{explode(' ',trim(@$portfolio->category->name_en))[0]}}-ser">
                                        {{-- {{dd(explode(' ',trim(@$portfolio->category->name_en))[0])}} --}}
                                        <div class="portfolio-box style-2 mb-2">
                                            <div class="portfolio-media">
                                                <img src="{{img_chk_exist(@$portfolio->img)}}" alt="">
                                            </div>
                                            <a href="{{@$portfolio->url_link}}" class="btn-anchor">
                                                @if (app()->getLocale() == 'en')
                                                    {{@$portfolio->name_en}}
                                                @else
                                                    {{@$portfolio->name}}
                                                @endif
                                            </a>
                                            <div class="portfolio-info">
                                                <h4 class="title"><a href="{{@$portfolio->url_link}}">
                                                        @if (app()->getLocale() == 'en')
                                                            {{@$portfolio->name_en}}
                                                        @else
                                                            {{@$portfolio->name}}
                                                        @endif
                                                    </a></h4>
                                                <span class="exe-title">
                                          @if (app()->getLocale() == 'en')
                                                        {{ @$portfolio->category->name_en }}
                                                    @else
                                                        {{ @$portfolio->category->name }}
                                                    @endif
                                        </span>
                                            </div>
                                            <a href="{{@$portfolio->url_link}}"
                                               class="ma-anchor">{{__('ms_lang.Visiting site')}}</a>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                            {{-- <li class="action-card col-lg-4 col-md-6 col-sm-12 col-12 car-wheels domain-ser">
                                <div class="portfolio-box style-2 mb-2">
                                    <div class="portfolio-media">
                                        <img src="{{ asset('new/images/w5.png') }}" alt="">
                                    </div>
                                    <a href="#" class="btn-anchor">شركة بيورسوفت</a>
                                    <div class="portfolio-info">
                                        <h4 class="title"><a href="#">شركة بيورسوفت</a></h4>
                                        <span class="exe-title">حجز دومين</span>
                                    </div>
                                    <a href="#" class="ma-anchor">زيارة الموقع</a>
                                </div>
                            </li>
                            <li class="action-card col-lg-4 col-md-6 col-sm-12 col-12 app-ser">
                                <div class="portfolio-box style-2 mb-2">
                                    <div class="portfolio-media">
                                        <img src="{{ asset('new/images/w6.png') }}" alt="">
                                    </div>
                                    <a href="#" class="btn-anchor">شركة بيورسوفت</a>
                                    <div class="portfolio-info">
                                        <h4 class="title"><a href="#">شركة بيورسوفت</a></h4>
                                        <span class="exe-title">تطبيق موبايل</span>
                                    </div>
                                    <a href="#" class="ma-anchor">زيارة الموقع</a>
                                </div>
                            </li>
                            <li class="action-card col-lg-4 col-md-6 col-sm-12 col-12 web-ser">
                                <div class="portfolio-box style-2 mb-2">
                                    <div class="portfolio-media">
                                        <img src="{{ asset('new/images/w1.png') }}" alt="">
                                    </div>
                                    <a href="#" class="btn-anchor">شركة بيورسوفت</a>
                                    <div class="portfolio-info">
                                        <h4 class="title"><a href="#">شركة بيورسوفت</a></h4>
                                        <span class="exe-title">موقع الكتروني</span>
                                    </div>
                                    <a href="#" class="ma-anchor">زيارة الموقع</a>
                                </div>
                            </li>
                            <li class="action-card col-lg-4 col-md-6 col-sm-12 col-12 car-wheels host-ser">
                                <div class="portfolio-box style-2 mb-2">
                                    <div class="portfolio-media">
                                        <img src="{{ asset('new/images/w2.png') }}" alt="">
                                    </div>
                                    <a href="#" class="btn-anchor">شركة بيورسوفت</a>
                                    <div class="portfolio-info">
                                        <h4 class="title"><a href="#">شركة بيورسوفت</a></h4>
                                        <span class="exe-title">استضافة</span>
                                    </div>
                                    <a href="#" class="ma-anchor">زيارة الموقع</a>
                                </div>
                            </li>
                            <li class="action-card col-lg-4 col-md-6 col-sm-12 col-12 web-ser">
                                <div class="portfolio-box style-2 mb-2">
                                    <div class="portfolio-media">
                                        <img src="{{ asset('new/images/w3.png') }}" alt="">
                                    </div>
                                    <a href="#" class="btn-anchor">شركة بيورسوفت</a>
                                    <div class="portfolio-info">
                                        <h4 class="title"><a href="#">شركة بيورسوفت</a></h4>
                                        <span class="exe-title">تصميم موقع</span>
                                    </div>
                                    <a href="#" class="ma-anchor">زيارة الموقع</a>
                                </div>
                            </li>
                            <li class="action-card col-lg-4 col-md-6 col-sm-12 col-12 app-ser">
                                <div class="portfolio-box style-2 mb-2">
                                    <div class="portfolio-media">
                                        <img src="{{ asset('new/images/w4.png') }}" alt="">
                                    </div>
                                    <a href="#" class="btn-anchor">شركة بيورسوفت</a>
                                    <div class="portfolio-info">
                                        <h4 class="title"><a href="#">شركة بيورسوفت</a></h4>
                                        <span class="exe-title">تطبيق الهاتف</span>
                                    </div>
                                    <a href="#" class="ma-anchor">زيارة الموقع</a>
                                </div>
                            </li>
                            <li class="action-card col-lg-4 col-md-6 col-sm-12 col-12 prog-ser">
                                <div class="portfolio-box style-2 mb-2">
                                    <div class="portfolio-media">
                                        <img src="{{ asset('new/images/w5.png') }}" alt="">
                                    </div>
                                    <a href="#" class="btn-anchor">شركة بيورسوفت</a>
                                    <div class="portfolio-info">
                                        <h4 class="title"><a href="#">شركة بيورسوفت</a></h4>
                                        <span class="exe-title">برمجة خاصة</span>
                                    </div>
                                    <a href="#" class="ma-anchor">زيارة الموقع</a>
                                </div>
                            </li>
                            <li class="action-card col-lg-4 col-md-6 col-sm-12 col-12 host-ser">
                                <div class="portfolio-box style-2 mb-2">
                                    <div class="portfolio-media">
                                        <img src="{{ asset('new/images/w6.png') }}" alt="">
                                    </div>

                                    <a href="#" class="btn-anchor">شركة بيورسوفت</a>
                                    <div class="portfolio-info">
                                        <h4 class="title"><a href="#">شركة بيورسوفت</a></h4>
                                        <span class="exe-title">استضافة</span>
                                    </div>
                                    <a href="#" class="ma-anchor">زيارة الموقع</a>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
