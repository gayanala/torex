@component('mail::message')

# Hi {{$event->name}},

You have {{$event->countPendingDonationRequests}} donation requests that are pending for your organization {{$event->organizationName}}
and going to be expired within 3 weeks. The total dollar amount for pending donation requests is ${{$event->pendingAmount}}. Please review the donation requests as soon as possible.

@component('mail::button', ['url' => 'http://tagg-uno.herokuapp.com/'])
Go to CharityQ
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
