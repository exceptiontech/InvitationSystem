<div>
    <div class="content-body rightside-event">
        <!-- row -->

        <div class="invitations-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="eve-table">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th><span>Date</span></th>
                                            <th><span>The Event / orgnaizers</span></th>
                                            <th><span>Invited</span></th>
                                            <th><span>Status</span></th>
                                            <th><span>Creator</span></th>
                                            <th><span>Sending Date</span></th>
                                            <th>
                                                <a href="events" class="btn btn-primary">View All</a>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invitations as $invitation)
                                        <tr>
                                            <td class="date-day">
                                                @php
                                                // Define the event date
                                                $eventDate = \Carbon\Carbon::parse($invitation['event_date']);

                                                // Extract the month abbreviation and day
                                                $month = strtoupper($eventDate->format('M'));
                                                $day = $eventDate->format('d');
                                                @endphp

                                                @if ($invitation['status'] == 'Wait')
                                                <span class="co-day bg-info"></span>
                                                @endif
                                                @if ($invitation['status'] == 'Draft')
                                                <span class="co-day bg-danger"></span>
                                                @endif
                                                @if ($invitation['status'] == 'Sent')
                                                <span class="co-day bg-success"></span>
                                                @endif
                                                <div>
                                                    <span class="month-date">{{ $month }}</span>
                                                    <span class="num-date"> {{ $day }}</span>
                                                </div>
                                            </td>

                                            <td class="oga-event">
                                                <h2>{{ $invitation['event_title'] }}</h2>
                                                {{ $invitation['organization'] }}
                                            </td>
                                            <td><span class="circle-invited">{{ $invitation['contact_count'] }}</span></td>
                                            @if ($invitation['status'] == 'Wait')
                                            <td class="statue-ico"><i class="fa-solid fa-loader"></i> Wait</td>
                                            @endif
                                            @if ($invitation['status'] == 'Draft')
                                            <td class="statue-ico"><i class="fal fa-circle-dashed"></i> Draft</td>
                                            @endif
                                            @if ($invitation['status'] == 'Sent')
                                            <td class="statue-ico"><i class="fa fa-check-circle"></i> Sent</td>
                                            @endif
                                            <td><img class="avatar" src="{{ img_chk_exist($invitation['creator']?$invitation['creator']->profile_photo_path:'') }}" alt="{{ @$invitation['creator']->name }}" />

                                                {{ @$invitation['creator']->name }}</td>
                                            @php
                                            // Parse the event date
                                            $eventDate = \Carbon\Carbon::parse($invitation['event_date']);

                                            // Format the event date as MM/DD/YYYY
                                            $formattedDate = $eventDate->format('m/d/Y');
                                            @endphp
                                            <td class="send-date">{{ $formattedDate }}</td>
                                            <td><a href="{{ url('A_ms_admin/invitations_details/' . $invitation['id']) }}" class="btn btn-primary">View</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                            <div class="col-lg-4 col-12">
                                <div class="card shadow-none rounded-0 bg-transparent h-auto mb-0">
                                    <div class="card-body text-center event-calender pb-2 p-0">


                                        <div wire:ignore class="calendar-detr">
                                            <div class="calendar-assets">
                                                <div class="field">
                                                    <h1 id="currentDate"></h1>
                                                    <button class="btn today-btt" wire:click="resetDate" title="today">Today</button>
                                                    <form class="form-input" id="date-search" wire:submit.prevent="setDate(document.getElementById('date').value)">
                                                        <input type="date" class="text-field d-none" name="date" id="date" required>
                                                        <button type="submit" class="btn btn-small" title="Pesquisar"><i class="fas fa-search"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="calendar" id="table">
                                                <div class="headerdate">
                                                    <div class="month" id="month-header"></div>
                                                    <div class="buttons">
                                                        <button class="icon" onclick="prevMonth()" title="Last month"><i class="fas fa-chevron-left"></i></button>
                                                        <button class="icon" onclick="nextMonth()" title="Next month"><i class="fas fa-chevron-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                    </div>
                                </div>
                            </div>

                    <div class="col-lg-5 col-12">
                        <div class="p-0 pb-4 border-0 card-header d-sm-flex d-block">
                            <h4 class="card-title">{{ @$nextEvent->event_title }}</h4>

                            <a href="{{ url('A_ms_admin/events') }}" title="" class="btn btn-primary w100">More</a>
                        </div>

                        <div class="h-auto overflow-hidden card event-bx">
                            <div class="pb-3 text-center border-0 card-header d-block">
                                <h3 class="card-title">Information</h3>
                            </div>

                            <div class="pt-0 card-body">
                                <div class="mb-3 media align-items-center">
                                    <div class="me-3">
                                        <i class="fal fa-calendar-alt"></i>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0 text-black">Date</h5>
                                        <?php
                                // Assuming $nextEvent->event_date contains the date
                                $date = new DateTime($nextEvent->event_date);
                                $formattedDate = $date->format('l ( d/m/Y )');
                                ?>
                                        <p class="mb-0">{{ $formattedDate }}</p>
                                    </div>
                                </div>
                                <div class="mb-3 media align-items-center">
                                    <div class="me-3">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0 text-black">Time</h5>
                                        {{--  <p class="mb-0">08:00 AM</p>  --}}
                                        <p class="mb-0"> {{ @$nextEvent->event_time }}</p>
                                    </div>
                                </div>
                                <div class="mb-3 media align-items-center">
                                    <div class="me-3">
                                        <i class="fal fa-users-rectangle"></i>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0 text-black">Type of event</h5>
                                        <p class="mb-0">{{ @$nextEvent->event_type }}</p>
                                    </div>
                                </div>

                                <div class="mb-3 media align-items-center">
                                    <div class="me-3">
                                        <i class="fal fa-location-dot"></i>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0 text-black">Location</h5>
                                        <p class="mb-0">{{ @$nextEvent->location_link }}</p>
                                    </div>
                                </div>

                                <div class="mb-3 media align-items-center">
                                    <div class="me-3">
                                        <i class="fal fa-bank"></i>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0 text-black">The orgnaizer</h5>
                                        <p class="mb-0">{{ @$nextEvent->organization  }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-7 col-lg-12 col-sm-12">
                        <div wire:ignore class="card barChart_3">
                            <div class="owl-carousel chats-slider custom-nav">
                                <div  class="tit">
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
                                                <div class="hao"><div id="charts-01"></div></div>
                                                <div class="legend-conut">
                                                    <p>Confirmed</p>
                                                    <span>250</span>
                                                </div>
                                            </div>

                                            <div class="p-0 card-body charts-02">
                                                <div class="hao"><div id="charts-02"></div></div>
                                                <div class="legend-conut">
                                                    <p>Reject</p>
                                                    <span>100</span>
                                                </div>
                                            </div>

                                            <div class="p-0 card-body charts-03">
                                                <div class="hao"><div id="charts-03"></div></div>
                                                <div class="legend-conut">
                                                    <p>Maybe</p>
                                                    <span>50</span>
                                                </div>
                                            </div>

                                            <div class="p-0 card-body charts-04">
                                                <div class="hao"><div id="charts-04"></div></div>
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





                                                                        <div class="tit">
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
                                                <div class="hao"><div id="email-01"></div></div>
                                                <div class="legend-conut">
                                                    <p>Confirmed</p>
                                                    <span>250</span>
                                                </div>
                                            </div>

                                            <div class="p-0 card-body charts-02">
                                                <div class="hao"><div id="email-02"></div></div>
                                                <div class="legend-conut">
                                                    <p>Reject</p>
                                                    <span>100</span>
                                                </div>
                                            </div>

                                            <div class="p-0 card-body charts-03">
                                                <div class="hao"><div id="email-03"></div></div>
                                                <div class="legend-conut">
                                                    <p>Maybe</p>
                                                    <span>50</span>
                                                </div>
                                            </div>

                                            <div class="p-0 card-body charts-04">
                                                <div class="hao"><div id="email-04"></div></div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></div>
