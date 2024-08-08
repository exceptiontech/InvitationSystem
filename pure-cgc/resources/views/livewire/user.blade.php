<div class="me-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="me-breadcrumb-box">
                    <h1>My Account</h1>
                    <p><a href="{{ url('/') }}">Home</a>profile</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="me-my-account me-padder-top">
    <div class="container">
        <div class="row">
            <div class="west-mar1 col-md-10 offset-1">
                <div class="me-my-account-profile">
                    <div class="me-my-profile-head">
                        <div class="me-profile-name">
                            <h4>{{ Auth::user()->name }}</h4>
                        </div>
                        <div class="me-my-profile-img">
                <div class="me-points"><span>74  points</span>
                </div>
                        </div>
                    </div>
                    <div  class="me-account-profile-shape">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" height="50" width="100%"> <path class="exqute-fill-white" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3 c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3 c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path></svg>
                    </div>
                    <div class="me-my-profile-body">
                            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                                @livewire('profile.update-profile-information-form')

                                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                    <x-jet-section-border />

                                    <div class="mt-10 sm:mt-0">
                                        @livewire('profile.update-password-form')
                                    </div>
                                @endif

                                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                    <x-jet-section-border />

                                    <div class="mt-10 sm:mt-0">
                                        @livewire('profile.two-factor-authentication-form')
                                    </div>
                                @endif

                                <x-jet-section-border />

                                <div class="mt-10 sm:mt-0">
                                    @livewire('profile.logout-other-browser-sessions-form')
                                </div>

                                <x-jet-section-border />

                                <div class="mt-10 sm:mt-0">
                                    @livewire('profile.delete-user-form')
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

