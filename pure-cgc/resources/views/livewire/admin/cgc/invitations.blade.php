<div>

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



                            <li class=" nav-item">
                                <a class="nav-link @if ($show==1)
    active
    @endif" aria-expanded="false">
                                    <span class="numer-tab">1</span>Information</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link  @if ($show==2)
    active
    @endif " aria-expanded="false">
                                    <span class="numer-tab">2</span>create</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link @if ($show==3)
    active
    @endif " aria-expanded="true">
                                    <span class="numer-tab">3</span>preview</a>
                            </li>




                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane @if ($show==1)
                            active
                            @endif ">



                            <div class=" card no-shadow">

                                <div class="p-0 pb-2 mb-5 card-header d-sm-flex d-block">

                                    <h4 class="card-title">Information</h4>


                                    <div class="se-filrer">
                                        {{-- <form wire:submit.prevent="submit"> --}}




                                            <div class="form-check">
                                                <input wire:model="schedule_invitation" class="form-check-input"
                                                    type="checkbox" value="" required="">
                                                @error('schedule_invitation') <span class="" style="color: red;">{{
                                                    $message }}</span> @enderror
                                                <label class="form-check-label" for="invalidCheck2">
                                                    Schedule invitation
                                                </label>
                                            </div>


                                            {{--  <div class="form-check">
                                                <input wire:model="send_now" class="form-check-input" type="checkbox"
                                                    value="" required="">
                                                @error('send_now') <span class="" style="color: red;">{{ $message
                                                    }}</span> @enderror

                                                <label class="form-check-label" for="invalidCheck3">
                                                    Send now
                                                </label>
                                            </div>  --}}


                                            {{--
                                        </form> --}}
                                    </div>

                                </div>

                                <div class="p-0 pt-4 card-body">
                                    <div class="basic-form">
                                        <form wire:submit.prevent="submit">





                                            <div class="row">



                                                {{-- <div class="mb-3 col-md-2">


                                                    <div class="author-profile">
                                                        <div class="author-media">
                                                            <img src="images/pic1.jpg" alt="">
                                                            <div class="upload-link" title="" data-bs-toggle="tooltip"
                                                                data-placement="right" data-original-title="update">
                                                                <input type="file" class="update-flie">
                                                                <i class="fa fa-camera"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div> --}}

                                                <div class="mb-3 col-md-2"> </div>
                                                <div class="mb-3 col-md-10">

                                                    <div class="row">

                                                        <div class="mb-3 col-md-6">
                                                            <div class="row">
                                                                <div class="mb-3 col-md-12">
                                                                    <label class="form-label">Event Title</label>
                                                                    <input wire:model="event_title" type="text"
                                                                        class="form-control" placeholder="Omar Mahmoud">
                                                                    @error('event_title') <span class=""
                                                                        style="color: red;">{{ $message }}</span>
                                                                    @enderror

                                                                </div>

                                                                <div class="mb-3 col-md-12">
                                                                    <label class="form-label">Organization</label>
                                                                    <input wire:model="organization" type="text"
                                                                        class="form-control" placeholder="Abou Elsouad">
                                                                    @error('organization') <span class=""
                                                                        style="color: red;">{{ $message }}</span>
                                                                    @enderror

                                                                </div>











                                                                <div class="col-md-12">

                                                                    <div class="row">


                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Event Date</label>
                                                                            <input wire:model="event_date" type="date"
                                                                                class="form-control" placeholder="">
                                                                            @error('event_date') <span class=""
                                                                                style="color: red;">{{ $message
                                                                                }}</span> @enderror

                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Event Time</label>
                                                                            <input wire:model="event_time" type="time"
                                                                                class="form-control" placeholder="">
                                                                            @error('event_time') <span class=""
                                                                                style="color: red;">{{ $message
                                                                                }}</span> @enderror

                                                                        </div>

                                                                    </div>
                                                                </div>


                                                                {{-- <div class="mb-3 col-md-12">
                                                                    <label class="form-label">Event Type</label>
                                                                    <input wire:model="event_type" type="text"
                                                                        class="form-control" placeholder="phone">
                                                                    @error('event_type') <span class=""
                                                                        style="color: red;">{{ $message }}</span>
                                                                    @enderror

                                                                </div> --}}



                                                                <div class="mb-3 col-md-12">
                                                                    <label class="form-label">Location Link</label>
                                                                    <input wire:model="location_link" type="text"
                                                                        class="form-control"
                                                                        placeholder="Location Link">
                                                                    @error('location_link') <span class=""
                                                                        style="color: red;">{{ $message }}</span>
                                                                    @enderror

                                                                </div>

                                                                <div class="mb-3 col-md-12 d-flex">


                                                                    {{-- <div class="form-check me-5">
                                                                        <input wire:model="schedule_invitation"
                                                                            class="form-check-input" type="checkbox"
                                                                            value="" required="">
                                                                        @error('schedule_invitation') <span class=""
                                                                            style="color: red;">{{ $message }}</span>
                                                                        @enderror

                                                                        <label class="form-check-label"
                                                                            for="invalidCheck2">
                                                                            Schedule invitation
                                                                        </label>
                                                                    </div>


                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="invalidCheck3" required="">
                                                                        <label class="form-check-label"
                                                                            for="invalidCheck3">
                                                                            Send now
                                                                        </label>
                                                                    </div> --}}
                                                                </div>


                                                            </div>
                                                        </div>


                                                        <div class="col-md-6 col-12">
                                                            <div class="row">




                                                                <div class="col-12">
                                                                    <div class="row g-1 align-items-end">
                                                                        <div class="mb-3 col-md-8">

                                                                            {{-- <label class="form-label">Type Of
                                                                                Event</label>
                                                                            <div wire:ignore>
                                                                                <select id="colorselector"
                                                                                    class="default-select form-control"
                                                                                    wire:model="event_type">
                                                                                    <option>Saudian</option>
                                                                                    <option>Saudian</option>
                                                                                    <option>Saudian</option>
                                                                                    <option>Saudian</option>
                                                                                    <option value="newtap">add new type
                                                                                    </option>
                                                                                </select>
                                                                            </div> --}}
                                                                            <div >
                                                                                <label class="form-label"
                                                                                    for="eventType">Select Event
                                                                                    Type:</label>
                                                                                <select wire:model="event_type"
                                                                                    id="colorselector"
                                                                                    class="default-select form-control">
                                                                                    <option value="">Choose an event
                                                                                        type</option>
                                                             @foreach($this->eventTypes as  $eventType)
                                                                                    <option
                                                                                        value="{{ $eventType->name }}">{{
                                                                                        $eventType->name }}</option>
                                                                                    @endforeach
                                                                                </select>

                                                                                {{-- @if($selectedEventType)
                                                                                <p>You selected: {{
                                                                                    $eventTypes->find($selectedEventType)->name
                                                                                    }}</p>
                                                                                @endif --}}
                                                                            </div>

                                                                            @error('event_type') <span class=""
                                                                                style="color: red;">{{ $message
                                                                                }}</span>
                                                                            @enderror

                                                                        </div>

                                                                        <div class="mb-3 col-md-4">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#add-category"
                                                                                class="rounded-sm btn btn-primary btn-event w-100">
                                                                                <span class="align-middle"><i
                                                                                        class="fal fa-plus me-1"></i></span>
                                                                                Add New Type
                                                                            </a>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 col-12">
                                                                    <div id="newtap" class="newtype">
                                                                        < form>
                                                                            <label class="form-label">New Type
                                                                                Event</label>
                                                                            <input id="other-input" class="form-control"
                                                                                name="newtype"
                                                                                placeholder="Enter New Type Of Event">
                                                                            <button class="btn btn-primary">Add</button>
                                        </form>
                                    </div>
                                </div>




                                <div class="col-md-12">
                                    <div class="row">


                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Send Date</label>
                                            <input wire:model="send_date" type="date" class="form-control"
                                                placeholder="">
                                            @error('send_date') <span class="" style="color: red;">{{ $message
                                                }}</span> @enderror

                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Send Time</label>
                                            <input wire:model="send_time" type="time" class="form-control"
                                                placeholder="">
                                            @error('send_time') <span class="" style="color: red;">{{ $message
                                                }}</span> @enderror

                                        </div>

                                    </div>
                                </div>









                                <div class="mb-3 col-md-12">
                                    <div wire:ignore>
                                        <label class="form-label">Send To</label>
                                        <select wire:model="selectedItems" class="default-select form-control"
                                            id="sendTo" multiple>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <div class="falt">
                                            @if ($selectedItems)

                                            @foreach($selectedItems as $id)
                                            @php
                                            $category = $categories->firstWhere('id', $id);
                                            @endphp
                                            <span class="gr-one">
                                                <i class="fa fa-user"></i>
                                                {{ $category->name }}
                                                {{-- <button type="button"
                                                    wire:click="removeItem({{ $id }})">&times;</button> --}}
                                            </span>
                                            @endforeach
                                            @else
                                            your selected groups will apear here
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                @if ($schedule_invitation==true)
                                <div class="col-md-12">

                                    <div class="row">


                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Re-Send
                                                Date</label>
                                            <input wire:model="resend_date" type="date" class="form-control"
                                                placeholder="">
                                            @error('resend_date') <span class="" style="color: red;">{{ $message
                                                }}</span> @enderror

                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Re-Send
                                                Time</label>
                                            <input wire:model="resend_time" type="time" class="form-control"
                                                placeholder="">
                                            @error('resend_time') <span class="" style="color: red;">{{ $message
                                                }}</span> @enderror

                                        </div>

                                    </div>
                                </div>
                                @endif



                            </div>
                        </div>
                    </div>
                    <button wire:click="submit" type="submit" class="btn btn-primary w100">Save </button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>


