@extends('site_ms.layouts.app')

@section('content')

<div class="nk-main nk-main-dark">
  <div id="google-map-contact" class="nk-gmaps nk-gmaps-lg">

    <style type="text/css">
      .map_ms iframe {
          width:100%;
          height:650px;
      }
      </style>
          <div class="col-md-12 map_ms">
            {!! $contact_details->google_map !!}
      
          </div>
  </div>
  <div class="nk-gap-2"></div>
  <div class="bg-dark-05">
    <div class="container">
        <div class="nk-gap-5 mnt-10"></div>
        <div class="row vertical-gap">
            <div class="col-lg-5">  
              <h2 class="display-4">{{ __('ms_lang.contact_us') }}</h2>
              <div class="nk-gap mnt-3"></div>
              <p></p>

                <ul class="nk-contact-info">
                    <li><strong>Address:</strong> {!! $contact_details->address !!}</li>
                    <li><strong>Phone:</strong> {{$contact_details->mobile}}</li>
                    <li><strong>Email:</strong> {{$contact_details->email}}</li>
                    {{-- <li> 
                        @if (count($socil_medias))
                            @foreach ($socil_medias as $socil_media)
                                <a href=""></a>
                                <a href="{{$socil_media->url_l}}" class="social-icon si-small si-dark si-{!! $socil_media->class_so !!}" target="_blank">
                                  {!! $socil_media->i_icon !!}
                                  {!! $socil_media->i_icon !!}
                                </a>
                            @endforeach
                        @endif
                    </li> --}}
                </ul>
                <!-- END: Info -->
            </div>
            <div class="col-lg-7">

        <div class="form-widget">

          <div class="form-result">
@include('includes.messages')

            <div class="form-message">
                <div id="cmsgSubmit" class="h3 text-center hidden" style=" color: #d4edda"></div>
            </div>
          </div>
            
            <div class="nk-gap-3"></div>
          <form  id="contactFormMs" data-toggle="validator" data-focus="false" class="nk-form ">
            
            <div class="row vertical-gap">
                    <div class="nk-gap-1"></div>
                    <div class="nk-gap-1"></div>
                    <div class="nk-gap-1"></div>
                    <input type="text" class="form-control required" name="name" id="cname" required placeholder="Name">
                    <input type="hidden"  name="cat_id" id="ccat_id" value="0">
                    <input type="hidden"  name="company" id="ccompany" value="">
                    <div class="help-block with-errors"></div>
                    <div class="nk-gap-3"></div>
                    <input type="text" class="form-control required" name="email"  id="cemail" required placeholder="Email">
                    <div class="nk-gap-3"></div>
                    <input type="text" class="form-control required" name="subject" id="csubject" placeholder="Interest">
                    <div class="nk-gap-3"></div>
                    <textarea class="form-control required" name="message" rows="7" placeholder="Your Message"  id="cmessage" required></textarea>

                    <div class="nk-gap-3"></div>
                    <div class="nk-form-response-success"></div>
                    <div class="nk-form-response-error"></div>
                    <div class="nk-gap-3"></div>
                    <button  id="cmsgSubmit"  class="nk-btn nk-btn-color-dark-1">Send Message</button>
       
        </div> 
    </form>
    <div class="nk-gap-5"></div>
        </div>

      </div><!-- .postcontent end -->
        </div>
    </div>
  </div>
</div>


      @include('site_ms.layouts.scripts_js_mso')
      @section('footer')
          <script src="{{url('js/validator.min.js')}}"></script>
      @endsection
@endsection