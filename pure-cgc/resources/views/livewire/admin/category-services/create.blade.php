
{!! Form::open(['url' => '', 'enctype' => 'multipart/form-data','wire:submit.prevent'=>'store']) !!}
<div class="col-md-6 offset-3" >
    @include('includes.messages')
</div>
    <div class="card-body col-md-8 offset-2">
        <div class="form-group row">

        </div>
        <div class="form-group row">
            <div class="form-group col-md-6">
                {!! Form::label('name', __('ms_lang.name_t'), []) !!}
                {!! Form::text('name', '', ['wire:model.lazy'=>'name','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('name_en', __('ms_lang.name_en_t'), []) !!}
                {!! Form::text('name_en', '', ['wire:model.lazy'=>'name_en','class'=>"form-control"]) !!}
            </div>
           
            <div class="form-group col-md-6">
                {!! Form::label('logo', __('ms_lang.logo'), []) !!}
                {!! Form::file('profile_photo_path', ['wire:model'=>'logo','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('img', __('ms_lang.img_t'), []) !!}
                {!! Form::file('profile_photo_path', ['wire:model'=>'profile_photo_path','class'=>"form-control"]) !!}
            </div>
             <div class="form-group col-md-12 ">
                {!! Form::label('url', __('ms_lang.url_link_t'), []) !!}
                {!! Form::text('url', '', ['wire:model.lazy'=>'url','class'=>"form-control editor1"]) !!}
            </div>
            
            
        </div>
        <div class="box-footer">
            {!! Form::submit(__('ms_lang.btn_save'), ['class'=>"btn btn-info pull-center"]) !!}
            <button type="reset"  class="btn btn-default">{{ __('ms_lang.btn_reset') }}</button>
        </div>
    </div>
{!! Form::close() !!}

