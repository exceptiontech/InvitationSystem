<div>
@if(is_null($result)==0)
    <section class="about-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-40">
                    <div class="heading-bx">
                        <h6 class="title-ext text-primary">{{__('ms_lang.about_us')}}</h6>
                        <h2 class="title"> {{__('ms_lang.puresoft for programming')}} </h2>
                       
                    </div>
					{{--
                    <p style="font-size: 20px; font-weight:bold;" class="text-dark"> {{ app()->getLocale() == 'en' ? $result->name_en : $result->name }}</p>
					--}}
					
			   <p class="text-dark">
                        {!! app()->getLocale() == 'en' ? $result->details_en : $result->details !!}
                    </p>
                    <a href="{{route('about')}}" class="theme-btn btn-style-one hvr-dark">{{__('ms_lang.about_us')}}</a>
                </div>


                <div class="col-lg-6 no-desk">
                    <div class="about-media">
                        <div class="media">
                            <img loading="lazy" src="{{img_chk_exist($result->img)}}" alt="{{ app()->getLocale() == 'en' ? $result->name_en : $result->name }}"  title="{{ app()->getLocale() == 'en' ? $result->name_en : $result->name }}"/>
                        </div>
                        <div class="about-contact bg-primary text-white">
                            <h6 class="title-ext text-white">{{__('ms_lang.For call us')}}</h6>
                            <h3 class="number text-white">
                                <a class="text-white" target="_blank" href="tel:{{ $settings->mobile }}">{{ $settings->mobile }}</a>
                            </h3>
                            <a href="tel:{{ $settings->mobile }}" target="_blank" class="theme-btn btn-style-outer">{{__('ms_lang.call us')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
</div>
