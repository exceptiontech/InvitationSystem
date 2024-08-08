<div>
<!-- Modal -->
    <div  class="modal fade" wire:ignore.self  id="recordsModal" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center bg-success" id="exampleModalLabel">{{ @$result_one->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="card-body col-md-12">
                    <div class="row"  style="overflow-x: auto;">
@if(is_null($result_one) == 0)
@include('includes.messages')
{!! Form::open(['url' => '', 'enctype' => 'multipart/form-data','wire:submit.prevent'=>'add_model_stock_store']) !!}
    <div class="card-body col-md-12">

        <div class="form-group row">
            <div class="form-group col-md-6">
                {!! Form::label('name', __('ms_lang.name_t'), []) !!}
                {!! Form::text('name','', ['wire:model.defer'=>'name','placeholder'=>__('ms_lang.name_t'),'class'=>"form-control",'required'=>'require']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('name_en', __('ms_lang.name_en_t'), []) !!}
                {!! Form::text('name_en','', ['wire:model.defer'=>'name_en','placeholder'=>__('ms_lang.name_en_t'),'class'=>"form-control",'required'=>'require']) !!}
            </div>
            <div class="form-group col-md-2">
                {!! Form::label('quantity', __('ms_lang.quantity'), []) !!}
                {!! Form::number('quantity','', ['wire:model.defer'=>'quantity','placeholder'=>__('ms_lang.quantity'),'class'=>"form-control",'required'=>'require','min'=>'0']) !!}
            </div>
            <div class="form-group col-md-2">
                {!! Form::label('price', __('ms_lang.price'), []) !!}
                {!! Form::number('price','', ['wire:model.defer'=>'price','placeholder'=>__('ms_lang.price'),'class'=>"form-control",'required'=>'require','min'=>'0']) !!}
            </div>
            <div class="form-group col-md-2">
                {!! Form::label('discount', __('ms_lang.discount'), []) !!}
                {!! Form::number('discount','', ['wire:model.defer'=>'discount','placeholder'=>__('ms_lang.discount'),'class'=>"form-control",'min'=>'0']) !!}
            </div>
<?php $select_arr2 = ["="=>"=", '+'=>"+", "-"=>"-" ]; ?>
            <div class="form-group col-md-2 d-none">
                {!! Form::label('plus_or_minus', __('ms_lang.select').' '.__('ms_lang.plus_or_minus'), []) !!}
                {!! Form::select('plus_or_minus',$select_arr2, '=', ['wire:model.defer'=>'plus_or_minus','class'=>"form-control"]) !!}
            </div>
            <div class="form-group col-md-4 d-none">
                {!! Form::label('img', __('ms_lang.img_t'), []) !!}
                {!! Form::file('img', ['wire:model.lazy'=>'img','class'=>"form-control"]) !!}
            </div>

        </div>
        <div class="box-footer text-center">
            {!! Form::submit(__('ms_lang.btn_save'), ['class'=>"btn btn-primary pull-center btn-lg"]) !!}
            <button type="button" class="btn btn-light-primary font-weight-bold btn-lg" data-dismiss="modal">{{ __('ms_lang.btn_cancel') }}</button>
        </div>
    </div>
{!! Form::close() !!}


                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">
                            <thead>
                                <tr class="text-center bg-info">
                                    <th>#</th>
                                    <th>{{ __('ms_lang.name_t') }}</th>
                                    <th>{{ __('ms_lang.name_en_t') }}</th>
                                    <th>{{ __('ms_lang.quantity') }}</th>
                                    <th>{{ __('ms_lang.price') }}</th>
                                    <th>{{ __('ms_lang.discount') }}</th>
                                    <th>{{ __('ms_lang.create_at') }}</th>
                                    <th>{{ __('ms_lang.action_t') }}</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
        if(count($result_one->stocks)):
            foreach ($result_one->stocks as $stock):
    ?>
                                <tr>
                                    <td>{{ $i}}</td>
                                    <td>{{ @$stock->name}}</td>
                                    <td>{{ @$stock->name_en}}</td>
                                    <td>{{ @$stock->quantity}}</td>
                                    <td>{{ @$stock->price}}</td>
                                    <td>{{ @$stock->discount}}</td>
                                    <td>{{ @$stock->created_at}}</td>
                                    <td style="padding: 0px;width: 16%;">
                                        <!---------- active & Dis active Button --->
                                        {!! add_btn_active('javascript:void(0);',' wire:click="active_ms_stock('.$stock->id.')"',$stock->is_active) !!}
                                        {!! add_btn_delete('javascript:void(0);',' wire:click="delete_ms_stock('.$stock->id.')"') !!}
                                    </td>
                                </tr>
    <?php
        $i++;
            endforeach;
        endif; ?>
                            </tbody>
                        </table>
@endif
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')

<script type="text/javascript">
    window.livewire.on('openRecordsModal', result_one => {
        $('#recordsModal').modal('show');
    });
    window.livewire.on('closeRecordsModal', () => {
        $('#recordsModal').modal('hide');
    });
</script>

@endpush
