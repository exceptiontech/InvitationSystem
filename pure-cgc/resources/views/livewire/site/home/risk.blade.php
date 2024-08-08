<div>
@if(is_null($risk1)==0)
    <section class="risk-section consult-area">
        <img src="{{asset('new/images/section-curve.png')}}" loading="lazy" alt="curve" class="position-absolute curve w-100">
            <div class="container">
                <div class="row align-items-center pt-3">
                    <div class="col-md-4 col-12 text-left">
                        <div class="boxx wow fadeInRight" data-wow-delay="0.6s">
                            <div class="text-primary icon-img">
                                <a class="circle c-3"><span class="dep"></span><i class="ticon-coding"></i></a>
                            </div>
                            <h4>{{app()->getLocale()=='en' ? $risk1->name_en : $risk1->name}}</h4>
                            <div class="text-muted"><p>{{app()->getLocale()=='en' ? $risk1->details_en : $risk1->details}}</p></div>
                        </div>

                        <div class="boxx wow fadeInRight" data-wow-delay="1s">
                            <div class="text-primary icon-img">
                                <a class="circle c-3"><span class="dep"></span><i class="ticon-consultant"></i></a>
                            </div>
                            <h4>{{app()->getLocale()=='en' ? $risk2->name_en : $risk2->name}}</h4>
                            <div class="text-muted"><p>{{app()->getLocale()=='en' ? $risk2->details_en : $risk2->details}}</p></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 hid-mop text-center">
                        <div class="boxx wow fadeInUp" data-wow-delay="0.2s">
                            <div class="text-primary icon-img">
                                <a class="circle c-3"><span class="dep"></span><i class="ticon-medal"></i></a>
                            </div>
                            <h4>{{app()->getLocale()=='en' ? $risk3->name_en : $risk3->name}}</h4>
                            <div class="text-muted"><p>{{app()->getLocale()=='en' ? $risk3->details_en : $risk3->details}}</p></div>
                        </div>
                        <div class="text-center feature-img-center">
                            <img loading="lazy" src="{{asset('new/images/overview-img-2.png')}}" alt="" class="img-fluid mx-auto" />
                        </div>
                    </div>
                    <div class="col-md-4 col-12 text-right">
                        <div class="boxx wow fadeInLeft" data-wow-delay="0.6s">
                            <div class="text-primary icon-img">
                                <a class="circle c-3"><span class="dep"></span><i class="ticon-server"></i></a>
                            </div>
                            <h4>{{app()->getLocale()=='en' ? $risk4->name_en : $risk4->name}}</h4>
                            <div class="text-muted"><p>{{app()->getLocale()=='en' ? $risk4->details_en : $risk4->details}}</p></div>
                        </div>
                        <div class="boxx wow fadeInLeft" data-wow-delay="1s">
                            <div class="text-primary icon-img">
                                <a class="circle c-3"><span class="dep"></span><i class="ticon-technical-support"></i></a>
                            </div>
                            <h4>{{app()->getLocale()=='en' ? $risk5->name_en : $risk5->name}}</h4>
                            <div class="text-muted"><p>{{app()->getLocale()=='en' ? $risk5->details_en : $risk5->details}}</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
