@extends('site_ms.layouts.app',['user_dashboard'=>1])

@section('content')
 
<script type="text/javascript">
  /// login by jquery ajax
  $('document').ready(function()
  { 
       /* validation */
      $("#swap-form").validate({
          rules:
          {
            from_date: {
                  required: true,
              },
              to_date: {
                  required: true,
              },
          },
          messages:
          {
            from_date:{
                  required: "Please Enter Start date"
              },
              to_date: "Please Enter End date",
          },
          submitHandler: submitForm	
      });  
      /* validation */
  
      /* login submit */
      function submitForm()
      {		
          var data = $("#swap-form").serialize();
          $.ajax({
              type : 'POST',
              url  : '{{route("swapping_requests.store")}}',
              data : data,
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function()
              {	
                  $(".error-swap").fadeOut();
                  $(".btn-swap").html('<span class="fa fa-spinner fa-spin text-danger"></span> &nbsp; Swapping ...');
              },
              success: function (data) {
                console.log(data);
                $(".btn-swap").html('<img src="{{url("btn-ajax-loader.gif")}}" /> &nbsp; Successfully Swapping  ...');
                $(".error-swap").fadeIn(100, function(){						
                    $(".error-swap").html(data);
                    
                });
                setTimeout('location.reload()',4000);
            },
            error: function (jqXHR) {
                var response = $.parseJSON(jqXHR.responseText);
                console.log(response);
                $(".error-swap").fadeIn(500, function(){						
                        $(".error-swap").html('<div class="alert alert-danger"> <i class="fa fa-info-sign"></i> &nbsp; '+response.message+'<br/> Please update your  country  in your profile and redo it </div>');
                        $(".btn-swap").html('<i class="fa fa-sign-in-alt"></i> &nbsp;  Swap Now');
                        
                    });
            }
            // success :  function(response)
            //   {						
            //       if(response =="ok"){
            //           $(".btn-swap").html('<img src="btn-ajax-loader.gif" /> &nbsp; Successfully Swapping  ...');
            //           setTimeout(' location.reload()',4000);
            //       }
            //       else{
            //           $(".error-swap").fadeIn(1000, function(){						
            //               $(".error-swap").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Wrong email or password. Please try again. '+response+' </div>');
            //               $(".btn-swap").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                          
            //           });
                      
            //       }
            //   }
          });
          return false;
      }
       /* login submit */
  });
  //// end login
    </script>

@include('includes.messages')
<section class="profile">
    <div class="container">
      <div class="dataprofile">
        <div class="dataimg">
          <div class="photo"><img src="{{img_chk_exist(@$result->img)}}" alt=""></div>
          {{-- <nav class="social">
              <a class="fab fa-facebook-f icon-facebook" href="#" title="Facebook"></a>
              <a class="fab fa-instagram icon-instagram" href="#" title="Instagram"></a>
              <a class="fab fa-twitter icon-twitter" href="#" title="Twitter"></a>
              <a class="fab fa-youtube icon-youtube" href="#" title="youtube">     </a>
            </nav> --}}
        </div>
        <div class="dat-user">
          <h1 class="nameuser">{{$result->name}}</h1><span class="ab-text">About me</span>
          <p class="text">{{$result->bio}}.</p>
          <div class="datatype">
            <div class="row">
              <div class="col-sm-4 childbox">
                <div class="rowdata">
                  <p>Nationality</p><span>{{$result->nationality_name}}     </span>
                </div>
                <div class="rowdata">
                  <p>Ex. Years</p><span>{{$result->experience_years}} Years</span>
                </div>
                
              </div>
              <div class="col-sm-5 childbox">
                <div class="rowdata">
                  <p>Country / City</p><span>{{$result->country_of_residence_name}} / {{$result->city_of_residence_name}}    </span>
                </div>
                <div class="rowdata">
                  <p>Gender</p><span>{{$result->gender}}</span>
                </div>
              </div>
              <div class="col-sm-3 childbox">
              @if (Auth::user()->id == $result->id)
                  <a class="edit" href="{{route('members.dashboard')}}">Edit Profile</a>
              @else
                  <a class="edit"  class="bottom bo-signin" href="#" data-toggle="modal" data-title="" data-target="#signin"}}">Swap Request </a>
              @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="dasired">
        <div class="border-bot type-pro">
          <h3>Yogi Experience And Qualifications</h3>
          <div class="row">
            <div class="col datext">
