@extends('site_ms.layouts.app')

@section('content')

            <section id="page-title">
              <div class="container clearfix">
                  <h1> {{$result->name}}</h1>
                  <span> </span>
              </div>
          </section><!-- #page-title end -->
          
          <section id="content">

            <div class="content-wrap">
                      
                      
      
              <div class="container clearfix">
      
                <div class="">
      
      
                  <p>
                        {!!$result->details !!}
                  </p>
          
                </div>
              </div>
          </div>
      </section>
 
@endsection