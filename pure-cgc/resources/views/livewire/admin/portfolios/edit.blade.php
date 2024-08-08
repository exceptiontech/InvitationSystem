<?php
$dis_cat='';
$dis_det='';
$dis_img='';
$img_type='';
if(isset($category_id) && $category_id !=0)
{
    $dis_cat='';
}
if($type == 1)
{
    $dis_det='d-none';
    $img_type='icon';
}
?>
{!! Form::open(['url' => '', 'enctype' => 'multipart/form-data','wire:submit.prevent'=>'store_update']) !!}
    <div class="card-body col-md-8 offset-2">
        <div class="form-group row">
            <div class="form-group col-2">
                {!! Form::label('ord', __('ms_lang.ord_t'), []) !!}
                {!! Form::number('ord', 0, ['wire:model'=>'ord','class'=>"form-control",'min'=>0]) !!}
            </div>

@if(isset($edit_object['logo']) &&  !empty($edit_object['logo']))
<div class="form-group col-5">
    <label for="ord">{{  __('ms_lang.logo') }}</label>
    <img src="{{ img_chk_exist($edit_object['logo']) }}" style="width: 70px; height: 60px" />
</div>
@endisset

@if(isset($edit_object['img']) &&  !empty($edit_object['img']))
            <div class="form-group col-5">
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
            <div class="form-group col-md-12  {{ $dis_cat }}">
                {!! Form::label('category', __('ms_lang.category_t'), []) !!}
                {!! Form::select('category_id',@$select_arr, '', ['wire:model.lazy'=>'category_id','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('logo', __('ms_lang.logo'), []) !!}
                {!! Form::file('logo', ['wire:model'=>'logo','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6 {{ $dis_img }}">
                {!! Form::label('img', __('ms_lang.img_t'), []) !!}
                    {!! Form::file('img', ['wire:model.lazy'=>'img','class'=>"form-control"]) !!}
                    {!! Form::hidden('img_type', '', ['wire:model.defer'=>'img_type']) !!}
            </div>
            <div class="form-group col-12">
                {!! Form::label('url', __('ms_lang.url_link_t'), []) !!}
                <input type="text" name="url_link" wire:model.lazy="url_link" class="form-control" />
            </div>
            <div class="form-group col-md-12 {{ $dis_det }}">
                {!! Form::label('details', __('ms_lang.details_t'), []) !!}
                {!! Form::textarea('details', '', ['wire:model.lazy'=>'details','class'=>"form-control editor1",'rows'=>"3"]) !!}
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

