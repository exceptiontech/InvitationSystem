@extends('site_ms.layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')
<div class="nk-main nk-main-dark">
    <!-- START: Slider -->
    <div class="nk-slider bg-dark" data-show-nav="false" data-show-bullets="true" data-show-arrows="false" data-autoplay="3000" data-content-centering="center" data-height="670">
@if (count($sliders))
    @foreach ($sliders as $slider)
        <div class="nk-slider-item">
            <img src="{{ img_chk_exist($slider->img) }}" alt="{{ $slider->name }}" title="{{ $slider->name }}" class="nk-slider-image">
            <div class="nk-slider-content">
                <div class="text-left">
                    <div class="nk-gap-3"></div>
                    <h2 class="nk-subtitle text-white"></h2>
                    <h2 class="text-white display-5" style="color: #212529 !important"> {{ $slider->name }}<br> <em></em></h2>
                    <div class="nk-gap"></div>
                </div>
            </div>
        </div>
    @endforeach
@endif
    </div>
    <!-- END: Header Title -->
<div class="nk-main nk-main-dark">

    <!-- START: Contact Info -->
<div class="bg-dark-05" style="background-color: #181818 !important; color:white;">
    <div class="container">
        <div class="nk-gap-5 mnt-10"></div>
        <form  id="contactFormMs" data-toggle="validator" data-focus="false" class="nk-form ">
            <div class="form-message">
                <div id="cmsgSubmit" class="h3 text-center hidden" style=" color: #d4edda"></div>
            </div>
            <div class="row vertical-gap">
                <style>
                    .form-control{
                        border-color: white !important;
                        color: white !important;
                    }
                    ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
                    color:     white !important;
                }
                :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
                   color:     white !important;
                   opacity:  1;
                }
                ::-moz-placeholder { /* Mozilla Firefox 19+ */
                   color:     white !important;
                   opacity:  1;
                }
                :-ms-input-placeholder { /* Internet Explorer 10-11 */
                   color:    white !important;
                }
                ::-ms-input-placeholder { /* Microsoft Edge */
                   color:    white !important;
                }
                
                ::placeholder { /* Most modern browsers support this now. */
                   color:    white !important;
                }
                </style>
            <div class="col-lg-5">
                <!-- START: Info -->
                <h2 class="display-4">Contact Form:</h2>
                <div class="nk-gap mnt-3"></div>

                <p>We are keen to keep on touch, share you details to keep you posted .</p>
                
                <div class="row vertical-gap">
                    <div class="col-md-12">
                        <select name="cat_id" id="ccat_id" class="custom-select mr-sm-2" style="height: calc(1.5em + .75rem + 2px);background-color: #181818 !important; color:white;">
                            <option value="">Inquiry</option>
@if (count($services_form))
    @foreach ($services_form as $service_form)
                            <option value="{{ $service_form->id }}" >{{ $service_form->name }} </option>
    @endforeach
@endif
                            
                        </select>
                    </div>
                </div>
<div class="nk-gap-1"></div>
                <textarea class="form-control required" name="message" rows="11" placeholder="Your Message"  id="cmessage" required></textarea>
                    
                <!-- END: Info -->
            </div>
            <div class="col-lg-7">

                    <div class="nk-gap-1"></div>
                    <div class="nk-gap-1"></div>
                    <div class="nk-gap-1"></div>
                    <input type="text" class="form-control required" name="name" id="cname" required placeholder="Name">
                    <div class="help-block with-errors"></div>
                    <div class="nk-gap-1"></div>
                    <input type="text" class="form-control required" name="email"  id="cemail" required placeholder="Email">
                    <div class="nk-gap-1"></div>
                    <input type="text" class="form-control " name="subject" id="csubject" placeholder="Interest">
                    <div class="nk-gap-1"></div>
                    <input type="text" class="form-control required" name="company" id="ccompany" placeholder="Company">

                    <div class="nk-gap-1"></div>
                    <div class="nk-gap-1"></div>
                    <div class="nk-form-response-success"></div>
                    <div class="nk-form-response-error"></div>
                    <button  id="cmsgSubmit"  class="nk-btn nk-btn-color-dark-2">Send Message</button>
                
                <!-- END: Form -->
            </div>
       
        </div> 
    </form>
        <div class="nk-gap-5"></div>
    </div>
</div>
<!-- END: Contact Info -->
<!-- START: We provide -->
<div class="container">
    

    <h2 class="text-center"></h2>
    <div class="nk-gap-3"></div>
@if (count($main_services))
    <div class="nk-tabs">
        <ul class="nav nav-tabs nav-tabs-styled text-center" role="tablist">

 <?php $i = 1; ?>
    @foreach ($main_services as $main_service)
            <li class="nav-item">
                <a class="nav-link @if($i == 1) active @endif " href="#tab-mso-{{ $main_service->id }}" role="tab" data-toggle="tab">{{ $main_service->name }}</a>
            </li>
        <?php $i++; ?>
    @endforeach
        </ul>
        <div class="tab-content">
    <?php $ii=1; ?>
    @foreach ($main_services as $main_serv)
            <div role="tabpanel" class="tab-pane fade  @if($ii == 1)  show active @endif " id="tab-mso-{{ $main_serv->id }}">
                <div class="row vertical-gap">
        @if (is_null($main_serv['sub_services']) == 0)
            @foreach ($main_serv['sub_services'] as $sub_service)
                    <div class="col-lg-4 col-md-6">
                        <div class="nk-ibox-4 nk-ibox-4-dark" style="min-height: 350px;border:0;text-align: -webkit-center;">
                            <div class="nk-ibox-icon" style="width: auto !important">
                                <img src="{{ img_chk_exist($sub_service->img) }}" alt="{{ $sub_service->name }}" title="{{ $sub_service->name }}" style="width:90px;height: auto;max-height: 70px;">
                            </div>
                            <div class="nk-ibox-cont">
                                <div class="nk-gap-1"></div>
                                <div class="nk-ibox-title">{{ $sub_service->name }}</div>
                                <div class="nk-ibox-text">{{ cut_arabic_text($sub_service->details,200) }}</div>
                            </div>
                        </div>
                    </div>
            @endforeach
        @endif
                </div>
                <div class="nk-gap-6"></div>
        @if ($main_serv->field_ms != '')
        <div class="nk-box">
            <div class="bg-image bg-image-parallax">
                <div class="bg-image-overlay" style="background-color: rgba(0, 0, 0, 0.5);"></div>
                <img src="{{ url('images/video_img.png') }}" alt="" class="jarallax-img">
            </div>
    
            <div class="nk-gap-6"></div>
            <div class="nk-gap-6"></div>
            <div class="text-center">
                <a class="nk-video-fullscreen-toggle" href="{{ $main_serv->field_ms }}">
                    <span class="nk-video-icon-2-light"><span><span class="nk-play-icon text-main"></span></span></span>
                </a>
            </div>
            <div class="nk-gap-6"></div>
            <div class="nk-gap-6"></div>
        </div>
        @endif
            </div>
            <?php $ii++; ?>
    @endforeach

        </div>
    </div>
@endif
    <div class="nk-gap-4"></div>
</div>
<!-- END: We provide -->

</div>
@include('site_ms.layouts.scripts_js_mso')
@section('footer')
    <script src="{{url('js/validator.min.js')}}"></script>
@endsection

@endsection