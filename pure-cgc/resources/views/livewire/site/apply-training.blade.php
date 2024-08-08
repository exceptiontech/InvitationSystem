<div>
    <div class="page-content bg-white">
        <div class="page-content bg-white">
            <!-- Inner Banner -->
            <div class="page-banner ovbl-dark" style="background-image:url(new/images/back01.jpg);">
                <div class="container">
                    <div class="page-banner-entry text-center">
                        <h1><span>{{ __('ms_lang.Apply_To_Training') }}</span></h1>
                        <!-- Breadcrumb row -->
                        <nav aria-label="breadcrumb" class="breadcrumb-row">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home_home') }}"><i
                                            class="las la-home"></i>{{ __('ms_lang.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ __('ms_lang.Apply_To_Training') }}</li>
                            </ul>
                        </nav>
                        <!-- Breadcrumb row END -->
                    </div>
                </div>
            </div>
            <!-- Inner Banner -->
            <section class="indes-content">
                <div class="container">
                    <div class="">
                        <div class="container">
                            <div class="row gy-30">
                                <div class="row no-gutters m-0">
                                    <div class="col-xl-5">
                                        <div class="appointment-img2">
                                            <img src="{{ asset('new/images/contact.png') }}" alt="">
                                            <div class="as-experience style2">
                                                <img src="{{ asset('new/images/wlogo.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 appointment-form-wrap">
                                        <div class="appointment-form ajax-contact">
                                        {{--  @if ($this->success)
                                            <h6 class="alert alert-success">{{ $this->success }}</h6>
                                        @endif  --}}
                                        @if (session()->has('success_message'))
                                        <h6 class="alert alert-success">{{__('ms_lang.msg_success')}}</h6>

                                        @endif
                                        {{--  @include('includes.messages_site')  --}}
                                            {{-- <form action="#" method="POST" class="appointment-form ajax-contact"> --}}
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" wire:model="name" placeholder="{{ __('ms_lang.name') }}">
                                                    <i class="fal fa-user"></i>
                                                    @error('name')
                                                        <h6 class="text-danger">{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" wire:model="phone" placeholder="{{ __('ms_lang.phone') }}">
                                                    <i class="fal fa-phone"></i>
                                                    @error('phone')
                                                        <h6 class="text-danger">{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" wire:model="address" placeholder="{{ __('ms_lang.address') }}">
                                                    <i class="fal fa-file-alt"></i>
                                                    @error('address')
                                                        <h6 class="text-danger">{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="email" class="form-control" wire:model="email" placeholder="{{ __('ms_lang.email') }}">
                                                    <i class="fal fa-envelope"></i>
                                                    @error('email')
                                                        <h6 class="text-danger">{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">{{ __('ms_lang.birth_date') }}</label>
                                                    <input type="date" class="form-control" wire:model="birth_date" placeholder="{{ __('ms_lang.birth_date') }}">
                                                    @error('birth_date')
                                                        <h6 class="text-danger">{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">{{ __('ms_lang.cv') }}</label>
                                                    <input type="file" class="form-control" wire:model="cv" placeholder="{{ __('ms_lang.cv') }}">
                                                    @error('cv')
                                                        <h6 class="text-danger">{{ $message }}</h6>
                                                    @enderror
                                                </div>

												{{--
                                                <div class="form-group col-6"><i class="fal fa-cogs"></i>
                                                    <select wire:model="type" class="form-select">
                                                        <option>*{{ __('ms_lang.application_Type') }}</option>
                                                        <option value="1">{{ __('ms_lang.training') }}</option>
                                                        <option value="2">{{ __('ms_lang.job') }}</option>
                                                    </select>
                                                    @error('type')
                                                        <h6 class="text-danger">{{ $message }}</h6>
                                                    @enderror
                                                </div>--}}

                                                <div class="form-group col-6"><i class="fal fa-cogs"></i>
                                                    <select wire:model="gender" class="form-select">
                                                        <option>*{{ __('ms_lang.gender') }}</option>
                                                        <option value="0">{{ __('ms_lang.male') }}</option>
                                                        <option value="1">{{ __('ms_lang.female') }}</option>
                                                    </select>
                                                    @error('gender')
                                                        <h6 class="text-danger">{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-6"><i class="fal fa-cogs"></i>
                                                    <select wire:model="field_id" class="form-select">
                                                        <option>*{{ __('ms_lang.field') }}</option>
                                                        @foreach ($fields as $field)
                                                            <option value="{{ $field->id }}">{{ $field->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('field_id')
                                                        <h6 class="text-danger">{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <textarea class="form-control" wire:model="summary" placeholder="{{ __('ms_lang.summary') }}" cols="30" rows="10"></textarea>
                                                    @error('summary')
                                                        <h6 class="text-danger">{{ $message }}</h6>
                                                    @enderror
                                                </div>

                                                <div class="form-btn form-group mt-10"><button
                                                        class="theme-btn btn-style-one hvr-dark"
                                                        wire:click="store">{{ __('ms_lang.btn_send') }}</button></div>
                                            </div>
                                            <p class="form-messages mb-0 mt-3"></p>
                                            {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>




        </div>
    </div>
