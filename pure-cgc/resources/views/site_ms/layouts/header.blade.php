<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '') }}   | @yield('title') </title>
    <meta name="description" content="">
    <link rel="canonical" href="{{ config('app.url', '') }}">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" href="{{url('uploads/logo.png')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('site/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('site/css/animate.css')}}">
    <link rel="stylesheet" href="{{url('site/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('site/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('site/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('site/css/aos.css')}}">
    <link rel="stylesheet" href="{{url('site/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{url('site/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{url('site/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{url('site/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('site/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{url('site/css/style.css')}}">
    <!--  from me -->
    <script src="{{url('site/js/jquery.min.js')}}"></script>
  </head>
  <body class="goto-here">
<?php
use App\Models\SettingMs;
$contact_details=SettingMs::where('id',1)->first();
?>
    <div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md-4 pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">{!! $contact_details->mobile !!}</span>
					    </div>
					    <div class="col-md-3 pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">{!! $contact_details->email !!}</span>
					    </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
@guest
                    <span class="text">
                        <a href="javascript:;" class="me-login-menu me-btn text-white p-3" data-toggle="modal" data-target="#meLogin">Login</a>
                        <a href="javascript:;" class="me-login-menu me-btn text-white p-3" data-toggle="modal" data-target="#meSignup" data-dismiss="modal" aria-label="Close">Sign up</a>
                    </span>

@else

                    <ul class="navbar-nav ml-auto text-white">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> user profile</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a href="{{ url('user/profile') }}" class="dropdown-item"><i class="fa fa-user"></i> Profile</a>
                                <a  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" class="dropdown-item">
                                        <i class="fa fa-power-off"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        </ul>
                    <div id="noti" class="wrapper-dropdown-4 d-none" tabindex="1"> <i class="fa fa-bell" aria-hidden="true"></i>
                        <ul class="dropdown">
                            <div class="card" style="">
                                <header class="card-header">
                                <p class="card-header-title">Notifications</p>
                                </header>
                                <div class="card-content card-noti">
                                <div class="content">
                                    <ul>

                                    </ul>
                                </div>
                                </div>
                                <footer class="card-footer"><a href="{{ url('my-notifications') }}" class="card-footer-item is-blue-light">View all
                                </a></footer>
                            </div>
                        </ul>
                    </div>
@endguest

                        </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>

