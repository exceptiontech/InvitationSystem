@php
use Carbon\Carbon;
@endphp



 
<div class="content-body">
<div class="container-fluid">
<div class="calendar-container">
    <h2>
        <button class="btn btn-primary w100" wire:click="previousWeek">Prev</button>
        {{ date('F d, Y', strtotime($startOfWeek)) }} - {{ date('F d, Y', strtotime($endOfWeek)) }}
        <button class="btn btn-primary w100" wire:click="nextWeek">Next</button>
    </h2>

    <table>
        <thead>
            <tr>
                <th>Hour</th>
                @foreach ($weekDates as $index => $date)
                <th>{{ $daysOfWeek[$index] }} <br> {{ date('d-m-Y', strtotime($date)) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($hours as $hour)
            <tr>
                <td>{{ $hour }}</td>
                @foreach ($weekDates as $date)
                <td>
                    @foreach ($events as $event)
                    @if ($event->event_date == $date && Carbon::parse($event->event_time)->format('H:00') == $hour)
                    <div class="event-bar increase">
				<div class="extra-det">
                        <span class="event-time">{{ Carbon::parse($event->event_time)->format('H:00') }}</span>
                        <span class="event-title">{{ $event->event_title }}</span>
                    </div>
					  
					   
					   	<div class="guest-atr">
						<div class="us-g"><a href="#" title="guest name"><img src="https://masool.net/cgc-sys/public/uploads/logo.png" alt="name gest"></a></div>
						<div class="us-g"><a href="#" title="guest name"><img src="https://masool.net/cgc-sys/public/uploads/logo.png" alt="name gest"></a></div>
						<div class="us-g"><a href="#" title="guest name"><img src="https://masool.net/cgc-sys/public/uploads/logo.png" alt="name gest"></a></div>

						  </div>
					   
					        </div>
					      </div>
                    @endif
                    @endforeach
                </td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
</div>
</div>