<div>
  @if(count($home_sliders))
        <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-cntent-center align-items-center">
      <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
      <?php  $sl_l=0; ?>
      @foreach ($home_sliders as $home_slider)
          <!-- Slide 1 -->
        <div class="carousel-item @if($sl_l==0) active @endif">
          <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown">{{ app()->getLocale()=='ar' ? $home_slider->name :$home_slider->name_en }}</h2>
            <p class="animate__animated animate__fadeInUp"> {!! app()->getLocale()=='ar' ?  $home_slider->details : $home_slider->details_en!!}</p>
            <a href="" class="btn-get-started animate__animated animate__fadeInUp">{{__('ms_lang.btn_read_more')}}</a>
          </div>
        </div>
        <?php  $sl_l++; ?>
      @endforeach


        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </section><!-- End Hero -->
  @endif
  </div>
