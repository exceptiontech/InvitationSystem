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
   <link href="{{asset('site/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/bootstrap/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">


  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/all.min.css')}}" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/animate.css')}}" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/main.css')}}" />
  <link rel="stylesheet" href="{{asset('site/assets/vendor/css/media.css')}}" />


  <!-- Template Main CSS File -->
  <link href="{{asset('site/assets/css/style_ar.css')}}" rel="stylesheet">
@else
 <!-- Favicons -->
 <link href="{{asset('site/assets/img/favicon.png')}}" rel="icon">
 <link href="{{asset('site/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 <!-- Vendor CSS Files -->
  <link href="{{asset('site/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
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
<livewire:site.home />
<livewire:site.about />
<livewire:site.service />
<livewire:site.gallary />
<livewire:site.counts />
<livewire:site.request-offer />
@yield('content')
<livewire:site.layout.footer />


