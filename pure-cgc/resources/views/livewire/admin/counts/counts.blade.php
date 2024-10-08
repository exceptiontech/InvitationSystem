

<div class="card card-custom">
	<div class="card-header flex-wrap py-5">
		<div class="card-title">
			<h3 class="card-label">{{Auth::user()->user_lang=='ar' ? 'الاعداد ' :'counts'}}

			<div class="text-muted pt-2 font-size-sm">
			</div></h3>
        </div>

		<div class="card-toolbar">
            <!--begin::Button-->
            @if ($showFormEdit == false)
			<a href="javascript:void(0);" wire:click="create_form" class="btn btn-primary font-weight-bolder">
			  <span class="svg-icon svg-icon-md"> {!! $btn_kwrd !!}
            </a>
            @else
			<a href="javascript:void(0);" wire:click="edit_form" class="btn btn-primary font-weight-bolder">
			  <span class="svg-icon svg-icon-md"> {!! $btn_kwrd !!}
            </a>
            @endif
            {{-- <a href="javascript:void(0);" wire:click="deleted" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md"> deleted
              </a> --}}
			<!--end::Button-->
        </div>


    </div>

    <div class="card-body" style="overflow-x: auto;">
            <div class="col-md-6 offset-3" >
@include('includes.messages')
            </div>

@if ($showForm == true)
        <livewire:admin.counts.create />
@elseif ($showFormEdit == true)
        <livewire:admin.counts.edit />
@elseif ($showDeleted == true)
        <livewire:admin.counts.deleted />
@else


    @if(isset($results))
    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
        <thead>
          <tr>
            <th>#</th>
            <th>{{ __('ms_lang.name_t') }}</th>
            <th>{{ __('ms_lang.name_en_t') }}</th>
            <th>{{ __('ms_lang.count') }}</th>
            <th>{{ __('ms_lang.icon') }}</th>
            <th>{{ __('ms_lang.action_t') }}</th>
          </tr>
        </thead>
        <tbody>
<?php
$i=1;
foreach ($results as $result):
?>
            <tr>
                <td>{{ $i}}</td>
                <td>{{$result->name}}</td>
                <td>{{$result->name_en}}</td>
                <td>{{$result->count}}</td>
                <td>{{$result->icon}}</td>
                <td style="padding: 0px;width: 16%;">
                    <!---------- active & Dis active Button --->
                    @if ($result->change_user_type > 0)
                                        <button wire:click="change_member_plan('{{ $result->id }}')" class="btn btn-info" >{{ __('ms_lang.change_t').__('ms_lang.member_plan') }}</button>
                                        {{-- <button wire:click="change_member_plan('{{ $result->id }}')" class="btn btn-info" >{{ __('ms_lang.view').' '.__('ms_lang.user_details') }}</button> --}}
                    @endif
                    {{-- {!! add_btn_active('javascript:void(0);',' wire:click="active_ms('.$result->id.')"',$result->is_active) !!} --}}
                    {!! add_btn_edit('javascript:void(0);',' wire:click="edit_form('.$result->id.')"') !!}
                    {!! add_btn_delete('javascript:void(0);',' wire:click="delete_ms('.$result->id.')"') !!}
                </td>
            </tr>
<?php $i++; endforeach; ?>
        </tbody>
    </table>
    @else
        <h2 style="width: 17%;margin-right: 40%;margin-left: 40%;"><center class="alert-warning" style="border-radius: 15px">{{ __('ms_lang.no_results') }}</center></h2>
    @endif
@endif
</div>
</div>




