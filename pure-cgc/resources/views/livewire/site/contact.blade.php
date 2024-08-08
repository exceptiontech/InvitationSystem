{{--



<link rel="stylesheet" href="{{asset('site/assets/vendor/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/assets/vendor/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/assets/vendor/css/contactus/contact.css')}}">
    <!--Start contact-->

    <div class="contact-us">
        <div class="container">
            <div class="head pb-5">
                <h3 class="text-center">للتــواصـل</h3>
            </div>
            <div class="row py-5">
                <div class="col-md-12 form">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-box">
                                <input type="text" class="" name="name" required="required" />
                                <span>الاسم</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box">
                                <input type="text" class="" name="email" required="required" />
                                <span>البريد الالكتروني</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-box">
                                <input type="text" class="" name="subject" required="required" />
                                <span>موضوع الرساله</span>
                            </div>
                        </div>
                        <div class="col-md-12 my-3">
                            <div class="input-box">
                                <textarea class="" name="message" required="required"></textarea>
                                <span>الرساله</span>
                            </div>
                        </div>
                    </div>
                    <div class="btn">
                        <!-- <a href="" class="text-center rounded-pill">ارسال</a> -->
                      <input class="btn btn-success" type="submit" value="ارسال" />

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End contact-->
    <!--Start Footer-->
    <div class="footer">
        <div class="row" style="margin: 0; padding: 0">
            <div class="col-md-4 addres">
                <div class="contact-box">
                    <div class="icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="contact-details">
                        <p>الموقع:</p>
                        <small> شبين الكوم - المنوفيه - مصر </small>
                    </div>
                </div>
                <div class="contact-box my-4">
                    <div class="icon">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="contact-details">
                        <p>البريد:</p>
                        <small> puresoft.co@gmail.com </small>
                    </div>
                </div>
                <div class="contact-box">
                    <div class="icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="contact-details">
                        <p>الهـاتــف:</p>
                        <small> 01117818079 </small>
                    </div>
                </div>
            </div>
            <div class="col-md-8" style="margin: 0; padding: 0">
                <div>
                    <iframe style="border: 0; width: 100%; height: 350px"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d440189.5328792071!2d30.71347636625212!3d30.464984026422396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7d68d74c21285%3A0xbaac07dd3b0248da!2sPure%20Soft%20Software%20Industry!5e0!3m2!1sen!2seg!4v1640182368222!5m2!1sen!2seg"
                        frameborder="0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>

    </div>
    <!-- End Footer -->

    <!-- ////social -->
    <div class="parent-social">
    <div class="social">
      <div class="link face">
        <a target="_blank" href="https://www.facebook.com/puresoft.co/">
          visitNow
        </a>
      </div>
      <div class="icon face">
        <i class="fa-brands fa-facebook"></i>
      </div>
    </div>
    <div class="social">
      <div class="link linked">
        <a target="_blank" href="https://www.linkedin.com/company/pure-soft-co/">
          visitNow
        </a>
      </div>
      <div class="icon linked">
        <i class="fa-brands fa-linkedin"></i>
      </div>
    </div>
    <div class="social">
      <div class="link whats">
        <a target="_blank" href="https://pure-soft.com/">
          visitNow
        </a>
      </div>
      <div class="icon whats">
        <i class="fa-brands fa-whatsapp"></i>
      </div>
    </div>
    <div class="social">
      <div class="link instagram">
        <a target="_blank" href="https://www.instagram.com/puresoft_co/">
          visitNow
        </a>
      </div>
      <div class="icon instagram">
        <i class="fa-brands fa-instagram"></i>
      </div>
    </div>
    <div class="social">
      <div class="link youtube">
        <a target="_blank" href="https://pure-soft.com/">
          visitNow
        </a>
      </div>
      <div class="icon youtube">
        <i class="fa-brands fa-youtube"></i>
      </div>
    </div>
    <div class="social">
      <div class="link twitter">
        <a target="_blank" href="https://pure-soft.com/">
          visitNow
        </a>
      </div>
      <div class="icon twitter">
        <i class="fa-brands fa-twitter"></i>
      </div>
    </div>
  </div>

    <script src="{{asset('site/assets/vendor/js/all.min.js')}}"></script>
    <script src="{{asset('site/assets/vendor/js/bootstrap.bundle.min.js')}}"></script> --}}






