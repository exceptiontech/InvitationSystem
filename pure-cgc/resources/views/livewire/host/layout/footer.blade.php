<div class="copyright">
    <p>© 2021 Host Pricing Table . All rights reserved | Design by <a href="https://pure-soft.com/" target="_blank">Pure Soft</a></p>
</div>

<script src="{{asset('host/js/jquery-1.9.1.min.js')}}"></script> 
<script src="{{asset('host/js/owl.carousel.js')}}"></script>
<script>
    $(document).ready(function() { 
        $("#owl-demo").owlCarousel({
            
          autoPlay: 3000, //Set AutoPlay to 3 seconds 
          items : 3,
          itemsDesktop : [640,5],
          itemsDesktopSmall : [414,4]
     
        }); 
    }); 
</script> 

<script src="{{asset('host/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>  
<script>
    $(document).ready(function() {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        }); 															
    });
</script>
</body>
</html>