


  <!-- Start Form-Contact-->
<form wire:submit.prevent="store_offer">
@csrf
  <div class="form-contact">
  @include('includes.messages')
    <div class="overlay">
    @if (isset($results))
      <div class="head">
        <h3 class="text-center">{{ $results->name }} </h3>
      </div>
      <div class="container wow jackInTheBox" data-wow-duration="1500ms">
        <div class="row pt-5">
          <small class="text-white text-center">
          {{ $results->details }}
          </small>
          @endif


      <form wire:submit.prevent="store_offer">
          <div class="col-md-6">
            <div class="input-box">
              <input type="text" name="name" id="name" placeholder="{{__('ms_lang.name_t')}}" class="" required="required" />
              <span>{{__('ms_lang.name_t')}}</span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-box">
              <input type="email" class="" name="email" id="email" placeholder="{{__('ms_lang.email')}}" required="required" />
              <span>{{__('ms_lang.email')}} </span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-box">
              <input type="text" name="phone" id="date" placeholder="{{__('ms_lang.mobile')}}" class="" required="required" />
              <span>{{__('ms_lang.mobile')}}</span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-box">
              <select class="form-select" name="department" id="department" aria-label="Default select example">
                <option value="">{{app()->getLocale()=='ar' ? 'اختر الخدمه' : 'Select services' }} </option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}"> {{app()->getLocale()=='ar' ? $category->name : $category->name_en }}</option>
              @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-12 my-3">
            <div class="input-box">
              <textarea class="" name="message" rows="5" placeholder="{{__('ms_lang.message')}}" required="required"></textarea>
              <span>{{__('ms_lang.message')}}</span>
            </div>
          </div>
        </div>
        <div class="btn">
        <button class="appointment-btn scrollto">{{__('ms_lang.btn_send')}}</button>
        </div>
      </div>
    </div>
  </div>
  </form>

  <!--End Form-Contact-->
