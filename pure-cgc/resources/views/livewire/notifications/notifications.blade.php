<div>
    <!-- breadcrumb -->
    <div class="me-breadcrumb">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="me-breadcrumb-box">
                       <h1>notifications</h1>
                       <p><a href="{{ url('/') }}">Home</a>notifications</p>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <!-- how it works -->
   <div class="me-how-work me-padder-top-less me-padder-bottom">
       <div class="container">
           <div class="row">
@if (count($results))
   @foreach ($results as $result)
               <div class="col-12">

                    <div class="col-3">
                        <img src="{{ img_chk_exist($result->img) }}" style="width: 120px;height:120px; border-radius: 15px" />
                    </div>
                    <div class="col-md-8">
                        <h4>{{ $result->title }} </h4>
                        <p>{!! $result->details !!}</p>
                    </div>
               </div>
   @endforeach
@endif

           </div>
        </div>
    </div>
</div>
