<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
@include('includes.messages')
        {{-- <x-jet-validation-errors class="mb-4 alert-danger p-1" /> --}}

        <form method="POST" action="{{ route('register') }}" dir="rtl" class="form pt-5">
            @csrf
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                <x-jet-label value="{{ __('ms_lang.name_t') }}" class="font-size-h6 font-weight-bolder text-dark" />
                </div>
                <x-jet-input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                <x-jet-label value="{{ __('ms_lang.facility_name') }}" class="font-size-h6 font-weight-bolder text-dark" />
                </div>
                <x-jet-input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg block mt-1 w-full" type="text" name="facility_name" :value="old('facility_name')" required  autocomplete="facility_name" />
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                <x-jet-label value="{{ __('ms_lang.email_t') }}"  class="font-size-h6 font-weight-bolder text-dark"/>
                </div>
                <x-jet-input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                <x-jet-label value="{{ __('ms_lang.mobile') }}"  class="font-size-h6 font-weight-bolder text-dark"/>
                </div>
                <x-jet-input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required />
            </div>

            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                <x-jet-label value="{{ __('ms_lang.pass_t') }}"  class="font-size-h6 font-weight-bolder text-dark"/>
                </div>
                <x-jet-input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                <x-jet-label value="{{ __('ms_lang.repass_t') }}"  class="font-size-h6 font-weight-bolder text-dark"/>
                </div>
                <x-jet-input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                    {{ __('ms_lang.register_t') }}
                </x-jet-button>
                <a class="btn btn-default font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" href="{{ route('login') }}">
                    {{ __('ms_lang.already_registered') }}
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
