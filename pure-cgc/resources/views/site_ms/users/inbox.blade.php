@extends('site_ms.layouts.app',['user_dashboard'=>1])

@section('content')
 
@include('includes.messages')
<section class="inbox"> 
  <div class="container"> 
    <div class="inboxdetals">
      <h1 class="titlebold">Your  <span>Inbox</span></h1>
      <div class="row">
        <div class="col-sm-3 leftuser">
          <nav class="user-mass">
@if (count($users_ichats))
    @foreach($users_ichats as $users_ichat)
            <a class="itemusers" href="{{route('my-inbox',$users_ichat->id)}}">
              <img src="{{img_chk_exist($users_ichat->img)}}" alt="">
              <div class="text-not">
                <h3>{{$users_ichat->name.' '.$users_ichat->l_name}} </h3>
                <p>{{cut_arabic_text($users_ichat->last_chat,30)}}</p>
              </div>
              <div class="text-time">
                <small>{{$users_ichat->created_at}}       </small>
                
              </div>
            </a>
    @endforeach
@endif
            </nav>
        </div>


        <div class="col-sm-9 rightchat">
          <div class="chat-text screen2">



          </div>
          {{-- 
            <div class="text-chat">
              <textarea  placeholder="Type a message..."></textarea>
              <nav class="icon-at"><a class="far fa-smile ic-item" href="#"></a><a class="fas fa-paperclip ic-item" href="#">     </a></nav>
            </div>
            <button class="submitsend" type="submit">Send      </button>
           --}}
          <div class="formchat" >
            <input type="hidden" id="to_user" name="to_user" value="{{@$to_user}}">
          <div class="text-chat">
            <textarea  placeholder="Type a message..." id="message"></textarea> 
            {{-- <nav class="icon-at"><a class="far fa-smile ic-item" href="#"></a><a class="fas fa-paperclip ic-item" href="#">     </a></nav>  --}}
          </div>
          <button id="button" class="submitsend" @if($to_user < 1) disabled aria-readonly="true" @endif > Send </button>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">  
  //chat js code
  function update()
  {
      $.get("{{route('text_chat.show',(int)@$to_user)}}", {}, function(data){ $('div.screen2').html(data); });  
      setTimeout('update()', 15000);
      console.log('update chat');
  }
    $(document).ready(function(){
        update();
        $("#button").click(function(){
          var token = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
            url: "{{route('text_chat.store')}}",
            type: 'POST',
            data: {
                "message": $("#message").val(),
                "to_user": $("#to_user").val()
            },
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
              update();
              $("#message").val("");
              $("#success").html("<div style='color:green'>تم الاضافة بنجاح</div>");
              console.log('success');
              $( "#success" ).fadeOut( "slow" );
            },
            error:function(data){
                console.log('faild');
                console.log(data);
            }
        });       
    });
});
</script>
@endsection