</div>





<div class="tab-pane  @if ($show==2)
                        active
                        @endif">




    <div class="row">

        <div class="col-md-6 col-12">
            <div class="card upload-img">
                <label for="formFileLg" class="form-label"><span><i class="fal fa-cloud-upload"></i><br> Choose a file
                        or drag and drop
                        it here</span></label>
                <input wire:model="img" class="form-control form-control-lg" id="formFileLg" type="file"
                    onchange="preview_images();" wire:ignore>
                <div class="image_preview" id="image_preview" wire:ignore></div>
            </div>

        </div>

        <div class="col-md-6 col-12">
            <div class="card">

                <div class="card-body custom-ekeditor ct-ticket" wire:ignore>
                    <textarea wire:model.defer="subject" id="ckeditor"></textarea>
                </div>

{{--  <div class="card-body">

<div  class="wrap-ed">
    <div class="toolbar">
        <button id="bold" title="Bold (Ctrl+B)"><i class="fa fa-bold"></i></button>
        <button id="italic" title="Italic (Ctrl+I)"><i class="fa fa-italic"></i></button>
        <button id="underline" title="Underline (Ctrl+U)"><i class="fa fa-underline"></i></button>
        <select name="fonts" id="fonts">
            <option value="Arial" selected>Arial</option>
            <option value="Georgia">Georgia</option>
            <option value="Tahoma">Tahoma</option>
            <option value="Times New Roman">Times New Roman</option>
            <option value="Verdana">Verdana</option>
            <option value="Impact">Impact</option>
            <option value="Courier New">Courier New</option>
        </select>
        <select name="size" id="size">
            <option value="8">8</option>
            <option value="10">10</option>
            <option value="12">12</option>
            <option value="14">14</option>
            <option value="16" selected>16</option>
            <option value="18">18</option>
            <option value="20">20</option>
            <option value="22">22</option>
            <option value="24">24</option>
            <option value="26">26</option>
        </select>
        <input  type="text" id="color" />
        <button id="align-left" title="Left"><i class="fa fa-align-left"></i></button>
        <button id="align-center" title="Center"><i class="fa fa-align-center"></i></button>
        <button id="align-right" title="Right"><i class="fa fa-align-right"></i></button>
        <button id="list-ul" title="Unordered List"><i class="fa fa-list-ul"></i></button>
        <button id="list-ol" title="Ordered List"><i class="fa fa-list-ol"></i></button>
    </div>
    <div wire:model="subject" class="editor" contenteditable></div>
</div>


</div>  --}}

            </div>
        </div>







        <div class="col-md-6">


            {{-- <div class="up-in-toggle">
                <input type="radio" id="switch_left" value="yes" />
                <label for="switch_left"><i class="fal fa-file"></i>Vertical</label>
                <input type="radio" id="switch_right" name="switch_2" value="no" checked />
                <label for="switch_right"><i class="fal fa-note-sticky"></i>Horizontal</label>
            </div> --}}

        </div>


        <div class="col-md-6 col-12">

            {{-- <div class="action-foo">


                <a href="#" class="btn btn-outline-primary w100"><i class="fal fa-plus-circle"></i>Add Event Date</a>


                <a href="#" class="btn btn-outline-primary w100"><i class="fal fa-plus-circle"></i>Add Contact Name</a>

                <a href="#" class="btn btn-outline-primary w100" data-bs-toggle="modal" data-bs-target=".bd-example"><i
                        class="fal fa-plus-circle"></i>Add Event
                    Name</a>




            </div> --}}


        </div>







    </div>

    <div class="tabs-foo">


        {{-- <a href="#navpills2-11" class="btn btn-primary w100" data-bs-toggle="tab" aria-expanded="false">Back</a>
        --}}

        <a wire:click="creation" class="btn btn-primary w100" aria-expanded="false">Next</a>

    </div>


