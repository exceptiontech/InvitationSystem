<div>
    {{-- <div>
        <!-- ======= Our Team Section ======= -->
        <section class="breadcrumbs">
          <div class="container"> --}}

            {{--  <div class="d-flex justify-content-between align-items-center">
              <h2>Our Team</h2>
              <ol>
                <li><a href="/">Home</a></li>
                <li>Our Team</li>
              </ol>
            </div>  --}}

          {{-- </div>
        </section><!-- End Our Team Section -->

        <!-- ======= Team Section ======= -->
        <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
          <div class="container">

            <div class="row">

             @foreach ($pure_team as $pure_team)
                 <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                   <div class="member">
                     <div class="member-img">
                       <img src="{{ img_chk_exist($pure_team->img)}}" class="img-fluid" alt="">
                       <div class="social">
                         <a href=""><i class="bi bi-twitter"></i></a>
                         <a href=""><i class="bi bi-facebook"></i></a>
                         <a href=""><i class="bi bi-instagram"></i></a>
                         <a href=""><i class="bi bi-linkedin"></i></a>
                       </div>
                     </div>
                     <div class="member-info">
                       <h4>{{ app()->getLocale()=='ar' ? $pure_team->name :$pure_team->name_en }}</h4>
                       <span>{{ app()->getLocale()=='ar' ? $pure_team->Specialization :$pure_team->Specialization_en }}</span>
                       <p>{{ app()->getLocale()=='ar' ? $pure_team->details :$pure_team->details_en }}</p>
                     </div>
                   </div>
                 </div>
             @endforeach


            </div>

          </div>
        </section><!-- End Team Section -->
      </div> --}}






      <div class="page-content bg-white">
			
			
			
        <div class="page-content bg-white">
          <!-- Inner Banner -->
          <div class="page-banner ovbl-dark" style="background-image:url({{asset('new/images/back01.jpg')}});">
            <div class="container">
              <div class="page-banner-entry text-center">
                <h1><span>{{__('ms_lang.work team')}}</span></h1>
                <!-- Breadcrumb row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home_home')}}"><i class="las la-home"></i>الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> {{__('ms_lang.work team')}}</li>
                  </ul>
                </nav>
                <!-- Breadcrumb row END -->
              </div>
            </div>
          </div>
          <!-- Inner Banner -->
            
            
            
      
          <!-- Team -->
          <section class="section-area bg-gray section-sp1">
            <div class="container">
      
              <div class="row">
@if (count($pure_team) > 0)
@foreach ($pure_team as $member )    
                <div class="col-lg-3 col-sm-6">
                  <div class="team-member style-2 mb-30">
                    <div class="team-media">
                      <div  style=" width: 200px; height: 200px; margin:auto">
                      <img src="{{ img_chk_exist($member->img)}}" alt="">
                    </div>
                      <ul class="social-media">
                        @if ($member->facebook)                            
                        <li><a target="_blank" href="{{$member->facebook}}" class="btn btn-primary"><i class="fab fa-facebook"></i></a></li>
                        @endif

                        @if ($member->instagram)                            
                        <li><a target="_blank" href="{{$member->instagram}}" class="btn btn-primary"><i class="fab fa-google-plus"></i></a></li>
                        @endif
                       @if ($member->linkedin)    
                        <li><a target="_blank" href="{{$member->linkedin}}" class="btn btn-primary"><i class="fab fa-linkedin-in"></i></a></li>
                        @endif

                        @if ($member->twitter)                            
                        <li><a target="_blank" href="{{$member->twitter}}" class="btn btn-primary"><i class="fab fa-twitter"></i></a></li>
                        @endif

                      </ul>
                    </div>
                    <div class="team-info">
                      <h5   class="title">{{app()->getLocale()=='ar' ? $member->name : $member->name_en}}</h5>
                      <span>{{app()->getLocale()=='ar' ? $member->Specialization : $member->Specialization_en}} </span>
                    </div>
                  </div>
                </div>
     @endforeach
                @endif
                {{-- <div class="col-lg-3 col-sm-6">
                  <div class="team-member style-2 mb-30">
                    <div class="team-media">
                      <img src="{{asset('new/images/contact.png')}}" alt="">
                      <ul class="social-media">
                        <li><a href="javascript:void(0);" class="btn btn-primary"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="javascript:void(0);" class="btn btn-primary"><i class="fab fa-google-plus"></i></a></li>
                        <li><a href="javascript:void(0);" class="btn btn-primary"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="javascript:void(0);" class="btn btn-primary"><i class="fab fa-twitter"></i></a></li>
                      </ul>
                    </div>
                    <div class="team-info">
                      <h5 class="title"><a href="javascript:void(0);">م . اسامة علي</a></h5>
                      <span class="text-primary">مبرمج فلاتر</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                  <div class="team-member style-2 mb-30">
                    <div class="team-media">
                      <img src="{{asset('new/images/contact.png')}}" alt="">
                      <ul class="social-media">
                        <li><a href="javascript:void(0);" class="btn btn-primary"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="javascript:void(0);" class="btn btn-primary"><i class="fab fa-google-plus"></i></a></li>
                        <li><a href="javascript:void(0);" class="btn btn-primary"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="javascript:void(0);" class="btn btn-primary"><i class="fab fa-twitter"></i></a></li>
                      </ul>
                    </div>
                    <div class="team-info">
                      <h5 class="title"><a href="javascript:void(0);">م . احمد سامح</a></h5>
                      <span class="text-primary">مبرمج فلاتر</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                  <div class="team-member style-2 mb-30">
                    <div class="team-media">
                      <img src="{{asset('new/images/contact.png')}}" alt="">
                      <ul class="social-media">
                        <li><a href="javascript:void(0);" class="btn btn-primary"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="javascript:void(0);" class="btn btn-primary"><i class="fab fa-google-plus"></i></a></li>
                        <li><a href="javascript:void(0);" class="btn btn-primary"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="javascript:void(0);" class="btn btn-primary"><i class="fab fa-twitter"></i></a></li>
                      </ul>
                    </div>
                    <div class="team-info">
                      <h5 class="title"><a href="javascript:void(0);">م . عبدالرحمن ثابت</a></h5>
                      <span class="text-primary">مبرمج فلاتر</span>
                    </div>
                  </div>
                </div> --}}
              </div>
            </diV>
          </section>
















     </div>
