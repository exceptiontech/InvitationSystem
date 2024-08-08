{{-- <livewire:site.layouts.header />
    @livewireStyles
</head>
<body @if(app()->getLocale()=='ar') dir="rtl" @else dir="ltr"  @endif >

<livewire:site.layouts.navbar /> --}}
{{-- <livewire:site.layouts.hero /> --}}
{{-- <livewire:site.layouts.slider /> --}}
{{-- <livewire:site.contact /> --}}
{{-- @yield('content')
@livewireScriptswho
<livewire:site.layouts.footer />
</body>
</html> --}}


<livewire:site.layouts.header/>

<livewire:site.layouts.navbar/>
@yield('content')
<livewire:site.layouts.footer/>

{{-- <script src="{{asset('new/js/gsap.min.js')}}"></script>
<script src="{{asset('new/js/MotionPathPlugin.min.js')}}"></script> --}}


<script>

    var mainTL = new gsap.timeline();


    gsap.registerPlugin(MotionPathPlugin);

    mainTL
        .from("#plane", {
            duration: 4,
            ease: "none",
            motionPath: {
                path: "#flightpath",
                align: "#flightpath",
                start: 0,
                end: 1,
                autoRotate: true,
                alignOrigin: [0.5, 0.5]
            }
        })
        .fromTo(".path", {
            strokeDashoffset: 0
        }, {
            strokeDashoffset: 3000,
            duration: 4,
            ease: "none"
        }, 0)


    /*
    var wow = new WOW(
    {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
    // the callback is fired every time an animation is started
    // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null,    // optional scroll container selector, otherwise use window,
    resetAnimation: true,     // reset animation on end (default is true)
    }
    );
    wow.init();

    */


    var e = document.getElementById("filt-monthly"),
        d = document.getElementById("filt-date"),
        t = document.getElementById("swt"),
        m = document.getElementsByClassName("dollar"),
        y = document.getElementsByClassName("sar");

    e.addEventListener("click", function () {
        t.checked = false;
        e.classList.add("toggler--is-active");
        d.classList.remove("toggler--is-active");
        $(m).removeClass("hide");
        $(y).addClass("hide");
    });

    d.addEventListener("click", function () {
        t.checked = true;
        d.classList.add("toggler--is-active");
        e.classList.remove("toggler--is-active");
        $(m).addClass("hide");
        $(y).removeClass("hide");
    });

    t.addEventListener("click", function () {
        d.classList.toggle("toggler--is-active");
        e.classList.toggle("toggler--is-active");
        $(m).toggleClass("hide");
        $(y).toggleClass("hide");
    })


    $(".plan-price a.main-btn").click(function (e) {
        e.preventDefault();

        $(".plan-price .main").removeClass("opacity0");
        $(".plan-price .order-plan").removeClass("opacity1");
        $(".plan-price a.main-btn").removeClass("opacity0");
        $(this).addClass("opacity0");
        $(this).prev(".main").addClass("opacity0");
        $(this).next(".order-plan").addClass("opacity1");

    });


    $(".plan-price .main").on('blur', function () {
        $(".plan-price .main").removeClass("opacity0");

    });

    $(".plan-price .order-plan").on('blur', function () {

        $(".plan-price .order-plan").removeClass("opacity1");

    });

    $(".plan-price a.main-btn").on('blur', function () {


        $(".plan-price .main").removeClass("opacity0");
        $(".plan-price .order-plan").removeClass("opacity1");
        $(".plan-price a.main-btn").removeClass("opacity0");
    });


</script>

