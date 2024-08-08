@extends('site_ms.layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')
  

@if (is_null($result)== 0)
<section class="pannerblog bloginner"> 
      <div class="container">
        <h1 class="titlebold">{{ $result->name}}</h1>
        <p class="text">Storytelling is a powerful way to reach out to the community.<br/> You’d be surprised at how many people can relate to your experiences and learn from your journey. <br/>Get inspired! Care to share?</p>
      </div>
    </section>
    <section class="blogdetals"> 
      <div class="container">
        <div class="bolgbox">
          <div class="photoblog"> <img src="{{img_chk_exist($result->img)}}" alt=""></div>
          <p class="textitme">{!! trim($result->details) !!} </p>
          <div class="sh-icon">
            <p>Share :</p>
            <nav class="social">
            <a class="fab fa-facebook-f icon-facebook" href="#" title="Facebook"></a>
              <!--a(href='#',class='fab fa-instagram icon-instagram',title='Instagram')--><a class="fab fa-twitter icon-twitter" href="#" title="Twitter"></a><a class="fab fa-google-plus-g icon-gplus" href="#" title="Google-plus"></a>
              <!--a(href='#',class='fab fa-youtube icon-youtube',title='youtube')-->
              <!--a(href='#',class='fab fa-whatsapp icon-whatsapp',title='whatsapp') -->
            </nav>
          </div>
          
          <div class="itmeuser">
            <div class="imguser"><img src="{{img_chk_exist($result->user_nms->img)}}" alt="{{@$result->user_nms->name. ' '.@$result->user_nms->l_name }}" title="{{@$result->user_nms->name. ' '.@$result->user_nms->l_name }}"></div>
            <div class="usertext">
              <h3>{{@$result->user_nms->name. ' '.@$result->user_nms->l_name }}</h3>
              <a class="costarica" > </a>
              <p>{{@$result->user_nms->bio}} </p>
              {{-- <div class="textany"><span class="available">Available :</span><span class="typetext">Any</span><span class="verified"> <img src="images/verified.png" alt="">  verified</span></div> --}}
              <div class="botright">
                <a class="bottom" href="#" alt="">Message</a
                  ><a class="bottom" href="#" alt="">Swap Request</a>
                </div>
            </div>
          </div>
          <div class="bot-nexbak">
            <a class="backbot" href="{{route('blogs.show',[$result->id,title_2url($result->name),'step'=>'back'])}}">Back</a>
            <a class="nextbot" href="{{route('blogs.show',[$result->id,title_2url($result->name),'step'=>'next'])}}">Next</a>
            <a class="bot-name" href="#">{{@$result->user_nms->name. ' '.@$result->user_nms->l_name }} Blogs</a>
          </div>
        </div>
        <div class="lastblog">
          <h2 class="titlebold">Similar <span>Blogs</span>  </h2>
          <div class="slid-blog">
@if (count($similar_blogs))
    @foreach ($similar_blogs as $similar_blog)
          <div class="bolgbox">
              <div class="col-sm-5 imgblog">
                <a class="imgin" href="{{route('blogs.show',[$similar_blog->id,title_2url($similar_blog->name)])}}"> 
                  <img src="{{img_chk_exist($similar_blog->img)}}" alt="{{$similar_blog->name}}" title="{{$similar_blog->name}}">
                </a>
              </div>
              <div class="col-sm-7 textblog">
              <h3>{{$similar_blog->name}}</h3>
                <div class="textany">
                  <span class="available">By : {{$similar_blog->user_f_name.' '.$similar_blog->l_name}}  </span>
                  <span class="typetext"> On :{{date_only($similar_blog->created_at)}}</span>
                </div>
                <nav class="hashtag"></nav>
                <p>{!! cut_arabic_text($similar_blog->details,300) !!}</p>
                <a class="bot-share" href="#"><i class="fas fa-share"></i> Share</a>
                <a class="bot-more" href="{{route('blogs.show',[$similar_blog->id,title_2url($similar_blog->name)])}}"> <i class="fas fa-angle-double-right"></i> Read more</a>
              </div>
            </div>
    @endforeach
@endif
          </div>
        </div>
      </div>
    </section>


@endif

@endsection