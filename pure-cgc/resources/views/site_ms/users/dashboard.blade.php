@extends('site_ms.layouts.app',['user_dashboard'=>1])

@section('content')
    <!-- Services Section -->
    <script>
        var url = "{{route('eara.get_cities')}}";
</script>
@include('site_ms.layouts.ajax_requests')
<div class="clearfix">&nbsp; </div>
@include('includes.messages')
<link href="{{url('admin/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{url('site/js/bootstrap-multiselect.js')}}"></script>
<section class="dashboard"> 
        <div class="container">
          <div class="dashdetals">
            <h1 class="titlebold">User  <span>Dashboard</span></h1>
            <div class="step-app">
              <ul class="row step-steps"> 
                <li class="col"> <a href="#about">About</a></li>
                <li class="col"> <a href="#experience">Experience</a></li>
                <li class="col"> <a href="#teachingdetails">Teaching details</a></li>
                <li class="col"> <a href="#accommodation">Accommodation</a></li>
                <li class="col"> <a href="#wishlist">Wishlist</a></li>
                <li class="col"> <a href="#privacy">Privacy</a></li>
              </ul>
            <form class="step-content" action="{{route('members.update','profile')}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')  
              <div class="step-tab-panel" id="about">
                  <div class="file-stab1">
                    <h2>About</h2>
                    <div class="row">
                      <div class="col-sm-4 inpusrach">
                      <input name="name" value="{{$result->name}}" class="form-control" type="text" placeholder="first name" required>
                      </div>
                      <div class="col-sm-4 inpusrach">
                        <input name="l_name" value="{{$result->l_name}}" class="form-control" type="text" placeholder="Last Name" >
                      </div>
                      <div class="col-sm-4 inpusrach">
                        <input value="{{$result->email}}" class="form-control" type="email" placeholder="Email" readonly>
                      </div>
                    </div>
                  </div>
@if ($result->user_type != 1)
                  <div class="file-stab1">
                    <h2>Date of birth</h2>
                    <div class="row">
                      <div class="col-sm-6 inpusrach">
                        <div class="row">
                          <div class="col-sm-3 inergender gend">
                            <label class="titleform">Gender <em>*</em></label>
                          </div>
                          <div class="col-sm-4 inergender gend">
                            <label class="che-box">
                              <input type="radio" name="gender"  value="male" @if ($result->gender == 'male') checked="" @endif ><span class="label-text">Male </span>
                            </label>
                          </div>
                          <div class="col-sm-5 inergender gend">
                            <label class="che-box">
                              <input type="radio" name="gender"  value="female" @if ($result->gender == 'female') checked="" @endif><span class="label-text">Female </span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6 inpusrach">
                        <div class="row">
                          <div class="col-sm-4 inergender cant">
                            <label class="titleform">Date of birth  <em>*</em></label>
                          </div>
                          <div class="col-sm-8 inergender cant">
                              <input name="date_birth" value="{{$result->date_birth}}" class="form-control" type="date" placeholder="date birth " >
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
@endif

{{-- 
                        <div class="col-sm-8 inpusrach">
                          <div class="row">
                            <div class="col-sm-3 inergender cant">
                              <label class="titleform">Date of birth  <em>*</em></label>
                            </div>
                            <div class="col-sm-3 inergender cant">
                              <select name="date_birth_y" class="form-control" required>
                                <option>Year </option>
  @for ($year = date('Y')-10; $year >1960 ; $year--)
                              <option value="{{$year}}" @if ($year == date_get_1col($result->date_birth,'y'))selected="" @endif>{{$year}}</option>
  @endfor
                              </select>
                            </div>
                            <div class="col-sm-3 inergender cant">
                                <select name="date_birth_m" class="form-control" required>
                                    <option>Month </option>
      @for ($month = 12; $month >=1 ; $month--)
                                  <option value="{{$month}}" @if ($month == date_get_1col($result->date_birth,'m'))selected="" @endif>{{$month}}</option>
      @endfor
                                  </select>
                            </div>
                            <div class="col-sm-3 inergender cant">
                                <select name="date_birth_y" class="form-control" required>
                                    <option>Day </option>
      @for ($day = 31; $day >=1 ; $day--)
                                  <option value="{{$day}}" @if ($day == date_get_1col($result->date_birth,'d'))selected="" @endif>{{$day}}</option>
      @endfor
                                  </select>
                            </div>
                          </div>
                        </div> --}}
   
                  <div class="file-stab1">
                    <div class="row">
