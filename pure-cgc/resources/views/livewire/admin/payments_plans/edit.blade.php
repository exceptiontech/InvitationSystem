
{!! Form::open(['url' => '', 'enctype' => 'multipart/form-data','wire:submit.prevent'=>'update']) !!}
<div class="col-md-6 offset-3" >
    @include('includes.messages')
</div>
@php
    $dis_img='';
@endphp
    <div class="card-body col-md-8 offset-2">
        <div class="form-group row">
@if(isset($edit_object['img']) &&  !empty($edit_object['img']))
            <div class="form-group">
                <label for="ord">{{  __('ms_lang.img_t') }}</label>
                <img src="{{ img_chk_exist($edit_object['img']) }}" style="width: 70px; height: 60px" />
            </div>
@endisset
        </div>
        <div class="form-group row">
            <div class="form-group col-md-6">
                {!! Form::label('name', __('ms_lang.name_t'), []) !!}
                {!! Form::text('name', '', ['wire:model.lazy'=>'name','class'=>"form-control"]) !!}
                {!! Form::hidden('type', 0, ['wire:model.lazy'=>'type']) !!}
                {!! Form::hidden('parent_id', 0, ['wire:model.lazy'=>'parent_id']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('name_en', __('ms_lang.name_en_t'), []) !!}
                {!! Form::text('name_en', '', ['wire:model.lazy'=>'name_en','class'=>"form-control"]) !!}
            </div>

<?php $select_arr = [0=>__('ms_lang.select')]; ?>
@if (count($categories))
    @foreach ($categories as $category)
        <?php $select_arr[$category->id] = Auth::user()->user_lang=='ar' ? $category->name : $category->name_en; ?>
    @endforeach
@endif
            <div class="form-group col-md-6 ">
                {!! Form::label('category', __('ms_lang.category_t'), []) !!}
                {!! Form::select('category_id',@$select_arr, '', ['wire:model.lazy'=>'category_id','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-6">
                {!! Form::label('color', __('ms_lang.color'), []) !!}
                {!! Form::text('color', '', ['wire:model.lazy'=>'color','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-3">
                {!! Form::label('price', __('ms_lang.price').'(جنيه)', []) !!}
                {!! Form::text('price', '', ['wire:model.lazy'=>'price','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-3">
                {!! Form::label('price_ryial', __('ms_lang.price').'(ريال)', []) !!}
                {!! Form::text('price_ryial', '', ['wire:model.lazy'=>'price_ryial','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-3">
                {!! Form::label('price_dolar', __('ms_lang.price').'(دولار)', []) !!}
                {!! Form::text('price_dolar', '', ['wire:model.lazy'=>'price_dolar','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-3">
                {!! Form::label('discount', __('ms_lang.discount').'(%)', []) !!}
                {!! Form::number('discount', '', ['wire:model.lazy'=>'discount','class'=>"form-control",'min'=>0]) !!}
            </div>
            <div class="form-group col-6">
                {!! Form::label('time', __('ms_lang.btn_time'), []) !!}
                {!! Form::text('time', '', ['wire:model.lazy'=>'time','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6 {{ $dis_img }}">
                {!! Form::label('img', __('ms_lang.img_t'), []) !!}
                @if ($img_type == 'icon')
                    {!! Form::text('img_icon', '', ['wire:model.lazy'=>'img_icon','class'=>"form-control"]) !!}
                    {!! Form::hidden('img_type', '', ['wire:model.defer'=>'img_type']) !!}
                @else
                    {!! Form::file('img', ['wire:model.lazy'=>'img','class'=>"form-control"]) !!}
                    {!! Form::hidden('img_type', '', ['wire:model.defer'=>'img_type']) !!}
                @endif
            </div>
            <div class="form-group col-12">
                {!! Form::label('details', __('ms_lang.details_t'), []) !!}
                {!! Form::text('details', '', ['wire:model.lazy'=>'details','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-12">
                {!! Form::label('details_en', __('ms_lang.details_en_t'), []) !!}
                {!! Form::text('details_en', '', ['wire:model.lazy'=>'details_en','class'=>"form-control"]) !!}
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

