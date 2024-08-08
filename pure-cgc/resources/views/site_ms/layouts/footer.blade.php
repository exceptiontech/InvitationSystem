<?php
use App\Models\SettingMs;
$contact_details=SettingMs::where('id',1)->first();
use App\Models\SocialMedia;
$socil_medias=SocialMedia::where('is_active',1)->get();
?>
<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row">
            <div class="mouse">
                      <a href="#" class="mouse-icon">
                          <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                      </a>
                  </div>
        </div>
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Vegefoods</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
@if (count($socil_medias))
              @foreach ($socil_medias as $socil_media)
              <li class="ftco-animate"><a href="{{$socil_media->url_l}}" target="_blank"><span class="icon-{!! $socil_media->class_so !!}" title="{!! $socil_media->name !!}"></span></a></li>
    @endforeach
@endif
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Menu</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Shop</a></li>
              <li><a href="#" class="py-2 d-block">About</a></li>
              <li><a href="#" class="py-2 d-block">Journal</a></li>
              <li><a href="#" class="py-2 d-block">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
           <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Help</h2>
            <div class="d-flex">
                <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                  <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                  <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                  <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                  <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                </ul>
                <ul class="list-unstyled">
                  <li><a href="#" class="py-2 d-block">FAQs</a></li>
                  <li><a href="#" class="py-2 d-block">Contact</a></li>
                </ul>
              </div>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">{!! $contact_details->address !!}</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">{!! $contact_details->mobile !!}</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{!! $contact_details->email !!}</span></a></li>
                </ul>
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>  </a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      </p>
        </div>
      </div>
    </div>
  </footer>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>




<!-- Login Modal -->
    <div class="modal fade me-login-model"  id="meLogin">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close me-team-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-body">
                    <h1 class="me-login-title">Login</h1>
                    <div class="col-md-10 offset-1 error"></div>
                    <div class="col-md-10 offset-1 success-login"></div>
                    @error('email')
                    <div class="alert alert-success col-md-6 col-md-offset-3 offset-3  alert-dismissable">
                        <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">×</button>
                        <span class="glyphicon glyphicon-ok"></span>   <em>{{ $message }}</em>
                    </div>
                    @enderror
                    <form method="POST"   class="login-form" name="login-form"  id="login" >
                        <div class="me-login-form">
                            <input type="email"  name="email" id="email" id="login-form-username"  placeholder="{{trans('ms_lang.email_t')}}" required="" />
                            <input type="password"  name="password"  id="login-form-password" placeholder="{{trans('ms_lang.pass_t')}}" />
                            <div class="me-remember">
                                <label>Remember Me
                                    <input type="checkbox">
                                    <span class="s_checkbox"></span>
                                </label>
                                <a href="javascript:;" class="me-forgot-password" data-toggle="modal" data-target="#meforgot" data-dismiss="modal" aria-label="Close">Forgot Password ?</a>
                            </div>
                            <div class="me-login-btn">
                                <button type="submit" class="me-btn btn-login">Login</button>
                                <p>Don't have an account? <a href="javascript:;" data-toggle="modal" data-target="#meSignup" data-dismiss="modal" aria-label="Close">Sign up</a></p>
                            </div>
                        </div>
                    </form>
                    <div class="me-login-with-social"></div>
                </div>
            </div>
        </div>
    </div>



    <!-- Signup Modal -->
    <div class="modal fade me-login-model" id="meSignup">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close me-team-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-body">
                    <h1 class="me-login-title">Sign Up</h1>
                    <div class="col-md-10 offset-1 error-register"></div>
                    <div class="col-md-10 offset-1  success-register"></div>
                    <form   class="register-form"  method="post" name="register-form"  id="register">
                        <div class="me-login-form">
                            <input type="text" name="name" placeholder="{{ __('ms_lang.name_t') }}" required="required" />
                            <input type="hidden" name='shift_id' value="0" class="form-control">
                            <input type="email" name="email" placeholder="{{ __('ms_lang.email_t') }}" required="required"/>
                            <input type="password" name="password" id="password" required="required" placeholder="{{ __('ms_lang.pass_t') }}" autocomplete="new-password"/>
                            <input type="password" name="password_confirmation" autocomplete="new-password" placeholder="{{ __('ms_lang.repass_t') }}" />

                            <div class="me-login-btn">
                                <button class="me-btn  btn-register">Sign up</button>
                                <p>Already have an account? <a href="javascript:;" data-toggle="modal" data-target="#meLogin" data-dismiss="modal" aria-label="Close">Login</a></p>
                            </div>
                        </div>
                    </form>
                    <div class="me-login-with-social">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Forgot Modal -->
    <div class="modal fade me-login-model" id="meforgot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close me-team-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-body">
                    <h1 class="me-login-title">Forgot</h1>
                    <form>
                        <div class="me-login-form">
                            <input type="text" placeholder="Username" />
                            <div class="me-login-btn">
                                <button class="me-btn">Forgot</button>
                                <p>Don't have an account? <a href="javascript:;" data-toggle="modal" data-target="#meSignup" data-dismiss="modal" aria-label="Close">Sign up</a></p>
                            </div>
                        </div>
                    </form>
                    <div class="me-login-with-social"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@guest
