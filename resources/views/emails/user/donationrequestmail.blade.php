@component('mail::message')
# Hi, {{$donationRequest->first_name}}

Your Donation Request has been successfully received.

We will get back to you soon, see ya!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
