<div>
    <div class="page-content bg-white">
			
			
			
        <div class="page-content bg-white">
            <!-- Inner Banner -->
            <div class="page-banner ovbl-dark" style="background-image:url(new/images/back01.jpg);">
                <div class="container">
                    <div class="page-banner-entry text-center">
                        <h1><span>التوظيف</span></h1>
                        <!-- Breadcrumb row -->
                        <nav aria-label="breadcrumb" class="breadcrumb-row">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home_home')}}"><i class="las la-home"></i>{{__('ms_lang.home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('ms_lang.employment')}}</li>
                            </ul>
                        </nav>
                        <!-- Breadcrumb row END -->
                    </div>
                </div>
            </div>
            <!-- Inner Banner -->
                
                
    
    
    
    <div class="section-area bg-gray section-sp1">
                    <div class="container">
                        <div class="row">
                            @foreach ($jobs as $job )                                
                            <div class="col-lg-8 col-md-7 mb-md-20">
                                <div class="heading-bx">
    
                                    <h2 class="title mb-0">{{$job->name}}</h2>
                                </div>
    
    
    <div class="mb-30">
    <div class="job-career-box">
    <p><strong>{{__('ms_lang.field')}} :  </strong> {{$job->field->name}}</p>
    <p><strong>{{__('ms_lang.experience')}}:</strong> {{$job->experience_years}} {{__('ms_lang.years')}}</p>
    <p><strong>{{$job->description}}</strong></p>
    <ul class="list-check">
        @foreach ( explode(',' , $job->requirement) as $req )
    <li>{{$req}}</li>
    @endforeach
    <li>{{$job->gender == 0 ? 'Male' : 'Female'}}</li>
    </ul>
    {{-- <p>{{$job->expire_date	> now() ? 'Application Deadline : '. $job->expire_date }}</p> --}}
   {{-- @if ($job->expire_date	> now()) --}}
   <b>{{__('ms_lang.Deadline')}}:{{$job->expire_date}}</b>
   <br>
   <a href="{{route('apply-job' , $job->id)}}" class="btn btn-primary mt-10">{{__('ms_lang.Apply your application now')}}</a>

    {{-- @else --}}
    {{-- <p class="text-danger">انتهي التقديم</p> --}}
   {{-- @endif   --}}
    </div>
    </div>
    
                                </div>
    @endforeach
                            <div class="col-lg-4 col-md-5 mb-20 no-mob">
                                <aside class="sticky-top">
    
                                <div class="widget recent-posts-entry">
                                    <h5 class="widget-title">{{__('ms_lang.Most Reading')}}</h5>
                                    <div class="widget-post-bx">
                                        @foreach ($articles as $article )                                            
                                        <div class="widget-post clearfix">
                                            <div class="ttr-post-media"><img src="{{ img_chk_exist($article->img) }}" width="200" height="143" alt=""> </div>
                                            <div class="ttr-post-info">
                                                <div class="ttr-post-header">
                                                    <h6 class="post-title"><a href="{{route('blog-detail' , $article->id)}}">{{app()->getLocale()=='en' ? $article->name_en : $article->name}}</a></h6>
                                                </div>
                                                <ul class="post-meta">
                                                    <li class="author"><a href="javascript:;"><i class="fal fa-calendar-alt"></i>{{$article->created_at}}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach
                                        {{-- <div class="widget-post clearfix">
                                            <div class="ttr-post-media"> <img src="{{asset('new/images/pic2.jpg')}}" width="200" height="160" alt=""> </div>
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
                                            <div class="ttr-post-media"> <img src="{{asset('new/images/pic3.jpg')}}" width="200" height="160" alt=""> </div>
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
                                            <img src="{{asset('new/images/ic04.jpg')}}" alt="">
                                        </div>
                                        <div class="info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 476 476">
                                                <path d="M400.85,181v-18.3c0-43.8-15.5-84.5-43.6-114.7c-28.8-31-68.4-48-111.6-48h-15.1c-43.2,0-82.8,17-111.6,48 c-28.1,30.2-43.6,70.9-43.6,114.7V181c-34.1,2.3-61.2,30.7-61.2,65.4V275c0,36.1,29.4,65.5,65.5,65.5h36.9c6.6,0,12-5.4,12-12
                                                V192.8c0-6.6-5.4-12-12-12h-17.2v-18.1c0-79.1,56.4-138.7,131.1-138.7h15.1c74.8,0,131.1,59.6,131.1,138.7v18.1h-17.2
                                                c-6.6,0-12,5.4-12,12v135.6c0,6.6,5.4,12,12,12h16.8c-4.9,62.6-48,77.1-68,80.4c-5.5-16.9-21.4-29.1-40.1-29.1h-30
                                                c-23.2,0-42.1,18.9-42.1,42.1s18.9,42.2,42.1,42.2h30.1c19.4,0,35.7-13.2,40.6-31c9.8-1.4,25.3-4.9,40.7-13.9
                                                c21.7-12.7,47.4-38.6,50.8-90.8c34.3-2.1,61.5-30.6,61.5-65.4v-28.6C461.95,211.7,434.95,183.2,400.85,181z M104.75,316.4h-24.9
                                                c-22.9,0-41.5-18.6-41.5-41.5v-28.6c0-22.9,18.6-41.5,41.5-41.5h24.9V316.4z M268.25,452h-30.1c-10,0-18.1-8.1-18.1-18.1
                                                s8.1-18.1,18.1-18.1h30.1c10,0,18.1,8.1,18.1,18.1S278.25,452,268.25,452z M437.95,274.9c0,22.9-18.6,41.5-41.5,41.5h-24.9V204.8
                                                h24.9c22.9,0,41.5,18.6,41.5,41.5V274.9z"></path>
                                            </svg>
                                            <h5 class="title mt-20">{{__('ms_lang.How Can Help you')}}</h5>
                                            <p>{{__('ms_lang.To ask about services call us')}}</p>
                                            <a href="{{route('contact-us')}}" class="btn btn-primary">{{__('ms_lang.call us')}}</a>
                                        </div>
                                    </div>
                                </div>
    
    
                                </aside>
                            </div>
                        </div>
                        
                    </div>
                </div>
    
    
                
                
                </div>
</div>
