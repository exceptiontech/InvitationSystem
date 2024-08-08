<div>

    <!-- ======= Pricing Section ======= -->
    <section class="pricing section-bg" >
         {{--  <section class="pricing section-bg" data-aos-easing="ease-in-out" data-aos-duration="500">  --}}
            <div class="container">

         <div class="section-title">
          <h2>{{ app()->getLocale()=='ar' ?  "تفاصيل باقه الاستضافه" : " host details " }}</h2>
         </div>

         <div  class="row no-gutters" >
            @foreach ($hostes as $hosting)
            <div class="col-md-4 box color"  >
               <div style="background-color:{!! $hosting->color !!}">
                   <h3 style="color:white " >{{ $hosting->name }}</h3>
                   <h4 style="color:white ">${{ $hosting->price }}<span>per month</span></h4>
               </div>
               {{--  $segments = Str::of( $hosting->feature )->split(',');  --}}

               {{--  <h2>{{$segments }}</h2>  --}}
               {{--  <h2>{{$hosting->feature  }}</h2>  --}}
             @php
             $segments=  explode(',' , "$hosting->feature"  );
             @endphp
               {{--  @dd($segments)  --}}
              @foreach ($segments as $segment)
            @if(app()->getLocale()=='ar')
            <ul style="  text-align: right;   " ><li><i style="color:rgb(60, 15, 97)" class="bx bx-check"> &nbsp;   {{  $segment}}</i></li></ul>
            @else
            <ul style="  text-align: left;   " ><li><i style="color:rgb(60, 15, 97)" class="bx bx-check"> &nbsp;   {{  $segment}}</i></li></ul>
            @endif
              @endforeach
              {{--  <h2>{{ explode(',' ,  "$hosting->feature"  )}}</h2>  --}}
              {{--  <a href="/hosts/{!! $hosting->id !!}" class="get-started-btn">Get Started</a>  --}}     @endforeach
        </div>

         {{--  <div class="col-lg-6">
          <div class="row no-gutters">



          </div>  --}}

          <div  style="" class="col-md-8 box">
            <form wire:submit.prevent="store_offer">
                <h2 class="title"> {{ app()->getLocale()=='ar' ?  " طلب سعر " : "  Request a Quote" }}</h2>

                {{--  @include('messages_site')  --}}
                <div>
                    @include('includes.messages')
                {{--  @yield('content')  --}}
                </div>
                <div class="form-group">
                    {{--  <label for="exampleInputEmail1">Email address</label>  --}}
                    <input type="name" wire:model="name" class="form-control" id=""  placeholder="{{ app()->getLocale()=='ar' ?  "  ادخل اسمك هنا " : "  Enter name" }}" required>

                </div>
                  <br>
                  <div class="form-group">
                    {{--  <label for="exampleInputEmail1">Email address</label>  --}}
                    <input type="number" wire:model="phone" class="form-control" id=""  placeholder="{{ app()->getLocale()=='ar' ?  "  ادخل تليفونك هنا " : "  Enter phone" }}" required>

                  </div>
                  <br>
                <div class="form-group">
                  {{--  <label for="exampleInputEmail1">Email address</label>  --}}
                  <input wire:model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ app()->getLocale()=='ar' ?  "  ادخل ايميلك هنا " : "  Enter email" }}" required>

                </div>
                {{--  <div class="form-group">

                      <select  wire:model="category_id" class="form-control" id="category_id" name="category_id" >
                        <option selected required>{{ app()->getLocale()=='ar' ?  "  اختر نوع الخدمه المطلوبه      " : "  choose" }}</option>
                        @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" required>{{ $categorie->name }}</option>

                        @endforeach
                      </select>

                </div>  --}}
                <br>



                  <div class="form-group">
                    {{--  <label for="exampleInputEmail1">Email address</label>  --}}
                    <textarea wire:model="message" rows="5"type="text" class="form-control" id=""  placeholder="{{ app()->getLocale()=='ar' ?  "  ادخل رسالتك هنا ووضح تفاصيل طلبك....... " : "  Enter message" }}" required>
                    </textarea>

                  </div>
                {{--  <div class="form-check">

                </div>  --}}
                <br>
                <button type="submit" class="btn btn-primary">{{ app()->getLocale()=='ar' ?  "     قدم الطلب " : "  add request " }}</button>
                <div class="my-3">
                    {{--  <div class="loading">Loading</div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                    <div class="error-message"></div>  --}}
                      <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                          @if(Session::has('alert-' . $msg))

                          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                          @endif
                        @endforeach
                      </div>
                  </div>
              </form>
            {{--  <h3>Free</h3>
            <h4>$0<span>per month</span></h4>
            <ul>
              <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
              <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
              <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
              <li class="na"><i class="bx bx-x"></i> <span>Pharetra massa massa ultricies</span></li>
              <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
            </ul>
            <a href="#" class="get-started-btn">Get Started</a>  --}}
          </div>
         {{--  </div>  --}}

        </div>

      </div>
    </section><!-- End Pricing Section -->

</div>

