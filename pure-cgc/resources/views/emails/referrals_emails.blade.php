@component('mail::message')
Welcome to {{ config('app.name') }} , you can use this button to register in site

@component('mail::button', ['url' => url('/?ref=').Auth::user()->user_detail->user_key])
register
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