@if ($result->user_type == 1)
                      <div class="col-sm-4 inpusrach cantbox">
                        <div class="row">
                          <div class="col-sm-5 inergender">
                            <label class="titleform">Number Of branches <em></em></label>
                          </div>
                          <div class="col-sm-7 inergender">
                              <input name="num_of_branches" value="{{$result->num_of_branches}}" class="form-control" min="0" max="5" type="number" placeholder="Please Add Num of branches">
                          </div>
                        </div>
                      </div>
                      
@else
                      <div class="col-sm-4 inpusrach cantbox">
                        <div class="row">
                          <div class="col-sm-5 inergender">
                            <label class="titleform">Nationality <em>*</em></label>
                          </div>
                          <div class="col-sm-7 inergender">
                            <select name="nationality" class="form-control">
                              <option>select nationality </option>
                      @foreach ($countries as $nationality)
                              <option value="{{$nationality->id}}" @if ($nationality->id == $result->nationality) selected="" @endif >{{$nationality->name}}</option>
                      @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
@endif
                      <div class="col-sm-4 inpusrach cantbox">
                        <div class="row">
                          <div class="col-sm-5 inergender">
                            <label class="titleform">Country residence <em>*</em></label>
                          </div>
                          <div class="col-sm-7 inergender">
                            <select name="country_of_residence" class="form-control  request_ajax_ms1" required>
                              <option>select country </option>
@foreach ($countries as $country)
                            <option value="{{$country->id}}" @if ($country->id == $result->country_of_residence) selected="" @endif >{{$country->name}}</option>
@endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 inpusrach cantbox">
                        <div class="row">
                          <div class="col-sm-4 inergender">
                            <label class="titleform">City of residence <em>*</em></label>
                          </div>
                          <div class="col-sm-8 inergender">
                              <select name="city_of_residence" class="form-control response_ajax_ms1" >
                                  <option>select city </option>
    @foreach ($cities as $city)
                                <option value="{{$city->id}}" @if ($city->id == $result->city_of_residence) selected="" @endif >{{$city->name}}</option>
    @endforeach
                                </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
@if ($result->user_type == 1)
                  <div class="file-stab1">
                    <div class="row">
                      <div class="col-sm-2 inergender socialbox">
                        <label class="titleform">Social media 
                          <!--em *-->
                        </label>
                      </div>
                      <div class="col-sm-10 inergender socialfild">
                        <div class="row">
                          <div class="col-sm-3 posicon"><i class="fab fa-facebook-f icon-facebook"></i>
                            <input name="facebook" value="{{$result->facebook}}"  class="form-control" type="text" placeholder="https://www.facebook.com/">
                          </div>
                          <div class="col-sm-3 posicon"><i class="fab fa-instagram icon-instagram"></i>
                            <input name="instagram" value="{{$result->instagram}}" class="form-control" type="text" placeholder="https://www.instagram.com/">
                          </div>
                          <div class="col-sm-3 posicon"><i class="fab fa-twitter icon-twitter"></i>
                            <input name="twitter" value="{{$result->twitter}}" class="form-control" type="text" placeholder="https://www.twitter.com/">
                          </div>
                          <div class="col-sm-3 posicon"><i class="fab fa-youtube icon-youtube"></i>
                            <input name="youtube" value="{{$result->youtube}}" class="form-control" type="text" placeholder="https://www.youtube.com/">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
@endif
                  <div class="file-stab1">
                    <div class="row">
                      <div class="col-sm-8 inergender textarea">
                        <div class="row">
                          <div class="col-sm-2 inergender">
                            <label class="titleform">Description
                              <!--em *-->
                            </label>
                          </div>
                          <div class="col-sm-10 inergender">
                            <textarea name="bio" class="form-control" placeholder="Tell us a bit about yourself">{{$result->bio}}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 inergender textarea">
                        <div class="row">
                          <div class="col-sm-6 inergender phot">
                            <label class="titleform">Profile Picture
                              <!--em *-->
                            </label>
                          </div>
                          <div class="col-sm-6 inergender phot">
                            <div class="wrap-custom-file">
                              <input type="file" name="img" id="image1" accept=".gif, .jpg, .png">
                            <label for="image1" style="background-image: url('{{img_chk_exist($result->img)}}');"><span> Choose File</span></label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
      <!----------------------------------------\\\\\ div mso //////--------------------------------------->
                <div class="step-tab-panel" id="experience"> 
                  <div class="file-stab1 mertow">
                    <h2>Teaching Styles</h2>
                    <div class="row">
                      <div class="col-md-12 inergender teach">
