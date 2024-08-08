<div>
    <!-- breadcrumb -->
    <div class="me-breadcrumb">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="me-breadcrumb-box">
                       <h1>Referrals</h1>
                       <p><a href="{{ url('/') }}">Home</a>Referrals</p>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <div class="me-my-account me-padder-top">
    <div class="container">
        <div class="row">
            <div class="west-mar">
                <div class="text-center text-success">
                    @include('includes.messages_site')
                </div>
                <div class="me-my-account-profile">
                    <div class="me-my-profile-head">
                        <div class="me-profile-name">
                            <h4>Referrals</h4>
                        </div>
                    </div>
                    <div  class="me-account-profile-shape">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" height="50" width="100%"> <path class="exqute-fill-white" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3 c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3 c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path></svg>
                    </div>
                    <div class="me-my-profile-body">

<div class="box">
<div class="notification is-success" style="display: none;"><button class="delete"></button>
    <div class="menu">
        <ul class="menu-list"></ul>
    </div>
</div>
<div class="content has-text-centered"><span class="title is-4">Earn 0.005 BTC per each invited member!</span>
    <p class="title is-5 has-padding top is-10">
        Invite your friends to join us, and for each one who will participate in our private voting 5 times or more you will earn 0.005 BTC.
    </p>
</div>
<div class="is-flex is-justify-center is-centerd">
    <p class="control has-icon has-addons"><input type="email" wire:model.lazy='email' placeholder="Email" required="" class="input is-medium is-hovered">
    <button class="button is-success is-medium me-btn" wire:click='send_mail'>
      Send
    </button></p>
</div>
<p class="content"></p>
<p class="control has-addons">
<input type="text" value="{{ url('/?ref=').Auth::user()->user_detail->user_key }}"   id="myvalue" placeholder="{{ Auth::user()->user_detail->user_key }}" readonly="readonly" class="input is-medium is-fullwidth is-hovered">
<button data-clipboard-text="{{ url('/?ref=').Auth::user()->user_detail->user_key }}" onclick="copyToClipboard()" class="button is-info is-medium me-btn">
      Copy
    </button></p>
<p></p>
</div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@push('scripts')
    <script >
        function copyToClipboard() {
            var textBox = document.getElementById("myvalue");
            textBox.select();
            document.execCommand("copy");
        }
    </script>
@endpush
</div>

