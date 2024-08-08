<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{__('ms_lang.Pure Soft')}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords"> -->


  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="shortcut icon" type="image" href="{{url('site/assets/vendor/images/logo.jpeg')}}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
@if(app()->getLocale() =='ar')
  <!-- Favicons -->
  <link href="{{asset('site/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('site/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 
  <!-- Vendor CSS Files -->
  <!-- <link href="{{asset('site/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/bootstrap/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet"> -->


  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/all.min.css')}}" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/animate.css')}}" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/main.css')}}" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/media.css')}}" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/contact.scss')}}" />
  
    <link rel="stylesheet" href="{{asset('site/assets/vendor/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/assets/vendor/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/assets/vendor/css/res/res.css')}}">

  <!-- Template Main CSS File -->
  <link href="{{asset('site/assets/css/style_ar.css')}}" rel="stylesheet">
@else
 <!-- Favicons -->
 <link href="{{asset('site/assets/img/favicon.png')}}" rel="icon">
 <link href="{{asset('site/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 <!-- Vendor CSS Files -->
 <!-- <link href="{{asset('site/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
 <link href="{{asset('site/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
 <link href="{{asset('site/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{asset('site/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
 <link href="{{asset('site/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
 <link href="{{asset('site/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
 <link href="{{asset('site/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
 <link href="{{asset('site/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet"> -->



 <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/all.min.css')}}" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/animate.css')}}" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/main.css')}}" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/media.css')}}" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/contact.scss')}}" />


 <!-- Template Main CSS File -->
 <link href="{{asset('site/assets/css/style.css')}}" rel="stylesheet">
@endif
  @livewireStyles
  <!-- =======================================================
  * Template Name: Medilab - v4.7.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<livewire:site.layout.header />          
<livewire:site.layout.navbar />
<!-- Swiper -->
<div id="myswip" class="">
        <span class="before-triangle"></span>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="box">

@if (is_null($hosts)==0)
@foreach ($hosts as $host)
                        <div class="box-price wow bounceInDown hvr-sink" data-wow-duration="1s" data-wow-offset="350">
                            <div class="card-one">
                                <h5>{{$host->name}} </h5>
                            </div>
                            <div class="span-price">
                                <span class="d-block">
                                    <span class="usd">EGP </span>{{$host->price}}
                                </span>
                                <span class="">لمـدة سنـه</sapn>
                            </div>
                            <hr>
                            <ul class="list-unstyled host-list">
                                <li>{{$host->host}}</li>

                                <li> {{$host->time}}</li>
                                <li> {{$host->feature}} </li>
                                <li> {{$host->discount}}</li>
                                <li> {{$host->color}}</li>
                                <!-- <li> {{$host->name}}</li> -->
                            </ul>
                            <div class="btn">
                                <button type="button" class="">اطلـب الان</button>
                            </div>
                        </div>


@endforeach
@endif

                    </div>
                </div>
               
            </div>
        </div>
    </div>



  

<livewire:site.layout.footer />
  
<div class="top" id="top">
    <i class="fa-solid fa-angles-up"></i>
  </div>
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <script src="{{asset('site/assets/vendor/js/jquery-3.5.1.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/js/all.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{asset('site/assets/vendor/js/typed.js')}}"></script>
  <script src="{{asset('site/assets/vendor/js/app.js')}}"></script>
  <script src="{{asset('site/assets/vendor/js/wow.min.js')}}"></script>
  <script>
    new WOW().init();
  </script>
  <script src="{{asset('site/assets/vendor/js/all.min.js')}}"></script>
    <script src="{{asset('site/assets/vendor/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('site/assets/vendor/js/res.js')}}"></script>
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