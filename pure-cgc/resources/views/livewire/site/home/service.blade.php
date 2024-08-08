<div>
@if(count($services))
    <section class="service-section">
        <div class="container">
            <div class="heading-bx d-lg-flex d-md-block align-items-end justify-content-between">
                <div class="clearfix">
                    <h6 class="title-ext">{{ __('ms_lang.our_services') }}</h6>
                    <h2 class="title mb-0">{{ __('ms_lang.We provide the best services') }}</h2>
                </div>
                <div class="clearfix mt-md-20">
                    <a href="{{ route('services') }}" class="theme-btn btn-style-one hvr-dark">{{ __('ms_lang.All services') }}</a>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="container">
                <div class="row">
    @foreach ($services as $service)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="service-style3">
                            <div class="service-inner">
                                <div class="service-icon"><img loading="lazy" src="{{ img_chk_exist($service->img) }}" alt="{{ app()->getLocale() == 'en' ? $service->name_en : $service->name }}" title="{{ app()->getLocale() == 'en' ? $service->name_en : $service->name }}" /></div>
                                <h4 class="service-title">{{ app()->getLocale() == 'en' ? $service->name_en : $service->name }}</h4>
                                <div class="service-description text-justify">{!! cut_arabic_text( app()->getLocale() == 'en' ? $service->details_en : $service->details , 255) !!}</div>
                                <a class="theme-text-icon-btn services-link icon-left" href="{{ route('service' , [$service->id , title_2url($service->name)])}}">
                                    <span>{{ __('ms_lang.btn_read_more') }}</span>
                                    <i aria-hidden="true" class="fal fa-long-arrow-left"></i>
                                </a>
                                <div class="service-inner-obj"></div>
                            </div>
                        </div>
                    </div>
    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
</div>
