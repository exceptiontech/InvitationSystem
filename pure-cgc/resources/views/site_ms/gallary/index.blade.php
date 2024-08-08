@extends('site_ms.layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')

<section class="pan-gallery">
    <div class="container">
      <h1 class="titlebold">{{ $text_res->name }} </h1>
      <p class="text">{{ $text_res->details }}
        </p>
      <nav class="maptext">
@guest
        <a href="#" data-toggle="modal" data-title="" data-target="#signin">Log in or sign up to see the full gallery</a>
@endguest
        <!--span Submit Your Photos-->
      </nav>
    </div>
  </section>
  <section class="dat-gallery">
    <div class="container">
      <div class="row">
@if (count($results))

    @foreach ($results as $result)
        <div class="col-sm-3 item-gal">
          <div class="in-gal"><a class="img-gal thumbnail" href="{{img_chk_exist($result->img)}}"><img src="{{img_chk_exist($result->img)}}" alt="{{ $result->name}}" title="{{ $result->name}}"><i class="fas fa-plus adds"> </i></a>
            <h2>{{ $result->name}}</h2>
            <p>By : {{ $result->user_name}}</p><p><small>On : {{ date_only($result->created_at)}}</small></p>
          </div>
        </div>
    @endforeach
    <ul class="pagination w-100">
        {{--  <li class="page-item"><a class="page-link" href="#">&laquo; </a></li>
        <li class="page-item"><a class="page-link active" href="#">1 </a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>  --}}
      </ul>
    {{ $results->links() }}
@endif

      </div>
    </div>
  </section>


@endsection