<?php
$teaching_stl=explode(',', $result->teaching_style);
?>
@if (count($teaching_styles))
    @foreach ($teaching_styles as $teaching_style)
        <label class="col-sm-3 che-box">
          <input type="checkbox" name="teaching_style[]" value="{{$teaching_style->name}}" @if (in_array($teaching_style->name,$teaching_stl)) checked="" @endif><span class="label-text">{{$teaching_style->name}} </span>
        </label>
    @endforeach
@else
    <h1>No teaching styles</h1>
@endif
                        

                      </div>
                    </div>
                  </div>
                  <div class="file-stab1 mertow">
                    <h2> Registered Yoga Teacher (RYT)</h2>
                    <div class="row">
                      <div class="col-sm-12 inergender teach">
<?php
$regs_yoga_teach=explode(',', $result->registerd_yoga_teacher);
?>
@if (count($regs_yoga_teachers))
    @foreach ($regs_yoga_teachers as $regs_yoga_teacher)
        <label class="col-sm-3 che-box">
          <input type="checkbox" name="registerd_yoga_teacher[]" value="{{$regs_yoga_teacher->name}}" @if (in_array($regs_yoga_teacher->name,$regs_yoga_teach)) checked="" @endif><span class="label-text">{{$regs_yoga_teacher->name}} </span>
        </label>
    @endforeach
@else
    <h1>No teaching styles</h1>
@endif
                      </div>
                    </div>
                  </div>
                  <div class="file-stab1">
                    <h2>Additional qualifications</h2>
                    <div class="row">
                      <div class="col-sm-12 inpusrach">
                      <input name="additional_qualification" value="{{$result->additional_qualification}}" class="form-control" type="text" placeholder="Please Add Additional qualifications">
                      </div>
                    </div>
                  </div>
                  <div class="file-stab1">
                    <h2>Years of Experience</h2>
                    <div class="row">
                      <div class="col-sm-12 inpusrach">
                          <input name="experience_years" value="{{$result->experience_years}}" class="form-control" min="0" max="80" type="number" placeholder="Please Add Years of Experience">
                      </div>
                    </div>
                  </div>
                  <div class="file-stab1 nomerg">
                    <div class="row">
                      <div class="col-sm-6 inpusrach">
                        <h2>Teaching Video</h2>
                        <div class="custom-file">
                          <input name="teaching_video" class="custom-file-input" type="file" id="customFile" accept="video/mp4,video/x-m4v,video/*">
                          <label class="custom-file-label" for="customFile">No file chosen</label>
                        </div><span>Accepted File Types: avi - ogg</span><span>Maximum File Size: 2 Megabytes</span>
                        @if (!empty($result->teaching_video))
                          <video style="width: 170px;height: 120px;border-radius: 15px;"  controls="" >
                            <source src="{{url('uploads/'.$result->teaching_video)}}" type="video/mp4">
                            <source src="{{url('uploads/'.$result->teaching_video)}}" type="video/ogg">
                          Your browser does not support the video tag.
                          </video>
                          @endif
                      </div>
                      <div class="col-sm-6 inpusrach">
                        <h2>Upload Certificates</h2>
                        <div class="custom-file">
                          <input name="certificate_image" class="custom-file-input" type="file" id="customFile" accept="image/*">
                          <label class="custom-file-label" for="customFile">No file chosen</label><span>Accepted File Types: PNG / JPG</span><span>Maximum File Size: 2 Megabytes</span>
                        </div>
                        @if (!empty($result->certificate_image))
                        <img src="{{ img_chk_exist($result->certificate_image)}}" style="width: 170px;height: 120px;border-radius: 15px;" />
                          @endif
                      </div>
                    </div>
                  </div>
                </div>
      <!----------------------------------------\\\\\ div mso //////--------------------------------------->
                <div class="step-tab-panel" id="teachingdetails"> 
                  <div class="file-stab1">
                    <div class="row">
                        <div class="col-sm-3 inpusrach witrspon">
                            Teaching Languages 
                        </div>
                      <div class="col-sm-9 inpusrach witrspon">
                        <!-- Build your select: -->
