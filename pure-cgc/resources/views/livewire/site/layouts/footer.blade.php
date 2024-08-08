<!-- ======= Footer ======= -->
{{-- <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500"> --}}
{{--  <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>  --}}

{{-- <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>{{ app()->getLocale()=='ar' ? " صفحات تهمك":"Useful Links"  }}</h4>
            <ul>
              <li><i class="bx bx bx-radio-circle-marked"></i> <a href="{{route('home_home')}}">{{ app()->getLocale()=='ar' ? "  الرئيسيه":"Home "  }}</a></li>
              <li><i class="bx bx bx-radio-circle-marked"></i> <a href="{{route('services')}}">{{ app()->getLocale()=='ar' ? "  خدماتنا":"services "  }}</a></li>
              <li><i class="bx bx bx-radio-circle-marked"></i> <a href="{{route('blogs',trim(__('ms_lang.show')) )}}">{{ app()->getLocale()=='ar' ? "  المدونه":"blog "  }}</a></li>
              <li><i class="bx bx bx-radio-circle-marked"></i> <a href="{{route('contact-us')}}">{{ app()->getLocale()=='ar' ? "  تواصل معنا":"contact-us "  }}</a></li>
              <li><i class="bx bx bx-radio-circle-marked"></i> <a href="/team">{{ app()->getLocale()=='ar' ? "  فريق العمل":"team "  }} </a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>{{ app()->getLocale()=='ar' ? " خدماتنا " :"Our Services"  }}</h4>
            @foreach ($categories as $category)
                <ul>
                  <li><i class="bx bx bx-radio-circle-marked"></i> <a href="{{ route('service',[$category->id,title_2url(app()->getLocale()=='ar' ? $category->name :$category->name_en)]) }}">{{ app()->getLocale()=='ar' ? $category->name :$category->name_en }}</a></li>

                </ul>
            @endforeach
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>{{ __('ms_lang.contact_footer') }}</h4>
            <p>
                <strong>{{ __('ms_lang.address') }}:</strong>{{ app()->getLocale()=='ar' ? $settings->address:$settings->address_en }}<br>
                <strong>{{ __('ms_lang.phone_number') }}:</strong>
                <a href="tel:{{ $settings->tel }}" class="">{{ $settings->tel }}</a>
                -
                <a href="tel:{{ $settings->mobile }}" class="">{{ $settings->mobile }}</a>
                <br>
              <strong>{{ __('ms_lang.email') }}:</strong>
              <a href="mailto:{{ $settings->email }}" class="">{{ $settings->email }}</a>
              -  <a href="mailto:{{ $settings->email2 }}" class="">{{ $settings->email2 }}</a>
              <br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>{{ app()->getLocale()=='ar' ? " عن بيور" :"About Pure"  }}</h3>
            <p>{{ app()->getLocale()=='ar' ? " يمكنك التواصل معني عن طريق الكثير من الطرق واليك الروابط .. ":" you can connect with us by many ways anh there are our links......"  }}</p>
            <div class="social-links mt-3">
@foreach ($socials as $socials)
                  <a href="{{ $socials->url_link }}" class="{!! $socials->name !!}">
                    <i>{!!$socials->img!!}</i>
                  </a>

@endforeach
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; {{ __('ms_lang.author_company') }} <strong><span>@ {{ app()->getLocale()=='ar' ? $settings->name:$settings->name_en }}</span></strong>.
      </div>
    </div>
  </footer><!-- End Footer -->
  {{--  <a href="#" class="go-to-wats"><i class="bi bi-whatsapp"></i></a>  --}}
{{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}

<!-- Vendor JS Files -->
{{-- <script src="{{asset('site/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('site/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('site/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('site/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('site/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('site/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('site/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('site/vendor/php-email-form/validate.js')}}"></script>  --}}
{{-- FontAwesome CDN --}}
{{-- <script src="https://kit.fontawesome.com/c4d4f69c8f.js" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('site/js/main.js')}}"></script>
 --}}


<div>

    <footer class="footer">
        <div class="footer-section-obj1">
            <img loading="lazy" src="{{asset('new/images/footer-obj1.png')}}" alt=""/>
        </div>

        <div class="footer-top bt0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="widget footer_widget">
                            <h5 class="footer-title">{{ __('ms_lang.puresoft company') }} </h5>
                            <div class="mb-10 text">
                                {{ __('ms_lang.We provide innovative and reliable PureSoft solutions to businesses of all sizes. We have a team of developers, designers and engineers ready to deliver exceptional results that empower our clients.To achieve their business goals.') }}
                            </div>
                            <div class="ft-content">
                                <i class="fal fa-phone"></i>
                                <span>{{ __('ms_lang.technical support') }}</span>
                                <h4><a target="_blank" class="text-white"
                                       href="tel:{{ $setting_footer->mobile }}">{{ $setting_footer->mobile }}</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="widget widget-link-2">
                            <h5 class="footer-title">{{ __('ms_lang.Website links') }}</h5>
                            <ul>
                                <li><a href="{{route('home_home')}}">- {{ __('ms_lang.home') }}</a></li>
                                <li><a href="{{route('about')}}">- {{ __('ms_lang.about_us') }}</a></li>
                                <li><a href="{{route('services')}}">- {{ __('ms_lang.our_services') }}</a></li>
                                <li><a href="{{route('portfolio')}}">- {{ __('ms_lang.our_works2') }}</a></li>
                                <li><a href="{{route('blogs' )}}">- {{ __('ms_lang.blog') }}</a></li>

                                <li><a href="{{route('jobs')}}">- {{ __('ms_lang.employment') }}</a></li>
                                <li><a href="{{route('contact-us')}}">- {{ __('ms_lang.call us') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="widget widget_info">
                            <h5 class="footer-title">{{ __('ms_lang.email_list') }}</h5>
                            <p class="mb-20">
                                {{ __('ms_lang.Subscribe now to the newsletter to receive all our news') }}</p>
                            {{-- <form  class="subscribe-form subscription-form">  --}}
                            <div class="subscribe-form subscription-form">
                                <div class="ajax-message"></div>
                                <div class="input-group">
                                    <input wire:model="email" class="form-control"
                                           placeholder="{{ __('ms_lang.email') }}" type="email"/>
                                    <div class="input-group-append">
                                        <button wire:click="subscribe"
                                                class="theme-btn btn-style-one">{{ __('ms_lang.btn_send') }}</button>
                                    </div>
                                </div>
                                {{-- </form> --}}
                            </div>


                            <ul class="list-inline ft-social-bx">
                                @if (! is_null($socials))
                                    @foreach ($socials as $social)
                                        <li><a href="{{ $social->url_link }}" target="_blank" class="btn button-sm">
                                                {{-- <i class="fab fa-{!! $socials->name !!}-f"></i> --}}
                                                {!!$social->img!!}
                                            </a></li>

                                    @endforeach
                                @endif

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="mb-0">{{ __('ms_lang.@ All rights reserved to PureSoft Company 2023') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END ==== -->
    <button class="back-to-top fal fa-chevron-up"></button>
</div>


<div class="all-ioc">
    <div class="show-icons">
        <div class="ico-img"></div>
        <div class="sonar-wave"></div>
        <div class="sonar-wave2"></div>
    </div>


    <div class="whats-icon" data-target="html">
        <a href="https://api.whatsapp.com/send?phone={{ $setting_footer->whatsapp }}" target="_blank"><span
                class=" fab fa-whatsapp"></span>
        </a>
    </div>


    <div class="messenger-icon" data-target="html">
        <a href="https://m.me/{{ $setting_footer->messenger }}" target="_blank"><span
                class=" fab fa-facebook-messenger"></span>
        </a>
    </div>


    <div class="phone-icon" data-target="html">
        <a href="tel:{{ $setting_footer->mobile }}" target="_blank"><span class=" fal fa-phone"></span>
        </a>
    </div>
</div>
</div>
@livewireScripts
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    window.addEventListener('swal:modal', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type
        });
    });
</script>
<!-- External JavaScripts -->
<script src="{{asset('new/js/jquery.min.js')}}"></script>
<script src="{{asset('new/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
{{-- xxxxxxxxxxxxxxxxxxxxxxxxxxxx --}}
{{-- <script src="{{asset('new/vendor/magnific-popup/magnific-popup.js')}}"></script>  --}}
{{-- xxxxxxxxxxxxxxxxxxxxxxxxxxxx --}}

<script src="{{asset('new/vendor/imagesloaded/imagesloaded.js')}}"></script>
<script src="{{asset('new/vendor/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{asset('new/vendor/progress-bar/jquery.appear.js')}}"></script>
<script src="{{asset('new/vendor/progress-bar/jquery.skillbar.js')}}"></script>
<!-- IMAGE POPUP -->
<script src="{{asset('new/js/nice-select.min.js')}}"></script>
<script src="{{asset('new/js/wow.min.js')}}"></script>
<script src="{{asset('new/js/searchfunctions.js')}}"></script>
<script src="{{asset('new/js/functions.js')}}"></script>
<script src="{{asset('new/js/contact.js')}}"></script>
<script src="{{asset('new/js/gsap.min.js')}}"></script>
<script src="{{asset('new/js/MotionPathPlugin.min.js')}}"></script>
<script src="{{asset('new/vendor/masonry/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('new/vendor/masonry/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('new/js/typed.min.js')}}"></script>
<script src="{{asset('new/js/snap.svg.js')}}"></script>
<script src="{{asset('new/js/custom.js')}}"></script>


<script>
    $(".expand-btn").each(function () {
        $(this).on("click", function () {
            $(this).siblings(".feature-list").toggleClass("expand-list");
            $(this).toggleClass("active");
        });
    }); //Feedback Slider

</script>