<script>


    // Pen JS Starts Here
    jQuery(document).ready(function () {

// SVG
        var snapC = Snap("#svgC");

// SVG C - "Squiggly" Path
        var myPathC = snapC.path("M62.9 14.9c-25-7.74-56.6 4.8-60.4 24.3-3.73 19.6 21.6 35 39.6 37.6 42.8 6.2 72.9-53.4 116-58.9 65-18.2 191 101 215 28.8 5-16.7-7-49.1-34-44-34 11.5-31 46.5-14 69.3 9.38 12.6 24.2 20.6 39.8 22.9 91.4 9.05 102-98.9 176-86.7 18.8 3.81 33 17.3 36.7 34.6 2.01 10.2.124 21.1-5.18 30.1").attr({
            id: "squiggle",
            fill: "none",
            strokeWidth: "1",
            stroke: "rgba(0,0,0,0.1)",
            strokeMiterLimit: "10",
            strokeDasharray: "5 10",
            strokeDashOffset: "180"
        });

// SVG C - Triangle (As Polyline)
        var Triangle = snapC.polyline("0, 30, 15, 0, 30, 30");
        Triangle.attr({
            id: "plane",
            fill: "rgba(0,0,0,0.050)"
        });

        initTriangle();

// Initialize Triangle on Path
        function initTriangle() {
            var triangleGroup = snapC.g(Triangle); // Group polyline
            movePoint = myPathC.getPointAtLength(length);
            triangleGroup.transform('t' + parseInt(movePoint.x - 15) + ',' + parseInt(movePoint.y - 15) + 'r' + (movePoint.alpha - 90));
        }

// SVG C - Draw Path
        var lenC = myPathC.getTotalLength();

// SVG C - Animate Path
        function animateSVG() {

            myPathC.attr({
                stroke: 'rgba(0,0,0,0.1)',
                strokeWidth: 1,
                fill: 'none',
// Draw Path
                "stroke-dasharray": "5 10",
                "stroke-dashoffset": "180"
            }).animate({"stroke-dashoffset": 10}, 2500, mina.easeinout);

            var triangleGroup = snapC.g(Triangle); // Group polyline

            setTimeout(function () {
                Snap.animate(0, lenC, function (value) {

                    movePoint = myPathC.getPointAtLength(value);

                    triangleGroup.transform('t' + parseInt(movePoint.x - 15) + ',' + parseInt(movePoint.y - 15) + 'r' + (movePoint.alpha - 90));

                }, 2500, mina.easeinout, function () {
                });
            });

        }


// Animate Button
        function kapow() {
            $(window).on('scroll', function () {
                animateSVG();
            });
        }

        kapow();

    });


    /*
    var steps = $(".step-prog");
    console.dir(steps);

    setTimeout(function() {
    steps.each(function(index) {
    var _t = $(this);
    setTimeout(function() {
    _t.addClass('bob-on');
    }, 1250*index*1.5);
    });
    }, 500);*/


    $(function () {

        var $window = $(window),
            win_height_padded = $window.height() * 1.1,
            isTouch = Modernizr.touch;

        if (isTouch) {
            $('.revealOnScroll').addClass('animated');
        }

        $window.on('scroll', revealOnScroll);

        function revealOnScroll() {
            var scrolled = $window.scrollTop(),
                win_height_padded = $window.height() * 1.1;

// Showed...
            $(".revealOnScroll:not(.animated)").each(function () {
                var $this = $(this),
                    offsetTop = $this.offset().top;

                if (scrolled + win_height_padded > offsetTop) {
                    if ($this.data('timeout')) {
                        window.setTimeout(function () {
                            $this.addClass('animated ' + $this.data('animation'));
                        }, parseInt($this.data('timeout'), 10));
                    } else {
                        $this.addClass('animated ' + $this.data('animation'));
                    }
                }
            });
// Hidden...
            $(".revealOnScroll.animated").each(function (index) {
                var $this = $(this),
                    offsetTop = $this.offset().top;
                if (scrolled + win_height_padded < offsetTop) {
                    $(this).removeClass('animated fadeInUp flipInX lightSpeedIn')
                }
            });
        }

        revealOnScroll();
    });


    /*
    var $animation_element = $('.animation-element');
    var $window = $(window);

    function check_if_in_view() {

    var window_height = $window.height();
    var window_top_position = $window.scrollTop();
    var window_bottom_position = ( window_height + window_top_position );

    $.each($animation_element, function() {
    var $element = $(this);
    var element_height = $element.outerHeight();
    var element_top_position = $element.offset().top;
    var element_bottom_position = (element_height + element_top_position);

    if((element_bottom_position >= window_top_position) &&
    (element_top_position <= window_bottom_position)) {
    $element.addClass('in-view');
    } else {
    $element.removeClass('in-view');
    }
    });
    };

    $window.on('scroll resize', check_if_in_view);
    $window.trigger('scroll');*/

    new WOW().init();

</script>


<script>
    $(".typed").typed({
        strings: ["{{__('ms_lang.thinking world to doing world')}}", "{{__('ms_lang.to digital world')}}", "{{__('ms_lang.to fact')}}",],
        typeSpeed: 100,
        startDelay: 0,
        backSpeed: 30,
        backDelay: 800,
        loop: true,
        cursorChar: "|",
        contentType: "html",
    });
</script>


</body>
</html>
