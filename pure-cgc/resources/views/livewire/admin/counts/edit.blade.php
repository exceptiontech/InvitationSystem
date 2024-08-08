
{!! Form::open(['url' => '', 'enctype' => 'multipart/form-data','wire:submit.prevent'=>'update']) !!}
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
                {!! Form::hidden('type', 0, ['wire:model.lazy'=>'type']) !!}
                {!! Form::hidden('parent_id', 0, ['wire:model.lazy'=>'parent_id']) !!}
            </div>
            
            <div class="form-group col-6">
                {!! Form::label('name', __('ms_lang.name_en_t'), []) !!}
                {!! Form::text('name_en', '', ['wire:model.lazy'=>'name_en','class'=>"form-control"]) !!}            
            </div>
            <div class="form-group col-6">
                {!! Form::label('count', __('ms_lang.count'), []) !!}
                {!! Form::text('count', '', ['wire:model.lazy'=>'count','class'=>"form-control"]) !!}            
            </div>
            <div class="form-group col-6">
                {!! Form::label('icon', __('ms_lang.icon'), []) !!}
                {!! Form::text('icon', '', ['wire:model.lazy'=>'icon','class'=>"form-control"]) !!}            
            </div>
        </div>
        <div class="box-footer">
            {!! Form::submit(__('ms_lang.btn_save'), ['class'=>"btn btn-info pull-center"]) !!}
            <button type="reset"  class="btn btn-default">{{ __('ms_lang.btn_reset') }}</button>
        </div>
    </div>
{!! Form::close() !!}

