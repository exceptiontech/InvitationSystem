@extends('site_ms.layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')

<div class="col-md-12 services-section">
        <div class="col-md-1"></div>



        <div class="col-md-10">
            <h3 class="gallery-title">{{$title}}</h3>
@if(Session::has('flash_message'))
    <div class="alert alert-success  alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     {!! session('flash_message') !!}</em>
    <i class="icon fa fa-check"></i>
    </div>
@endif
            <div class="col-md-12">
                <div class="col-md-5 con-info">
                 <h3> ارسل سؤالك</h3>
                    <p> ارسل سؤالك وسوف نقوم بالرد عليك فلى اقرب وقت ممكن ارسل سؤالك وسوف نقوم بالرد عليك فلى اقرب وقت ممكن ارسل
                        سؤالك وسوف نقوم بالرد عليك فلى اقرب وقت ممكن</p>
                </div>
                <div class="col-md-7 f-form">
@if (count($result))
                 <form @if (isset($result->id))
                        action="{{route('art_m.update', $result->id ) }}"
                    @else
                        action="{{route('art_m.store') }}"
                    @endif
                 method="post" enctype="multipart/form-data" >
                    @csrf
                    @if (isset($result->id))
                        @method('PUT')
                    @else
                        
                    @endif
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">السؤال</label>
                        <input type="hidden" name="type" value="{{$result->type}}"  />
                        <textarea name="name" max_lenght="290" class="form-control" rows="3" >{{$result->notes}}</textarea>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-success " id="btnContactUs"> ارسال <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </div>
            </form>
@endif
    </div>
   </div>
  <div class="col-md-3"></div>
</div>

@endsection