<!-- ======= Header ======= -->
{{-- <header id="header" class="fixed-top d-flex align-items-center header-transparent" >
    <div class="container d-flex justify-content-between align-items-center" >

      <div class="logo">
        <h1 class="text-light"><a href="/"><img src="{{ url('uploads/logo.png') }}" alt="" class="logo"></a></h1> --}}
<!-- Uncomment below if you prefer to use an image logo -->
{{-- <a href="/"><img src="{{ url('uploads/logo.png') }}" alt="" class="img-fluid"></a> --}}
{{-- </div>

<nav id="navbar" class="navbar">
  <ul> --}}
{{-- <li><a class=" text-decoration-none @if(\Request::route()->getName() == 'home' || \Request::route()->getName() == 'index')  active @endif" href="{{route('home_home')}}">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a></li> --}}
{{--  <li><a class="active text-decoration-none" href="/">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a></li>  --}}
{{-- <li><a class="text-decoration-none @if(\Request::route()->getName() == 'services' ||\Request::route()->getName() == 'service') active @endif" href="{{route('services')}}">{{ app()->getLocale() == 'ar' ? 'خدماتنا' : 'Services' }}</a></li>
<li><a class="text-decoration-none @if(\Request::route()->getName() == 'portofilos') active @endif" href="{{route('portofilos')}}">{{ app()->getLocale() == 'ar' ? 'أعمالنا' : 'Portfolio' }}</a></li>
<li><a class="text-decoration-none @if(\Request::route()->getName() == 'blogs' ||\Request::route()->getName() == 'blog-detail') active @endif" href="{{route('blogs',trim(__('ms_lang.show')) )}}">{{ app()->getLocale() == 'ar' ? 'المدونة' : 'Blog' }}</a></li>
<li><a class="text-decoration-none @if(\Request::route()->getName() == 'about') active @endif" href="{{route('about')}}">{{ app()->getLocale() == 'ar' ? 'من نحن' : 'About Us' }}</a></li>
<li><a class="text-decoration-none @if(\Request::route()->getName() == 'contact-us') active @endif" href="{{route('contact-us')}}">{{ app()->getLocale() == 'ar' ? 'تواصل معنا' : 'Contact Us' }}</a></li>
<li class="dropdown">
<a class="text-decoration-none" href="#"><span>{{ app()->getLocale() }}</span> <i class="bi bi-chevron-down"></i></a>
<ul>
    @if (app()->getLocale()=='ar')
        <li><a class="text-decoration-none" href="{{ url('lang/en') }}">EN</a></li>
    @else
        <li><a class="text-decoration-none" href="{{ url('lang/ar') }}">العربية</a></li>
    @endif

</ul>
</li>
</ul>
<i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->

</div>
</header><!-- End Header -->
--}}


{{-- <nav class="navbar navbar-expand-lg">
    <div class="container">
      <div class="nav">
        <a class="navbar-brand" href="{{ route('home_home') }}" title="{{ __('ms_lang.Pure Soft') }}">
          puresoft
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa-solid fa-sliders"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">{{__('ms_lang.home')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about') }}">{{__('ms_lang.about')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('service') }}">{{__('ms_lang.services')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact-us') }}">{{__('ms_lang.contact')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('hosting') }}">{{__('ms_lang.hosting')}}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
 --}}


