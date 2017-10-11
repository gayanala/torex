@component('mail::message')
# Hi, {{$user->first_name}}

Your password has been successfully changed!

If you did not reset your password, please report to _admin@charityq.com_

Thanks,<br>
{{ config('app.name') }}
@endcomponent