@if ($result->teaching_style != '')
    <?php 
    //:::: to get user all teachning style values
    $teaching_styles=explode(',',$result->teaching_style);
    $it=0; $itt=1;
     ?>
              
    @foreach ($teaching_styles as $teaching_style)
              
                <p class="textdetals"> <span> </span>{{$teaching_style}}</p>
            <?php
             $it++; $itt++; 
             if($it == 2)
             {
                if($itt == 7)
                {
                    echo ' </div>
                          <div style="width: 100%"> </div>
                          <div class="col datext">';
                    $itt = 1;
                }
                else {
                  echo ' </div><div class="col datext">';
                }
                $it=0;
             } 
             ?>
    @endforeach
    @else
    <p class="textdetals"> <span> </span>No Experience And Qualifications</p>
@endif
             </div>
          </div>
        </div>
        
        <div class="border-bot type-pro">
          <h3>Registered Yoga Teaching (RYT)</h3>
          <div class="row">
            <div class="col datext">
@if ($result->registerd_yoga_teacher != '')
<?php 
//:::: to get user all teachning style values
$registerd_yoga_teachers=explode(',',$result->registerd_yoga_teacher);
$it2=0; $itt2=1;
  ?>
          
@foreach ($registerd_yoga_teachers as $registerd_yoga_teacher)
                        
                <p class="textdetals"> <span> </span>{{$registerd_yoga_teacher}}</p>
            <?php
              $it2++; $itt2++; 
              if($it2 == 2)
              {
                if($itt2 == 7)
                {
                    echo ' </div>
                          <div style="width: 100%"> </div>
                          <div class="col datext">';
                    $itt2 = 1;
                }
                else {
                  echo ' </div><div class="col datext">';
                }
                
                $it2=0;
              } 
              ?>
              
    @endforeach
@else
      <p class="textdetals"> <span> </span>No Registered Yoga Teaching</p>
@endif
            </div>
          </div>
        </div>
        <div class="border-bot type-pro">
          <h3>Additional qualifications</h3>
          <div class="row">
          <div class="col datext">
            {{$result->additional_qualification}}
            </div>
          </div>
        </div>
        <div class="border-bot type-pro">
          <div class="row">
            <div class="col-sm-6 childbox">
              <h3>Years of Experience</h3>
              <div class="row">
              <div class="col datext">
                {{intval($result->experience_years)}} Years
                </div>
              </div>
            </div>
            <div class="col-sm-6 childbox">
              <h3>Teaching Languages</h3>
              <div class="row">
              <div class="col datext">
                {{$result->teaching_language}} 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="teachingvideo">
        <h2 class="titlebold"> Teaching <span>Video</span></h2>
        <div class="iframe">
<?php
if(!empty($result->teaching_video))
{
  $video_v=explode('.',$result->teaching_video);
  if($video_v['1']=='mp4'){
      $video_v2=$video_v[0].'ogg';
  }else{
      $video_v2=$video_v[0].'mp4';
  }
?>
                <video style="height:350px; width:100%;" controls="" >
                  <source src="{{url('uploads/'.$result->teaching_video)}}" type="video/mp4">
                  <source src="{{url('uploads/'.$video_v2)}}" type="video/ogg">
                Your browser does not support the video tag.
                </video>
<?php }else {  echo '<h1><center> no video avilable</center></h1>';} ?>
        </div>
      </div>
      <div class="dasired">
        <div class="border-bot type-pro">
          <h2 class="titlebold"> Desired <span>Countries</span></h2>
          <div class="row">
            <div class="col datext">
              <p class="textdetals"> 
                <span> </span>