<div>
    <div class="page-wraper">
        <header class="header header-transparent rs-nav">
            <div class="header-top">
                <div class="container">
                    <div class="outer-box clearfix">
                        <div class="header-t no-desk pull-left">
                            <a href="mailto:{{ $setting_nav->email }}" title=""><i
                                    class="fal fa-envelope-open"></i><span>{{ $setting_nav->email }}</span></a>
                        </div>
                        <div class="header-top-left pull-right">
                            <div class="language-sw lang-btn">
                                <span>{{__('ms_lang.language')}}<i class="fal fa-globe"></i></span>
                            </div>
                            <div class="mrn-lang">
                                <a href="{{url('lang/ar')}}" title="Arabic"><img loading="lazy"
                                                                                 src="{{url('new/images/ar.png')}}"
                                                                                 alt=""/>{{__('ms_lang.Arabic')}}</a>

                                <a href="{{url('lang/en')}}" title="English"><img loading="lazy"
                                                                                  src="{{url('new/images/en.png')}}"
                                                                                  alt=""/>{{__('ms_lang.English')}}</a>
                            </div>
                        </div>
                        <div class="header-top-right pull-right">
                            <div class="header-social-link-1 top-right">
                                <ul class="social-links clearfix">
                                    @if (! is_null($socials_nav))
                                        @foreach ($socials_nav as $social_nav)
                                            <li><a href="{{ $social_nav->url_link }}" target="_blank">
                                                    <div class="main-ico"><span
                                                            class="fab {!!$social_nav->class_so!!}"></span></div>
                                                    <div class="hover-ico"><span
                                                            class="{!!$social_nav->name!!} fab {!!$social_nav->class_so!!}"></span>
                                                    </div>
                                                    {{-- <i class="fab fa-{!! $socials->name !!}-f"></i> --}}

                                                </a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sticky-header navbar-expand-lg">
                <div class="menu-bar clearfix">
                    <div class="container clearfix">
                        <div class="menu-logo">
                            <a href="{{route('home_home')}}" class="main-logo"><img loading="lazy"
                                                                                    src="{{url('new/images/wlogo.png')}}"
                                                                                    alt=""/></a>
                            <a href="{{route('home_home')}}" class="sticky-logo"><img loading="lazy"
                                                                                      src="{{url('new/images/logo.png')}}"
                                                                                      alt=""/></a>
                        </div>
                        <button class="navbar-toggler collapsed menuicon justify-content-end" type="button"
                                data-bs-toggle="collapse" data-bs-target="#menuDropdown" aria-controls="menuDropdown"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span></span><span></span><span></span>
                        </button>
                        {{--  <div id="top-search">
                            <a id="top-search-trigger"><i class="fal fa-search"></i><i class="fal fa-times"></i></a>
                            <form>
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" wire:model="key" class="form-control"
                                               placeholder="{{__('ms_lang.what are you looking for ?')}}"/>
                                    </div>
                                    <div style="margin-top: 20px" class="col-md-2">
                                        <button class="btn btn-primary"
                                                wire:click="search">{{__('ms_lang.search')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>  --}}


                        <div class="menu-links navbar-collapse collapse justify-content-end" id="menuDropdown">
                            <div class="menu-logo">
                                <a href="{{route('home_home')}}"><img loading="lazy"
                                                                      src="{{url('new/images/wlogo.png')}}" alt=""/></a>
                            </div>
                            <ul class="nav navbar-nav">
                                <li class="{{ (request()->is('/'))  ? 'active' : ''  }}"><a
                                        href="{{route('home_home')}}">{{__('ms_lang.home')}}</a></li>
                                <li class="@if(request()->is('about')||request()->is('team') ) active @endif">
                                    <a href="{{ route('about') }}">{{__('ms_lang.about_us')}}<i class="fal fa-chevron-down"></i></a>
                                    <ul class="sub-menu">
                                        <li class="add-menu-left">
                                            <ul>
{{--                                                <li><a href="{{route('about')}}"> {{__('ms_lang.about_us')}}</a></li>--}}
                                                <li><a href="{{route('team')}}">{{__('ms_lang.work team')}}</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>




<li class="menu-item-has-children">
    <a href="{{route('home_home')}}">Products <i class="fal fa-chevron-down"></i></a>
    <ul class="sub-menu">
        <li class="">
            <a href=""> Desert </a>
        </li>
    </ul>
</li>
<li class="menu-item-has-children">
    <a href="https://www.pure-soft.com">Products <i class="fal fa-chevron-down"></i></a>
    <ul class="sub-menu">
        <li class="">
            <a href=""> Desert </a>
        </li>
    </ul>
<div class="dropdown-btn"><span class="fal fa-angle-down"></span></div></li>



                                <li class="@if(request()->is('services')||request()->is('service') ) active @endif">
                                    <a href="{{ route('services') }}">{{__('ms_lang.our_services')}}<i
                                            class="fal fa-chevron-down"></i></a>
                                    <ul class="sub-menu">
                                        <li class="add-menu-left">
                                            <ul>
                                                @if (count($categories) > 0)
                                                    @foreach ($categories as $category )
                                                        <li>
                                                            <a
                                                                href="{{ route('service' , [$category->id , title_2url($category->name)])}}">
                                                                @if (app()->getLocale() == 'en')
                                                                    {{$category->name_en}}
                                                                @else
                                                                    {{$category->name}}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                                {{-- <li> <a href="#"> تصميم المتاجر الإلكترونية </a> </li>
                                                <li> <a href="#"> تطبيقات الجوال </a> </li>
                                                <li> <a href="#"> التسويق الرقمي </a> </li>
                                                <li> <a href="#"> الدعم الفني </a> </li>
                                                <li> <a href="#"> حجز النطاقات </a> </li>
                                                <li> <a href="#"> الاستضافة المشتركة </a> </li>
                                                <li> <a href="#"> استضافة Vps </a> </li>
                                                <li> <a href="#"> خوادم Windows </a> </li>
                                                <li> <a href="#"> الخوادم المحددة </a> </li> --}}
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="{{ (request()->is('portofilo'))  ? 'active' : '' }}"><a
                                        href="{{route('portfolio')}}">{{__('ms_lang.our_works2')}}</a></li>
                                <li class="{{ (request()->is('blogs'))  ? 'active' : ''  }}"><a
                                        href="{{route('blogs')}}">{{__('ms_lang.blog')}}</a></li>
                                {{-- <li><a href="{{route('plans')}}">{{__('ms_lang.offer_plans')}}</a></li> --}}
                                <li class="@if(request()->is('apply-training')|| request()->is('jobs') ) active @endif">
                                    <a href="{{ route('jobs') }}">{{__('ms_lang.employment')}}<i class="fal fa-chevron-down"></i></a>
                                    <ul class="sub-menu">
                                        <li class="add-menu-left">
                                            <ul>
                                                <li>
                                                    <a href="{{route('apply-train')}}"> {{__('ms_lang.Apply_To_Training')}}</a>
                                                </li>
                                                {{-- <li><a href="#"> {{__('ms_lang.Apply_To_Job')}}</a></li> --}}
{{--                                                <li><a href="{{route('jobs')}}"> {{__('ms_lang.Available_Jobs')}}</a>--}}
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                {{-- <li><a href="{{route('employment')}}">{{__('ms_lang.employment')}}</a></li> --}}
                                <li class="{{ (request()->is('contact-us'))  ? 'active' : ''  }}">
                                    <a href="{{route('contact-us')}}">{{__('ms_lang.contact_us')}}</a>
                                </li>
                            </ul>
                            <ul class="social-media">
                                @if (! is_null($socials_nav))
                                    @foreach ($socials_nav as $social_nav)
                                        <li><a href="{{ $social_nav->url_link }}" target="_blank" class="btn button-sm">
                                                {{-- <i class="fab fa-{!! $socials->name !!}-f"></i> --}}
                                                {!!$social_nav->img!!}
                                            </a></li>
                                    @endforeach
                                @endif
                            </ul>
                            <div class="menu-close">
                                <i class="ti-close"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        {{-- loop results --}}
        <div class="section-content">
            <div class="container">
                <div class="row">
                    @if (! is_null($results)&&count($results) > 0)
                        @foreach ($results as $result )
                            <div class="col-xl-3 col-lg-6 col-6">
                                <div class="service-style3">
                                    <div class="service-inner">
                                        <div class="service-icon"><img loading="lazy"
                                                                       src="{{ url('uploads/'.$result->img) }}"
                                                                       alt="{{ config('app.name') }}"
                                                                       title="{{ config('app.name') }}"/></div>
                                        <h4 class="service-title">
                                            {{ app()->getLocale() == 'en'?$result->name_en : $result->name}}
                                        </h4>
                                        <div class="service-description">
                                            {{ app()->getLocale() == 'en'?$result->details_en:$result->details}}
                                        </div>
                                        <a class="theme-text-icon-btn services-link icon-left"
                                           href="{{ route('service' , [$result->id , $result->name])}}">
                                            <span>{{__('ms_lang.btn_read_more')}}</span>
                                            <i aria-hidden="true" class="fal fa-long-arrow-left"></i>
                                        </a>
                                        <div class="service-inner-obj"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        {{-- end loop results --}}
    </div>
