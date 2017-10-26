@component('mail::message')
# Dear Customer,

We're sorry to inform you that your donation request has been rejected.

Thanks,<br>
{{ config('app.name') }}
@endcomponent