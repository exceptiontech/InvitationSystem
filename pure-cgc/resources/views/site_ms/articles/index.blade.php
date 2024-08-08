@extends('site_ms.layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')
<section id="page-title">

  <div class="container clearfix">
    <h1> {!! $title !!} </h1>
    <span>من نحن </span>
  </div>
</section><!-- #page-title end -->


<section id="content">

<div class="content-wrap">

  <div class="container clearfix">

    <div class="col_two_third">

      <div class="heading-block fancy-title nobottomborder title-bottom-border">
        <h4><span>{{ $about1->name }} </span> .</h4>
      </div>

      <p>{!! $about1->details !!}</p>

    </div>


    <div class="col_one_third col_last">

      <div class="heading-block fancy-title nobottomborder title-bottom-border">
        <h4> <span>{{ $about2->name }}</span> .</h4>
      </div>

      <p>{!! $about2->details !!}</p>

    </div>

  </div>


@if (count($results))
  <?php $i=1; ?>
    @foreach ($results as $result)
        @if ($i==1)
        <div class="row align-items-stretch clearfix">
          <div class="col-md-5 col-padding" style="background: url('{{ img_chk_exist($result->img) }}') center center no-repeat; background-size: cover;"></div>

          <div class="col-md-7 col-padding">
            <div>
              <div class="heading-block">
                <span class="before-heading color">{{ $result->brief}}</span>
                <h3>{{ $result->name}}</h3>
              </div>

              <div class="row clearfix">

                <div class="col-lg-12">
                  <p>{!! $result->details !!}</p>
                </div>
              </div>

            </div>
          </div>

        </div>
        @elseif ($i==2)
            <div class="row align-items-stretch bottommargin-lg clearfix">

                <div class="col-md-7 col-padding" style="background-color: #F5F5F5;">
                  <div>
                    <div class="heading-block">
                      <span class="before-heading color">{{ $result->brief}}</span>
                      <h3>{{ $result->name}}</h3>
                    </div>
                    <div class="row clearfix">
                      <div class="col-lg-12">
                        <p>{!! $result->details !!}</p>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-5 col-padding" style="background: url('{{ img_chk_exist($result->img) }} ') center center no-repeat; background-size: cover;"></div>

              </div>

        @else
        <div class="container clear-bottommargin clearfix">

          <div class="heading-block center">
            <h2>{{ $result->name}}</h2>
            <span>{{ $result->brief}}</span>
          </div>
          <div class="row">

            {!! $result->details !!}

          </div>
        </div>
        @endif


      <?php  $i++;  ?>
    @endforeach

    {{-- $results->links() --}}
@endif

<div class="container clear-bottommargin clearfix">

  <div class="heading-block center">
    <h2>قطاعات الشركة</h2>
    <span>أياً كانت مشكلتك.. بالتأكيد لدينا الحل!</span>
  </div>

  <div class="row">

@if (count($departments))
    <div class="col-lg-6 col-md-12 topmargin bottommargin">
    <?php $idp=2; ?>
    @foreach ($departments as $department)


								<div class="col_full">

									<div class="feature-box fbox-large fbox-dark fbox-effect">
										<div class="fbox-icon">
											<img src="{{ img_chk_exist($department->img) }}" alt="{{ $department->name}}" title="{{ $department->name}}">
										</div>
										<h3>{{ $department->name }}</h3>
                     <p>{!! $department->details !!} </p>
									</div>

								</div>
                <?php if($idp == 3){ ?>
              </div>
              <div class="col-lg-6 col-md-12 topmargin bottommargin">
            <?php $idp=1; } $idp++; ?>
    @endforeach

@endif


						</div>

					</div>


            </div>


        </div>
      </div><!-- .postcontent end -->
    </div>
  </div>

</section><!-- #content end -->


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
