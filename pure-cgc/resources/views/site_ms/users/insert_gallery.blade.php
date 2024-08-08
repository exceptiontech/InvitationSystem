@extends('site_ms.layouts.app',['user_dashboard'=>1])

@section('content')

<section class="pan-gallery"> 
      <div class="container">
        <h1 class="titlebold">Yogiswap <span>Gallery</span></h1>
        <p class="text">Here are some of our favorite photos of tribe members from all around the world.  Share yours !</p>
        <nav class="maptext"><a href="#">Go to Yogiswap gallery now</a><span>Submit Your Photos</span></nav>
      </div>
    </section>
    <section class="up-gallery"> 
      <div class="container">
      @include('includes.messages')
        <h2 class="titleblog">Submit your photos</h2>
        <p>Inspire fellow yogis and help us grow our community by sharing your yoga and travel photos! This is a safe environment and is only accessible to YS tribe members Help us keep it this way by following best practices when uploading your photos: respect for your environment and community, no nudity, no advertising, <br/> <br/> no spamming Please review our Terms and Conditions and Privacy policy to ensure your correct understanding and adhesion to our rules. If we consider a picture goes against our policy, it may be removed from the gallery without prior notification</p>
        <form action="{{route('galleries.store') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="row">
            <div class="col-sm-12 inputform">
              <input class="form-control" type="text" name="name" value="{{ @$result->name }}" placeholder="*Add Your Image Title Here" required>
            </div>
            <div class="col-sm-12 inputform">
              <input type="file" name="img" accept=".jpg,.png,image/*" multiple required>
            </div>
            <div class="col-sm-12 submitbot">
              <button class="bottom" type="submit">Upload</button>
            </div>
          </div>
        </form>
      </div>
    </section>
@endsection
