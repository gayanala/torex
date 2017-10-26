@component('mail::message')
# Dear, _{{$request->first_name}}_

Thank you for entering a request for donation on our website.
We have reviewed your request and determined we would like to help out with your event.
Instructions will follow with information about how to pick up your request.


Thanks,<br>
{{ $org }}
@endcomponent