<?php
$teaching_lang=explode(',', $result->teaching_language);
?>
                    <select name="teaching_language[]"  class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select here" style="width: 100%!important;" tabindex="-1" aria-hidden="true">

@if (count($teaching_languages))
    @foreach ($teaching_languages as $teaching_language)
        <option value="{{$teaching_language->name}}" @if (in_array($teaching_language->name,$teaching_lang)) selected="" @endif >{{$teaching_language->name}} </option>
    @endforeach
@else
    <option value="">No teaching Longuages</option>
@endif
                    </select>

                        
                      
                    </div>
                  </div>

                  <div class="file-stab1">
                    <h2>Your Current teaching details</h2>
                    <div class="row">
                      <div class="col-sm-2 inergender studio">
                        <label class="titleform">Studio classes
                          <!--em *-->
                        </label>
                      </div>
                      <div class="col-sm-1 inergender studio">
                        <label class="che-box">
                          <input type="checkbox" name="radio" class="mso_enable_disable" @if(!empty($result->studio_classes)) checked @endif><span class="label-text">Yes </span>
                        </label>
                      </div>
                      <div class="col-sm-9 inpusrach studioinp">
                      <input name="studio_classes" value="{{$result->studio_classes}}" class="form-control mso_enable_disable_action" type="number" min="0" placeholder="Total number of hours per week" @if(empty($result->studio_classes)) disabled @endif>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-2 inergender studio">
                        <label class="titleform">Private clients
                          <!--em *-->
                        </label>
                      </div>
                      <div class="col-sm-1 inergender studio">
                        <label class="che-box">
                          <input type="checkbox" name="radio" class="mso_enable_disable" @if(!empty($result->private_clients)) checked @endif><span class="label-text">Yes </span>
                        </label>
                      </div>
                      <div class="col-sm-9 inpusrach studioinp">
                        <input name="private_clients" value="{{$result->private_clients}}" class="form-control mso_enable_disable_action" type="number" min="0" placeholder="Total number of hours per week"  @if(empty($result->private_clients)) disabled @endif>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-2 inergender studio">
                        <label class="titleform">Workshops
                          <!--em *-->
                        </label>
                      </div>
                      <div class="col-sm-1 inergender studio">
                        <label class="che-box">
                          <input type="checkbox" name="radio" class="mso_enable_disable"  @if(!empty($result->workshops)) checked @endif><span class="label-text">Yes </span>
                        </label>
                      </div>
                      <div class="col-sm-9 inpusrach studioinp">
                        <input name="workshops" value="{{$result->workshops}}" class="form-control mso_enable_disable_action" min="0" type="number" placeholder="Total number of hours per week"  @if(empty($result->workshops)) disabled @endif>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
      <!----------------------------------------\\\\\ div mso //////--------------------------------------->
                <div class="step-tab-panel" id="accommodation"> 
                  <div class="file-stab1">
                    <h2>Accommodation</h2>
                    <div class="row">
                      <div class="col-sm-4 inpusrach exchange wittext">
                        <label>Do you wish to exchange your accommodation: 
                          <!--em * -->
                        </label>
                      </div>
                      <div class="col-sm-2 inergender exchange">
                        <label class="che-box">
                          <input type="radio" name="accommodation_exchange" value="1" class="mso_show_yes" checked><span class="label-text">Yes </span>
                        </label>
                      </div>
                      <div class="col-sm-2 inergender exchange">
                        <label class="che-box">
                          <input type="radio" name="accommodation_exchange" value="0" class="mso_show_no"><span class="label-text">No </span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="mso_show_action" >
                  <div class="file-stab1 mergno ">
                    <div class="row">
                      <div class="col-sm-5 inpusrach cantbox">
                        <div class="row">
                          <div class="col-sm-6 inergender">
                            <label class="titleform">Country of residence <em>*</em></label>
                          </div>
                          <div class="col-sm-6 inergender">
                                <select name="accommo_country" class="form-control  request_ajax_ms3" required>
                                    <option>select country </option>
      @foreach ($countries as $country)
                                  <option value="{{$country->id}}" @if ($country->id == $result->accommo_country) selected="" @endif >{{$country->name}}</option>
      @endforeach
                                  </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5 inpusrach cantbox">
                        <div class="row">
                          <div class="col-sm-6 inergender">
                            <label class="titleform">City / State <em></em></label>
                          </div>
                          <div class="col-sm-6 inergender">
                              <select name="accommo_city" class="form-control response_ajax_ms3" >
                                  <option value="">select city </option>
    @foreach ($cities_accommo as $city_accommo)
                                <option value="{{$city_accommo->id}}" @if ($city_accommo->id == $result->accommo_city) selected="" @endif >{{$city_accommo->name}}</option>
    @endforeach
                                </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="file-stab1 mertow">
                    <h2>Accommodation Type</h2>
                    <div class="row">
                      <div class="col-sm-4 inergender teach">
                        <label class="che-box">
                          <input type="radio" name="accommo_type" value="Entire Home/Apt" @if($result->accommo_type == 'Entire Home/Apt') checked @endif><span class="label-text">Entire Home/Apt </span>
                        </label>
                      </div>
                      <div class="col-sm-4 inergender teach">
                        <label class="che-box">
                          <input type="radio" name="accommo_type" value="Private Room" @if($result->accommo_type == 'Private Room') checked @endif><span class="label-text">Private Room</span>
                        </label>
                      </div>
                      <div class="col-sm-4 inergender teach">
                        <label class="che-box">
                          <input type="radio" name="accommo_type" value="Shared Room" @if($result->accommo_type == 'Shared Room') checked @endif><span class="label-text">Shared Room</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="file-stab1 mertow">
                    <h2>Amenities Type</h2>
                    <div class="row">
                      <div class="col-sm-12 inergender teach">
