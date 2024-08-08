

<div class="card card-custom">
	<div class="card-header flex-wrap py-5">
		<div class="card-title">
			<h3 class="card-label">{{Auth::user()->user_lang=='ar' ? 'العروض المطلوبه ' :'offer request'}}

			<div class="text-muted pt-2 font-size-sm">
			</div></h3>
        </div>

		<div class="card-toolbar">
            <!--begin::Button-->
            {{-- @if ($showFormEdit == false)
			<a href="javascript:void(0);" wire:click="create_form" class="btn btn-primary font-weight-bolder">
			  <span class="svg-icon svg-icon-md"> {!! $btn_kwrd !!}
            </a>
            @else
			<a href="javascript:void(0);" wire:click="edit_form" class="btn btn-primary font-weight-bolder">
			  <span class="svg-icon svg-icon-md"> {!! $btn_kwrd !!}
            </a>
            @endif --}}
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


    @if(isset($results))
    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
        <thead>
          <tr>
            <th>#</th>
            <th>{{ __('ms_lang.name_t') }}</th>
            <th>{{ __('ms_lang.email') }}</th>
            <th>{{ __('ms_lang.mobile') }}</th>
            <th>{{ __('ms_lang.category_t') }}</th>
            <th>{{ __('ms_lang.message') }}</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($results as $index=>$result)
                <tr>
                    <td>{{$index}}</td>
                    <td>{{$result->name}}</td>
                    <td>{{$result->email}}</td>
                    <td>{{$result->phone}}</td>
                    <td>{{@$result->category->name}}</td>
                    <td>{{$result->message}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <h2 style="width: 17%;margin-right: 40%;margin-left: 40%;"><center class="alert-warning" style="border-radius: 15px">{{ __('ms_lang.no_results') }}</center></h2>
    @endif
</div>
</div>





