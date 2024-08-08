<x-guest-layout>
    <x-jet-authentication-card>
	
	<!--
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>


        {{-- <x-jet-validation-errors class="mb-5 alert alert-custom alert-light-danger fade show" /> --}}
        
        <div class="dander">
            @include('includes.messages')
        </div>
        
        <form method="POST" action="{{ route('login') }}"  dir="ltr"  class="pt-5 form">
            @csrf

            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('ms_lang.email_t') }}</label>
                {{-- <x-jet-label value="{{ __('Email') }}" /> --}}
                </div>
                <x-jet-input class="block w-full h-auto px-6 py-6 mt-1 rounded-lg form-control form-control-solid" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label class="font-size-h6 font-weight-bolder text-dark">{{ __('ms_lang.pass_t') }}</label>
                {{-- <x-jet-label value="{{ __('Password') }}" /> --}}
                </div>

                <x-jet-input class="block w-full h-auto px-6 py-6 mt-1 rounded-lg form-control form-control-solid" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="form-group">
                <label class="flex items-center" style="float: right;">
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('ms_lang.remember_me') }}</span>
                </label>
                <label class="flex items-right">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('ms_lang.forgot_pass_t') }}
                    </a>
                @endif
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="px-8 py-4 my-3 mr-3 btn btn-primary font-weight-bolder font-size-h6">
                    {{ __('ms_lang.login_ms') }}
                </x-jet-button>
                {{--  <a class="px-8 py-4 my-3 mr-3 btn btn-default font-weight-bolder font-size-h6" href="{{ route('register') }}">
                    {{ __('ms_lang.register_t') }}
                </a>  --}}
            </div>
        </form>-->
    </x-jet-authentication-card>
</x-guest-layout>





    <div class="fix-wrapper">
	
	
	<img src="https://www.masool.net/cgc-sys/public/uploads/der1.png" class="der-1">
	
		<img src="https://www.masool.net/cgc-sys/public/uploads/der2.png" class="der-2">
	
	
        <div class="container">
            <div class="row">
                <div class="p-5 col-md-5">
                    <div class="h-auto mb-0 card">
                        <div class="card-body">


                            <h4 class="mb-0 text-center">Login</h4>
                            {{--  <div class="alert alert-danger">  --}}
                                @include('includes.messages')
                            {{--  </div>  --}}
                                   <form method="POST" action="{{ route('login') }}"  dir="ltr"  class="pt-5 form">
							@csrf
                                <div class="mb-4 form-group">
                                    <label class="form-label" for="username">Email</label>
                                    <input type="email" name="email" :value="old('email')" required autofocus class="form-control" placeholder="Enter username" id="username">
                                </div>
                               <div class="mb-3 form-group mb-sm-4">
									<label class="form-label">Password</label>
									<div class="position-relative">
										<input id="dz-password" class="form-control" value="Password" type="password" name="password" required autocomplete="current-password">
										<span class="show-pass eye">
											<i class="fal fa-eye-slash"></i>
											<i class="fal fa-eye"></i>
										</span>
									</div>
								</div>
                                <div class="flex-wrap mb-2 form-row d-flex justify-content-between align-items-baseline">
                                    <div class="form-group ms-2">
									
{{--  									
									                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                       Forgot Password
                    </a>
                @endif  --}}
				
				
                                   
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">login</button>
                                </div>
                            </form>
                            {{--  <div class="mt-3 text-center new-account">
                                <p>Don't have an account? <a class="text-primary" href="#register.html">Sign up Now</a></p>
                            </div>  --}}
                        </div>
                    </div>
                </div>
				
				
				
				
				{{--  <div class="col-md-7">
                    <div class="intro-fx">

                    <h3>CGC Invitation Platform</h3>
                                    <img src="{{ img_chk_exist('public/uploads/wlogo.png') }}" alt="">

                    </div>
				</div>  --}}
							 <div class="col-md-7">

				<div class="intro-fx">
                    <img src="{{ img_chk_exist('wlogo.png') }}" alt="">
                    <h3>CGC Invitation Platform</h3>
                    </div>
                             </div>
            </div>
        </div>
    </div>