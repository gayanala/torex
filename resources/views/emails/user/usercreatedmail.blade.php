@component('mail::message')
# Welcome to CharityQ, _{{$user->first_name}}!_

You have been registered as a business user for ***{{$user->organization->org_name}}***.

Thank you for registering your business on CharityQ.
We look forward to helping your business save time and make it easy to support the charities you truly care about.

A few things you can do with CharityQ:

All requests for donation are streamlined and organized.
* Filters can be used to ensure the organizations your business wants to support are front and center
* Automatically decline donation requests that don’t make sense for your business.
* Add additional users to assist with approving or declining requests.
* Please follow the link below to login to your account:


@component('mail::button', ['url' => 'http://tagg-preprod.herokuapp.com/'])
    Go to CharityQ
@endcomponent'



Thanks,<br>
{{ config('app.name') }}
@endcomponent
