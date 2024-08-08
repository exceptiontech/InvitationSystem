
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
           
            <div class="form-group col-md-12 ">
                {!! Form::label('details', __('ms_lang.details_t'), []) !!}
                {!! Form::textarea('details', '', ['wire:model.lazy'=>'details','class'=>"form-control editor1",'dir'=>'rtl','rows'=>"3"]) !!}
            </div>
            <div class="form-group col-md-12 ">
                <label for="details_en"> </label>
                {!! Form::label('details_en', __('ms_lang.details_en_t'), []) !!}
                {!! Form::textarea('details_en', '', ['wire:model.lazy'=>'details_en','class'=>"form-control editor1",'rows'=>"3"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('img', __('ms_lang.img_t'), []) !!}
                {!! Form::file('profile_photo_path', ['wire:model'=>'profile_photo_path','class'=>"form-control"]) !!}
            </div>
            
        </div>
        <div class="box-footer">
            {!! Form::submit(__('ms_lang.btn_save'), ['class'=>"btn btn-info pull-center"]) !!}
            <button type="reset"  class="btn btn-default">{{ __('ms_lang.btn_reset') }}</button>
        </div>
    </div>
{!! Form::close() !!}

