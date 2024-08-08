<div>
    @if (count($portfolios) > 0)
        <div class="section-full project-gallery-ser">
            <div class="container">
                <div class="heading-bx d-lg-flex d-md-block align-items-end justify-content-between">
                    <div class="clearfix">
                        <h6 class="title-ext">{{__('ms_lang.our_works2')}}</h6>
                        <h2 class="title mb-0">{{__('ms_lang.Some of our most perfect works')}}</h2>
                    </div>
                    <div class="clearfix mt-md-20">
                        <a href="{{route('portfolio')}}"
                           class="theme-btn btn-style-one hvr-dark">{{__('ms_lang.All works')}}</a>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="project-gallery-block-outer m-b30">
                    <div class="container">
                        <div class="project-gallery-style1">
                            <div class="owl-carousel project-gallery-one custom-nav">
                                @foreach ($portfolios as $portfolio )
                                    {{--

                                                                <div class="item">
                                                                    <a @if(!empty($portfolio->url_link)) href="{{@$portfolio->url_link}}" target="_blank" @endif class="project-box-style1">
                                                                        <div class="project-media">
                                                                            <img loading="lazy" src="{{img_chk_exist(@$portfolio->img)}}" alt="" />
                                                                        </div>
                                                                        <div class="project-content">
                                                                            <div class="project-title">{{app()->getLocale() == 'en' ? $portfolio->category->name_en : $portfolio->category->name}}</div>
                                                                            <h3 class="project-title-large">{{app()->getLocale() == 'en' ? $portfolio->name_en : $portfolio->name}}</h3>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                    --}}
                                    <div class="case-block"><a
                                            @if(!empty($portfolio->url_link)) href="{{@$portfolio->url_link}}"
                                            target="_blank"
                                            @endif title="{{app()->getLocale() == 'en' ? $portfolio->name_en : $portfolio->name}}">
                                            <div class="inner-box">
                                                <div class="ige">
                                                    <div class="der-img">
                                                        <img src="{{img_chk_exist(@$portfolio->img)}}"
                                                             class="wp-post-image"
                                                             alt="{{app()->getLocale() == 'en' ? $portfolio->name_en : $portfolio->name}}">
                                                    </div>
                                                    <div class="overlay-box">
                                                        <div
                                                            class="tie">{{app()->getLocale() == 'en' ? $portfolio->category->name_en : $portfolio->category->name}}</div>
                                                        <h4>{{app()->getLocale() == 'en' ? $portfolio->name_en : $portfolio->name}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </a></div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
