<div>
@if(count($setps))
    <section class="text-center pos-r anim-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title">
                        <div class="title-effect">
                            <div class="bar bar-top"></div>
                            <div class="bar bar-right"></div>
                            <div class="bar bar-bottom"></div>
                            <div class="bar bar-left"></div>
                        </div>
                        <h6>{{__('ms_lang.how we work')}}</h6>
                        <h2 class="title">{{__('ms_lang.work steps')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row step-prog">
                <div id="svg-container">
                    <svg id="svgC" width="100%" height="100%" viewBox="0 0 600 120" preserveAspectRatio="xMidYMid meet">
                        <path
                            d="M62.9 14.9c-25-7.74-56.6 4.8-60.4 24.3-3.73 19.6 21.6 35 39.6 37.6 42.8 6.2 72.9-53.4 116-58.9 65-18.2 191 101 215 28.8 5-16.7-7-49.1-34-44-34 11.5-31 46.5-14 69.3 9.38 12.6 24.2 20.6 39.8 22.9 91.4 9.05 102-98.9 176-86.7 18.8 3.81 33 17.3 36.7 34.6 2.01 10.2.124 21.1-5.18 30.1"
                            id="squiggle"
                            fill="none"
                            stroke="rgba(0,0,0,0.1)"
                            strokeMiterLimit="10"
                            strokeDashOffset="180"
                            style="stroke-width: 1; stroke-dasharray: 5, 10; stroke-dashoffset: 10;"
                        ></path>
                        <g transform="matrix(0.2956,-0.9553,0.9553,0.2956,43.2367,24.8965)"></g>
                        <g transform="matrix(-0.8615,-0.5077,0.5077,-0.8615,577.307,92.5386)">
                        <polyline points="0, 30, 15, 0, 30, 30" id="plane" fill="rgba(0,0,0,0.05)" style=""></polyline>
                        </g>
                    </svg>
                </div>
            <script src="https://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.7.2.js"></script>
    @foreach ($setps as $index => $step )
                <div class="cobox revealOnScroll" data-animation="fadeInUp" data-timeout="{{($index+1)*200}}">
                    <div class="work-process">
                        <div class="step-num">0{{++ $index}}</div>
                        <div class="step-num-box">
                            <div class="step-icon">
                                <span><i class="fal fa-analytics"></i></span>
                            </div>
                        </div>
                        <div class="step-desc">
                            <h4>{{app()->getLocale()=='en' ? $step->name_en : $step->name}}</h4>
                            <p class="mb-0"> {!! app()->getLocale()=='en' ? $step->details_en : $step->details !!} </p>
                        </div>
                    </div>
                </div>
    @endforeach
            </div>
        </div>
    </section>
@endif
</div>
