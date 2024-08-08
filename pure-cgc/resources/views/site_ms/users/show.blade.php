@extends('site_ms.layouts.app')

@section('content')
<h2> البروفايل</h2>
<div class="dashboard2">
    <div class=" main3">
@if(Session::has('flash_message'))
    <div class="alert alert-success col-md-6 col-md-offset-3  alert-dismissable">
        <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">×</button>
        <span class="glyphicon glyphicon-ok"></span>   <em> {!! session('flash_message') !!}</em>
    </div>
@endif
@include('includes.messages')

        <form @if (isset($result->id))
                action="{{route('members.update', $result->id ) }}"
            @else
                action="{{route('members.store') }}"
            @endif
        
            method="post" role="form" enctype="multipart/form-data" >
            @csrf
            @if (isset($result->id))
                @method('PUT')
            @else
                
            @endif
  @if (isset($result->id) && !empty($result->img))
                    <div class="form-group <?php //echo $dis_img; ?>">
                        <label for="ord">الصورة</label>
                        <img src="{{ img_chk_exist($result->img)}}" style="width: 70px; height: 60px" />
                    </div>
@endif
@if (isset($type))
    <input type="hidden" name="type" value="{{$type}}" />
@else
    <input type="hidden" name="type" value="{{@$result->type}}" />
@endif
            <div class="form-group">
                <label for="inputsection">اسم العضو</label>
                <input type="hidden" name="ord" value="{{ @$result->ord }}" class="form-control" id="ord" />
                <input type="text" name="name" value="{{ @$result->name }}" class="form-control" id="inputsection">
            </div>
            <div class="form-group">
                <label for="inputsection">الايميل </label>

                <input type="eamil" name="email" value="{{ @$result->email }}" class="form-control" readonly="">
            </div>
            <div class="form-group">
                <label for="inputsection">كلمة المرور</label>

                <input type="password" name="password" value="" class="form-control">
            </div>
            <div class="form-group">
                <label> صورة </label>
                <div class="input-group image-preview">

                    <input type="text"  class="form-control image-preview-filename" disabled="disabled">
                    <!-- do not give a name === does not send on POST/GET -->
                    <span class="input-group-btn">
                        <!-- image-preview-clear button -->
                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                            <span class="glyphicon glyphicon-remove"></span> Clear
                        </button>
                        <!-- image-preview-input -->
                        <div class="btn btn-default image-preview-input">
                            <span class="glyphicon glyphicon-folder-open"></span>
                            <span class="image-preview-input-title"></span>
                            <input type="file" name="img"  accept="image/png, image/jpeg, image/gif" name="input-file-preview" />
                            <!-- rename it -->
                        </div>
                    </span>
                </div>
            </div>
            <div class="form-group @if(Auth::User()->user_level > 0) hidden  @endif">
                <label for="inputsection">نبذة عنك </label>
                <textarea name='bio' class="form-control">{{@$result->bio}}</textarea>
            </div>
             <button type="button" onclick="history.go(-1);" class="btn btn-default pull-center">رجوع</button>
            <button type="submit" class="btn btn-info pull-center" > حـــــفـــــظ </button>
           
        </form>
    </div>
</div>


@endsection
