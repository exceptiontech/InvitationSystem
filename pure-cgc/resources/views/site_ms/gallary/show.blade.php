@extends('site_ms.layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')
  
<!-- Services Section -->
<div class="col-md-12 services-section">
  <div class="col-md-1"></div>
  <div class="col-md-10">
   <div class="col-md-12">
    <h2> {{$title}}</h2>
  </div>
  <div class="col-md-12 sowal">
    <a href="#" class="lern-m4"> ارسل سؤالك <i class=" fa  fa-send"></i></a>    </div>
@if (count($result))

<div class="col-md-12 services-section">
  <div class="col-md-1"></div>
  <div class="col-md-10">
   <div class="col-md-12 mos3aa">
    <div class="col-md-12  shar-soc">
     <!-- Sharingbutton Facebook -->
     <a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsharingbuttons.io" target="_blank" aria-label="Share on Facebook">
      <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--normal">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.77 7.5H14.5V5.6c0-.9.6-1.1 1-1.1h3V.54L14.17.53C10.24.54 9.5 3.48 9.5 5.37V7.5h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
      </div>Facebook</div>
    </a>
    <!-- Sharingbutton Twitter -->
    <a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;url=http%3A%2F%2Fsharingbuttons.io" target="_blank" aria-label="Share on Twitter">
      <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--normal">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.4 4.83c-.8.37-1.5.38-2.22.02.94-.56.98-.96 1.32-2.02-.88.52-1.85.9-2.9 1.1-.8-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.04.7.12 1.04-3.78-.2-7.12-2-9.37-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.73-.03-1.43-.23-2.05-.57v.06c0 2.2 1.57 4.03 3.65 4.44-.67.18-1.37.2-2.05.08.57 1.8 2.25 3.12 4.24 3.16-1.95 1.52-4.36 2.16-6.74 1.88 2 1.3 4.4 2.04 6.97 2.04 8.36 0 12.93-6.92 12.93-12.93l-.02-.6c.9-.63 1.96-1.22 2.57-2.14z"/></svg>
      </div>Twitter</div>
    </a>
    <!-- Sharingbutton Google+ -->
    <a class="resp-sharing-button__link" href="https://plus.google.com/share?url=http%3A%2F%2Fsharingbuttons.io" target="_blank" aria-label="Share on Google+">
      <div class="resp-sharing-button resp-sharing-button--google resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--normal">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.37 12.93c-.73-.52-1.4-1.27-1.4-1.5 0-.43.03-.63.98-1.37 1.23-.97 1.9-2.23 1.9-3.57 0-1.22-.36-2.3-1-3.05h.5c.1 0 .2-.04.28-.1l1.36-.98c.16-.12.23-.34.17-.54-.07-.2-.25-.33-.46-.33H7.6c-.66 0-1.34.12-2 .35-2.23.76-3.78 2.66-3.78 4.6 0 2.76 2.13 4.85 5 4.9-.07.23-.1.45-.1.66 0 .43.1.83.33 1.22h-.08c-2.72 0-5.17 1.34-6.1 3.32-.25.52-.37 1.04-.37 1.56 0 .5.13.98.38 1.44.6 1.04 1.85 1.86 3.55 2.28.87.23 1.82.34 2.8.34.88 0 1.7-.1 2.5-.34 2.4-.7 3.97-2.48 3.97-4.54 0-1.97-.63-3.15-2.33-4.35zm-7.7 4.5c0-1.42 1.8-2.68 3.9-2.68h.05c.45 0 .9.07 1.3.2l.42.28c.96.66 1.6 1.1 1.77 1.8.05.16.07.33.07.5 0 1.8-1.33 2.7-3.96 2.7-1.98 0-3.54-1.23-3.54-2.8zM5.54 3.9c.32-.38.75-.58 1.23-.58h.05c1.35.05 2.64 1.55 2.88 3.35.14 1.02-.08 1.97-.6 2.55-.32.37-.74.56-1.23.56h-.03c-1.32-.04-2.63-1.6-2.87-3.4-.13-1 .08-1.92.58-2.5zM23.5 9.5h-3v-3h-2v3h-3v2h3v3h2v-3h3z"/></svg>
      </div>Google+</div>
    </a>
    
  </div>
  <div class="col-md-12"><h3>{{ $result->name}}</h3></div>
  <div class="col-md-12 line"></div>
  <div class="col-md-12 views"> المشاهدات:{{ $result->num_views}} <i class="fa fa-eye"></i></div>
  <div class="col-md-12">
   <h4>الاجابة</h4>
   <p> {!! trim($result->details) !!}  </p>
 </div>
</div>
</div>
<div class="col-md-1"></div>
</div>
@endif

@endsection