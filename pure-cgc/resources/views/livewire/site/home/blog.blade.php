<div>
@if (count($articles))
    <!-- Blog -->
    <section class="section-area section-sp2 bg-gray ov-hidden">
        <div class="container">
            <div class="heading-bx text-center">
                <h2 class="title mb-0">{{__('ms_lang.blog')}} </h2>
            </div>
            <div class="blog-carousel owl-carousel owl-loaded owl-none owl-drag">
    @foreach ($articles as $article)
                        <div class="item">
                            <div class="blog-card style-1 bg-white">
                                <div class="post-media">
                                    <a href="{{route('blog-detail' , $article->id)}}"><img loading="lazy" src="{{ img_chk_exist(@$article->img) }}" alt="{{ app()->getLocale() == 'ar' ? @$article->name : @$article->name_en }}" title="{{ app()->getLocale() == 'ar' ? @$article->name : @$article->name_en }}" /></a>
                                </div>
                                <div class="post-info">
                                    <h5 class="post-title"><a
                                            href="{{route('blog-detail' , [$article->id,title_2url(app()->getLocale() == 'ar' ? @$article->name : @$article->name_en)])}}">{{ app()->getLocale() == 'ar' ? @$article->name : @$article->name_en }}</a>
                                    </h5>
                                    <div class="post-content">
                                        <p class="mb-0">
                                            {{ app()->getLocale() == 'ar' ? @$article->brief : @$article->brief_en }}
                                        </p>
                                    </div>
                                    <ul class="post-meta">
                                        <li class="date">{{ date_only(@$article->created_at) }}</li>
                                        <li class="readmore"><a href="{{route('blog-detail' , [$article->id,title_2url(app()->getLocale() == 'ar' ? @$article->name : @$article->name_en)])}}">{{__('ms_lang.Read More')}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
    @endforeach
            </div>
        </div>
    </section>
@endif
</div>

