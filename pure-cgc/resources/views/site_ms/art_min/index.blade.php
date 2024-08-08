@extends('site_ms.layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')
<div class="nk-gap"></div><div class="nk-gap"></div><div class="nk-gap"></div><div class="nk-gap"></div>
<div class="nk-main nk-main-dark">
@if (count($results))
 <?php $i=1; ?>
    @foreach ($results as $result)
        <div class="nk-box" style="background-color: @if($i == 1) #e96021 @elseif($i == 2) #e5b313  @else #4b9ab4 @endif  !important">
          <div class="container-fluid" >
              <div class="row">
                  <div class="col-lg-4">
                      <div class="bg-image bg-image-parallax">
                          <img src="{{ img_chk_exist($result->img) }}" alt="" class="" style="height: 220px  !important; width:220px  !important;margin: 20%;">
                      </div>
                      <div class="nk-gap-6"></div>
                      <div class="nk-gap-6"></div>
                      <div class="nk-gap-6"></div>
                  </div>
                  <div class="col-lg-8">

                      <div class="nk-gap"></div>
                      <div class="nk-gap"></div>
                      <div class="nk-gap"></div>
                      <div class="nk-gap"></div>
                      <div class="nk-gap"></div>
                      <div class="nk-box-6 mw-800">
                          <h2 class=" fw-600">{{ $result->name}}.</h2>
                          <div class="nk-gap"></div>

                          <p style="font-size: 20px;letter-spacing:1.5px;font-weight: 200;color:white">{!! cut_arabic_text($result->details,6000) !!}</p>
                      </div>

                     
                  </div>
              </div>
          </div>
        </div>
        <?php $i++; ?>
    @endforeach
@endif

<link rel="stylesheet" href="{{ url('js/jbox/jBox.all.css')}}">
<style>
    /*  change toolip css in line 1047 */
    .target {
      cursor: default;
      font-size: 14px;
      line-height: 50px;
      height: 52px;
      border-radius: 4px;
      overflow: hidden;
      border: 2px solid #e2e2e2;
      background: #fafafa;
      text-align: center;
      font-weight: 500;
      position: relative;
      text-transform: uppercase;
      width: calc(25% - 10px);
      margin: 5px;
      transition: border-color .2s, background-color .2s;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    </style>
    <p id="mso" value="mohamed"></p>
    
    
    
  <div class="container">
    <div class="nk-gap-4"></div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1><center>ACHEIVMENTS</center></h1>
        </div>
    </div>
    <style>
        .area:hover {border: 1px solid red;}
        area[shape="poly"]:hover {border:1px solid red; }
      </style>

        <map name="workmap">
            <area id="Tooltip-1" class="target"   shape=poly coords="30,100, 140,50, 290,220, 180,280" >
            <area id="Tooltip-2"  class="target" shape=poly coords="190,75, 200,60, 495,60, 495,165, 275,165" >
            <area id="Tooltip-3" class="target"  shape=rect coords="1440,260, 573,213" >
            <a shape="rect" coords="10,10,50,50" class="target" href="#"></a>
        </map>
        <img src="{{ url('images/achivments-artwork.png') }}" alt="image map example" class="nk-img-stretch"  usemap="#workmap">
<script>
    
</script>
<script src="{{ url('js/jbox/jBox.all.min.js') }}"></script>
<script>
    $(document).ready(function () {
        // Tooltip
        new jBox('Tooltip', {
          attach: '#Tooltip-1',
          theme: 'TooltipDark',
          animation: 'zoomOut',
          content: document.getElementById('mso').getAttribute('value'),
        });
        new jBox('Tooltip', {
          attach: '#Tooltip-2',
          theme: 'TooltipDark',
          animation: 'zoomOut',
          content: document.getElementById('mso').getAttribute('value'),
        });
        new jBox('Tooltip', {
          attach: '#Tooltip-3',
          theme: 'TooltipDark',
          animation: 'zoomOut',
          content: document.getElementById('mso').getAttribute('value'),
        });
    });
    </script>


    <div class="nk-gap-5"></div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1><center>PARTNERS</center></h1>
            <div class="nk-gap-2"></div>
            <!-- START: Partners -->
            <div class="nk-gap-1"></div>
            <div class="nk-carousel-2 nk-carousel-x4 nk-carousel-no-margin nk-carousel-all-visible" data-autoplay="0" data-loop="true" data-dots="false" data-arrows="false" data-cell-align="center" data-parallax="false">
                <div class="col-md-12">
@if (count($partners))
    @foreach ($partners as $partner)
                        <div class="col-md-4" style="float: left;">
                            <img src="{{ img_chk_exist($partner->img) }}" alt="{{ $partner->name }}" title="{{ $partner->name }}" style="max-width: 100%;height: auto;">
                        </div>
    @endforeach
@endif
                </div>
            </div>
            <div class="nk-gap-3"></div>
                <!-- END: Partners -->
        </div>
    </div>
  </div>

  <div class="nk-gap-5"></div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1><center>CLIENTS</center></h1>
            <div class="nk-gap-2"></div>
            <!-- START: Partners -->
            <div class="nk-gap-1"></div>
            <div class="nk-carousel-2 nk-carousel-x4 nk-carousel-no-margin nk-carousel-all-visible" data-autoplay="0" data-loop="true" data-dots="false" data-arrows="false" data-cell-align="center" data-parallax="false">
                <div class="col-md-12">
@if (count($clients))
    @foreach ($clients as $client)
                        <div class="col-md-2" style="float: left;height: 200px;padding:5%">
                            <img src="{{ img_chk_exist($client->img) }}" alt="{{ $client->name }}" title="{{ $client->name }}" style="width:130px;height: auto;max-height: 100px;">
                        </div>
    @endforeach
@endif
                </div>
            </div>
            <div class="nk-gap-3"></div>
                <!-- END: Partners -->
        </div>
    </div>
  </div>
</div>

@endsection