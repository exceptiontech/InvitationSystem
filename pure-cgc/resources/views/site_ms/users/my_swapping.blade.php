@extends('site_ms.layouts.app',['user_dashboard'=>1])

@section('content')
@include('site_ms.layouts.scripts_js_mso')

@include('includes.messages')

<section class="inbox"> 
  <div class="container"> 
    <div class="inboxdetals">
      <h1 class="titlebold">Your  <span>Requests</span></h1>
      <div class="message_ajax"> </div>
      <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#incoming">Incoming </a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#outging">Outging</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#confirmed">Confirmed</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rejected">Rejected</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#canceled">Canceled </a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="incoming"> 
@if (count($swapp_incomings))
    @foreach ($swapp_incomings as $swapp_incoming)
          <div class="itme-rq dis_ms_{{ $swapp_incoming->id }}">
            <div class="row">
              <a href="{{ route('members.show',$swapp_incoming->from_user) }}">
                <div class="col it-rq"><img src="{{ img_chk_exist($swapp_incoming->img) }}" alt="{{ $swapp_incoming->user_name.' '.$swapp_incoming->l_name}}" title="{{ $swapp_incoming->user_name.' '.$swapp_incoming->l_name}}">
                <h2>{{ $swapp_incoming->user_name.' '.$swapp_incoming->l_name}} </h2>
              </div>
            </a>
              <div class="col it-rq"><span>{{ date_only($swapp_incoming->created_at)}} </span></div>
              <div class="col it-rq">
                <p>Swap From: {{ date_only($swapp_incoming->from_date)}} 
                  <br/>Swap to: {{ date_only($swapp_incoming->to_date)}} 
                </p>
              </div>
              <div class="col it-rq">
                <p>{{ cut_arabic_text($swapp_incoming->message,650) }}</p>
              </div>
              <div class="col it-rq">
                <a class="request action_swapp"  swapp="{{ $swapp_incoming->id }}" type="rejected" >Reject</a>
                <a class="accept action_swapp"  swapp="{{ $swapp_incoming->id }}" type="accepted">Accept </a>
              </div>
            </div>
          </div>
    @endforeach 
@else
    <h1><center>No Requests</center></h1>
@endif
          
        </div>
        <div class="tab-pane" id="outging"> 
@if (count($swapp_outgoings))
    @foreach ($swapp_outgoings as $swapp_outgoing)
          <div class="itme-rq dis_ms_{{ $swapp_outgoing->id }}">
            <div class="row">
              <a href="{{ route('members.show',$swapp_outgoing->from_user) }}">
                <div class="col it-rq"><img src="{{ img_chk_exist($swapp_outgoing->img) }}" alt="{{ $swapp_outgoing->user_name.' '.$swapp_outgoing->l_name}}" title="{{ $swapp_outgoing->user_name.' '.$swapp_outgoing->l_name}}">
                  <h2>{{ $swapp_outgoing->user_name.' '.$swapp_outgoing->l_name}} </h2>
                </div>
              </a>
              <div class="col it-rq"><span>{{ date_only($swapp_outgoing->created_at)}} </span></div>
              <div class="col it-rq">
                <p>Swap From: {{ date_only($swapp_outgoing->from_date)}} 
                  <br/>Swap to: {{ date_only($swapp_outgoing->to_date)}} 
                </p>
              </div>
              <div class="col it-rq">
                <p>{{ cut_arabic_text($swapp_outgoing->message,650) }}</p>
              </div>
              <div class="col it-rq">
                <a class="request action_swapp"  swapp="{{ $swapp_outgoing->id }}" type="canceled" >Canceled</a>
              </div>
            </div>
          </div>
    @endforeach 
@else
    <h1><center>No Requests</center></h1>
@endif

        </div>
        <div class="tab-pane" id="confirmed"> 
          
@if (count($swapp_confirms))
    @foreach ($swapp_confirms as $swapp_confirm)
          <div class="itme-rq">
            <div class="row">
              <a href="{{ route('members.show',$swapp_confirm->from_user) }}">
                <div class="col it-rq"><img src="{{ img_chk_exist($swapp_confirm->img) }}" alt="{{ $swapp_confirm->user_name.' '.$swapp_confirm->l_name}}" title="{{ $swapp_confirm->user_name.' '.$swapp_confirm->l_name}}">
                <h2>{{ $swapp_confirm->user_name.' '.$swapp_confirm->l_name}} </h2>
              </div>
            </a>
              <div class="col it-rq"><span>{{ date_only($swapp_confirm->created_at)}} </span></div>
              <div class="col it-rq">
                <p>Swap From: {{ date_only($swapp_confirm->from_date)}} 
                  <br/>Swap to: {{ date_only($swapp_confirm->to_date)}} 
                </p>
              </div>
              <div class="col it-rq">
                <p>{{ cut_arabic_text($swapp_confirm->message,650) }}</p>
              </div>
            </div>
          </div>
    @endforeach 
@else
          <h1><center>No Requests</center></h1>
@endif
        
        </div>
        <div class="tab-pane" id="rejected"> 
          
@if (count($swapp_rejects))
    @foreach ($swapp_rejects as $swapp_reject)
          <div class="itme-rq">
            <div class="row">
              <a href="{{ route('members.show',$swapp_reject->from_user) }}">
                <div class="col it-rq"><img src="{{ img_chk_exist($swapp_reject->img) }}" alt="{{ $swapp_reject->user_name.' '.$swapp_reject->l_name}}" title="{{ $swapp_reject->user_name.' '.$swapp_reject->l_name}}">
                <h2>{{ $swapp_reject->user_name.' '.$swapp_reject->l_name}} </h2>
              </div>
            </a>
              <div class="col it-rq"><span>{{ date_only($swapp_reject->created_at)}} </span></div>
              <div class="col it-rq">
                <p>Swap From: {{ date_only($swapp_reject->from_date)}} 
                  <br/>Swap to: {{ date_only($swapp_reject->to_date)}} 
                </p>
              </div>
              <div class="col it-rq">
                <p>{{ cut_arabic_text($swapp_reject->message,650) }}</p>
              </div>
            </div>
          </div>
    @endforeach 
@else
          <h1><center>No Requests</center></h1>
@endif
        </div>
        <div class="tab-pane" id="canceled"> 
@if (count($swapp_canceleds))
    @foreach ($swapp_canceleds as $swapp_canceled)
          <div class="itme-rq">
            <div class="row">
              <a href="{{ route('members.show',$swapp_canceled->from_user) }}">
                <div class="col it-rq"><img src="{{ img_chk_exist($swapp_canceled->img) }}" alt="{{ $swapp_canceled->user_name.' '.$swapp_canceled->l_name}}" title="{{ $swapp_canceled->user_name.' '.$swapp_canceled->l_name}}">
                <h2>{{ $swapp_canceled->user_name.' '.$swapp_canceled->l_name}} </h2>
              </div>
            </a>
              <div class="col it-rq"><span>{{ date_only($swapp_canceled->created_at)}} </span></div>
              <div class="col it-rq">
                <p>Swap From: {{ date_only($swapp_canceled->from_date)}} 
                  <br/>Swap to: {{ date_only($swapp_canceled->to_date)}} 
                </p>
              </div>
              <div class="col it-rq">
                <p>{{ cut_arabic_text($swapp_canceled->message,650) }}</p>
              </div>
            </div>
          </div>
    @endforeach 
@else
          <h1><center>No Requests</center></h1>
@endif
        </div>
      </div>
    </div>

  </div>
</section>

@endsection
