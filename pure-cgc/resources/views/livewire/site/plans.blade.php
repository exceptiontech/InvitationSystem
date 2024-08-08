<div>
    <div class="page-content bg-white">
        <div class="page-content bg-white">
            <!-- Inner Banner -->
            <div class="page-banner ovbl-dark" style="background-image:url(new/images/back01.jpg);">
                <div class="container">
                    <div class="page-banner-entry text-center">
                        <h1><span>{{ __('ms_lang.offer_plans') }}</span></h1>
                        <!-- Breadcrumb row -->
                        <nav aria-label="breadcrumb" class="breadcrumb-row">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home_home') }}"><i
                                            class="las la-home"></i>{{ __('ms_lang.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('ms_lang.offer_plans') }}
                                </li>
                            </ul>
                        </nav>
                        <!-- Breadcrumb row END -->
                    </div>
                </div>
            </div>
            <!-- Inner Banner -->
            <div class="page-content bg-white">
                <!-- About US -->
                <section class="about-sec">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-40">
                                <div class="heading-bx">
                                    <h2 class="title">{{ __('ms_lang.offer_plans') }}</h2>
                                    <p>
                                        {{ __('ms_lang."Taqnia" offers a set of server plans that PureSoft meets various needs and aspirations for Internet servers by adopting the latest systems, technologies and programs that help you achieve this, with technical support available 24 hours a day, 7 days a week to solve any problems or answer any questions our customers have. Dear ones') }}
                                </div>
                            </div>
                            <div class="col-lg-6 no-desk">
                                <div class="about-media">
                                    <div class="media">
                                        <img src="{{ asset('new/images/servers_tpUYrxn.gif') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="price ps-price">
                    <div class="plan-price">
                        <div class="container">
                            <svg id="curve" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 60" preserveAspectRatio="none">
                                <path class="cls-1" d="M 0 0 h 80 v 30 Q 60 10, 40 30 T 0 30 Z" />
                            </svg>
                            <div class="heading-bx d-lg-flex d-md-block align-items-center justify-content-center">
                                <div class="clearfix">
                                    <h2 class="title mb-0">خطط استضافة المواقع </h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="myoggle">
                                    <div class="center">
                                        <label class="toggler" id="filt-date">{{ __('ms_lang.SAR') }}</label>
                                        <label>
                                            <input id="swt" type="checkbox">
                                            <span class="check"></span>
                                        </label>
                                        <label class="toggler toggler--is-active" id="filt-monthly">{{ __('ms_lang.Usd') }}</label>
                                    </div>
                                </div>
                                @if (!empty($payments))
                                    @foreach ($payments as $payment)
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <div class="plan-column">
                                                <h2 class="dollar" id="dollar"><span class="en">{{ $payment->price_dolar }} {{ __('ms_lang.$') }}</span> / {{ __('ms_lang.month') }}</h2>
                                                <h2 class="sar hide" id="sar"><span class="en">{{ $payment->price_ryial }} {{ __('ms_lang.SAR') }}</span> / {{ __('ms_lang.month') }}
                                                </h2>
                                                <div class="main">
                                                    <img src="{{ asset('new/images/001-server.png') }}" />
                                                    <h1> {{ __('ms_lang.Technical Plan') }} <span class="en">{{ app()->getLocale() == 'en' ? $payment->name_en : $payment->name }}</span></h1>
                                                    @foreach (explode(',', $payment->details) as $det)
                                                        <h3> {{ $det }} </h3>
                                                    @endforeach
                                                    {{-- <h3>كمية باندويث غير محدودة</h3>
                        <h3>سرعة المعالج 1200Mhz</h3>
                        <h3>الذاكرة العشوائية 350MB</h3>
                        <h3>الذاكرة المؤقتة 2048MB</h3>
                        <h3>عدد الملفات 100,000</h3>
                        <h3>عدد الاتصالات 120</h3>
                        <h3>عدد قواعد البيانات 2</h3>
                        <h3>عدد الدومينات المضافة 1</h3>
                        <h3>حسابات البريد الالكتروني 5</h3>
                        <h3>ضمان تواجد موقعك 99.9%</h3> --}}
                                                </div>
                                                {{-- <a href="" class="btn main-btn">مزيد من التفاصيل</a>
                    <div class="order-plan">
                        <div class="dollar">
                            <h3><span class="en">3.90 $</span> &nbsp;× 12 شهر</h3>
                            <h3><span class="en">2.90 $</span> &nbsp;× 24 شهر</h3>
                            <h3><span class="en">2.49 $</span> &nbsp;× 36 شهر</h3>
                        </div>
                        <div class="sar hide">
                            <h3><span class="en">14.58 SAR</span> &nbsp;× 12 شهر</h3>
                            <h3><span class="en">10.87 SAR</span> &nbsp;× 24 شهر</h3>
                            <h3><span class="en">9.33 SAR</span> &nbsp;× 36 شهر</h3>
                        </div>
                        <a href="order.html" class="theme-btn btn-style-one hvr-dark">اطلب الآن</a>
                    </div> --}}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                {{-- <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="plan-column">
                    <h2 class="dollar" id="dollar"><span class="en">4.9 $</span> / شهر</h2>
                    <h2 class="sar hide" id="sar"><span class="en">18.36 SAR</span> / شهر</h2>
                    <div class="main">
                        <img src="images/001-server.png" />
                        <h1>خطة تقنية <span class="en">S2</span></h1>
                        <h3>مساحة تخزينية غير محدودة</h3>
                        <h3>كمية باندويث غير محدودة</h3>
                        <h3>سرعة المعالج 1600Mhz</h3>
                        <h3>الذاكرة العشوائية 1000MB</h3>
                        <h3>الذاكرة المؤقتة 4096MB</h3>
                        <h3>عدد الملفات 200,000</h3>
                        <h3>عدد الاتصالات 240</h3>
                        <h3>عدد قواعد البيانات 5</h3>
                        <h3>عدد الدومينات المضافة 5</h3>
                        <h3>حسابات البريد الالكتروني 25</h3>
                        <h3>ضمان تواجد موقعك 99.9%</h3>
                    </div>
                    <a href="" class="btn main-btn">مزيد من التفاصيل</a>
                    <div class="order-plan">
                        <div class="dollar">
                            <h3><span class="en">7.9 $</span> &nbsp;× 6 أشهر</h3>
                            <h3><span class="en">6.9 $</span> &nbsp;× 12 شهر</h3>
                            <h3><span class="en">5.9 $</span> &nbsp;× 24 شهر</h3>
                            <h3><span class="en">4.9 $</span> &nbsp;× 36 شهر</h3>
                        </div>
                        <div class="sar hide">
                            <h3><span class="en">29.50 SAR</span> &nbsp;× 6 أشهر</h3>
                            <h3><span class="en">25.83 SAR</span> &nbsp;× 12 شهر</h3>
                            <h3><span class="en">22.12 SAR</span> &nbsp;× 24 شهر</h3>
                            <h3><span class="en">18.36 SAR</span> &nbsp;× 36 شهر</h3>
                        </div>
                        <a href="order.html" class="theme-btn btn-style-one hvr-dark">اطلب الآن</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="plan-column">
                    <h2 class="dollar" id="dollar"><span class="en">9.9 $</span> / شهر</h2>
                    <h2 class="sar hide" id="sar"><span class="en">37.12 SAR</span> / شهر</h2>
                    <div class="main">
                        <img src="images/001-server.png" />
                        <h1>خطة تقنية <span class="en">S3</span></h1>
                        <h3>مساحة تخزينية غير محدودة</h3>
                        <h3>كمية باندويث غير محدودة</h3>
                        <h3>سرعة المعالج 3200Mhz</h3>
                        <h3>الذاكرة العشوائية 1500MB</h3>
                        <h3>الذاكرة المؤقتة 6120MB</h3>
                        <h3>عدد الملفات 300,000</h3>
                        <h3>عدد الاتصالات 350</h3>
                        <h3>قواعد البيانات غير محدودة</h3>
                        <h3>الدومينات المضافة غير محدودة</h3>
                        <h3>حسابات البريد الالكتروني غير محدودة</h3>
                        <h3>ضمان تواجد موقعك 99.9%</h3>
                    </div>
                    <a href="" class="btn main-btn">مزيد من التفاصيل</a>
                    <div class="order-plan">
                        <div class="dollar">
                            <h3><span class="en">17.9 $</span> &nbsp; شهريا</h3>
                            <h3><span class="en">15.9 $</span> &nbsp;× 6 أشهر</h3>
                            <h3><span class="en">13.9 $</span> &nbsp;× 12 شهر</h3>
                            <h3><span class="en">11.9 $</span> &nbsp;× 24 شهر</h3>
                            <h3><span class="en">9.90 $</span> &nbsp;× 36 شهر</h3>
                        </div>
                        <div class="sar hide">
                            <h3><span class="en">67.00 SAR</span>&nbsp; شهريا</h3>
                            <h3><span class="en">59.50 SAR</span>&nbsp;× 6 أشهر</h3>
                            <h3><span class="en">52.12 SAR</span>&nbsp;× 12 شهر</h3>
                            <h3><span class="en">44.60 SAR</span>&nbsp;× 24 شهر</h3>
                            <h3><span class="en">37.12 SAR</span>&nbsp;× 36 شهر</h3>
                        </div>
                        <a href="order.html" class="theme-btn btn-style-one hvr-dark">اطلب الآن</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="plan-column">
                    <h2 class="dollar" id="dollar"><span class="en">17.9 $</span> / شهر</h2>
                    <h2 class="sar hide" id="sar"><span class="en">67.12 SAR</span> / شهر</h2>
                    <div class="main">
                        <img src="images/001-server.png" />
                        <h1>خطة تقنية <span class="en">S4</span></h1>
                        <h3>مساحة تخزينية غير محدودة</h3>
                        <h3>كمية باندويث غير محدودة</h3>
                        <h3>سرعة المعالج 5500Mhz</h3>
                        <h3>الذاكرة العشوائية 2400MB</h3>
                        <h3>الذاكرة المؤقتة 8240MB</h3>
                        <h3>عدد الملفات 400,000</h3>
                        <h3>عدد الاتصالات 600</h3>
                        <h3>قواعد البيانات غير محدودة</h3>
                        <h3>الدومينات المضافة غير محدودة</h3>
                        <h3>حسابات البريد الالكتروني غير محدودة</h3>
                        <h3>ضمان تواجد موقعك 99.9%</h3>
                    </div>
                    <a href="" class="btn main-btn">مزيد من التفاصيل</a>
                    <div class="order-plan">
                        <div class="dollar">
                            <h3><span class="en">29.9 $</span>&nbsp; &nbsp; شهريا</h3>
                            <h3><span class="en">25.9 $</span>&nbsp;× 6 أشهر</h3>
                            <h3><span class="en">22.9 $</span>&nbsp;× 12 شهر</h3>
                            <h3><span class="en">19.9 $</span>&nbsp;× 24 شهر</h3>
                            <h3><span class="en">17.9 $</span>&nbsp;× 36 شهر</h3>
                        </div>
                        <div class="sar hide">
                            <h3><span class="en">112.0 SAR</span>&nbsp; &nbsp; شهريا</h3>
                            <h3><span class="en">97.12 SAR</span>&nbsp;× 6 أشهر</h3>
                            <h3><span class="en">85.83 SAR</span>&nbsp;× 12 شهر</h3>
                            <h3><span class="en">74.60 SAR</span>&nbsp;× 24 شهر</h3>
                            <h3><span class="en">67.12 SAR</span>&nbsp;× 36 شهر</h3>
                        </div>
                        <a href="order.html" class="theme-btn btn-style-one hvr-dark">اطلب الآن</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="plan-column">
                    <h2 class="dollar" id="dollar"><span class="en">2.49 $</span> / شهر</h2>
                    <h2 class="sar hide" id="sar"><span class="en">9.33 SAR</span> / شهر</h2>
                    <div class="main">
                        <img src="images/001-server.png" />
                        <h1>خطة تقنية <span class="en">S1</span></h1>
                        <h3>مساحة تخزينية غير محدودة</h3>
                        <h3>كمية باندويث غير محدودة</h3>
                        <h3>سرعة المعالج 1200Mhz</h3>
                        <h3>الذاكرة العشوائية 350MB</h3>
                        <h3>الذاكرة المؤقتة 2048MB</h3>
                        <h3>عدد الملفات 100,000</h3>
                        <h3>عدد الاتصالات 120</h3>
                        <h3>عدد قواعد البيانات 2</h3>
                        <h3>عدد الدومينات المضافة 1</h3>
                        <h3>حسابات البريد الالكتروني 5</h3>
                        <h3>ضمان تواجد موقعك 99.9%</h3>
                    </div>
                    <a href="" class="btn main-btn">مزيد من التفاصيل</a>
                    <div class="order-plan">
                        <div class="dollar">
                            <h3><span class="en">3.90 $</span> &nbsp;× 12 شهر</h3>
                            <h3><span class="en">2.90 $</span> &nbsp;× 24 شهر</h3>
                            <h3><span class="en">2.49 $</span> &nbsp;× 36 شهر</h3>
                        </div>
                        <div class="sar hide">
                            <h3><span class="en">14.58 SAR</span> &nbsp;× 12 شهر</h3>
                            <h3><span class="en">10.87 SAR</span> &nbsp;× 24 شهر</h3>
                            <h3><span class="en">9.33 SAR</span> &nbsp;× 36 شهر</h3>
                        </div>
                        <a href="order.html" class="theme-btn btn-style-one hvr-dark">اطلب الآن</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="plan-column">
                    <h2 class="dollar" id="dollar"><span class="en">4.9 $</span> / شهر</h2>
                    <h2 class="sar hide" id="sar"><span class="en">18.36 SAR</span> / شهر</h2>
                    <div class="main">
                        <img src="images/001-server.png" />
                        <h1>خطة تقنية <span class="en">S2</span></h1>
                        <h3>مساحة تخزينية غير محدودة</h3>
                        <h3>كمية باندويث غير محدودة</h3>
                        <h3>سرعة المعالج 1600Mhz</h3>
                        <h3>الذاكرة العشوائية 1000MB</h3>
                        <h3>الذاكرة المؤقتة 4096MB</h3>
                        <h3>عدد الملفات 200,000</h3>
                        <h3>عدد الاتصالات 240</h3>
                        <h3>عدد قواعد البيانات 5</h3>
                        <h3>عدد الدومينات المضافة 5</h3>
                        <h3>حسابات البريد الالكتروني 25</h3>
                        <h3>ضمان تواجد موقعك 99.9%</h3>
                    </div>
                    <a href="" class="btn main-btn">مزيد من التفاصيل</a>
                    <div class="order-plan">
                        <div class="dollar">
                            <h3><span class="en">7.9 $</span> &nbsp;× 6 أشهر</h3>
                            <h3><span class="en">6.9 $</span> &nbsp;× 12 شهر</h3>
                            <h3><span class="en">5.9 $</span> &nbsp;× 24 شهر</h3>
                            <h3><span class="en">4.9 $</span> &nbsp;× 36 شهر</h3>
                        </div>
                        <div class="sar hide">
                            <h3><span class="en">29.50 SAR</span> &nbsp;× 6 أشهر</h3>
                            <h3><span class="en">25.83 SAR</span> &nbsp;× 12 شهر</h3>
                            <h3><span class="en">22.12 SAR</span> &nbsp;× 24 شهر</h3>
                            <h3><span class="en">18.36 SAR</span> &nbsp;× 36 شهر</h3>
                        </div>
                        <a href="order.html" class="theme-btn btn-style-one hvr-dark">اطلب الآن</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="plan-column">
                    <h2 class="dollar" id="dollar"><span class="en">9.9 $</span> / شهر</h2>
                    <h2 class="sar hide" id="sar"><span class="en">37.12 SAR</span> / شهر</h2>
                    <div class="main">
                        <img src="images/001-server.png" />
                        <h1>خطة تقنية <span class="en">S3</span></h1>
                        <h3>مساحة تخزينية غير محدودة</h3>
                        <h3>كمية باندويث غير محدودة</h3>
                        <h3>سرعة المعالج 3200Mhz</h3>
                        <h3>الذاكرة العشوائية 1500MB</h3>
                        <h3>الذاكرة المؤقتة 6120MB</h3>
                        <h3>عدد الملفات 300,000</h3>
                        <h3>عدد الاتصالات 350</h3>
                        <h3>قواعد البيانات غير محدودة</h3>
                        <h3>الدومينات المضافة غير محدودة</h3>
                        <h3>حسابات البريد الالكتروني غير محدودة</h3>
                        <h3>ضمان تواجد موقعك 99.9%</h3>
                    </div>
                    <a href="" class="btn main-btn">مزيد من التفاصيل</a>
                    <div class="order-plan">
                        <div class="dollar">
                            <h3><span class="en">17.9 $</span> &nbsp; شهريا</h3>
                            <h3><span class="en">15.9 $</span> &nbsp;× 6 أشهر</h3>
                            <h3><span class="en">13.9 $</span> &nbsp;× 12 شهر</h3>
                            <h3><span class="en">11.9 $</span> &nbsp;× 24 شهر</h3>
                            <h3><span class="en">9.90 $</span> &nbsp;× 36 شهر</h3>
                        </div>
                        <div class="sar hide">
                            <h3><span class="en">67.00 SAR</span>&nbsp; شهريا</h3>
                            <h3><span class="en">59.50 SAR</span>&nbsp;× 6 أشهر</h3>
                            <h3><span class="en">52.12 SAR</span>&nbsp;× 12 شهر</h3>
                            <h3><span class="en">44.60 SAR</span>&nbsp;× 24 شهر</h3>
                            <h3><span class="en">37.12 SAR</span>&nbsp;× 36 شهر</h3>
                        </div>
                        <a href="order.html" class="theme-btn btn-style-one hvr-dark">اطلب الآن</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="plan-column">
                    <h2 class="dollar" id="dollar"><span class="en">17.9 $</span> / شهر</h2>
                    <h2 class="sar hide" id="sar"><span class="en">67.12 SAR</span> / شهر</h2>
                    <div class="main">
                        <img src="images/001-server.png" />
                        <h1>خطة تقنية <span class="en">S4</span></h1>
                        <h3>مساحة تخزينية غير محدودة</h3>
                        <h3>كمية باندويث غير محدودة</h3>
                        <h3>سرعة المعالج 5500Mhz</h3>
                        <h3>الذاكرة العشوائية 2400MB</h3>
                        <h3>الذاكرة المؤقتة 8240MB</h3>
                        <h3>عدد الملفات 400,000</h3>
                        <h3>عدد الاتصالات 600</h3>
                        <h3>قواعد البيانات غير محدودة</h3>
                        <h3>الدومينات المضافة غير محدودة</h3>
                        <h3>حسابات البريد الالكتروني غير محدودة</h3>
                        <h3>ضمان تواجد موقعك 99.9%</h3>
                    </div>
                    <a href="" class="btn main-btn">مزيد من التفاصيل</a>
                    <div class="order-plan">
                        <div class="dollar">
                            <h3><span class="en">29.9 $</span>&nbsp; &nbsp; شهريا</h3>
                            <h3><span class="en">25.9 $</span>&nbsp;× 6 أشهر</h3>
                            <h3><span class="en">22.9 $</span>&nbsp;× 12 شهر</h3>
                            <h3><span class="en">19.9 $</span>&nbsp;× 24 شهر</h3>
                            <h3><span class="en">17.9 $</span>&nbsp;× 36 شهر</h3>
                        </div>
                        <div class="sar hide">
                            <h3><span class="en">112.0 SAR</span>&nbsp; &nbsp; شهريا</h3>
                            <h3><span class="en">97.12 SAR</span>&nbsp;× 6 أشهر</h3>
                            <h3><span class="en">85.83 SAR</span>&nbsp;× 12 شهر</h3>
                            <h3><span class="en">74.60 SAR</span>&nbsp;× 24 شهر</h3>
                            <h3><span class="en">67.12 SAR</span>&nbsp;× 36 شهر</h3>
                        </div>
                        <a href="order.html" class="theme-btn btn-style-one hvr-dark">اطلب الآن</a>
                    </div>
                </div>
            </div> --}}



                                {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="pagination-bx text-center clearfix">
                                <ul class="pagination">
                                    <li class="previous"><a href="javascript:void(0);">السابق</a></li>
                                    <li class="active"><a href="javascript:void(0);">1</a></li>
                                    <li><a href="javascript:void(0);">2</a></li>
                                    <li><a href="javascript:void(0);">3</a></li>
                                    <li class="next"><a href="javascript:void(0);">التالي</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                            </div>
                        </div>
                    </div>
                    <svg id="curve2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 60"
                        preserveAspectRatio="none">
                        <path class="cls-2" d="M 0 0 h 80 v 30 Q 60 10, 40 30 T 0 30 Z" />
                    </svg>
                </div>
                <!-- Project Section Start -->
                <section class="some-projects">
                    <div class="section-content">
                        <div class="container">
                            <div class="heading-bx d-lg-flex d-md-block align-items-end justify-content-between">
                                <div class="clearfix">
                                    <h2 class="title mb-0">{{ __('ms_lang.One of our works is in website design') }}
                                    </h2>

                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="project-item-style1-wrapper">
                                        <div class="owl-carousel projects_5col custom-nav">
                                            {{--
                      <div class="project-item-style1">
                        <div class="project-item-thumb">
                          <a class="project-item-link-image" href="project-details.html">
                            <img class="img-full" src="images/w1.png" alt="" />
                          </a>
                        </div>
                        <div class="project-item-details">
                          <div class="project-item-details-inner">
                            <h6 class="project-item-category"><a href="javascript:void(0);">تصميم مواقع</a></h6>
                            <h4 class="title">موقع شركة بيورسوفت</h4>
                          </div>
                        </div>
                        <div class="project-item-details-hover">
                          <div class="project-item-details-inner">
                            <h4 class="title">موقع شركة بيورسوفت</h4>
                            <div class="project-item-link-icon">
                              <a href="project-details.html"><i class="fal fa-long-arrow-left"></i></a>
                            </div>
                          </div>
                        </div>
                        <a class="bg-overlay" href="javascript:void(0);"></a>
                      </div> --}}
                                            @if (count($work_samples) > 0)
                                                @foreach ($work_samples as $work_sample)
                                                    <div class="project-item-style1">
                                                        <div class="project-item-thumb">
                                                            <a class="project-item-link-image"
                                                                href="{{ $work_sample->url_link }}">
                                                                <img class="img-full"
                                                                    src="{{ img_chk_exist($work_sample->img) }}"
                                                                    alt="" />
                                                            </a>
                                                        </div>
                                                        <div class="project-item-details">
                                                            <div class="project-item-details-inner">
                                                                {{-- <h6 class="project-item-category"><a
                                       href="javascript:void(0);">{{$category->name}}</a></h6> --}}
                                                                <h4 class="title">
                                                                    {{ app()->getLocale() == 'en' ? $work_sample->name_en : $work_sample->name }}
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="project-item-details-hover">
                                                            <div class="project-item-details-inner">
                                                                <h4 class="title">
                                                                    {{ app()->getLocale() == 'en' ? $work_sample->name_en : $work_sample->name }}
                                                                </h4>
                                                                <div class="project-item-link-icon">
                                                                    <a href="{{ $work_sample->url_link }}"><i
                                                                            class="fal fa-long-arrow-left"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="bg-overlay" href="{{ $work_sample->url_link }}"></a>
                                                    </div>
                                                @endforeach
                                            @endif


                                            {{-- <div class="project-item-style1">
                        <div class="project-item-thumb">
                          <a class="project-item-link-image" href="project-details.html">
                            <img class="img-full" src="images/w2.png" alt="" />
                          </a>
                        </div>
                        <div class="project-item-details">
                          <div class="project-item-details-inner">
                            <h6 class="project-item-category"><a href="javascript:void(0);">تصميم مواقع</a></h6>
                            <h4 class="title">موقع شركة بيورسوفت</h4>

                          </div>
                        </div>
                        <div class="project-item-details-hover">
                          <div class="project-item-details-inner">
                            <h4 class="title">موقع شركة بيورسوفت</h4>
                            <div class="project-item-link-icon">
                              <a href="project-details.html"><i class="fal fa-long-arrow-left"></i></a>
                            </div>
                          </div>
                        </div>
                        <a class="bg-overlay" href="javascript:void(0);"></a>
                      </div>
                      <div class="project-item-style1">
                        <div class="project-item-thumb">
                          <a class="project-item-link-image" href="project-details.html">
                            <img class="img-full" src="images/w3.png" alt="" />
                          </a>
                        </div>
                        <div class="project-item-details">
                          <div class="project-item-details-inner">
                            <h6 class="project-item-category"><a href="javascript:void(0);">تصميم مواقع</a></h6>
                            <h4 class="title">موقع شركة بيورسوفت</h4>

                          </div>
                        </div>
                        <div class="project-item-details-hover">
                          <div class="project-item-details-inner">
                            <h4 class="title">موقع شركة بيورسوفت</h4>
                            <div class="project-item-link-icon">
                              <a href="project-details.html"><i class="fal fa-lohong-arrow-left"></i></a>
                            </div>
                          </div>
                        </div>
                        <a class="bg-overlay" href="javascript:void(0);"></a>
                      </div>
                      <div class="project-item-style1">
                        <div class="project-item-thumb">
                          <a class="project-item-link-image" href="project-details.html">
                            <img class="img-full" src="images/w4.png" alt="" />
                          </a>
                        </div>
                        <div class="project-item-details">
                          <div class="project-item-details-inner">
                            <h6 class="project-item-category"><a href="javascript:void(0);">تصميم مواقع</a></h6>
                            <h4 class="title">موقع شركة بيورسوفت</h4>

                          </div>
                        </div>
                        <div class="project-item-details-hover">
                          <div class="project-item-details-inner">
                            <h4 class="title">موقع شركة بيورسوفت</h4>
                            <div class="project-item-link-icon">
                              <a href="project-details.html"><i class="fal fa-long-arrow-left"></i></a>
                            </div>
                          </div>
                        </div>
                        <a class="bg-overlay" href="javascript:void(0);"></a>
                      </div>
                      <div class="project-item-style1">
                        <div class="project-item-thumb">
                          <a class="project-item-link-image" href="project-details.html">
                            <img class="img-full" src="images/w5.png" alt="" />
                          </a>
                        </div>
                        <div class="project-item-details">
                          <div class="project-item-details-inner">
                            <h6 class="project-item-category"><a href="javascript:void(0);">تصميم مواقع</a></h6>
                            <h4 class="title">موقع شركة بيورسوفت</h4>

                          </div>
                        </div>
                        <div class="project-item-details-hover">
                          <div class="project-item-details-inner">
                            <h4 class="title">موقع شركة بيورسوفت</h4>
                            <div class="project-item-link-icon">
                              <a href="project-details.html"><i class="fal fa-long-arrow-left"></i></a>
                            </div>
                          </div>
                        </div>
                        <a class="bg-overlay" href="javascript:void(0);"></a>
                      </div>
                      <div class="project-item-style1">
                        <div class="project-item-thumb">
                          <a class="project-item-link-image" href="project-details.html">
                            <img class="img-full" src="images/w6.png" alt="" />
                          </a>
                        </div>
                        <div class="project-item-details">
                          <div class="project-item-details-inner">
                            <h6 class="project-item-category"><a href="javascript:void(0);">تصميم مواقع</a></h6>
                            <h4 class="title">موقع شركة بيورسوفت</h4>
                          </div>
                        </div>
                        <div class="project-item-details-hover">
                          <div class="project-item-details-inner">
                            <h4 class="title">موقع شركة بيورسوفت</h4>
                            <div class="project-item-link-icon">
                              <a href="project-details.html"><i class="fal fa-long-arrow-left"></i></a>
                            </div>
                          </div>
                        </div>
                        <a class="bg-overlay" href="javascript:void(0);"></a>
                      </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Project Section End -->



                <!-- Call to Action Start -->
                <div class="call-to-action">
                    <div class="container">
                        <div class="call-to-action-inner">
                            <div class="call-to-action-left">
                                <div class="call-to-action-icon">
                                    <span class="webexflaticon base-icon-chat1"></span>
                                </div>
                                <div class="call-to-action-content">
                                    <h2 class="call-to-action-title">
                                        {{ __('ms_lang.Do you have any project you would like to implement?') }}</h2>
                                </div>
                            </div>
                            <div class="call-to-action-btn-box mrt-15 mrt-md-30">
                                <a href="{{ route('subscribe') }}"
                                    class="theme-btn btn-style-one hvr-dark">{{ __('ms_lang.Subscribe Now') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Call to Action End -->




                <!-- Template Section Start -->
                <section class="seo-tool">



                    <div class="container">
                        <div class="heading-bx d-lg-flex d-md-block align-items-end justify-content-between">
                            <div class="clearfix">
                                <h2 class="title mb-0"> {{ __('ms_lang.Our website design features') }} </h2>
                            </div>

                        </div>
                    </div>



                    <div class="container">

                        <ul class="row justify-content-center">
                            <div class="colfive wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.4s">
                                <div class="features-item">
                                    <img src="{{ asset('new/images/1.png') }}"
                                        alt="image"><span>{{ __('ms_lang.Featured home page') }}</span>
                                </div>
                            </div>
                            <div class="colfive wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.6s">
                                <div class="features-item">
                                    <img src="{{ asset('new/images/2.png') }}" alt="image">
                                    <span>{{ __('ms_lang.Inner pages') }}</span>
                                </div>
                            </div>
                            <div class="colfive wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.8s">
                                <div class="features-item">
                                    <img src="{{ asset('new/images/ic3.png') }}" alt="image">
                                    <span>{{ __('ms_lang.Optimum speed') }}</span>
                                </div>
                            </div>
                            <div class="colfive wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="1s">
                                <div class="features-item">
                                    <img src="{{ asset('new/images/4.png') }}" alt="image">
                                    <span>{{ __('ms_lang.Completely responsive') }}</span>
                                </div>
                            </div>

                            <div class="colfive wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="1.2s">
                                <div class="features-item">
                                    <img src="{{ asset('new/images/7.png') }}" alt="image">
                                    <span>{{ __('ms_lang.Organized and clean code') }}</span>
                                </div>
                            </div>
                            <div class="colfive wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="1.4s">
                                <div class="features-item">
                                    <img src="{{ asset('new/images/8.png') }}" alt="image">
                                    <span>{{ __('ms_lang.Supports all browsers') }}</span>
                                </div>
                            </div>
                            <div class="colfive wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="1.6s">
                                <div class="features-item">
                                    <img src="{{ asset('new/images/9.png') }}" alt="image">
                                    <span>{{ __('ms_lang.google fonts') }}</span>
                                </div>
                            </div>
                            <div class="colfive wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="1.8s">
                                <div class="features-item">
                                    <img src="{{ asset('new/images/10.png') }}" alt="image">
                                    <span>{{ __('ms_lang.Modern design') }}</span>
                                </div>
                            </div>
                            <div class="colfive wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="2s">
                                <div class="features-item">
                                    <img src="{{ asset('new/images/11.png') }}" alt="image">
                                    <span>{{ __('ms_lang.Easy to develop') }}</span>
                                </div>
                            </div>

                            <div class="colfive wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="2.2s">
                                <div class="features-item">
                                    <img src="{{ asset('new/images/13.png') }}" alt="image">
                                    <span>{{ __('ms_lang.Smart form') }}</span>
                                </div>
                            </div>
                            <div class="colfive wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="2.4s">
                                <div class="features-item">
                                    <img src="{{ asset('new/images/14.png') }}" alt="image">
                                    <span>{{ __('ms_lang.Secure and trusted') }}</span>
                                </div>
                            </div>
                            <div class="colfive wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="2.6s">
                                <div class="features-item">
                                    <img src="{{ asset('new/images/15.png') }}" alt="image">
                                    <span>{{ __('ms_lang.Technical support 24/7') }}</span>
                                </div>
                            </div>
                            <div class="colfive wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="2.8s">
                                <div class="features-item">
                                    <img src="{{ asset('new/images/16.png') }}" alt="image">
                                    <span>{{ __('ms_lang.Unlimited colors') }}</span>
                                </div>
                            </div>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
