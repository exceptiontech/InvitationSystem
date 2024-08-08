@extends('site_ms.layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')

<section id="page-title">
    <div class="container clearfix">
      <h1> {!! $title !!}</h1>
      <span>عرض لوائح وأنظمة العمل عن بعد والادوات المستخدمة</span>
              <img src="{{ url('site/images/custom-images/inner_3.jpg') }}" class="innerPageImg" />
    </div>
</section><!-- #page-title end -->

<section id="content">

  <div class="content-wrap">

    <div class="container clearfix">

      <div class="row">

@if (count($results))
    @foreach ($results as $result)
                                
              <div class="col-lg-6 bottommargin">
                <div class="team team-list clearfix">
                  <div class="team-image">
                    <a href="{{ img_chk_exist($result->file) }}" data-lightbox="iframe">
                      <img src="{{ img_chk_exist($result->img) }}" alt="{{ $result->name}}" title="{{ $result->name}}">
                    </a>
                  </div>
                  <div class="team-desc">
                    <div class="team-title">
                      <h4>{{ $result->name}}</h4>
                    </div>
                    <div class="team-content">
                      <p>{!! cut_arabic_text($result->details,6000) !!}</p>
                    </div>
                    <a href="{{ img_chk_exist($result->file) }}" data-lightbox="iframe"
                      class="social-icon si-rounded si-small si-youtube">
                      <i class="icon-eye"></i>
                      <i class="icon-eye"></i>
                    </a>
                    <a href="{{ img_chk_exist($result->file) }}"
                      class="social-icon si-rounded si-small si-youtube" target="_blank">
                      <i class="icon-external-link-alt"></i>
                      <i class="icon-external-link-alt"></i>
                    </a>
                  </div>
                </div>
              </div>       
    @endforeach
    
    {{-- $results->links() --}}
@endif

     </div>
    </div>
  </div>
</section>

@section('footer')

<script>
  jQuery(document).ready(function($){
    var $faqItems = $('#faqs .faq');
    if( window.location.hash != '' ) {
      var getFaqFilterHash = window.location.hash;
      var hashFaqFilter = getFaqFilterHash.split('#');
      if( $faqItems.hasClass( hashFaqFilter[1] ) ) {
        $('#portfolio-filter li').removeClass('activeFilter');
        $( '[data-filter=".'+ hashFaqFilter[1] +'"]' ).parent('li').addClass('activeFilter');
        var hashFaqSelector = '.' + hashFaqFilter[1];
        $faqItems.css('display', 'none');
        if( hashFaqSelector != 'all' ) {
          $( hashFaqSelector ).fadeIn(500);
        } else {
          $faqItems.fadeIn(500);
        }
      }
    }

    $('#portfolio-filter a').on( 'click', function(){
      $('#portfolio-filter li').removeClass('activeFilter');
      $(this).parent('li').addClass('activeFilter');
      var faqSelector = $(this).attr('data-filter');
      $faqItems.css('display', 'none');
      if( faqSelector != 'all' ) {
        $( faqSelector ).fadeIn(500);
      } else {
        $faqItems.fadeIn(500);
      }
      return false;
     });
  });
</script>
@endsection

@endsection