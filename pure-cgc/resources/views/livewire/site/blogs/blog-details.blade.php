<div wire:ignore>
    <div class="page-content bg-white">
        <div class="page-content bg-white">
            <!-- Inner Banner -->
            <div class="page-banner ovbl-dark" style="background-image:url({{ asset('new/images/back01.jpg') }});">
                <div class="container">
                    <div class="page-banner-entry text-center">
                        <h1><span>{{ __('ms_lang.blog') }}</span></h1>
                        <!-- Breadcrumb row -->
                        <nav aria-label="breadcrumb" class="breadcrumb-row">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home_home') }}"><i
                                            class="las la-home"></i>{{ __('ms_lang.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('ms_lang.blog') }}</li>
                            </ul>
                        </nav>
                        <!-- Breadcrumb row END -->
                    </div>
                </div>
            </div>
            <!-- Inner Banner -->
            <div class="page-content bg-white">
                <section class="news-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-lg-8 col-xl-8 mb-30 mb-md-60">
                                <!-- blog start -->
                                <div class="blog-lg blog-single">
                                    <div class="action-box blog-lg">
                                        <img src="{{ img_chk_exist($blogs_article->img) }}" alt="">
                                    </div>
                                    <div class="info-bx">
                                        <ul class="post-meta">
                                            <li class="author">
                                              <i class="fal fa-user"></i><a>{{ $blogs_article->auther }}</a>
                                            </li>
                                            <li class="date">
                                              <a><i class="fal fa-calendar-alt"></i> {{ date_only($blogs_article->created_at) }} </a>
                                            </li>
                                        </ul>
                                        <div class="ttr-post-title">
                                            <h3 class="post-title">
                                                @if (app()->getLocale() == 'en')
                                                    {{ $blogs_article->name_en }}
                                                @else
                                                    {{ $blogs_article->name }}
                                                @endif
                                            </h3>
                                        </div>
                                        <div class="ttr-post-text">
                                            @if (app()->getLocale() == 'en')
                                                {{ $blogs_article->brief_en }}
                                            @else
                                                {{ $blogs_article->brief }}
                                            @endif
                                            </p>

                                        </div>
                                        <div class="ttr-post-footer">
                                            {{-- <div class="post-tags">
                      <strong>كلمات هامة : </strong>
                      <a href="javascript:void(0);">تصميم مواقع</a> 
                      <a href="javascript:void(0);">برمجة خاصة</a> 
                      <a href="javascript:void(0);">تطبيقات الهاتف</a> 
                    </div> --}}
                                            <div class="share-post ms-auto">
                                              <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                                {{-- <ul class="social-media">
                                                    <li><strong>{{ __('ms_lang.share_on') }} :</strong></li>
                                                    @if (!is_null($facebook))
                                                        <li><a target="_blank" href="{{ $facebook->url_link }}"
                                                                class="btn btn-primary"><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                    @endif
                                                    @if (!is_null($instagram))
                                                        <li><a target="_blank" href="{{ $instagram->url_link }}"
                                                                class="btn btn-primary"><i
                                                                    class="fab fa-instagram"></i></a></li>
                                                    @endif

                                                    @if (!is_null($twitter))
                                                        <li><a target="_blank" href="{{ $twitter->url_link }}"
                                                                class="btn btn-primary"><i
                                                                    class="fab fa-linkedin-in"></i></a></li>
                                                    @endif
                                                    @if (!is_null($linkedin))
                                                        <li><a target="_blank" href="{{ $linkedin->url_link }}"
                                                                class="btn btn-primary"><i
                                                                    class="fab fa-twitter"></i></a></li>
                                                    @endif

                                                </ul> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4 col-xl-4 mb-30">
                                <aside class="side-bar sticky-top aside-bx">
                                    {{-- <div class="widget widget_search"> --}}
                                        {{-- <form class="searchform"> --}}
                                        {{-- <div class="input-group">
                                            <input wire:model="key" class="form-control" placeholder="{{ __('ms_lang.enter search words') }}" type="text">
                                            <span style="margin: 10px 10px 0 0" class="input-group-btn">
                                                <button wire:click="search" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div> --}}
                                        {{-- </form> --}}
                                    {{-- </div> --}}
                                    <div class="widget recent-posts-entry">
                                        <h5 class="widget-title">{{ __('ms_lang.Most Reading') }}</h5>
                                        <div class="widget-post-bx">
                                            @if (!empty($mini_newest_blog) || !is_null($mini_newest_blog))
                                                @foreach ($mini_newest_blog as $blog)
                                                    <div class="widget-post clearfix">
                                                        <div class="ttr-post-media"> <img
                                                                src="{{ img_chk_exist(@$blog->img) }}" width="200"
                                                                height="143" alt=""> </div>
                                                        <div class="ttr-post-info">
                                                            <div class="ttr-post-header">
                                                                <h6 class="post-title"><a
                                                                        href="{{ route('blog-detail', $blog->id) }}">
                                                                        @if (app()->getLocale() == 'en')
                                                                            {{ @$blog->name_en }}
                                                                        @else
                                                                            {{ @$blog->name }}
                                                                        @endif
                                                                    </a></h6>
                                                            </div>
                                                            <ul class="post-meta">
                                                                <li class="author"><a href="javascript:;"><i
                                                                            class="fal fa-calendar-alt"></i>
                                                                        {{ $blog->created_at }} </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <img src="{{ asset('new/images/no.png') }}" width="250px" height="250px" alt="">
                                            @endif
                                            {{-- <div class="widget-post clearfix">
                      <div class="ttr-post-media"> <img src="images/pic2.jpg" width="200" height="160" alt=""> </div>
                      <div class="ttr-post-info">
                        <div class="ttr-post-header">
                          <h6 class="post-title"><a href="blog-details.html"> موقع ويب حلول تكنولوجيا المعلومات. تصميمات ورسوم توضيحية وعناصر رسومية ملهمة من أفضل المصممين في العالم .</a></h6>
                        </div>
                        <ul class="post-meta">
                          <li class="author"><a href="javascript:;"><i class="fal fa-calendar-alt"></i>12 اغسطس 2023</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="widget-post clearfix">
                      <div class="ttr-post-media"> <img src="images/pic3.jpg" width="200" height="160" alt=""> </div>
                      <div class="ttr-post-info">
                        <div class="ttr-post-header">
                          <h6 class="post-title"><a href="blog-details.html">فرق التطوير لدينا ذات المهارات العالية والمتخصصة في Java و PHP و React و Angular .</a></h6>
                        </div>
                        <ul class="post-meta">
                          <li class="author"><a href="javascript:;"><i class="fal fa-calendar-alt"></i>12 اغسطس 2023</a></li>
                        </ul>
                      </div>
                    </div> --}}
                                        </div>
                                    </div>
                                    <div class="widget">
                                        <div class="help-bx">
                                            <div class="media">
                                                <img src="{{ asset('new/images/ic04.jpg') }}" alt="">
                                            </div>
                                            <div class="info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                                    viewBox="0 0 476 476">
                                                    <path d="M400.85,181v-18.3c0-43.8-15.5-84.5-43.6-114.7c-28.8-31-68.4-48-111.6-48h-15.1c-43.2,0-82.8,17-111.6,48 c-28.1,30.2-43.6,70.9-43.6,114.7V181c-34.1,2.3-61.2,30.7-61.2,65.4V275c0,36.1,29.4,65.5,65.5,65.5h36.9c6.6,0,12-5.4,12-12
                        V192.8c0-6.6-5.4-12-12-12h-17.2v-18.1c0-79.1,56.4-138.7,131.1-138.7h15.1c74.8,0,131.1,59.6,131.1,138.7v18.1h-17.2
                        c-6.6,0-12,5.4-12,12v135.6c0,6.6,5.4,12,12,12h16.8c-4.9,62.6-48,77.1-68,80.4c-5.5-16.9-21.4-29.1-40.1-29.1h-30
                        c-23.2,0-42.1,18.9-42.1,42.1s18.9,42.2,42.1,42.2h30.1c19.4,0,35.7-13.2,40.6-31c9.8-1.4,25.3-4.9,40.7-13.9
                        c21.7-12.7,47.4-38.6,50.8-90.8c34.3-2.1,61.5-30.6,61.5-65.4v-28.6C461.95,211.7,434.95,183.2,400.85,181z M104.75,316.4h-24.9
                        c-22.9,0-41.5-18.6-41.5-41.5v-28.6c0-22.9,18.6-41.5,41.5-41.5h24.9V316.4z M268.25,452h-30.1c-10,0-18.1-8.1-18.1-18.1
                        s8.1-18.1,18.1-18.1h30.1c10,0,18.1,8.1,18.1,18.1S278.25,452,268.25,452z M437.95,274.9c0,22.9-18.6,41.5-41.5,41.5h-24.9V204.8
                        h24.9c22.9,0,41.5,18.6,41.5,41.5V274.9z"></path>
                                                </svg>
                                                <h5 class="title mt-20">{{ __('ms_lang.How Can Help you') }}</h5>
                                                <p>{{ __('ms_lang.To ask about services call us') }}</p>
                                                <a href="{{ route('contact-us') }}" class="btn btn-primary">{{ __('ms_lang.call us') }}</a>
                                            </div>
                                        </div>
                                    </div>

                                </aside>
                            </div>
                        </div>
                    </div>
                </section>



            </div>



        </div>
