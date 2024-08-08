<div>
    <div class="page-content bg-white">
			
			
			
        <div class="page-content bg-white">
            <!-- Inner Banner -->
            <div class="page-banner ovbl-dark" style="background-image:url(new/images/back01.jpg);">
                <div class="container">
                    <div class="page-banner-entry text-center">
                        <h1><span>{{__('ms_lang.subscribe_maillist')}}</span></h1>
                        <!-- Breadcrumb row -->
                        <nav aria-label="breadcrumb" class="breadcrumb-row">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home_home')}}"><i class="las la-home"></i>{{__('ms_lang.home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('ms_lang.Subscribe Now')}}</li>
                            </ul>
                        </nav>
                        <!-- Breadcrumb row END -->
                    </div>
                </div>
            </div>
            <!-- Inner Banner -->
                
                
                
                
    
                <section class="indes-content">
    <div class="container">
    
    
    
    
    
    
    
    
    
    
    
    
    
    <div class="">
        <div class="container">
    
    
    
    <div class="row gy-30">
    
    
            <div class="row no-gutters m-0">
                <div class="col-xl-5">
                    <div class="appointment-img2">
                        <img src="{{asset('new/images/contact.png')}}" alt="">
                        <div class="as-experience style2">
                        <img src="{{asset('new/images/wlogo.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 appointment-form-wrap">
    
                    {{-- <form  class="appointment-form ajax-contact"> --}}
                      <div class="appointment-form ajax-contact">
                        <div class="row">
                            <div class="form-group col-md-6"><input type="text" class="form-control" wire:model="name"  placeholder="{{__('ms_lang.name')}}"> <i class="fal fa-user"></i></div>
                            @error('name')
                              <h6 class="text-danger">{{$message}}</h6>
                            @enderror
    
                            <div class="form-group col-md-6"><input type="text" class="form-control" wire:model="mobile" placeholder="{{__('ms_lang.phone')}}"> <i class="fal fa-phone"></i></div>
    
                            @error('phone')
                            <h6 class="text-danger">{{$message}}</h6>
                          @enderror
                            {{-- <div class="form-group col-md-6"><input type="text" class="form-control" name="companyname" placeholder="{{__('ms_lang.company name')}}"> <i class="fal fa-file-alt"></i></div> --}}
    
    
                            <div class="form-group col-md-6"><input type="text" class="form-control" wire:model="email"  placeholder="{{__('ms_lang.email')}}"> <i class="fal fa-envelope"></i></div>
    
                            @error('email')
                            <h6 class="text-danger">{{$message}}</h6>
                          @enderror



                    
                       <div class="form-group col-6">                               
                            <select wire:model="subject"  class="form-select" >
                              <option value=""> --- {{__('ms_lang.choose your service')}} ---</option>
                              @foreach ($categories as $cat )                                  
                              <option value="{{$cat->name_en}}">{{app()->getLocale()=='en' ? $cat->name_en : $cat->name}}</option>
                               @endforeach
                              <option value="other">{{__('ms_lang.other')}}</option>
                            </select>
                          </div>
                          @error('subject')
                          <h6 class="text-danger">{{$message}}</h6>
                        @enderror





                        @if ($this->subject == 'other')
                        <div class="form-group col-6">                               
                        <input class="form-control" placeholder="{{__('ms_lang.subject')}}" type="text" wire:model="subject_details">
                        </div>
                        @endif







    
                            <div class="form-group col-md-12"><textarea wire:model="message"  cols="30" rows="3" class="form-control" placeholder="{{__('ms_lang.message')}}"></textarea> <i class="fal fa-comment"></i></div>
                    
                            @error('message')
                            <h6 class="text-danger">{{$message}}</h6>
                          @enderror
    <div class="row">
                            <div class=" col-md-6 form-btn form-group mt-10"><button wire:click="contact" class="theme-btn btn-style-one hvr-dark">{{__('ms_lang.btn_send')}}</button></div>
                            <div class=" col-md-6 form-btn form-group mt-10"><a target="_blank" href="https://api.whatsapp.com/send?phone=0201551451595" class="theme-btn btn-style-one hvr-dark">{{__('ms_lang.contact_via_whatsapp')}}</a></div>
                        </div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    {{-- </form> --}}
                </div>
             
    
    
            </div>
        </div>
    </div></div></section>
                
                
                
    
                </div>
</div>


