<div>
    <div class="page-content bg-white">
        <div class="page-content bg-white">
            <!-- Inner Banner -->
            <div class="page-banner ovbl-dark" style="background-image:url({{asset('new/images/back01.jpg')}});">
                <div class="container">
                    <div class="page-banner-entry text-center">
                        <h1><span>{{__('ms_lang.blog')}}</span></h1>
                        <!-- Breadcrumb row -->
                        <nav aria-label="breadcrumb" class="breadcrumb-row">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href={{route('home_home')}}><i
                                            class="las la-home"></i>{{__('ms_lang.home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('ms_lang.blog')}}</li>
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
                            @if (count($blogs_articles) > 0)
                                @foreach ($blogs_articles as $blogs_article)
                                    <div class="col-md-4 col-12">
                                        <div class="blog-card style-1 bg-gray">
                                            <div class="post-media">
                                                <a href="{{route('blog-detail' , $blogs_article->id)}}"><img
                                                        src="{{img_chk_exist($blogs_article->img)}}" alt=""/></a>
                                            </div>
                                            <div class="post-info">
                                                <div class="date"><i
                                                        class="fal fa-calendar-alt"></i>{{date_only($blogs_article->created_at)}}
                                                </div>
                                                <h5 class="post-title">
                                                    <a href="{{route('blog-detail' , $blogs_article->id)}}">
                                                        @if (app()->getLocale() == 'en')
                                                            {{$blogs_article->name_en}}
                                                        @else
                                                            {{$blogs_article->name}}

                                                        @endif
                                                    </a>
                                                </h5>
                                                <div class="post-content">
                                                    <p class="mb-0">
                                                        @if (app()->getLocale() == 'en')
                                                            {!!cut_arabic_text($blogs_article->brief_en,200) !!}
                                                        @else
                                                            {!!cut_arabic_text($blogs_article->brief,150) !!}
                                                        @endif
                                                    </p>
                                                </div>
                                                <small>3 دقايق للقراية</small>
                                                <ul class="post-meta">
                                                    <li class="readmore"><a
                                                            href="{{route('blog-detail' , [ $blogs_article->id ,'n'=>title_2url(app()->getLocale() == 'en' ? $blogs_article->name_en:$blogs_article->name)])}}">{{ __('ms_lang.btn_read_more') }}</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {!! $blogs_articles->links()!!}
                            @endif
                        </div>
                </section>
            </div>
        </div>
