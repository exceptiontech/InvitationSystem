<?php
$dis_cat='d-none';
$dis_det='d-none';
$dis_img='';
$img_type='';
if(isset($category_id) && $category_id !=0)
{
    $dis_cat='';
}
if($type == 0)
{
    $dis_det='';
}
?>
{!! Form::open(['url' => '', 'enctype' => 'multipart/form-data','wire:submit.prevent'=>'store_update']) !!}
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
                {!! Form::text('name', '', ['wire:model.lazy'=>'name','class'=>"form-control", 'dir'=>'rtl']) !!}
                {!! Form::hidden('type', 0, ['wire:model.lazy'=>'type']) !!}
                {!! Form::hidden('parent_id', 0, ['wire:model.lazy'=>'parent_id']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('name_en', __('ms_lang.name_en_t'), []) !!}
                {!! Form::text('name_en', '', ['wire:model.lazy'=>'name_en','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-2">
                {!! Form::label('ord', __('ms_lang.ord_t'), []) !!}
                {!! Form::number('ord', 0, ['wire:model.lazy'=>'ord','class'=>"form-control",'min'=>0]) !!}
            </div>
            <div class="form-group col-md-10 {{ $dis_img }}">
                {!! Form::label('img', __('ms_lang.img_t'), []) !!}
                @if ($img_type == 'icon')
                    {!! Form::text('img_icon', '', ['wire:model.lazy'=>'img_icon','class'=>"form-control"]) !!}
                    {!! Form::hidden('img_type', '', ['wire:model.defer'=>'img_type']) !!}
                @else
                    {!! Form::file('img', ['wire:model.lazy'=>'img','class'=>"form-control"]) !!}
                    {!! Form::hidden('img_type', '', ['wire:model.defer'=>'img_type']) !!}
                @endif
            </div>
            <div class="form-group col-md-12 {{ $dis_det }}">
                {!! Form::label('details', __('ms_lang.details_t'), []) !!}
                {!! Form::textarea('details', '', ['wire:model.lazy'=>'details','class'=>"form-control editor1",'dir'=>'rtl','rows'=>"3"]) !!}
            </div>
            <div class="form-group col-md-12 {{ $dis_det }}">
                <label for="details_en"> </label>
                {!! Form::label('details_en', __('ms_lang.details_en_t'), []) !!}
                {!! Form::textarea('details_en', '', ['wire:model.lazy'=>'details_en','class'=>"form-control editor1",'rows'=>"3"]) !!}
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