<script src="{{url('js/jquery.validate.js')}}"></script>
<script type="text/javascript">
    /// login by jquery ajax
    $('document').ready(function()
    {
        /* validation */
        $(".login-form").validate({
            rules:
            {
                password: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
            },
            messages:
            {
                password:{
                    required: "{{trans('ms_lang.please_enter_the_password')}}"
                },
                email: "{{trans('ms_lang.please_enter_your_email')}}",
            },
            submitHandler: submitForm
        });
        /* validation */
        /* login submit */
        function submitForm()
        {
            var data = $(".login-form").serialize();
            $.ajax({
                type : 'POST',
                url  : "{{route("login")}}",
                data : data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function()
                {
                    $(".error").fadeOut();
                    $(".btn-login").html("<i class='fa fa-spinner fa-spin text-danger' ></i> &nbsp;  {{trans('ms_lang.processing_is_in_progress')}} ");
                },
                success: function (data) {
                    //console.log(data);
                    // $(".error").fadeIn(1000, function(){
                    //     $(".error").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> "{{trans("ms_lang.signin_successful")}}" </div>');
                    // });
                    $(".btn-login").html('Signing In .. <img src="{{url("btn-ajax-loader.gif")}}" /> ');
                    setTimeout('location.reload()',3000);
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);
                    console.log(response);
                    $(".error").fadeIn(1000, function(){
                            $(".error").html('<div class="alert alert-danger"> {{trans("ms_lang.sorry_the_email_or_password_are_incorrect")}}  </div>');
                            $(".btn-login").html('<i class="icon-signin"></i> {{trans("ms_lang.login_ms")}} ');
                        });
                }
            });
            return false;
        }
        /* login submit */

    //// start register
    $(".register-form").validate({
            rules:
            {
                name: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    minlength: 8,
                    equalTo: '#password'
                },
                email: {
                    required: true,
                    email: true
                },
            },
            messages:
            {
                password:{
                    required: "{{trans('ms_lang.please_enter_the_password')}}",
                    minlength: "{{ trans('ms_lang.must_length_more_than') }}: 8"
                },
                password_confirmation: {
                    equalTo : "{{ trans('ms_lang.match_password') }}",
                },
                name: "{{trans('ms_lang.please_enter_your_name')}}",
                email: "{{trans('ms_lang.please_enter_your_email')}}",
            },
            submitHandler: submitFormRegister
        });
        /* validation */
        /* login submit */
        function submitFormRegister()
        {
            var data = $(".register-form").serialize();
            $.ajax({
                type : 'POST',
                url  : "{{route('register')}}",
                data : data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function()
                {
                    $(".error-register").fadeOut();
                    $(".btn-register").html("<i class='fa fa-spinner fa-spin text-danger' ></i> &nbsp;  {{trans('ms_lang.processing_is_in_progress')}} ");
                },
                success: function (data) {
                    //console.log(data);
                    // $(".error").fadeIn(1000, function(){
                    //     $(".error").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> "{{trans("ms_lang.signin_successful")}}" </div>');
                    // });
                    $(".success-register").html('<div class="alert alert-success col-12"> {{trans("ms_lang.signin_successful")}}</div>');
                    $(".btn-register").html('Signing In .. <img src="{{url("btn-ajax-loader.gif")}}" /> ');
                    setTimeout('location.reload()',3000);
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);
                    console.log(response);
                    $(".error-register").fadeIn(1000, function(){
                            $(".error-register").html('<div class="alert alert-danger">'+response['message']+'  </div>');
                            $(".btn-register").html('<i class="icon-signin"></i> {{trans("ms_lang.login_ms")}} ');
                        });
                }
            });
            return false;
        }
        /* login submit */
        //// end login
    });
</script>
@endguest

<script src="{{url('site/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{url('site/js/popper.min.js')}}"></script>
<script src="{{url('site/js/bootstrap.min.js')}}"></script>
<script src="{{url('site/js/jquery.easing.1.3.js')}}"></script>
<script src="{{url('site/js/jquery.waypoints.min.js')}}"></script>
<script src="{{url('site/js/jquery.stellar.min.js')}}"></script>
<script src="{{url('site/js/owl.carousel.min.js')}}"></script>
<script src="{{url('site/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('site/js/aos.js')}}"></script>
<script src="{{url('site/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{url('site/js/bootstrap-datepicker.js')}}"></script>
<script src="{{url('site/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{url('site/js/google-map.js')}}"></script>
<script src="{{url('site/js/main.js')}}"></script>

@yield('footer')