<div class="page-content bg-white">



    <div class="page-content bg-white">
        <!-- Inner Banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(new/images/back01.jpg);">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1><span>{{ __('ms_lang.call us') }}</span></h1>
                    <!-- Breadcrumb row -->
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home_home') }}"><i
                                        class="las la-home"></i>{{ __('ms_lang.home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('ms_lang.call us') }}</li>
                        </ul>
                    </nav>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- Inner Banner -->





        <section class="indes-content">
            <div class="container">


                <div class="row gy-30">




                    <div class="col-lg-4 col-md-12">
                        <!-- Icon Boxes Style -->
                        <div class="icon-box-4 bg-orange">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-map-pin">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <h3>{{ __('ms_lang.Address') }}</h3>
                            <p>
                                {{-- {{__('ms_lang.Talaat Harb Street, Shebin El-Kom, Menoufia')}} --}}
                                {{ app()->getLocale() == 'en' ? $address->details_en : $address->details }}
                            </p>
                        </div>
                        <!-- Icon Boxes Style -->
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <!-- Icon Boxes Style -->
                        <div class="icon-box-4 bg-green">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-phone">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg>
                            <h3>{{ __('ms_lang.phone') }}</h3>
                            {{-- <p>{{$calling->details}}</p> --}}
                            <p><a class="text-dark" href="tel:{{ $calling->details }}">{{ $calling->details }}</a></p>
                        </div>
                        <!-- Icon Boxes Style -->
                    </div>


                    <div class="col-lg-4 col-md-12">
                        <!-- Icon Boxes Style -->
                        <div class="icon-box-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-mail">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <h3>{{ __('ms_lang.email') }}</h3>
                            <p><a href="mailto:{{ $email_address->url_link }}">{{ $email_address->url_link }}</a></p>
                        </div>
                        <!-- Icon Boxes Style -->

                    </div>


                    <!--



        <div class="col-md-4 col-12">
            <div class="contact-box">


                <div class="contact-box_content">
                    <div class="contact-box_icon"><i class="fal fa-map-marker-check"></i></div>
                    <div class="contact-box_info">
                        <p class="contact-box_text">Address</p>
                        <h5 class="contact-box_link"><a href="#">Talaat Harb Street, Shebin El-Kom, Menoufia, Egypt</a></h5>
                    </div>
                </div>

            </div>
        </div>



        <div class="col-md-4 col-12">
            <div class="contact-box">




                <div class="contact-box_content">
                    <div class="contact-box_icon"><i class="fal fa-headset"></i></div>
                    <div class="contact-box_info">
                        <p class="contact-box_text">Phone</p>
                        <h5 class="contact-box_link"><a href="#">+0201551451595</a></h5>
                    </div>
                </div>




            </div>
        </div>



        <div class="col-md-4 col-12">
            <div class="contact-box">






                <div class="contact-box_content">
                    <div class="contact-box_icon"><i class="fal fa-envelope-open-text"></i></div>
                    <div class="contact-box_info">
                        <p class="contact-box_text">E-Mail</p>
                        <h5 class="contact-box_link"><a href="mailto:puresoft.co@gmail.com">puresoft.co@gmail.com</a></h5>
                    </div>
                </div>


            </div>
        </div>
    -->

                </div>

                <div class="row no-gutters m-0">
                    <div class="col-xl-5">
                        <div class="appointment-img2">
                            <img src="{{ asset('new/images/contact.png') }}" alt="">
                            <div class="as-experience style2">
                                <img src="{{ asset('new/images/wlogo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 appointment-form-wrap">

                        {{-- <form  class="appointment-form ajax-contact"> --}}
                        <div class="appointment-form ajax-contact">
                            <div class="row">
                                <div class="form-group col-md-6"><input type="text" class="form-control"
                                        wire:model="name" placeholder="{{ __('ms_lang.name') }}"> <i
                                        class="fal fa-user"></i>

                                        @error('name')
                                        <h6 class="text-danger">{{ $message }}</h6>
                                    @enderror
                                    </div>


                                <div class="form-group col-md-6"><input type="text" class="form-control"
                                        wire:model="mobile" placeholder="{{ __('ms_lang.phone') }}"> <i
                                        class="fal fa-phone"></i>
                                        @error('mobile')
                                        <h6 class="text-danger">{{ $message }}</h6>
                                    @enderror
                                    </div>


                                {{-- <div class="form-group col-md-6"><input type="text" class="form-control" name="companyname" placeholder="{{__('ms_lang.company name')}}"> <i class="fal fa-file-alt"></i></div> --}}


                                <div class="form-group col-md-6"><input type="text" class="form-control"
                                        wire:model="email" placeholder="{{ __('ms_lang.email') }}"> <i
                                        class="fal fa-envelope"></i>
                                        @error('email')
                                        <h6 class="text-danger">{{ $message }}</h6>
                                    @enderror
                                    </div>






                                <div class="form-group col-md-6 col-12"><i class="fal fa-cogs"></i>
                                    <select wire:model="subject" class="form-select">
                                        <option value=""> --- {{ __('ms_lang.choose your service') }} ---
                                        </option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->name_en }}">
                                                {{ app()->getLocale() == 'en' ? $cat->name_en : $cat->name }}</option>
                                        @endforeach
                                        <option value="other">{{ __('ms_lang.other') }}</option>
                                    </select>
                                    @error('subject')
                                    <h6 class="text-danger">{{ $message }}</h6>
                                @enderror
                                </div>






                                @if ($this->subject == 'other')
                                    <div class="form-group col-6">
                                        <input class="form-control" placeholder="{{ __('ms_lang.subject') }}"
                                            type="text" wire:model="subject_details">
                                    </div>
                                @endif








                                <div class="form-group col-md-12">
                                    <textarea wire:model="message" cols="30" rows="3" class="form-control"
                                        placeholder="{{ __('ms_lang.message') }}"></textarea>
                                        @error('message')
                                        <h6 class="text-danger">{{ $message }}</h6>
                                    @enderror
                                </div>



                                <div class="form-btn form-group mt-10"><button wire:click="contact"
                                        class="theme-btn btn-style-one hvr-dark">{{ __('ms_lang.btn_send') }}</button>
                                </div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                            {{-- </form> --}}
                        </div>
                    </div>


                </div>
            </div>
        </section>



        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3435.610660656386!2d31.01028453530102!3d30.56030233081423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7d692dcc94bc3%3A0x6a2c2d966a89b1e2!2z2LfZhNi52Kog2K3Ysdio2Iwg2YXYsdmD2LIg2LTYqNmK2YYg2KfZhNmD2YjZhdiMINin2YTZhdmG2YjZgdmK2Kk!5e0!3m2!1sar!2seg!4v1691264554024!5m2!1sar!2seg"
            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>
