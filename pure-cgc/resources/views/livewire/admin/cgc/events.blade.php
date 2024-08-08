<div>
    <div class="content-body rightside-event">
        <!-- row -->
        <div class="container-fluid">
            <div class="col-lg-12 col-12">

            <div class="row">
                <div class="col-lg-12 col-12">
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
                                        {{--  <th><span class="btn btn-primary">View All</span></th>  --}}
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
                                        <td><img class="avatar" src="{{ img_chk_exist($invitation['creator']?$invitation['creator']->profile_photo_path:'') }}" alt="{{ @$invitation['creator']->name }}" /></td>
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
                                    {{--  {{ $invitations->links() }}  --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



                <div class="col-lg-12 col-12">



                    <section class="clients-section alternate">
                        <div class="sponsors-outer">
                            <ul class="clients-carousel owl-carousel custom-nav">

                                <li class="client-item"><a href="#"><img src="images/c4(1).png" alt></a></li>

                                <li class="client-item"><a href="#"><img src="images/c5(1).png" alt></a></li>

                                <li class="client-item"><a href="#"><img src="images/c6(1).png" alt></a></li>

                                <li class="client-item"><a href="#"><img src="images/c7(1).png" alt></a></li>

                                <li class="client-item"><a href="#"><img src="images/c1(1).png" alt></a></li>

                                <li class="client-item"><a href="#"><img src="images/c2(1).png" alt></a></li>

                                <li class="client-item"><a href="#"><img src="images/c3(1).png" alt></a></li>

                            </ul>
                        </div>
                    </section>






                </div>


            </div>
        </div>
    </div>
</div>
