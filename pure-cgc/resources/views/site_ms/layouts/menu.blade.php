<?php
use App\Models\RelatedLink;
use App\Models\Category;
use App\Models\ArtMin;
$about_menus=ArtMin::where(['type'=>5 , 'is_active'=>1])->orderBy('ord','ASC')->get();
$cats_tools =  Category::select('id','name','name_en')->where(['type'=>4,'is_active'=>1])->orderBy('ord','ASC')->get();
?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{url('uploads/logo.png')}}" alt="{{ config('app.name', 'Home') }}" title="{{ config('app.name', 'Home') }}" style="width:50px;height:50px"/></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item @if(\Request::route()->getName() == 'home' || \Request::route()->getName() == 'index')  active @endif"><a href="{{ url('/') }}" title="{{ config('app.name', 'Home') }}" class="nav-link">Home</a></li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="shop.html">Shop</a>
              <a class="dropdown-item" href="wishlist.html">Wishlist</a>
            <a class="dropdown-item" href="product-single.html">Single Product</a>
            <a class="dropdown-item" href="cart.html">Cart</a>
            <a class="dropdown-item" href="checkout.html">Checkout</a>
          </div>
        </li>
          <li class="nav-item @if(\Request::route()->getName() == 'about') active @endif "><a href="{{ url('/about') }}" class="nav-link">About</a></li>
          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
          <li class="nav-item  @if(\Request::route()->getName() == 'contact-us')  active @endif "><a href="{{ url('contact-us') }}" class="nav-link">Contact</a></li>
          <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

        </ul>
      </div>
    </div>
  </nav>
<!-- END nav -->
