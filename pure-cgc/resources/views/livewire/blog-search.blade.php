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
                                <li class="breadcrumb-item"><a href={{route('home_home')}}><i class="las la-home"></i>{{__('ms_lang.home')}}</a>
                                </li>
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
                                        <a href="{{route('blog-detail' , $blogs_article->id)}}"><img src="{{img_chk_exist($blogs_article->img)}}" alt="" /></a>
                                    </div>
                                    <div class="post-info">
                                        <h5 class="post-title"><a href="{{route('blog-detail' , $blogs_article->id)}}">
                                          @if (app()->getLocale() == 'en')
                                          {{$blogs_article->name_en}}
                                              @else
                                              {{$blogs_article->name}}

                                          @endif
                                                  </a></h5>
                                        <div class="post-content">
                                            <p class="mb-0">
                                              @if (app()->getLocale() == 'en')
                                              {{$blogs_article->brief_en}}
@else

{{$blogs_article->brief}}

                                              @endif
                                            </p>
                                        </div>
                                        <ul class="post-meta">
                                            <li class="date">{{$blogs_article->created_at}}</li>
                                            <li class="readmore"><a href="{{route('blog-detail' , $blogs_article->id)}}">اقراء المزيد</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div width="150px" height="150px">
                            <img src="{{asset('new/images/no.png')}}" width="150px" height="150px"> 
                        </div>
                            @endif
                        </div>
                </section>
            </div>
        </div>
