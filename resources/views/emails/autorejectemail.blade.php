@component('mail::message')
# Dear Customer,

Your donation request has been rejected. Sorry about that.

Thanks,<br>
{{ config('app.name') }}
@endcomponent