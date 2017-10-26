@component('mail::message')
# Dear, _{{$request->first_name}}_

Thank you for entering a request for donation on our website.
Unfortunately, at this time we are not able to help out with your event.


Thanks,<br>
{{ $org }}
@endcomponent
