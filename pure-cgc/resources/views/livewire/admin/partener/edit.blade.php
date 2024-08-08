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
                {{-- {!! Form::hidden('type', 0, ['wire:model.lazy'=>'type']) !!} --}}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('description', __('ms_lang.description'), []) !!}
                {!! Form::text('description', '', ['wire:model.lazy'=>'description','class'=>"form-control"]) !!}
            </div>


            <div class="form-group col-2">
                {!! Form::label('link', __('ms_lang.url_link_t'), []) !!}
                {!! Form::text('link', 0, ['wire:model.lazy'=>'link','class'=>"form-control"]) !!}
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

