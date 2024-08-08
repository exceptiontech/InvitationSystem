
<div class="content-body rightside-event">
    <!-- row -->


    <div class="invitations-page">
        <div class="container-fluid">

            <div class="row">



                <div class="col-lg-5 col-12">





                    <div class="overflow-hidden card event-bx">
                        <div class="border-0 card-header d-sm-flex d-block ">
                            <h4 class="card-title">{{ $invitation['event_title'] }}</h4>
                            {{--  <a href="#" title="" class=""><i class="fal fa-pencil-alt"></i></a>  --}}
                        </div>
                        <div class="pt-0 card-body">
                            <div class="mb-3 media align-items-center">
                                <div class="me-3">
                                    <i class="fal fa-calendar-alt"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 text-black">Date</h5>
                                    <p class="mb-0">{{ $invitation['event_date'] }}</p>
                                </div>
                            </div>
                            <div class="mb-3 media align-items-center">
                                <div class="me-3">
                                    <i class="fal fa-clock"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 text-black">Time</h5>
                                    <p class="mb-0">{{ $invitation['event_time'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="mb-3 media align-items-center">
                                <div class="me-3">
                                    <i class="fal fa-users-rectangle"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 text-black">Type of event</h5>
                                    <p class="mb-0">{{ $invitation['event_type'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="mb-3 media align-items-center">
                                <div class="me-3">
                                    <i class="fal fa-location-dot"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 text-black">Location</h5>
                                    <p class="mb-0">{{ $invitation['location_link'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="mb-3 media align-items-center">
                                <div class="me-3">
                                    <i class="fal fa-bank"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 text-black">The organizer</h5>
                                    <p class="mb-0">{{ $invitation['organization'] }}</p>
                                </div>
                            </div>
                            <div class="mb-3 media align-items-center">
                                <div class="me-3">
                                    <i class="fal fa-paper-plane"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 text-black">Sending date / time</h5>
                                    <p class="mb-0">{{ $invitation['send_date'] ?? 'N/A' }} / {{ $invitation['send_time'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="mb-3 media align-items-center">
                                <div class="me-3">
                                    <i class="fal fa-circle-check"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 text-black">Invitation status</h5>
                                    <p class="mb-0">{{ $invitation['status'] }}</p>
                                </div>
                            </div>
                            <div class="mb-3 media align-items-center">
                                {{--  <div class="me-3">
                                    <i class="fa fa-user"></i>
                                </div>  --}}
                                {{--  <div class="media-body">
                                    <h5 class="mb-0 text-black">Creator</h5>
                                    <p class="mb-0">Ministry of Environment</p>
                                </div>  --}}
                            </div>
                        </div>
                    </div>




                </div>




                <div class="col-md-7 col-12">



                    <div class="p-0 pb-2 text-center card-header">
                        <h2 class="card-title mrt-auto">List of Invites <i class="fal fa-arrow-down-to-square"></i></h2>
                    </div>


                    <div class="card no-shadow">

                        <div class="p-0 pt-4 card-body">
                            <div class="basic-form">

                                <div class="row g-4">

                                    @foreach($invitees as $invitee)
                                    @foreach($invitee->users as $item)
                                        <div class="mt-0 col-md-4 col-12">
                                            <div class="overflow-hidden card contact-card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        {{--  <div class="dropdown">
                                                            <button type="button" class="btn light sharp" data-bs-toggle="dropdown">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                                        <circle fill="#a5a5a5" cx="12" cy="5" r="2"></circle>
                                                                        <circle fill="#a5a5a5" cx="12" cy="12" r="2"></circle>
                                                                        <circle fill="#a5a5a5" cx="12" cy="19" r="2"></circle>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a wire:click="showDetails({{ $item->user->id }})" class="dropdown-item" href="javascript:void(0);">Show Details</a>
                                                                <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                            </div>
                                                        </div>  --}}
                                                        <div class="profile-photo">
                                                            <img src="{{ img_chk_exist($item->user->image) }}" width="100" class="img-fluid rounded-circle" alt="" />
                                                        </div>
                                                        <h3 class="mt-2 mb-0">{{ $item->user->name }}</h3>
                                                        <p class="mb-2">{{ @$item->user->user_detail->job_title }}</p>
                                                        <ul>
                                                            <li><i class="fa fa-phone"></i> {{ $item->user->phone }}</li>
                                                            <li><i class="fa fa-envelope"></i> {{ $item->user->email }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach





                                </div>





                                {{--  <ul class="pagination pagination-gutter">
                                    <li class="page-item page-indicator">
                                        <a class="page-link" href="javascript:void(0);">
                                            <i class="fa fa-angle-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                                    <li class="page-item page-indicator">
                                        <a class="page-link" href="javascript:void(0)">
                                            <i class="fa fa-angle-right"></i></a>
                                    </li>
                                </ul>  --}}

                            </div>


                        </div>
                    </div>
                </div>


                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overflow-hidden card event-bx">


                                <div class="border-0 card-header d-sm-flex d-block ">
                                    <h4 class="card-title">Invitation</h4>

                                    {{--  <a href="#" title="" class=""><i class="fal fa-eye"></i></a>  --}}

                                </div>

                                <div class="pt-0 card-body">

                                    <div class="card-media">
                                        <img src="{{ img_chk_exist(@$invitation['img']) }}" alt="">
                                    </div>


                                    <div class="message-temp">



                                        <h4 class="text-black">Dear <span><i class="fal fa-user-circle"></i> ..............</span></h4>

                                        <p>{{ $invitation['subject'] }}.</p>


                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="overflow-hidden card event-bx">


                                <div class="border-0 card-header">


                                    <h4 class="card-title"><a href="#" title="" class=""><i
                                                class="fa fa-chart-simple"></i></a> QR Code Scan</h4>



                                </div>

                                <div class="pt-0 card-body qr-code">

                                    <div class="card-media">
                                        <img src="{{ img_chk_exist('images/qr.png')  }}" alt="">
                                    </div>

                                    <h4 class="text-black"> 40 Times</h4>


                                </div>
                            </div>



                        </div>
                    </div>
                </div>



                <div class="col-md-7">

                    <div class="row">







                        <div class="col-md-12 col-12">
                            <div class="card">

                                <div class="border-0 card-header">
                                    <h4 class="card-title">WhatsApp Statistic</h4>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="p-0 card-body">
                                            <div id="chart-001"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 charts-legend">
                                        <div class="p-0 card-body charts-01">
                                            <div class="hao">
                                                <div id="charts-01"></div>
                                            </div>
                                            <div class="legend-conut">
                                                <p>Confirmed</p>
                                                <span>250</span>
                                            </div>
                                        </div>

                                        <div class="p-0 card-body charts-02">
                                            <div class="hao">
                                                <div id="charts-02"></div>
                                            </div>
                                            <div class="legend-conut">
                                                <p>Reject</p>
                                                <span>100</span>
                                            </div>
                                        </div>

                                        <div class="p-0 card-body charts-03">
                                            <div class="hao">
                                                <div id="charts-03"></div>
                                            </div>
                                            <div class="legend-conut">
                                                <p>Maybe</p>
                                                <span>50</span>
                                            </div>
                                        </div>

                                        <div class="p-0 card-body charts-04">
                                            <div class="hao">
                                                <div id="charts-04"></div>
                                            </div>
                                            <div class="legend-conut">
                                                <p>Total</p>
                                                <span>400</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ml-auto col-md-7">
                                        <div class="tot-range">
                                            <div id="chart-total"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>






                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="border-0 card-header">
                                    <h4 class="card-title">Email Statistic</h4>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="p-0 card-body">
                                            <div id="email-001"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 charts-legend">
                                        <div class="p-0 card-body charts-01">
                                            <div class="hao">
                                                <div id="email-01"></div>
                                            </div>
                                            <div class="legend-conut">
                                                <p>Confirmed</p>
                                                <span>250</span>
                                            </div>
                                        </div>

                                        <div class="p-0 card-body charts-02">
                                            <div class="hao">
                                                <div id="email-02"></div>
                                            </div>
                                            <div class="legend-conut">
                                                <p>Reject</p>
                                                <span>100</span>
                                            </div>
                                        </div>

                                        <div class="p-0 card-body charts-03">
                                            <div class="hao">
                                                <div id="email-03"></div>
                                            </div>
                                            <div class="legend-conut">
                                                <p>Maybe</p>
                                                <span>50</span>
                                            </div>
                                        </div>

                                        <div class="p-0 card-body charts-04">
                                            <div class="hao">
                                                <div id="email-04"></div>
                                            </div>
                                            <div class="legend-conut">
                                                <p>Total</p>
                                                <span>400</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ml-auto col-md-7">
                                        <div class="tot-range">
                                            <div id="email-total"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>




                        <div class="col-md-12">
                            <div class="ciles-numbers mn-count">

                                <div class="cire-box">
                                    <div class="inner-cire">
                                        <h2>Invited</h2>
                                        <h3>{{ $contactCount }}</h3>
                                    </div>
                                </div>

                                <div class="cire-box">
                                    <div class="inner-cire">
                                        <h2>Confirmed</h2>
                                        <h3>255</h3>
                                    </div>
                                </div>


                                <div class="cire-box">
                                    <div class="inner-cire">

                                        <h2>Days Left</h2>
                                        @if($isPast)
                                        <h4>(Event has passed)</h4>
                                    @else
                                        <h3>{{ $daysLeft }}</h3>
                                        @endif

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
