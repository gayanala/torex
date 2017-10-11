@component('mail::message')
# Hi, {{$donationRequest->first_name}} {{$donationRequest->last_name}}

Your Donation Request has been successfully received.

We will get back to you soon.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
