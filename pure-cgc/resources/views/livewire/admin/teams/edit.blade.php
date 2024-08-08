<?php
// $dis_cat='d-none';
// $dis_det='';
// $dis_img='';
// $img_type='';
// if(isset($category_id) && $category_id !=0)
// {
//     $dis_cat='';
// }
// if($type == 2)
// {
//     $dis_det='d-none';
//     $img_type='icon';
// }
// if($type == 'slider')
// {
//     $dis_det='';
//     $img_type='';
// }
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
                {!! Form::text('name', '', ['wire:model.lazy'=>'name','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('name_en', __('ms_lang.name_en_t'), []) !!}
                {!! Form::text('name_en', '', ['wire:model.lazy'=>'name_en','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('details', __('ms_lang.details_t'), []) !!}
                {!! Form::text('details', '', ['wire:model.lazy'=>'details','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('details_en', __('ms_lang.details_en_t'), []) !!}
                {!! Form::text('details_en', '', ['wire:model.lazy'=>'details_en','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('Specialization', __('ms_lang.Specialization_t'), []) !!}
                {!! Form::text('Specialization', '', ['wire:model.lazy'=>'Specialization','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('Specialization_en', __('ms_lang.Specialization_en_t'), []) !!}
                {!! Form::text('Specialization_en', '', ['wire:model.lazy'=>'Specialization_en','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('twitter', __('ms_lang.twitter_url'), []) !!}
                {!! Form::text('twitter', '', ['wire:model.lazy'=>'twitter','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('facebook', __('ms_lang.facebook_url'), []) !!}
                {!! Form::text('facebook', '', ['wire:model.lazy'=>'facebook','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('linkedin', __('ms_lang.linkedin_url'), []) !!}
                {!! Form::text('linkedin', '', ['wire:model.lazy'=>'linkedin','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('instagram', __('ms_lang.instagram_url'), []) !!}
                {!! Form::text('instagram', '', ['wire:model.lazy'=>'instagram','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
             {!! Form::label('img', __('ms_lang.img_t'), []) !!}
            {!! Form::file('img', ['wire:model.lazy'=>'img','class'=>"form-control"]) !!}
            </div>
        </div>
        <div class="box-footer">
            {!! Form::submit(__('ms_lang.btn_save'), ['class'=>"btn btn-info pull-center"]) !!}
            <button type="reset"  class="btn btn-default">{{ __('ms_lang.btn_reset') }}</button>
        </div>
    </div>
{!! Form::close() !!}