<?php
$amenities_t=explode(',', $result->amenities_type);
?>
@if (count($available_amenities))
    @foreach ($available_amenities as $available_amenitie)
        <label class="col-sm-3 che-box">
          <input type="checkbox" name="amenities_type[]" value="{{$available_amenitie->name}}" @if (in_array($available_amenitie->name,$amenities_t)) checked="" @endif><span class="label-text">{{$available_amenitie->name}} </span>
        </label>
    @endforeach
@else
    <h1>No teaching styles</h1>
@endif
                        
                      </div>
                      
                    </div>
                  </div>
                  <div class="file-stab1 mertow">
                    <h2>Property Type </h2>
                    <div class="row">
                      <div class="col-sm-4 inergender teach">
                        <label class="che-box">
                          <input type="radio" name="property_type" value="Apartment"  @if($result->property_type == 'Apartment') checked @endif><span class="label-text">Apartment</span>
                        </label>
                        <label class="che-box">
                          <input type="radio" name="property_type" value="House"  @if($result->property_type == 'House') checked @endif><span class="label-text">House</span>
                        </label>
                      </div>
                      <div class="col-sm-4 inergender teach">
                        <label class="che-box">
                          <input type="radio" name="property_type" value="Boat"  @if($result->property_type == 'Boat') checked @endif><span class="label-text">Boat</span>
                        </label>
                        <label class="che-box">
                          <input type="radio" name="property_type" value="Other"  @if($result->property_type == 'Other') checked @endif><span class="label-text">Other</span>
                        </label>
                      </div>
                      <div class="col-sm-4 inergender teach">
                        <label class="che-box">
                          <input type="radio" name="property_type"  value="Chalet" @if($result->property_type == 'Chalet') checked @endif><span class="label-text">Chalet</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="file-stab1 nomerg">
                    <div class="row">
                      <div class="col-sm-6 inpusrach">
                        <h2>Accommodation pics</h2>
                        <div class="custom-file">
                          <input class="custom-file-input" name="accommo_image" type="file" id="customFile" accept="image/*">
                          <label class="custom-file-label" for="customFile">No file chosen</label><span>Accepted File Types: PNG / JPG</span><span>Maximum File Size: 2 Megabytes   </span>
                        </div>
                      </div>
                      <div class="col-sm-6 inpusrach">
                        <p class="textdidn">
                          @if ($result->accommo_image)
                        <img src="{{ img_chk_exist($result->accommo_image)}}" style="width: 170px;height: 120px;border-radius: 15px;" />
                          @else
                              <span>{{$result->name}}</span> You didn't add any images yet.
                          @endif
                                  
                        </p>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>

                <!----------------------------------------\\\\\ div mso //////--------------------------------------->
                <div class="step-tab-panel" id="wishlist"> 
                  <div class="file-stab1">
                    <h2>Wishlist</h2>
                    <p>Add your desired swap locations here so that your profile becomes visible to yoga teachers in these destinations. List as many places as possible to increase your chances of getting a swap or select “swap anywhere” and find a match wherever one is available.</p>
                    <div class="row">
                      <div class="col-sm-4 inpusrach exchange wittext">
                        <label>Swap Anywhere: 
                          <!--em * -->
                        </label>
                      </div>
                      <div class="col-sm-2 inergender exchange">
                        <label class="che-box">
                          <input type="radio" name="is_anywhere_wishlist" value="1" class="mso_show_yes1" checked><span class="label-text">Yes </span>
                        </label>
                      </div>
                      <div class="col-sm-2 inergender exchange">
                        <label class="che-box">
                          <input type="radio" name="is_anywhere_wishlist" value="0" class="mso_show_no1"><span class="label-text">No </span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="mso_show_action1" >
                  <div class="file-stab1 mergno ">
                    <div class="row">
                      <div class="col-sm-12 inpusrach cantbox">
                        <div class="row">
                          <div class="col-sm-2 inergender">
                            <label class="titleform">Desired Country <em>*</em></label>
                          </div>
                          <div class="col-sm-10 inergender">
