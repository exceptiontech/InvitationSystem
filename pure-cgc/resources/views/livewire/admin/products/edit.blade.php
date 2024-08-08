<?php
$dis_cat='d-none';
$dis_det='';
$dis_img='';
$img_type='';
if(isset($category_id) && $category_id !=0)
{
    $dis_cat='';
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

<?php if( $company_id ==0){
    $select_arr = [0=>__('ms_lang.select')];
?>
@if (count($companies))
    @foreach ($companies as $company)
        <?php $select_arr[$company->id] =$company->name; ?>
    @endforeach
@endif
            <div class="form-group col-md-6">
                {!! Form::label('category', __('ms_lang.company'), []) !!}
                {!! Form::select('company_id',@$select_arr, $company_id, ['wire:model.lazy'=>'company_id','class'=>"form-control"]) !!}
            </div>
<?php } ?>
<?php $select_arr = [0=>__('ms_lang.select')]; ?>
@if (count($categories))
    @foreach ($categories as $category)
        <?php $select_arr[$category->id] = Auth::user()->user_lang=='ar' ? $category->name : $category->name_en; ?>
    @endforeach
@endif
            <div class="form-group col-md-6">
                {!! Form::label('category', __('ms_lang.category_t'), []) !!}
                {!! Form::select('category_id',@$select_arr, '', ['wire:model.lazy'=>'category_id','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-4">
                {!! Form::label('product_code', __('ms_lang.product_code'), []) !!}
                {!! Form::text('product_code', 0, ['wire:model.lazy'=>'product_code','class'=>"form-control",'readonly']) !!}
            </div>
            <div class="form-group col-2">
                {!! Form::label('ord', __('ms_lang.ord_t'), []) !!}
                {!! Form::number('ord', 0, ['wire:model.lazy'=>'ord','class'=>"form-control",'min'=>0]) !!}
            </div>
            <div class="form-group col-3">
                {!! Form::label('label', __('ms_lang.label'), []) !!}
                {!! Form::text('label', '', ['wire:model.lazy'=>'label','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-3">
                {!! Form::label('label_en', __('ms_lang.label_en'), []) !!}
                {!! Form::text('label_en', '', ['wire:model.lazy'=>'label_en','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('name', __('ms_lang.name_t'), []) !!}
                {!! Form::text('name', '', ['wire:model.lazy'=>'name','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('name_en', __('ms_lang.name_en_t'), []) !!}
                {!! Form::text('name_en', '', ['wire:model.lazy'=>'name_en','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('url', __('ms_lang.url_link_t'), []) !!}
                {!! Form::text('url', '', ['wire:model.lazy'=>'url','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6 {{ $dis_img }}">
                {!! Form::label('img', __('ms_lang.img_t'), []) !!}
                {!! Form::file('img', ['wire:model.lazy'=>'img','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-6 {{ $dis_img }}">
                {!! Form::label('img', __('ms_lang.images'), []) !!}
                {!! Form::file('images', ['wire:model.lazy'=>'images','multiple','class'=>"form-control"]) !!}
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
        </div>
        <div class="box-footer">
            {!! Form::submit(__('ms_lang.btn_save'), ['class'=>"btn btn-info pull-center"]) !!}
            <button type="reset"  class="btn btn-default">{{ __('ms_lang.btn_reset') }}</button>
        </div>
    </div>
{!! Form::close() !!}

