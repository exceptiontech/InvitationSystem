<div>
    <!-- Add Group modal -->
    <div wire:ignore.self class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-confirm">



            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box text-danger">
                        <i class="fal fa-trash"></i>
                    </div>

                    <h4 class="modal-title w-100">Delete Moderator</h4>


                    <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fal fa-times"></i></button>

                </div>


                <div class="p-0 modal-body">


                    <p>Do You Want To Delete Moderator ? You Cant Back From this step</p>


                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary btn-cancel" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        <button wire:click="deleteModerator" type="button" class="btn btn-danger">Delete</button>
                    </div>


                </div>

            </div>
        </div>
    </div>


    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body rightside-event">
        <!-- row -->


        <div class="invitations-page">
            <div class="container-fluid">
                @if ($showForm == false)
                <div class="row">
                    <div class="p-0 pb-2 mb-2 card-header d-sm-flex d-block">

                        <button wire:click="active_edit('0')" class="btn btn-primary w100 new-group">Add new
                            moderator</button>
                    </div>
                    <div class="m-auto col-md-8">
                        <div class="row">

                            @forelse ($results as $item)
                            <div class="mt-0 col-md-6 col-12">
                                <div class="card contact-card ">
                                    <div class="card-body">
                                        <div class="text-center">


                                            <div class="dropdown">
                                                <button type="button" class="btn" data-bs-toggle="dropdown">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#a5a5a5" cx="12" cy="5" r="2"></circle>
                                                            <circle fill="#a5a5a5" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#a5a5a5" cx="12" cy="19" r="2"></circle>
                                                        </g>
                                                    </svg> </button>
                                                <div class="dropdown-menu">
                                                    <a wire:click='ViewDetails(false,{{ $item->id }})'
                                                        class="dropdown-item"><i class="fal fa-user"></i> View
                                                        moderators</a>
                                                    <a class="dropdown-item"
                                                        wire:click="active_edit({{ $item->id }},'edit')"><i
                                                            class="fal fa-edit"></i> Edit moderators</a>
                                                    {{--  <a class="dropdown-item"
                                                        wire:click="active_edit({{ $item->id }},'pass')"><i
                                                            class="fal fa-edit"></i> Edit Password</a>  --}}
                                                    <a class="dropdown-item text-danger"
                                                        wire:click="takeId({{$item->id}})" data-bs-toggle="modal"
                                                        data-bs-target=".bd-example-modal-sm"><i
                                                            class="fal fa-trash"></i> Delete moderators</a>
                                                </div>
                                            </div>

                                            <div class="profile-flx">
                                                <div class="profile-photo">
                                                    <img src="{{ img_chk_exist($item->profile_photo_path) }}"
                                                        class="img-fluid rounded-circle" alt="" width="100">
                                                </div>

                                                <div>
                                                    <h3 class="mt-2 mb-0">{{ $item->name }}</h3>
                                                    <p class="mb-2">moderators</p>

                                                    <ul>
                                                        <li>{{ $item->mobile }}</li>
                                                        <li>{{ $item->email }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse









                        </div>
                    </div>


                </div>
                @else
                <div class="card-body">

                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            @if ($edit==true)

                            <li class="nav-item">
                                <a wire:click='ViewDetails(false)'
                                    class="nav-link @if ($showForm && !$showFormE ) active @endif">
                                    @if ($edit==true)
                                    {{ @$data->name }}
                                    @else
                                    add new
                                    @endif
                                </a>
                            </li>
                            @endif

                            <li class="nav-item">
                                <a wire:click='ViewDetails(true)'
                                    class="nav-link @if ($showForm && $showFormE) active @endif ">
                                    @if ($edit==true)
                                    Edit Account
                                    @else
                                    add new
                                    @endif
                                </a>
                            </li>
                            {{--  <li class="nav-item">
                                <a wire:click='ViewDetails(true)'
                                    class="nav-link @if ($showForm && $showFormEP) active @endif ">
                                    @if ($edit==true)
                                    Edit password

                                    @endif
                                </a>
                            </li>  --}}
                            <li class="nav-item">
                                <a wire:click='back' class="nav-link ">back to all</a>
                            </li>

                        </ul>

                        <div class="tab-content">
                            <div id="" class="tab-pane @if ($showForm & !$showFormE) active @endif">



                                <div class="card no-shadow">


                                    <div class="p-0 pt-4 card-body">
                                        <div class="basic-form">
                                            <form>




                                                @isset($data)

                                                <div class="row">



                                                    <div class="mb-3 col-md-2">


                                                        <div class="author-profile">
                                                            <div class="author-media">
                                                                <img src="{{ img_chk_exist($data->img) }}" alt="">
                                                                {{-- <div class="upload-link" title=""
                                                                    data-bs-toggle="tooltip" data-placement="right"
                                                                    data-original-title="update">
                                                                    <input type="file" class="update-flie">
                                                                    <i class="fa fa-camera"></i>
                                                                </div> --}}
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="mb-3 col-md-10">

                                                        <div class="row">

                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">first Name</label>
                                                                <input type="text" name="first" class="form-control"
                                                                    disabled placeholder="{{ $data->name }}">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">last Name</label>
                                                                <input type="email" name="last" class="form-control"
                                                                    disabled placeholder="{{ $data->last_name }}">
                                                            </div>


                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Job Title</label>
                                                                <input type="text" name="Add" class="form-control"
                                                                    disabled placeholder="General Moderators ">
                                                            </div>

                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">phone Number</label>
                                                                <input type="text" class="form-control" disabled
                                                                    placeholder="{{ $data->mobile }}">
                                                            </div>



                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Email</label>
                                                                <input type="email" class="form-control" disabled
                                                                    placeholder="{{ $data->email }}">
                                                            </div>
                                                            <?php
                                                            // Assuming c$data is already defined and contains the created_at property
                                                            $createdAt = $data->created_at;
                                                            $formattedDate = date("m/d/Y", strtotime($createdAt));
                                                            ?>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Start Date</label>
                                                                <input type="text" name="first" class="form-control"
                                                                    disabled placeholder="{{ $formattedDate }}">
                                                            </div>



                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Permissions</label>
                                                                <input type="text" name="first" class="form-control"
                                                                    disabled
                                                                    placeholder="Add content permissions / Edit permissions">
                                                            </div>






                                                        </div>


                                                    </div>
                                                </div>
                                                @endisset


                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div id="" class="tab-pane  @if ($showForm && $showFormE) active @endif">



                                <div class="card no-shadow">


                                    <div class="p-0 pt-4 card-body">
                                        <div class="basic-form">
                                            {{-- <form> --}}





                                                <div class="row">



                                                    <div class="mb-3 col-md-2">


                                                        <div class="author-profile">
                                                            <div class="author-media">
                                                                <div class="author-media">
                                                                    <img src="{{ img_chk_exist('ll') }}" alt="">
                                                                    <div class="upload-link" title=""
                                                                        data-bs-toggle="tooltip" data-placement="right"
                                                                        data-original-title="update">
                                                                        <input wire:model="profile_photo_path"
                                                                            type="file" class="update-flie">
                                                                        <i class="fa fa-camera"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="mb-3 col-md-10">

                                                        <div class="row">


                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">first Name</label>
                                                                <input wire:model="name" type="text" name="first"
                                                                    class="form-control" placeholder="">
                                                                @error('name')
                                                                <span class="error">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">last Name</label>
                                                                <input wire:model="last_name" type="text" name="last"
                                                                    class="form-control" placeholder="">
                                                                @error('last_name')
                                                                <span class="error">{{ $message }}</span>
                                                                @enderror
                                                            </div>


                                                            {{-- <div class="mb-3 col-md-6">
                                                                <label class="form-label">Job Title</label>
                                                                <input type="text" name="Add" class="form-control"
                                                                    placeholder="General Moderators ">
                                                            </div> --}}

                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">phone Number</label>
                                                                <input wire:model="mobile" type="tel"
                                                                    class="form-control" placeholder="">
                                                                @error('mobile')
                                                                <span class="error">{{ $message }}</span>
                                                                @enderror
                                                            </div>



                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Email</label>
                                                                <input wire:model="email" type="email"
                                                                    class="form-control" placeholder="">
                                                                @error('email')
                                                                <span class="error">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <?php
                                                if($edit==true){
                                                    $createdAt = $data->created_at;
                                                    $formattedDate = date("m/d/Y", strtotime($createdAt));
                                                }
                                                $createdAt=null;
                                                $formattedDate=null;

                                                    ?>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Start Date</label>
                                                                <input wire:model="date" type="date" name="first"
                                                                    class="form-control"
                                                                    placeholder="{{  $formattedDate }}">
                                                                @error('date')
                                                                <span class="error">{{ $message }}</span>
                                                                @enderror

                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label"> password</label>
                                                                <input wire:model="password" type="password" name="password"
                                                                    class="form-control"
                                                                   >
                                                                @error('password')
                                                                <span class="error">{{ $message }}</span>
                                                                @enderror

                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label"> password_confirmation</label>
                                                                <input wire:model="password_confirmation" type="password" name="password_confirmation"
                                                                    class="form-control"
                                                                   >
                                                                @error('password_confirmation')
                                                                <span class="error">{{ $message }}</span>
                                                                @enderror

                                                            </div>



                                                            {{-- <div class="mb-3 col-md-6">
                                                                <label class="form-label">Permissions</label>
                                                                <input type="text" name="first" class="form-control"
                                                                    placeholder="Add content permissions / Edit permissions">
                                                            </div> --}}






                                                        </div>

                                                        <button wire:click='savemoderator'
                                                            class="btn btn-primary w100">Save</button>
                                                    </div>
                                                </div>

                                                {{--
                                            </form> --}}
                                        </div>
                                    </div>
                                </div>


                            </div>


                            {{--  <div class="tab-content">
                                <div id="" class="tab-pane @if ($showForm && $showFormEP) active @endif">



                                    <div class="card no-shadow">


                                        <div class="card-body p-0 pt-4">
                                            <div class="basic-form">
                                                <form>





                                                    <div class="row">



                                                        <div class="mb-3 col-md-2">


                                                            <div class="author-profile">
                                                                <div class="author-media">
                                                                    <img src="images/pic1.jpg" alt="">
                                                                    <div class="upload-link" title=""
                                                                        data-bs-toggle="tooltip" data-placement="right"
                                                                        data-original-title="update">
                                                                        <input type="file" class="update-flie">
                                                                        <i class="fa fa-camera"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div class="mb-3 col-md-10">

                                                            <div class="row">


                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Current Password</label>
                                                                    <input type="password" name="first" class="form-control"
                                                                        disabled placeholder="20202020">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">New Password</label>
                                                                    <input type="password" name="last" class="form-control"
                                                                        placeholder="20202020">
                                                                </div>


                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Re Enter New Password</label>
                                                                    <input type="password" name="Add" class="form-control"
                                                                        placeholder="20202020">
                                                                </div>



                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">OTP</label>
                                                                    <input type="password" class="form-control"
                                                                        placeholder="20202020">
                                                                </div>


                                                            </div>

                                                            <button type="submit" class="btn btn-primary w100">Save</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                </div>



                            </div>  --}}

                        </div>

                    </div>
                </div>
                @endif

            </div>


        </div>
    </div>

    <!--**********************************
        Content body end
    ***********************************-->


</div>
