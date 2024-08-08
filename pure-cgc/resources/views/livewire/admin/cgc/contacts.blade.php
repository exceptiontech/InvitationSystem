<div>
    <!-- Add Group modal -->
    <div wire:ignore.self class="modal fade bd-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-confirm">



            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box text-danger">
                        <i class="fal fa-trash"></i>
                    </div>

                    <h4 class="modal-title w-100">Delete contact</h4>


                    <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fal fa-times"></i></button>

                </div>


                <div class="p-0 modal-body">
                    @if(session()->has('message'))
                    <div class="alert alert-info">
                        {{ session('message') }}
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button class="btn btn-secondary btn-cancel" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                    </div>
                    @else
                    <p>Do You Want To Delete this contact ? You Cant Back From this step</p>


                    <div class="modal-footer justify-content-center">
                        <button class="btn btn-secondary btn-cancel " data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        <button wire:click="deletecontact" type="button" class="btn btn-danger">Delete</button>
                    </div>
                    @endif






                </div>

            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <form action="" method="" class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fal fa-times"></i>
                </button>
                <div class="modal-body">
                    @if(session()->has('message'))
                    <div class="alert alert-info">
                        {{ session('message') }}
                    </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Group Name</label>
                        <input wire:model="group_name" type="text" name="first" class="form-control" placeholder=" ">
                        @error('group_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button wire:click='saveGroup' type="button" class="btn btn-primary w100">Creat Group</button>



                </div>

            </form>
        </div>
    </div>


    <!--**********************************
    Content body start
***********************************-->
    <!--**********************************
        Content body end
    ***********************************-->

    <!-- modal box strat -->
    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Event Title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Event Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="The Story Of Danau Toba" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!--**********************************
       Support ticket button start
    ***********************************-->
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body rightside-event">
        <!-- row -->
        <div class="container-fluid">


            <div class="contacts-tabs">
                <div class="card-body">
                    <div class="card-tabs">
                        <ul class="mb-4 nav nav-tabs style-1">
                            <li wire:click="step(1)" class=" nav-item">
                                <a class="nav-link {{ $step == 1 ? 'active' : '' }}"><i
                                        class="fa fa-plus-circle"></i>New Contact</a>
                            </li>
                            <li wire:click="step(2)" class="nav-item">
                                <a class="nav-link {{ $step == 2 ? 'active' : '' }}"><i
                                        class="fa fa-id-card"></i>contacts List</a>
                            </li>
                            <li wire:click="step(3)" class="nav-item">
                                <a class="nav-link {{ $step == 3 ? 'active' : '' }}"><i
                                        class="fa fa-users"></i>Group</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="" class="tab-pane {{ $step == 1 ? 'active' : '' }}">



                            <div class="card no-shadow">
                                <div class="p-0 pb-2 card-header">
                                    <h4 class="card-title">New Contact</h4>
                                </div>
                                <div class="p-0 pt-4 card-body">
                                    <div class="basic-form">
                                        {{-- <form> --}}





                                            <div class="row">



                                                <div class="mb-3 col-md-2">


                                                    <div class="author-profile">
                                                        <div class="author-media">
                                                            {{-- <img
                                                                src="{{ img_chk_exist($item->user->profile_photo_path) }}"
                                                                width="100" class="img-fluid rounded-circle" alt="" />
                                                            --}}
                                                            {{-- @dd($profile_photo_path) --}}
                                                            <img src="{{ img_chk_exist($profile_photo_path) }}" alt="">
                                                            <div class="upload-link" title="" data-bs-toggle="tooltip"
                                                                data-placement="right" data-original-title="update">
                                                                <input wire:model.live="profile_photo_path" type="file"
                                                                    class="update-flie">
                                                                <i class="fa fa-camera"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="mb-3 col-md-10">

                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">

                                                            <div class="row">


                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">first Name</label>
                                                                    <input wire:model="name" type="text" name="first"
                                                                        class="form-control" placeholder="">
                                                                    @error('name') <span class="error"
                                                                        style="color: red;">{{ $message }}</span>
                                                                    @enderror

                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">last Name</label>
                                                                    <input wire:model="last_name" type="email"
                                                                        name="last" class="form-control"
                                                                        placeholder=" ">
                                                                    @error('last_name') <span class="error"
                                                                        style="color: red;">{{ $message }}</span>
                                                                    @enderror

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">phone</label>
                                                            <input wire:model="mobile" type="text" class="form-control"
                                                                placeholder="">
                                                            @error('mobile') <span class="error" style="color: red;">{{
                                                                $message }}</span> @enderror

                                                        </div>



                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Email</label>
                                                            <input wire:model="email" type="email" class="form-control"
                                                                placeholder="">
                                                            @error('email') <span class="error" style="color: red;">{{
                                                                $message }}</span> @enderror

                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Nationality</label>
                                                            <select wire:model="nationality_id"
                                                                class="default-select form-control " name="nationality">
                                                                <option value="">Select nationality</option>

                                                                @forelse ($countries as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>

                                                                @empty

                                                                @endforelse
                                                            </select>
                                                            @error('nationality_id') <span class="error"
                                                                style="color: red;">{{ $message }}</span> @enderror

                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Organization/Company
                                                                Name</label>
                                                            <input wire:model="organizer" type="text" name="first"
                                                                class="form-control" placeholder=" ">
                                                            @error('organizer') <span class="error"
                                                                style="color: red;">{{ $message }}</span> @enderror

                                                        </div>


                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Country</label>
                                                            <select wire:model="country_id"
                                                                class="default-select form-control " name="Country">
                                                                <option value="">Select country</option>
                                                                @forelse ($countries as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>

                                                                @empty

                                                                @endforelse
                                                            </select>
                                                            @error('country_id') <span class="error"
                                                                style="color: red;">{{ $message }}</span> @enderror

                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Add to a group</label>
                                                            <select wire:model="group_id"
                                                                class="default-select form-control " name="Group">
                                                                <option value="">Select Group</option>
                                                                @forelse ($groups as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>

                                                                @empty

                                                                @endforelse
                                                            </select>
                                                            @error('group_id') <span class="error"
                                                                style="color: red;">{{ $message }}</span> @enderror

                                                        </div>


                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">City</label>
                                                            <select wire:model="city_id"
                                                                class="default-select form-control " name="City">
                                                                <option value="">Select city</option>
                                                                @if ($cites )

                                                                @forelse ($cites as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>

                                                                @empty

                                                                @endforelse
                                                                @endif
                                                            </select>
                                                            @error('city_id') <span class="error" style="color: red;">{{
                                                                $message }}</span> @enderror

                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Job Title</label>
                                                            <input wire:model="job_title" type="text" name="Add"
                                                                class="form-control" placeholder="">
                                                            @error('job_title') <span class="error"
                                                                style="color: red;">{{ $message }}</span> @enderror

                                                        </div>


                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Note</label>
                                                            <textarea wire:model="notes" name="Add" class="form-control"
                                                                placeholder="---"></textarea>
                                                            @error('notes') <span class="error" style="color: red;">{{
                                                                $message }}</span> @enderror

                                                        </div>



                                                    </div>
                                                    @if ($update==true)
                                                    <button wire:click="updateContact" type="submit"
                                                        class="btn btn-primary">update
                                                        Contact</button>
                                                    @else
                                                    <button wire:click="saveContact" type="submit"
                                                        class="btn btn-primary">Save
                                                        Contact</button>
                                                    @endif

                                                </div>
                                            </div>

                                            {{--
                                        </form> --}}
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div id="" class="tab-pane {{ $step == 2 ? 'active' : '' }}">
                            <div class="card no-shadow">

                                <div class="p-0 pt-4 card-body">
                                    <div class="basic-form">
                                        <div class="row">
                                            <div class="col-md-8 col-12">



                                                <div class="p-0 pb-2 mb-5 card-header d-sm-flex d-block">
                                                    <h4 class="card-title">Contacts</h4>

                                                    <div class="se-filrer">
                                                        <form action="" method="">

                                                            {{-- <div class="input-group search-area">
                                                                <span class="input-group-text">
                                                                    <a href="javascript:void(0)"><i
                                                                            class="fal fa-search"></i></a>
                                                                </span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Search here...">

                                                            </div> --}}
                                                            <div class="input-group search-area">
                                                                <span class="input-group-text">
                                                                    <a href="javascript:void(0)"><i
                                                                            class="fal fa-search"></i></a>
                                                                </span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Search by name or phone..."
                                                                    wire:model.live="search">
                                                            </div>


                                                            {{-- <a href="" title="" class="shadow-btn"><i
                                                                    class="fa fa-bars"></i></a> --}}


                                                        </form>
                                                    </div>


                                                </div>


                                                <div class="row g-4">


                                                    <div class="mt-0 col-md-12 col-12">
                                                        {{-- <h4 class="char-flter">A</h4> --}}
                                                    </div>
                                                    {{-- @dd($contacts) --}}
                                                    @foreach ($contacts as $item)

                                                    <div class="mt-0 col-md-4 col-12">
                                                        <div class="overflow-hidden card contact-card">
                                                            <div class="card-body">
                                                                <div class="text-center">
                                                                    <div class="dropdown">
                                                                        <button type="button" class="btn light sharp"
                                                                            data-bs-toggle="dropdown">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                width="24px" height="24px"
                                                                                viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1"
                                                                                    fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24"
                                                                                        height="24"></rect>
                                                                                    <circle fill="#a5a5a5" cx="12"
                                                                                        cy="5" r="2"></circle>
                                                                                    <circle fill="#a5a5a5" cx="12"
                                                                                        cy="12" r="2"></circle>
                                                                                    <circle fill="#a5a5a5" cx="12"
                                                                                        cy="19" r="2"></circle>
                                                                                </g>
                                                                            </svg>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a wire:click="showDetails({{ $item->id }})"
                                                                                class="dropdown-item"
                                                                                href="javascript:void(0);">Show
                                                                                Details</a>
                                                                            <a wire:click="takeId2({{$item->id}})"
                                                                                class="dropdown-item"
                                                                                href="javascript:void(0);">Edit</a>
                                                                            <a wire:click="takeId({{$item->id}})"
                                                                                class="dropdown-item"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target=".bd-example-modal-sm2">Delete</a>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-photo">
                                                                        <img src="{{ img_chk_exist($item->profile_photo_path) }}"
                                                                            width="100" class="img-fluid rounded-circle"
                                                                            alt="" />
                                                                    </div>
                                                                    <h3 class="mt-2 mb-0">{{ $item->name . '' }} {{
                                                                        $item->last_name }}</h3>
                                                                    <p class="mb-2">{{ @$item->user_detail->job_title }}
                                                                    </p>

                                                                    <ul>
                                                                        <li><i class="fa fa-phone"></i>
                                                                            {{ $item->mobile }}</li>
                                                                        <li><i class="fa fa-envelope"></i>
                                                                            {{ $item->email }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endforeach
                                                    {{ $contacts->links() }}


                                                </div>

                                                {{-- <div class="row g-4">
                                                    <div class="mt-0 col-md-12 col-12">
                                                        <h4 class="char-flter">B</h4>
                                                    </div>
                                                    <div class="mt-0 col-md-4 col-12">
                                                        <div class="overflow-hidden card contact-card">
                                                            <div class="card-body">
                                                                <div class="text-center">
                                                                    <div class="dropdown">
                                                                        <button type="button" class="btn light sharp"
                                                                            data-bs-toggle="dropdown">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                width="24px" height="24px"
                                                                                viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1"
                                                                                    fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24"
                                                                                        height="24"></rect>
                                                                                    <circle fill="#a5a5a5" cx="12"
                                                                                        cy="5" r="2"></circle>
                                                                                    <circle fill="#a5a5a5" cx="12"
                                                                                        cy="12" r="2"></circle>
                                                                                    <circle fill="#a5a5a5" cx="12"
                                                                                        cy="19" r="2"></circle>
                                                                                </g>
                                                                            </svg>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item"
                                                                                href="javascript:void(0);">Edit</a>
                                                                            <a class="dropdown-item"
                                                                                href="javascript:void(0);">Delete</a>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-photo">
                                                                        <img src="images/pic1.jpg" width="100"
                                                                            class="img-fluid rounded-circle" alt="" />
                                                                    </div>
                                                                    <h3 class="mt-2 mb-0">Omar Mahmoud</h3>
                                                                    <p class="mb-2">Senior Manager</p>

                                                                    <ul>
                                                                        <li><i class="fa fa-phone"></i>
                                                                            +09666298195191</li>
                                                                        <li><i class="fa fa-envelope"></i>
                                                                            Omarahmed@mail.com</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mt-0 col-md-4 col-12">
                                                        <div class="overflow-hidden card contact-card">
                                                            <div class="card-body">
                                                                <div class="text-center">
                                                                    <div class="dropdown">
                                                                        <button type="button" class="btn light sharp"
                                                                            data-bs-toggle="dropdown">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                width="24px" height="24px"
                                                                                viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1"
                                                                                    fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24"
                                                                                        height="24"></rect>
                                                                                    <circle fill="#a5a5a5" cx="12"
                                                                                        cy="5" r="2"></circle>
                                                                                    <circle fill="#a5a5a5" cx="12"
                                                                                        cy="12" r="2"></circle>
                                                                                    <circle fill="#a5a5a5" cx="12"
                                                                                        cy="19" r="2"></circle>
                                                                                </g>
                                                                            </svg>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item"
                                                                                href="javascript:void(0);">Edit</a>
                                                                            <a class="dropdown-item"
                                                                                href="javascript:void(0);">Delete</a>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-photo">
                                                                        <img src="images/pic1.jpg" width="100"
                                                                            class="img-fluid rounded-circle" alt="" />
                                                                    </div>
                                                                    <h3 class="mt-2 mb-0">Omar Mahmoud</h3>
                                                                    <p class="mb-2">Senior Manager</p>

                                                                    <ul>
                                                                        <li><i class="fa fa-phone"></i>
                                                                            +09666298195191</li>
                                                                        <li><i class="fa fa-envelope"></i>
                                                                            Omarahmed@mail.com</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mt-0 col-md-4 col-12">
                                                        <div class="overflow-hidden card contact-card">
                                                            <div class="card-body">
                                                                <div class="text-center">
                                                                    <div class="dropdown">
                                                                        <button type="button" class="btn light sharp"
                                                                            data-bs-toggle="dropdown">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                width="24px" height="24px"
                                                                                viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1"
                                                                                    fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24"
                                                                                        height="24"></rect>
                                                                                    <circle fill="#a5a5a5" cx="12"
                                                                                        cy="5" r="2"></circle>
                                                                                    <circle fill="#a5a5a5" cx="12"
                                                                                        cy="12" r="2"></circle>
                                                                                    <circle fill="#a5a5a5" cx="12"
                                                                                        cy="19" r="2"></circle>
                                                                                </g>
                                                                            </svg>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item"
                                                                                href="javascript:void(0);">Edit</a>
                                                                            <a class="dropdown-item"
                                                                                href="javascript:void(0);">Delete</a>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-photo">
                                                                        <img src="images/pic1.jpg" width="100"
                                                                            class="img-fluid rounded-circle" alt="" />
                                                                    </div>
                                                                    <h3 class="mt-2 mb-0">Omar Mahmoud</h3>
                                                                    <p class="mb-2">Senior Manager</p>

                                                                    <ul>
                                                                        <li><i class="fa fa-phone"></i>
                                                                            +09666298195191</li>
                                                                        <li><i class="fa fa-envelope"></i>
                                                                            Omarahmed@mail.com</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}




                                                {{-- <ul class="pagination pagination-gutter">
                                                    <li class="page-item page-indicator">
                                                        <a class="page-link" href="javascript:void(0);">
                                                            <i class="fa fa-angle-left"></i></a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link"
                                                            href="javascript:void(0);">1</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link"
                                                            href="javascript:void(0)">2</a></li>
                                                    <li class="page-item"><a class="page-link"
                                                            href="javascript:void(0)">3</a></li>
                                                    <li class="page-item"><a class="page-link"
                                                            href="javascript:void(0)">4</a></li>
                                                    <li class="page-item page-indicator">
                                                        <a class="page-link" href="javascript:void(0)">
                                                            <i class="fa fa-angle-right"></i></a>
                                                    </li>
                                                </ul> --}}

                                            </div>


                                            <div class="mt-0 col-md-4 col-12">

                                                <div class="overflow-hidden card contact-card all-info">
                                                    <div class="card-body">
                                                        @if ($user)
                                                        {{-- @dd($user) --}}
                                                        <div class="text-center">
                                                            <div class="profile-photo">
                                                                <img src="{{ img_chk_exist($user->profile_photo_path) }}"
                                                                    width="100" class="img-fluid rounded-circle"
                                                                    alt="" />
                                                            </div>
                                                            <h3 class="mt-2 mb-0">{{ @$user->name }}</h3>
                                                            <p class="mb-0">{{ @$user->user_detail->job_title }}</p>
                                                            <!-- Display additional details -->
                                                            <ul>
                                                                <li>
                                                                    <div class="ico-info"><i class="fa fa-phone"></i>
                                                                    </div>
                                                                    <div class="bo-le">
                                                                        <h5 class="mb-0 text-black">Phone</h5>{{
                                                                        $user->mobile }}
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="ico-info"><i class="fa fa-envelope"></i>
                                                                    </div>
                                                                    <div class="bo-le">
                                                                        <h5 class="mb-0 text-black">Email</h5>{{
                                                                        $user->email }}
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="ico-info"><i
                                                                            class="fa fa-address-card"></i></div>
                                                                    <div class="bo-le">
                                                                        <h5 class="mb-0 text-black"></h5>{{
                                                                        @$user->user_detail->job_title }}
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="ico-info"><i
                                                                            class="fa fa-map-location-dot"></i></div>
                                                                    <div class="bo-le">
                                                                        <h5 class="mb-0 text-black">{{
                                                                            @$user->user_detail->country->name_en }}
                                                                        </h5>{{ @$user->user_detail->city->name_en }}
                                                                    </div>
                                                                    {{-- <div class="ml-auto bo-le">
                                                                        <h5 class="mb-0 text-black">{{
                                                                            @$user->user_detail->country->name_en }}
                                                                        </h5>No visa required
                                                                    </div> --}}
                                                                </li>
                                                                <li>
                                                                    <div class="ico-info"><i class="fa fa-users"></i>
                                                                    </div>
                                                                    <div class="bo-le">
                                                                        <h5 class="mb-0 text-black"></h5> MEMBER
                                                                    </div>
                                                                </li>
                                                                {{-- <li>
                                                                    <div class="ico-info"><i
                                                                            class="fa fa-message-exclamation"></i></div>
                                                                    <div class="bo-le">
                                                                        <h5 class="mb-0 text-black">There is no special
                                                                            needs</h5>
                                                                    </div>
                                                                </li> --}}
                                                                <li>
                                                                    <div class="ico-info"><i
                                                                            class="fa fa-envelope-open-text"></i></div>
                                                                    <div class="bo-le">
                                                                        <h5 class="mb-0 text-black">Number of invites
                                                                            sent :</h5>15 <br>
                                                                        <h5 class="mb-0 text-black">Confirmed invites :
                                                                        </h5>15
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>




                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="" class="tab-pane {{ $step == 3 ? 'active' : '' }}">

                            <div class="p-0 pb-2 mb-2 card-header d-sm-flex d-block">






                                <a title="" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm"
                                    class="btn btn-primary w100 new-group"><i class="fal fa-plus-circle"></i>Creat New
                                    Group</a>


                                @if ($show_group_users==1)
                                <a wire:click="return_to_groups" class="btn btn-primary me-auto ms-2"><i
                                        class="fal fa-long-arrow-left"></i> back to groups </a>
                                @endif



                                @if ($show_group_users==1)
                                <div class="se-filrer">
                                    <form action="" method="">

                                        <div class="mb-3 input-group search-area">
                                            <span class="input-group-text">
                                                <a href="javascript:void(0)"><i class="fal fa-search"></i></a>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Search here..."
                                            wire:change="view_search_members"  wire:model="search3">
                                        </div>



                                    </form>
                                </div>
                                @else
                                <div class="se-filrer">
                                    <form action="" method="">

                                        <div class="mb-3 input-group search-area">
                                            <span class="input-group-text">
                                                <a href="javascript:void(0)"><i class="fal fa-search"></i></a>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Search here..."
                                                wire:model="search2">
                                        </div>



                                    </form>
                                </div>
                                @endif




                            </div>


                            <div class="card">

                                <div class="p-3 card-body">
                                    <div class="basic-form">
                                        <div class="row g-3">


                                            @if ($show_group_users)


                                            @forelse ($group_users as $item)
                                            <div class="col-md-3">


                                                <div class="overflow-hidden card contact-card">
                                                    <div class="card-body">
                                                        <div class="text-center">

                                                            <div class="profile-photo">
                                                                {{-- <img src="images/pic1.jpg"
                                                                    class="img-fluid rounded-circle" alt="" width="100">
                                                                --}}
                                                                <img src="{{ img_chk_exist($item->user->profile_photo_path) }}"
                                                                    width="100" class="img-fluid rounded-circle"
                                                                    alt="" />
                                                            </div>

                                                            <h3 class="mt-2 mb-0">{{ $item->user->name }} {{
                                                                $item->user->last_name }}</h3>

                                                            <ul>
                                                                <li><i class="fa fa-phone"></i> {{ $item->user->mobile
                                                                    }}</li>
                                                                <li><i class="fa fa-envelope"></i> {{ $item->user->email
                                                                    }}</li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                            @empty
                                            @endforelse
                                            @else
                                            @if ($show_group_users==1)
                                            <h3>no members</h3>

                                            @endif
                                            @forelse ($groups as $item)

                                            <div class="col-md-3 col-12">
                                                <div class="mb-0 overflow-hidden card gr-card evcard2">
                                                    <div class="card-body">
                                                        <div class="text-center">

                                                            <h4 class="mt-2 mb-4">{{ $item->name }}</h4>

                                                            <a wire:click="view_members({{ $item->id }})" title=""
                                                                class="btn btn-primary w100 shad-btn">View Members</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty

                                            @endforelse
                                            {{ $groups->links() }}

                                            @endif


                                            {{-- <div class="col-12">
                                                <ul class="pagination pagination-gutter">
                                                    <li class="page-item page-indicator">
                                                        <a class="page-link" href="javascript:void(0);">
                                                            <i class="fa fa-angle-left"></i></a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link"
                                                            href="javascript:void(0);">1</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link"
                                                            href="javascript:void(0)">2</a></li>
                                                    <li class="page-item"><a class="page-link"
                                                            href="javascript:void(0)">3</a></li>
                                                    <li class="page-item"><a class="page-link"
                                                            href="javascript:void(0)">4</a></li>
                                                    <li class="page-item page-indicator">
                                                        <a class="page-link" href="javascript:void(0)">
                                                            <i class="fa fa-angle-right"></i></a>
                                                    </li>
                                                </ul>
                                            </div> --}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>



        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
    @if(session('added'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('added') }}',
        });
    </script>
    @endif
    @if(session('message'))
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('message') }}',
    });
    </script>
    @endif
</div>
