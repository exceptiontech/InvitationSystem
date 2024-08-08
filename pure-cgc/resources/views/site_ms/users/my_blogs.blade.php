@extends('site_ms.layouts.app',['user_dashboard'=>1])

@section('content')
@include('site_ms.layouts.scripts_js_mso')

@include('includes.messages')
 <section class="pannerblog"> 
      <div class="container">
        <h1 class="titlebold">Yogiswap <span>Blog!</span></h1>
        <p class="text">Storytelling is a powerful way to reach out to the community.<br/> You’d be surprised at how many people can relate to your experiences and learn from your journey. <br/>Get inspired! Care to share?</p>
        <nav class="maptext">Go to Yogiswap blog now<a href="{{ route('blogs.create','yogi-blogs') }}"><span>Write your blog now</span></a></nav>
      </div>
    </section>
    <section class="blog"> 
      <div class="container">
        <form action="#" method="post">
          <div class="row">
            <div class="col-sm-12 inpusrach"><i class="fas fa-search"> </i>
              <input class="form-control" type="text" placeholder="Search by people, things, places &amp; experiences yogiswap blog">
            </div>
          </div>
        </form>

@if (count($results))

    @foreach ($results as $result)
        

            <!--a class="img-gal userimg delet"   value="Delete" name="<?=$result->name;?>" del_id="<?=$result->id;?>" user_id="2"-->

          <div class="bolgbox dis_ms_{{$result->id}}">
          <div class="col-sm-5 imgblog">
            <a class="imgin" href="{{route('blogs.show',[$result->id,title_2url($result->name)])}}"> 
              <img src="{{img_chk_exist($result->img)}}" alt="{{ $result->name}}" title="{{ $result->name}}">
            </a>
          </div>
          <div class="col-sm-7 textblog">
            <h3>{{ $result->name}}</h3>
            <div class="textany">
                <a href="{{ route('blogs.edit',$result->id) }}" class="far fa-edit icon-ed"></a>
                <a value="Delete" name="<?=$result->name;?>" del_id="<?=$result->id;?>" user_id="2" class="fas fa-trash-alt icon-ed delet"></a>
            <span class="typetext"> On : {{ date_only($result->created_at)}}</span>
            </div>
            <nav class="hashtag">
            <!-- a href="#">#Yoga                </a>
            <a href="#">#Swap</a>
            <a href="#">#Relax</a>
            <a href="#">#Travel</a -->
            </nav>
            <p>{{ cut_arabic_text($result->details,350)}}</p>
            <a class="bot-share" href="#"><i class="fas fa-share"></i> Share</a>
            <a class="bot-more" href="{{route('blogs.show',[$result->id,title_2url($result->name)])}}"> <i class="fas fa-angle-double-right"></i> Read more</a>
          </div>
        </div>
    @endforeach 
       

        

       
   <ul class="pagination w-100">
      </ul>
    {{ $results->links() }}

@endif
      </div>
    </section>

@endsection
