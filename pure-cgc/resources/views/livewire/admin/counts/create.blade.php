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
           
            {{-- <div class="form-group col-md-6">
                {!! Form::label('count', __('ms_lang.count'), []) !!}
                {!! Form::text('count', ['wire:model'=>'count','class'=>"form-control"]) !!}
            </div> --}}

             <div class="form-group col-md-12 ">
                {!! Form::label('icon', __('ms_lang.icon'), []) !!}
                {!! Form::text('icon', '', ['wire:model.lazy'=>'icon','class'=>"form-control editor1"]) !!}
            </div>
            
            <div class="form-group col-md-12 ">
                {!! Form::label('count', __('ms_lang.count'), []) !!}
                {!! Form::text('count', '', ['wire:model.lazy'=>'count','class'=>"form-control editor1"]) !!}
            </div>
            
            
        </div>
        <div class="box-footer">
            {!! Form::submit(__('ms_lang.btn_save'), ['class'=>"btn btn-info pull-center"]) !!}
            <button type="reset"  class="btn btn-default">{{ __('ms_lang.btn_reset') }}</button>
        </div>
    </div>
{!! Form::close() !!}

