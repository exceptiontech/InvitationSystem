<div>
    <style>
    li.option {
        text-align: start !important;
    }
</style>
<div>
    <section class="section-area bg-primary form-card">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 align-self-center">
                    <div class="form-head text-white mb-md-30">
                        <h3 class="title">{{__('ms_lang.Request a free consultation')}}</h3>
                        <h6 class="mb-0"><span class="fw4 me-1">{{__('ms_lang.send_to_us')}}</span></h6>
                    </div>
                </div>
                <div class="col-lg-9">
                    {{-- <form wire:submit="contact" > --}}
                    <div class="row sp5">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <input type="text" wire:model="name" class="form-control"
                                       placeholder="{{__('ms_lang.name')}}*" required/>
                                @error('name')
                                <h6 class="text-danger">{{$message}}</h6>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <input type="text" wire:model="email" class="form-control"
                                       placeholder="{{__('ms_lang.email')}}"/>
                                @error('email')
                                <h6 class="text-danger">{{$message}}</h6>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <input type="text" wire:model="phone" class="form-control"
                                       placeholder="{{__('ms_lang.phone')}}*" required/>
                                @error('phone')
                                <h6 class="text-danger">{{$message}}</h6>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 s-om">
                            <div class="form-group">
                                <select wire:model="subject" class="form-select text-center">
                                    <option value="0">{{__('ms_lang.choose your service')}}</option>
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $category )
                                            <option
                                                value="{{$category->name_en}}">
                                                {{app()->getLocale()=='ar' ? $category->name : $category->name_en}}
                                            </option>
                                        @endforeach
                                    @endif
                                    {{-- <option value="mobile applications">{{__('ms_lang.mobile applications')}}</option>
                                    <option value="Digital Marketing">{{__('ms_lang.Digital Marketing')}}</option>
                                    <option value="website hosting">{{__('ms_lang.website hosting')}}</option>
                                    <option value="website application">{{__('ms_lang.website application')}}</option> --}}

                                </select>
                                @error('subject')
                                <h6 class="text-danger">{{$message}}</h6>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <input type="text" wire:model="message" class="form-control"
                                       placeholder="{{__('ms_lang.message description')}}"/>
                                @error('message')
                                <h6 class="text-danger">{{$message}}</h6>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <button wire:click="contact"
                                        class="theme-btn btn-style-one hvr-dark w-100">{{__('ms_lang.btn_send')}}</button>
                                {{-- wire:click="contact" --}}
                            </div>
                        </div>
                        @if (! is_null($success))
                            <div class="text-center">
                                <div class="alert alert-success">{{$success}}</div>
                            </div>
                        @endif
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </section>
</div>
</div>
