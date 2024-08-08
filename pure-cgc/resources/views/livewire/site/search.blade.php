<div>
    <section class="service-section">
        <div style="margin-top: 120px" class="container">
            <div class="heading-bx d-lg-flex d-md-block align-items-end justify-content-between">
                <div class="clearfix">
                    <h6 class="title-ext">{{ __('ms_lang.our_services') }}</h6>
                    <h2 class="title mb-0">{{ __('ms_lang.We provide the best services') }}</h2>
                </div>
            </div>
        </div>
    <div class="section-content">
       
        <div class="container">
            <div class="row">
                @if (! is_null($services) && count($services) > 0)
                    @foreach ($services as $service)
                        <div class="col-xl-3 col-lg-6 col-6">
                            <div class="service-style3">
                                <div class="service-inner">
                                    <div class="service-icon"><img src="{{ asset('uploads/' . $service->img) }}"
                                            alt="" /></div>
                                    <h4 class="service-title">
                                        @if (app()->getLocale() == 'en')
                                            {{ $service->name_en }}
                                        @else
                                            {{ $service->name }}
                                        @endif
                                    </h4>
                                    <div class="service-description">
                                        @if (app()->getLocale() == 'en')
                                            {{ $service->details_en }}
                                        @else
                                            {{ $service->details }}
                                        @endif
                                    </div>
                                    <a class="theme-text-icon-btn services-link icon-left"
                                        href="{{ route('service', [$service->id, $service->name]) }}">
                                        <span>{{ __('ms_lang.btn_read_more') }}</span>
                                        <i aria-hidden="true" class="fal fa-long-arrow-left"></i>
                                    </a>
                                    <div class="service-inner-obj"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <div class="text-center">
                    <img src="{{asset('new/images/no.png')}}" width="250px" height="250px" alt="">
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
</div>
