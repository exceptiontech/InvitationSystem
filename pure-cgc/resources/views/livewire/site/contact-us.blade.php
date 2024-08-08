<div>
    <div>
        {{--  <!-- ======= Contact Section ======= -->
        <section class="breadcrumbs">
          <div class="container">

            <div class="d-flex justify-content-between align-items-center">
              <h2>Contact</h2>
              <ol>
                <li><a href="index.html">Home</a></li>
                <li>Contact</li>
              </ol>
            </div>

          </div>
        </section><!-- End Contact Section -->
        <!-- ======= Contact Section ======= -->  --}}
        <section class="contact" data-aos="" data-aos-easing="ease-in-out" data-aos-duration="500">
          <div class="container">

            <div class="row">

              <div class="col-lg-6">

                <div class="row">
                  <div class="col-md-12">
                    <div class="info-box">
                        <i class="bx bx-map"></i>
                        <h3>{{ __('ms_lang.address') }}</h3>
                        <p>{!! app()->getLocale()=='ar' ? $contact_det->address:$contact_det->address_en !!}</p>
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="info-box">
                        <i class="bx bx-envelope"></i>
                        <h3> {{ __('ms_lang.email') }}</h3>
                        <p><a href="mailto:{{ $contact_det->email }}" class="contact-a">{{ $contact_det->email }}</a></p>
                          <p><a href="mailto:{{ $contact_det->email2 }}" class="contact-a">{{ $contact_det->email2 }}</a></p>
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="info-box">
                        <i class="bx bx-phone-call"></i>
                        <h3>{{ __('ms_lang.phone_number') }}</h3>

                        <p><a href="tel:{{ $contact_det->tel }}" class="contact-a">{{ $contact_det->tel }}</a></p>
                        <p><a href="tel:{{ $contact_det->mobile }}" class="contact-a">{{ $contact_det->mobile }}</a></p>
                    </div>
                    </div>
                </div>

              </div>

              <div class="col-lg-6">

                <form action="contact-us" method="post"  class="php-email-form">
                            @include('includes.messages_site')

                    @csrf
                    @method('GET')   <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text" name="name" class="form-control"
                       wire:model="name"id="name" placeholder=" {{ app()->getLocale()=='ar' ? "الاسم" :"name"}}" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <input type="email" class="form-control" wire:model="email" name="email" id="email" placeholder="  {{ app()->getLocale()=='ar' ? "الايميل" :"email"}}" required>

                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" wire:model="subject" name="subject" id="subject" placeholder="{{ app()->getLocale()=='ar' ? "الموضوع" :"subject"}}" required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" wire:model="message" name="message" rows="5" placeholder="{{ app()->getLocale()=='ar' ? "الرساله" :"message"}}" required></textarea>
                  </div>

                  <div class="text-center">
                    <br><button type="submit" id="store_message"  wire:click="store_message" value="store_message"> {{ app()->getLocale()=='ar' ? "ارسال" :"Send Message"}}</button></div>
                  <div class="my-3">
                    <div class="loading">{{__('ms_lang.Loading')}}</div>
                    <div class="sent-message">{{__('ms_lang.Your message has been sent. Thank you!')}}</div>
                    {{--  <div class="error-message"></div>  --}}
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                          @if(Session::has('alert-' . $msg))

                          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                          @endif
                        @endforeach
                      </div>
                  </div>

                 </form>
              </div>

            </div>

          </div>
        </section><!-- End Contact Section -->
        <!-- ======= Map Section ======= -->
        <section class="map mt-2">
          <div class="container-fluid p-0">
            <iframe src="https://www.google.com/maps/place/%D8%A8%D9%8A%D9%88%D8%B1+%D8%B3%D9%88%D9%81%D8%AA+%D9%84%D8%B5%D9%86%D8%A7%D8%B9%D8%A9+%D8%A7%D9%84%D8%A8%D8%B1%D9%85%D8%AC%D9%8A%D8%A7%D8%AA%E2%80%AD/@30.5619799,31.005535,16.33z/data=!4m17!1m10!3m9!1s0x14f7d68d74c21285:0xbaac07dd3b0248da!2z2KjZitmI2LEg2LPZiNmB2Kog2YTYtdmG2KfYudipINin2YTYqNix2YXYrNmK2KfYqg!8m2!3d30.5605991!4d31.0072907!10e4!16s%2Fg%2F11dfjx4z78!18m1!1sAIe9_BGhYIk2KhOdF8fekWDvq8JUi42k0AnQSwOL9vAXcM2lDApFpPhKeyGR3ibKUGzMVjRaWirsBNANYEAVLsXn5di9YYJ14sFJpQ8MJWZ5HDwiwjv3gFp645syGYhJNxz2GD83TbU8!3m5!1s0x14f7d68d74c21285:0xbaac07dd3b0248da!8m2!3d30.5605991!4d31.0072907!16s%2Fg%2F11dfjx4z78?entry=ttu" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
        </section><!-- End Map Section -->
    </div>
    </div>
