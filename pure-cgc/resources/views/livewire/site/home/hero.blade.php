{{-- <div class="">
@if ($home_hero) --}}
<!-- ======= Hero Section ======= -->
{{-- <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div class="hero-container container"> --}}
{{-- @if (count($this->current_uri) == 0) --}}
{{-- <h2 class="animate__animated animate__fadeInDown my-5" >{{ app()->getLocale()=='ar' ? $home_hero->name :$home_hero->name_en }}</h2>
        <p class="animate__animated animate__fadeInUp"> {!! app()->getLocale()=='ar' ?  $home_hero->details : $home_hero->details_en!!}</p>
        <a href="{{ route('services') }}" class="btn-get-started animate__animated animate__fadeInUp text-decoration-none">{{ app()->getLocale()=='ar' ? 'خدماتنا' : 'Our Services' }}</a> --}}
{{-- @else
        <h2 class="animate__animated animate__fadeInDown mt-5" >{{ app()->getLocale()=='ar' ? $title_ar :$title_en }}</h2>
        @endif --}}
{{-- </div>
    </section><!-- End Hero -->
@else
    <section id="hero" class="d-flex justify-cntent-center align-items-center hero_intern" style="height: 40vh;">
        <div class="hero-container container">
            <h3 class="animate__animated animate__fadeInDown mt-5 color_second" >{{ app()->getLocale()=='ar' ? $title_ar :$title_en }}</h3>
        </div>
    </section><!-- End Hero -->
@endif
    </div> --}}



<div>
@if(count($heros))
    <section class="hero_sec">
        <div class="owl-carousel" id="main_slider">
            @foreach ($heros as $hero)
                <div class="item" style="background: url({{ img_chk_exist($hero->img) }});">

                <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-7 col-xs-12">
                                <div class="hero_text">
                                    <h3>{{ app()->getLocale() == 'en' ? @$hero->category->name_en : @$hero->category->name }}</h3>
                                    <h1>{{ app()->getLocale() == 'en' ? @$hero->name_en : @$hero->name }}</h1>
                                    <p>{!! app()->getLocale() == 'en' ? @$hero->details_en : @$hero->details !!}</p>
                                    <a class="theme-btn btn-style-two" href="{{ route('blogs', 0) }}">{{ __('ms_lang.btn_read_more') }}</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-5 col-xs-12 da-animate no-desk">
                                <div class="sl-eroimg">
                                    <img loading="lazy" class="hero_img" src="{{ img_chk_exist($hero->img) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif
</div>
