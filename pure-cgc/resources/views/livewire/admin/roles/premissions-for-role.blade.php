{!! Form::open(['url' => '', 'enctype' => 'multipart/form-data','wire:submit.prevent'=>'store_update']) !!}
    <div class="card-body col-md-8 offset-2">

        <div class="form-group row">
            <div class="form-group col-md-12">
                {!! Form::label('name',__('roles_permissions.role'), ['class'=>"col-12",]) !!}
                {!! Form::text('name', '', ['wire:model.lazy'=>'name','class'=>"form-control col-6 float-left",'disabled']) !!}
                {!! Form::text('name_en', '', ['wire:model.lazy'=>'name_en','class'=>"form-control col-6",'disabled']) !!}
            </div>
 {{-- @if($edit_object->hasPermissionTo($premissions_result->name)) checked="" @endif --}}
            <div class="form-group">
                <label>{{ __('roles_permissions.permissions') }}</label>
                <div class="kt-checkbox-list">
@if (is_null($premissions_results)==0)
    @foreach ($premissions_results as $premissions_result)
                <label class=" col-4 text-2xl kt-checkbox kt-checkbox--bold pl-10 pr-10">
                    @if($premissions_result->parent_id > 0) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ==> @endif
                    <input type="checkbox" name="premissions" wire:model='premissions.{{ $premissions_result->id }}' value="{{$premissions_result->name}}"> {{Auth::user()->user_lang=='ar'? $premissions_result->name_ar : $premissions_result->name }}
                    <span></span>
                </label>
    @endforeach
@endif

                </div>
            </div>
            <div class="form-group col-2 d-none">
                {!! Form::label('ord', __('ms_lang.ord_t'), []) !!}
                {!! Form::number('ord', 0, ['wire:model.lazy'=>'ord','class'=>"form-control",'min'=>0]) !!}
            </div>
        </div>
        <div class="box-footer">
            {!! Form::submit(__('ms_lang.btn_save'), ['class'=>"btn btn-info pull-center"]) !!}
            <button type="reset"  class="btn btn-default">{{ __('ms_lang.btn_reset') }}</button>
        </div>
    </div>
{!! Form::close() !!}

