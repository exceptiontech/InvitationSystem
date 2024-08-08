@extends('site_ms.layouts.app',['user_dashboard'=>1])

@section('content')

<section class="pannerblog"> 
    <div class="container">
      <h1 class="titlebold">Yogiswap <span>Blog!</span></h1>
      <p class="text">Storytelling is a powerful way to reach out to the community.<br/> You’d be surprised at how many people can relate to your experiences and learn from your journey. <br/>Get inspired! Care to share?</p>
      <nav class="maptext"><a href="#">Go to Yogiswap blog now</a><span>Write your blog now</span></nav>
    </div>
  </section>
  
  <section class="writeblog"> 
  <div class="container">
      @include('includes.messages')
      <h2 class="titleblog">Write your blog now</h2>
      <p>Inspire fellow yogis and help us grow our community by sharing your yoga and travel photos! This is a safe environment and is only accessible to YS tribe members Help us keep it this way by following best practices when uploading your photos: respect for your environment and community, no nudity, no advertising, <br/> <br/> no spamming Please review our Terms and Conditions and Privacy policy to ensure your correct understanding and adhesion to our rules. If we consider a picture goes against our policy, it may be removed from the gallery without prior notification</p>
        <form action="{{route('blogs.store') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="row">
            <div class="col-sm-12 inputform">
            <input  type="hidden" name="type" value="{{$type}}" />
              <input class="form-control" type="text" name="name" value="{{ @$result->name }}" placeholder="Add Your Blog Title Here">
            </div>
            <div class="col-sm-12 inputform">
                <textarea class="jqte-test" name="details" placeholder="Post text here...">{{ @$result->details }}</textarea>
              </div>
            <div class="col-sm-12 inputform">
                <input type="file" name="img" accept=".jpg,.png,image/*,.xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
            </div>
            <div class="col-sm-12 submitbot">
              <button class="bottom" type="submit">Blog now</button>
            </div>
          </div>
        </form>
      </div>
    </section>
@endsection
