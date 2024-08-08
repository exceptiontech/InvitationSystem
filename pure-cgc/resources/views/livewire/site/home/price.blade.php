<div>
    @if (count($payment))
        <!-- Price Section Start -->
        <section class="price-section">
            <div class="container">
                <div class="heading-bx d-lg-flex d-md-block align-items-end justify-content-between">
                    <div class="clearfix">
                        <h6 class="title-ext">{{__('ms_lang.Plans and prices')}}</h6>
                        <h2 class="title mb-0">{{__('ms_lang.The best plans and offers')}}</h2>
                    </div>
                    <div class="clearfix mt-md-20">
                        {{-- <a href="{{route('plans')}}" class="theme-btn btn-style-one hvr-dark">{{__('ms_lang.offer_plans')}}</a> --}}
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="owl-carousel price-slider custom-nav">
                    @foreach ($payment as $pay )
                        <div class="co-price">
                            <div class="price-table">

                                @if($pay->tag !='')
                                    <div
                                        class="most-rent">{{ app()->getLocale() == 'en'? $pay->tag_en: $pay->tag}}</div>
                                @endif
                                @if($pay->discount !=0)
                                    <div class="sale-rent">{{ $pay->discount}}% {{ __('ms_lang.discount') }}</div>
                                @endif
                                <div class="table-header">
                                    <h4 class="pricing-plan-name">
                                        {{ app()->getLocale() == 'en'? $pay->name_en: $pay->name}}
                                    </h4>
                                    <h2 class="monthlyPrice">${{$pay->price}}<span>/{{__('ms_lang.yearly')}}</span></h2>
                                </div>
                                <div class="table-content">
                                    <ul class="list-items feature-list">
                                        @foreach (explode( "," , $pay->details) as $det)
                                            <li>
                                                {{$det}}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <button class="expand-btn"><i
                                            class="fal fa-angle-down"></i>{{__('ms_lang.btn_read_more')}}</button>
                                </div>
                                <div class="table-footer">
                                    <a href="https://wa.me/{{ @$whatsapp_num[0] }}?text={{ app()->getLocale() == 'en'? $pay->name_en: $pay->name}}"
                                       class="theme-btn btn-style-one hvr-dark"
                                       target="_blank">{{__('ms_lang.Order now')}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach







                    {{-- <div class="co-price">
                        <div class="price-table">
                            <div class="table-header">
                                <h4 class="pricing-plan-name">خطة بريميوم</h4>
                                <h2 class="monthlyPrice">$99.99<span>/سنوياً</span></h2>
                            </div>
                            <div class="table-content">
                                <ul class="list-items">
                                    <li>30GB مساحة تخزين</li>
                                    <li>تسجيل نطاق مجاني</li>
                                    <li>200GB باندويث</li>
                                    <li>بريد الكترونى عدد لانهائى</li>
                                    <li>دومين فرعى عدد لانهائى</li>
                                    <li>قاعدة البيانات عدد لانهائى</li>
                                    <li>لوحة تحكم</li>
                                    <li>دعم فنى 24/7</li>
                                </ul>
                            </div>
                            <div class="table-footer">
                                <a href="##" class="theme-btn btn-style-one hvr-dark">اطلب الان</a>
                            </div>
                        </div>
                    </div>
                    <div class="co-price">
                        <div class="price-table">
                            <div class="table-header">
                                <h4 class="pricing-plan-name">خطة شعبية</h4>
                                <h2 class="monthlyPrice">$229.99<span>/سنوياً</span></h2>
                            </div>
                            <div class="table-content">
                                <ul class="list-items">
                                    <li>30GB مساحة تخزين</li>
                                    <li>دعم فنى 24/7</li>
                                </ul>
                            </div>
                            <div class="table-footer">
                                <a href="##" class="theme-btn btn-style-one hvr-dark">اطلب الان</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <!-- Price Section End -->

    @endif
</div>
