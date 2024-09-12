@if (count($errors) > 0 || Session::has('success_message') || Session::has('error_message') || session('status'))


    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
        <div class="alert alert-custom alert-light-danger fade show mb-5 flash_message" id="flash_message"  role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert alert-danger text-white" style="background: rgb(197, 70, 70)">{{ $error}}</div>
        </div>
        @endforeach
    @endif


    @if(Session::has('success_message'))
    <div class="alert alert-custom alert-light-success fade show mb-5 flash_message"  id="flash_message"  role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">{!! session('success_message') !!}</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
    @endif
    @if(Session::has('error_message'))
    <div class="alert alert-custom alert-light-danger fade show mb-5 flash_message"  id="flash_message"  role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert alert-danger">{!! session('error_message') !!}</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
    @endif

    @if (session('status'))
    <div class="alert alert-custom alert-light-danger fade show mb-5 flash_message"  id="flash_message"  role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">{{ session('status') }}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
    @endif



<script>
    window.setTimeout(function() {
        $(".flash_message").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });

    }, 3000);
</script>


@endif