<?php
$wishlist_countries=explode(',',$result->wishlist_country);
?>
                                <select name="wishlist_country[]"   class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select here" style="width: 100%!important;padding:20px" tabindex="-1" aria-hidden="true">
                                    <option>select country </option>
      @foreach ($countries as $country)
                                  <option value="{{$country->id}}" @if (in_array($country->id, $wishlist_countries)) selected="" @endif >{{$country->name}}</option>
      @endforeach
                                  </select>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <div class="file-stab1 mertow">
                    <h2>Available Months</h2>
                    <div class="row">
                      <div class="col-md-12 inergender teach">
<?php
$wishlist_months_ar=explode(',', $result->wishlist_months);
?>
                        <label class="col-sm-3 che-box">
                          <input type="checkbox"  name="wishlist_months[]" value="any" @if (in_array('any',$wishlist_months_ar)) checked="" @endif><span class="label-text">any </span>
                        </label>
                        <label class="col-sm-3 che-box">
                          <input type="checkbox" name="wishlist_months[]" value="January" @if (in_array('January',$wishlist_months_ar)) checked="" @endif><span class="label-text">January </span>
                        </label>
                        <label class="col-sm-3 che-box">
                          <input type="checkbox" name="wishlist_months[]" value="February" @if (in_array('February',$wishlist_months_ar)) checked="" @endif><span class="label-text">February </span>
                        </label>
                        <label class="col-sm-3 che-box">
                          <input type="checkbox" name="wishlist_months[]" value="March" @if (in_array('March',$wishlist_months_ar)) checked="" @endif><span class="label-text">March </span>
                        </label>
                        <label class="col-sm-3 che-box">
                          <input type="checkbox" name="wishlist_months[]" value="April"  @if (in_array('April',$wishlist_months_ar)) checked="" @endif><span class="label-text">April </span>
                        </label>
                        <label class="col-sm-3 che-box">
                          <input type="checkbox" name="wishlist_months[]" value="May"  @if (in_array('May',$wishlist_months_ar)) checked="" @endif><span class="label-text">May </span>
                        </label>
                        <label class="col-sm-3 che-box">
                          <input type="checkbox" name="wishlist_months[]" value="June"  @if (in_array('June',$wishlist_months_ar)) checked="" @endif><span class="label-text">June </span>
                        </label>
                        <label class="col-sm-3 che-box">
                          <input type="checkbox" name="wishlist_months[]" value="July"  @if (in_array('July',$wishlist_months_ar)) checked="" @endif><span class="label-text">July </span>
                        </label>
                        <label class="col-sm-3 che-box">
                          <input type="checkbox" name="wishlist_months[]" value="August"  @if (in_array('August',$wishlist_months_ar)) checked="" @endif><span class="label-text">August</span>
                        </label>
                        <label class="col-sm-3 che-box">
                          <input type="checkbox" name="wishlist_months[]" value="September"  @if (in_array('September',$wishlist_months_ar)) checked="" @endif><span class="label-text">September </span>
                        </label>
                        <label class="col-sm-3 che-box">
                          <input type="checkbox" name="wishlist_months[]" value="October"  @if (in_array('October',$wishlist_months_ar)) checked="" @endif><span class="label-text">October </span>
                        </label>
                        <label class="col-sm-3 che-box">
                          <input type="checkbox" name="wishlist_months[]" value="November"  @if (in_array('November',$wishlist_months_ar)) checked="" @endif><span class="label-text">November </span>
                        </label>
                        <label class="col-sm-3 che-box">
                          <input type="checkbox" name="wishlist_months[]" value="December"  @if (in_array('December',$wishlist_months_ar)) checked="" @endif><span class="label-text">December </span>
                        </label>
                        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
      <!----------------------------------------\\\\\ div mso //////--------------------------------------->
                <div class="step-tab-panel" id="privacy"> 
                  <div class="file-stab1">
                    <h2>Privacy</h2>
                    <p class="textpriv">Control your privacy settings and manage the visibility of your information. If you have questions or concerns,<br/>reach out to <a href="mailTo:hello@yogiswap.com">hello@yogiswap.com</a></p>
                    <div class="row">
                      <div class="col inergender teach pritme">
                        <label class="che-box">
                          <input type="checkbox" name="allow_gallery_comment" value="1" @if($result->allow_gallery_comment == '1') checked @endif><span class="label-text">Allow comments on my Gallery pictures</span>
                        </label>
                        <label class="che-box">
                          <input type="checkbox" name="allow_blog_comment"  value="1" @if($result->allow_blog_comment == '1') checked @endif><span class="label-text"> Allow comments on my Blog posts</span>
                        </label>
                        <label class="che-box">
                          <input type="checkbox" name="allow_board_search" value="1" @if($result->allow_board_search == '1') checked @endif><span class="label-text">  Allow me to appear on the swapping board search results</span>
                        </label>
                        <label class="che-box">
                          <input type="checkbox" name="allow_board_search_wishlist" value="1" @if($result->allow_board_search_wishlist == '1') checked @endif><span class="label-text">  Allow me to appear in the swapping board search results based on my wishlist only</span>
                        </label>
                        <label class="che-box">
                          <input type="checkbox" name="allow_tribe_search" value="1" @if($result->allow_tribe_search == '1') checked @endif><span class="label-text">  Allow me to appear in the YogiSwap Tribe search results</span>
                        </label>
                        <label class="che-box">
                          <input type="checkbox" name="allow_private_message" value="1" @if($result->allow_private_message == '1') checked @endif><span class="label-text">   Allow other members to private message me (note we will never share your personal email)</span>
                        </label>
                        <label class="che-box">
                          <input type="checkbox" name="allow_email_notification" value="1" @if($result->propeallow_email_notificationrty_type == '1') checked @endif><span class="label-text"> Send me e-mail notifications every time I receive a private message</span>
                        </label>
                        <label class="che-box">
                          <input type="checkbox" name="notify_swap_request" value="1" @if($result->notify_swap_request == '1') checked @endif><span class="label-text">Notify me when I receive a swap request.</span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="step-footer">
                  <button class="step-btn previous" data-direction="prev"><i class="fas fa-chevron-left"></i> <span>Previous</span></button>
                  <input type="submit" class="apply" value="Apply" />
                  <button class="step-btn next" data-direction="next"><span>Next</span>  <i class="fas fa-chevron-right"></i> </button>
                  <!--button(data-direction="finish" class="step-btn") Finish -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <script>
          // active input
          $(document).ready(function(){
          
          $('.mso_enable_disable').change(function() {
              // this will contain a reference to the checkbox
              if (this.checked) {
                  $('.mso_enable_disable_action').removeAttr("disabled") ;
              } else {
          
                    $('.mso_enable_disable_action').attr("disabled", true);
              }
          });
          // accommodation
      
        $(".mso_show_yes").click(function(){
            $(".mso_show_action").fadeIn();
        });
        $(".mso_show_no").click(function(){
            $(".mso_show_action").slideUp();
        });

        $(".mso_show_yes1").click(function(){
            $(".mso_show_action1").fadeIn();
        });
        $(".mso_show_no1").click(function(){
            $(".mso_show_action1").slideUp();
        });
      
          });
      </script>
<!-- Select2 -->
<script src="{{url('admin/bower_components/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
 <script type="text/javascript">
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
    });
</script>
@endsection