<?php 
if($result->is_anywhere_wishlist==0){
    echo ' Any Where';  
}else{
    echo $result->wishlist_country_names;
}
?>
              </p>
            </div>
          </div>
        </div>
        <div class="border-bot type-pro">
          <h2 class="titlebold"> Available  <span>Months</span></h2>
          <div class="row">
          <div class="col datext">
@if(is_null($result->wishlist_months)==0)
<?php
$wm=0; $wm1=1;
$wishlist_months=explode(',',$result->wishlist_months);
?>
@foreach ($wishlist_months as $wishlist_month)
                                    
                            <p class="textdetals"> <span> </span>{{$wishlist_month}}</p>
                        <?php
                          $wm++; $wm1++; 
                          if($wm == 2)
                          {
                            if($wm1 == 4)
                            {
                                echo ' </div>
                                      <div style="width: 100%"> </div>
                                      <div class="col datext">';
                                $itt2 = 1;
                            }
                            else {
                              echo ' </div><div class="col datext">';
                            }
                            
                            $wm=0;
                          } 
                          ?>
                          
                @endforeach
            @endif
                        </div>
        </div>
          </div>
      </div>

      <div class="certificate">
        <h2 class="titlebold"> Certificate pic / Accommodation pic</h2>
        <div class="row">
          <div class="col cert-box">
            <div class="row">
              <div class="col-sm-6 slidimg">
                <a class="thumbnail" href="{{ img_chk_exist($result->certificate_image)}}">
                  <img class="d-block w-100" src="{{ img_chk_exist($result->certificate_image)}}" alt="" style="height:200px">
                </a>
              </div>
              <div class="col-sm-6 slidimg">
                <a class="thumbnail" href="{{ img_chk_exist($result->accommo_image)}}">
                  <img class="d-block w-100" src="{{ img_chk_exist($result->accommo_image)}}" alt="" style="height:200px">
                </a>
              </div>
            </div>
          </div>
          <div class="col cert-box">
            <h3>Teaching Details</h3>
            <ul class="last-det">
            <li>Studio classes : {{$result->studio_classes}}</li>
              <li>Private clients : {{$result->private_clients}}</li>
              <li>Workshops : {{$result->workshops}}</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="dasired">
        <h2 class="titlebold"> Accommodation</h2>
        
        <div class="border-bot">
          <h3>Country/ city of residence</h3>
          <div class="row">
            <div class="col datext">
            <p class="textdetals"> <span> </span>{{$result->accommo_country_name . ' - '.$result->accommo_city_name }} </p>
            </div>
          </div>
        </div>
        <div class="border-bot">
          <h3>Accommodation Type</h3>
          <div class="row">
            <div class="col datext">
            <p class="textdetals"> <span> </span>{{$result->accommo_type}}</p>
            </div>
          </div>
        </div>
        
        <div class="border-bot">
          <h3>Amenities Type</h3>
          <div class="row">
@if ($result->amenities_type != '')
<?php 
//:::: to get user all teachning style values
$amenities_types=explode(',',$result->amenities_type);
$it=0; $itt=0;
?>
                    <div class="col datext">
@foreach ($amenities_types as $amenities_type)
                      <p class="textdetals"> <span> </span>{{$amenities_type}}</p>
    <?php
      $it++;  $itt++;
      if($it == 2)
      {
        if($itt == 6)
        {
            echo ' </div>
                  <div style="width: 100%"> </div>
                  <div class="col datext">';
            $itt = 0;
        }
        else {
          echo ' </div><div class="col datext">';
        }
        
        $it=0;
      } 
      ?>   
@endforeach
@endif
            </div>
          </div>
        </div>
        <div class="border-bot">
          <h3>Property Type</h3>
          <div class="row">
            <div class="col datext">
                <p class="textdetals"> <span> </span>
@empty($result->property_type)
    No selected 
@else
{{$result->property_type}}
@endempty
                              
                                
                 </p>
            </div>
          </div>
        </div>
      </div>
      <div class="lastblog">
        <h2 class="titlebold">Latest <span>Blogs!</span></h2>
        <div class="slid-blog">