</div>



<div class="tab-pane @if ($show==3) active @endif">
    <div class="row">
        <h4 class="card-title">{{ @$invitaion_peview->event_title }}</h4>
        <div class="col-md-5">
            <div class="border-0 card-header ps-0 d-sm-flex d-block">
                <h4 class="card-title">Content</h4>
            </div>
            <div  class="overflow-hidden card event-bx evcard">
                <div class="card-body">
                    <div class="card-media">
                        <div class="">
                            <img src="{{ img_chk_exist(@$invitaion_peview->img) }}"
                                alt="{{ @$invitaion_peview->event_title }}">
                            {{-- @dd(@$invitaion_peview->img) --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-12">
            <div class="text-center card-header">
                <h2 class="card-title mrt-auto">Information</h2>
            </div>
            <div class="overflow-hidden card event-bx no-shadow">
                <div class="pt-0 card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="mb-3 media align-items-center">
                                <div class="me-3">
                                    <i class="fal fa-calendar-alt"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 text-black">Date</h5>
                                    <p class="mb-0">{{ @$invitaion_peview->event_date }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3 media align-items-center">
                                <div class="me-3">
                                    <i class="fal fa-clock"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 text-black">Time</h5>
                                    <p class="mb-0">{{ @$invitaion_peview->event_time }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3 media align-items-center">
                                <div class="me-3">
                                    <i class="fal fa-users-rectangle"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 text-black">Type of event</h5>
                                    <p class="mb-0">{{ @$invitaion_peview->event_type }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3 media align-items-center">
                                <div class="me-3">
                                    <i class="fal fa-location-dot"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 text-black">Location</h5>
                                    <p class="mb-0"><a href="{{ @$invitaion_peview->location_link }}" target="_blank">{{
                                            @$invitaion_peview->location_link }}</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3 media align-items-center">
                                <div class="me-3">
                                    <i class="fal fa-bank"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 text-black">The organizer</h5>
                                    <p class="mb-0">{{ @$invitaion_peview->organizer }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3 media align-items-center">
                                <div class="me-3">
                                    <i class="fal fa-paper-plane"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 text-black">Sending date / time</h5>
                                    <p class="mb-0">{{ @$invitaion_peview->send_date }} / ({{
                                        @$invitaion_peview->send_time }})</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3 media align-items-center">
                                <div class="me-3">
                                    <i class="fal fa-circle-check"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 text-black">Invitation status</h5>
                                    <p class="mb-0"> {{ @$invitaion_peview->status }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3 media align-items-center">
                                {{--  <div class="me-3">
                                    <i class="fa fa-user"></i>
                                </div>  --}}
                                {{--  <div class="media-body">
                                    <h5 class="mb-0 text-black">Creator</h5>
                                    <p class="mb-0">{{ @$invitaion_peview->creator }}</p>
                                </div>  --}}
                            </div>
                        </div>
                    </div>
                    <div class="tabs-foo gtr">
                        <a class="w100"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                        <a class="w100">{{ @$invitaion_peview->invited_count }} invited</a>
                        <a href="{{ url('A_ms_admin/invitations_details/' . @$invitaion_peview->id) }}"
                            class="btn btn-primary w100">View Invited List</a>
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



</div>







<!-- Modal Add Category -->
<div wire:ignore.self class="modal fade none-border" id="add-category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Type Of Event</h4>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="addEventType">
                    <div class="row">
                        <div class="form-group">
                            <label class="form-label">New Type Of Event</label>
                            <input class="form-control form-white" placeholder="New Type Of Event" type="text" wire:model="newTypeName">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Event Type</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light save-category"
                    data-bs-dismiss="modal">Save</button>
            </div>
            @if (session()->has('message'))
            <div class="mt-3 alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        </div>
    </div>
</div>
</div>







<style>

.wrap-ed {

   max-width: 100%;
   width: 100%;
   margin: 0 auto;
   background: #fafafa;
   border-radius: 8px;
   box-shadow: 0 5px 8px 0 rgba(0,0,0,.4);
   padding: 10px;
}

.wrap-ed .toolbar {
   width: 100%;
   margin: 0 auto 10px;
}

.wrap-ed button {
   width: 30px;
   height: 30px;
   border-radius: 3px;
   background: none;
   border: none;
   box-sizing: border-box;
   padding: 0;
   font-size: 20px;
   color: #a6a6a6;
   cursor: pointer;
   outline: none;
}

.wrap-ed button:hover {
   border: 1px solid #a6a6a6;
   color: #777;
}

#bold,
#italic,
#underline {
   font-size: 18px;
}

#underline,
#align-right {
   margin-right: 17px;
}

#align-left {
   margin-left: 17px;
}

.wrap-ed select {
   height: 24px;
   font-size: 15px;
   font-weight: bold;
   color: #444;
   background: #fcfcfc;
   border: 1px solid #a6a6a6;
   border-radius: 3px;
   margin: 0;
   outline: none;
   cursor: pointer;
}

.wrap-ed select > option {
   font-size: 15px;
   background: #fafafa;
}

#fonts {
   width: 140px;
}

.sp-replacer {
   background: #fcfcfc;
   padding: 1px 2px 1px 3px;
   border-radius: 3px;
   border-color: #a6a6a6;
   margin-top: -1px;
}

.sp-replacer:hover {
   border-color: #a6a6a6;
   color: inherit;
}

.sp-preview {
   width: 15px;
   height: 15px;
   border: none;
   margin-top: 2px;
   margin-right: 3px;
}

.sp-preview-inner,
.sp-alpha-inner,
.sp-thumb-inner {
   border-radius: 3px;
}

.wrap-ed .editor {
   position: relative;
   width: 100%;
   height: 60vh;
   margin: 0 auto;
   padding: 20px;
   background: #fcfcfc;
   border-radius: 3px;
   box-shadow: inset 0 0 8px 1px rgba(0,0,0,.2);
   box-sizing: border-box;
   overflow: hidden;
   word-break: break-all;
   outline: none;
}
</style>




<script>
    function removeItem(id) {
                this.selectedItems = this.selectedItems.filter(item => item !== id);
            }
</script>
@livewireScripts

<script>
    function handleSelectChange(event) {
                let selectedItems = Array.from(event.target.selectedOptions).map(option => option.value);
                selectedItems.forEach(selectedItem => {
                    @this.call('addItem', selectedItem);
                });
            }
</script>

{{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script> --}}

{{--
<script src="{{url('admin/vendor/ckeditor/ckeditor.js')}}"></script>

<script src="{{url('admin/js/owl.js')}}"></script>
--}}
 <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('livewire:load', function () {
            // Initialize CKEditor
            CKEDITOR.replace('ckeditor');

            CKEDITOR.instances.ckeditor.on('change', function () {

                let editorData = CKEDITOR.instances.ckeditor.getData();


                @this.set('subject', editorData);
            });
        });
    </script>

	<style>

	.cke_notification,
	.cke_notification_message {
		display: none;
	}
	</style>


</div>
