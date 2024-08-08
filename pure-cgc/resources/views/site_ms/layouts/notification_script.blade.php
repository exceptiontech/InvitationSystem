
    <script src="{{url('OneSignalSDKWorker.js')}}"></script>
    <script src="{{url('OneSignalSDKUpdaterWorker.js')}}"></script>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "{{ config('onesignal.appId') }}",
    });
  });
</script>
