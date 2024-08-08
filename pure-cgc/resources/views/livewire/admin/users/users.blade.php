<?php

/* /////////////////------->powered BY: ENG \ Mohamed saeed    <---------------\\\\\\\\\\\\\\\\\\\\\
 * /////////////////-------> tel : 00201117818079 -00201063474777        <---------------\\\\\\\\\\\\\\\\\\\
 * /////////////////------->  email: mohamedsaeed.mso11@gmail.com  <---------------\\\\\\\\\\\\\\\\\\\\\\\ */
?>
<div class="card card-custom">
	<div class="card-header flex-wrap py-5">
		<div class="card-title">
			<h3 class="card-label">{{@$title_page}}

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
        <livewire:admin.users.create />
@elseif ($showFormEdit == true)
        <livewire:admin.users.edit />
@elseif ($showDeleted == true)
        <livewire:admin.users.deleted />
@else

<?php
if(count($results)):
?>
          <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
            <thead>
              <tr>
                <th>#</th>
                <th>{{ __('ms_lang.name_t') }}</th>
                {{-- <th>{{ __('ms_lang.email_t') }}</th> --}}
                <th>{{ __('ms_lang.img_t') }}</th>
                <th>{{ __('ms_lang.mobile') }}</th>
                <th>{{ __('ms_lang.user_type') }}</th>
                {{-- <th>{{ __('ms_lang.user_type') }}</th> --}}
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
                    {{-- <td>{{$result->email}}</td> --}}
                    <td style="padding: 0px;">
                      <img src="{{ img_chk_exist($result->profile_photo_path) }}" style="width: 70px; height: 60px" />
                    </td>
                    <td>{{$result->mobile}}</td>
                    <td>{{ @$result->user_role->name}}</td>
                    {{-- <td>{{@$result->user_role->role}}</td> --}}
                    <td style="padding: 0px;width: 16%;">
                        <!---------- active & Dis active Button --->
                        {{-- <button wire:click="assign_2role('{{ $result->id }}')" class="btn btn-info" >{{ __('ms_lang.assign_2role') }}</button> --}}

@if ($result->change_user_type > 0)
                        <button wire:click="change_member_plan('{{ $result->id }}')" class="btn btn-info" >{{ __('ms_lang.change_t').__('ms_lang.member_plan') }}</button>
                        {{-- <button wire:click="change_member_plan('{{ $result->id }}')" class="btn btn-info" >{{ __('ms_lang.view').' '.__('ms_lang.user_details') }}</button> --}}
@endif
                        {!! add_btn_active('javascript:void(0);',' wire:click="active_ms('.$result->id.')"',$result->is_active) !!}
                        {!! add_btn_edit('javascript:void(0);',' wire:click="edit_form('.$result->id.')"') !!}
                        {!! add_btn_delete('javascript:void(0);',' wire:click="delete_ms('.$result->id.')"') !!}
                    </td>
                </tr>
<?php $i++; endforeach; ?>
            </tbody>
        </table>
        <div class="dataTables_paginate paging_simple_numbers" id="kt_datatable_paginate">
            <ul class="pagination">
                {{ $results->links() }}
            </ul>
        </div>

<?php  else: ?>
            <h2 style="width: 17%;margin-right: 40%;margin-left: 40%;"><center class="alert-warning" style="border-radius: 15px">{{ __('ms_lang.no_results') }}</center></h2>
<?php endif; ?>
        <!--end: Datatable-->

        @endif
        </div>
</div>