@if (count($latest_blogs))
    @foreach ($latest_blogs as $latest_blog)
          <div class="bolgbox">
              <div class="col-sm-5 imgblog">
                <a class="imgin" href="{{route('blogs.show',[$latest_blog->id,title_2url($latest_blog->name)])}}"> 
                  <img src="{{img_chk_exist($latest_blog->img)}}" alt="{{$latest_blog->name}}" title="{{$latest_blog->name}}">
                </a>
              </div>
              <div class="col-sm-7 textblog">
              <h3>{{$latest_blog->name}}</h3>
                <div class="textany"><span class="available">By : {{$latest_blog->user_f_name.' '.$latest_blog->l_name}}  </span><span class="typetext"> On :{{date_only($latest_blog->created_at)}}</span></div>
                <nav class="hashtag"></nav>
                <p>{{$latest_blog->details}} </p>
                <a class="bot-share" href="#"><i class="fas fa-share"></i> Share</a>
                <a class="bot-more" href="{{route('blogs.show',[$latest_blog->id,title_2url($latest_blog->name)])}}"> <i class="fas fa-angle-double-right"></i> Read more</a>
              </div>
            </div>
    @endforeach
@endif
        </div>
      </div>
      {{-- <div class="resultsbox recomen">
        <h2 class="titlebold"> Recomendded for you </h2>
        <div class="itmeuser">
          <div class="imguser"><img src="{{url('site/images/itmeuser.jpg')}}" alt=""></div>
          <div class="usertext">
            <h3>Viridiana Sánchez </h3><a class="costarica" href="#" alt="">Costa Rica</a>
            <p>My journey into yoga began in 2002 when after working in the corporate world in Australia and Europe, I took a sabbatical in South Africa where I began to practice yoga every day. I completed teacher training in Ashtanga style yoga and ran my own studio before and energised. I teach in yoga studios </p>
            <div class="textany"><span class="available">Available :</span><span class="typetext">Any</span><span class="verified"> <img src="images/verified.png" alt="">  verified</span></div>
            <div class="botright"><a class="bottom" href="#" alt="">Message</a><a class="bottom" href="#" alt="">Swap Request</a></div>
          </div>
        </div>
      </div>
      <div class="lastname">
        <h2 class="titlebold">Sammer’s <span>Rating</span></h2>
 
        <div class="ratingbox"><img src="images/photo.jpg" alt="">
          <div class="ratingtext">
            <h3 class="title-rat">Viridiana Sanchez<span>  On : Thu, May, 2018</span></h3>
            <p>.</p>
          </div>
        </div>

      </div> --}}
    </div>
  </section>

  <div class="modal fade mappopup" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <button class="close" type="button" data-dismiss="modal">×</button>
          <h4 class="modal-title"><i class="fas fa-sign-in-alt"></i> Swapping Now</h4>
            <div class="error-swap"> </div>
          <form  id="swap-form" name="swap-form"  class="form-signin login-form" method="POST"  >
             @csrf
             <div class="row">
                <div class="col-md-12">
                  <div class="form-group padding-bt-10"><label>Start </label>
                    <input type="date" name="from_date" id="from_date" placeholder=" " class="form-control custom-blue-input big-input hasDatepicker   @error('email') is-invalid @enderror">
                    @error('from_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <input type="hidden" name="to_user" id="to_user" value="{{$result->id}}">
                <input type="hidden" name="country_city" id="country_city" value="{{$result->country_of_residence_name}}">
                <div class="col-md-12"><label>End </label>
                  <div class="form-group padding-bt-10">
                    <input type="date" name="to_date" id="to_date" placeholder="" class="form-control custom-blue-input big-input hasDatepicker">
                  </div>
                </div>
              </div>
            <button type="submit" class="bottom btn-swap" name="btn-swap"><i class="fas fa-sign-in-alt"></i>  Swap Now</button>
          </form>
        </div>
      </div>
    </div><!--End Header-->
    
@endsection
