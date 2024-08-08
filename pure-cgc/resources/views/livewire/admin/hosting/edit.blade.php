
{!! Form::open(['url' => '', 'enctype' => 'multipart/form-data','wire:submit.prevent'=>'update']) !!}
<div class="col-md-6 offset-3" >
    @include('includes.messages')
</div>
    <div class="card-body col-md-8 offset-2">
        <div class="form-group row">
            <div class="form-group col-md-6">
                {!! Form::label('name', __('ms_lang.name_t'), []) !!}
                {!! Form::text('name', '', ['wire:model.lazy'=>'name','class'=>"form-control"]) !!}
                {!! Form::hidden('type', 0, ['wire:model.lazy'=>'type']) !!}
                {!! Form::hidden('parent_id', 0, ['wire:model.lazy'=>'parent_id']) !!}
            </div>

            <div class="form-group col-6">
                {!! Form::label('price', __('ms_lang.price'), []) !!}
                {!! Form::text('price', '', ['wire:model.lazy'=>'price','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-6">
                {!! Form::label('time', __('ms_lang.btn_time'), []) !!}
                {!! Form::text('time', '', ['wire:model.lazy'=>'time','class'=>"form-control"]) !!}
            </div>

            <div class="form-group col-6">
                {!! Form::label('discount', __('ms_lang.discount'), []) !!}
                {!! Form::text('discount', '', ['wire:model.lazy'=>'discount','class'=>"form-control"]) !!}
            </div>

            <div class="form-group col-6">
                {!! Form::label('feature', __('ms_lang.feature'), []) !!}
                {!! Form::text('feature', '', ['wire:model.lazy'=>'feature','class'=>"form-control"]) !!}
            </div>

            <div class="form-group col-6">
                {!! Form::label('color', __('ms_lang.color'), []) !!}
                {!! Form::text('color', '', ['wire:model.lazy'=>'color','class'=>"form-control"]) !!}
            </div>
            <div class="form-group"> <h3>seo :- </h3><br> </div>
            <div class="form-group col-md-12">
                {!! Form::label('name', __('ms_lang.keywords'), []) !!}
                {!! Form::text('keywords', '', ['wire:model.lazy'=>'keywords','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('name_en',__('ms_lang.keywords_en'), []) !!}
                {!! Form::text('keywords_en', '', ['wire:model.lazy'=>'keywords_en','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-12 ">
                {!! Form::label('details', __('ms_lang.details_t'), []) !!}
                {!! Form::textarea('details_seo', '', ['wire:model.lazy'=>'details_seo','class'=>"form-control editor1",'dir'=>'rtl','rows'=>"3"]) !!}
            </div>
            <div class="form-group col-md-12 ">
                <label for="details_en"> </label>
                {!! Form::label('details_en', __('ms_lang.details_en_t'), []) !!}
                {!! Form::textarea('details_en_seo', '', ['wire:model.lazy'=>'details_en_seo','class'=>"form-control editor1",'rows'=>"3"]) !!}
            </div>

        </div>
        <div class="box-footer">
            {!! Form::submit(__('ms_lang.btn_save'), ['class'=>"btn btn-info pull-center"]) !!}
            <button type="reset"  class="btn btn-default">{{ __('ms_lang.btn_reset') }}</button>
        </div>
    </div>
{!! Form::close() !!}

