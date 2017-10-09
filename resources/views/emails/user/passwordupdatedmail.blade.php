@component('mail::message')
# Hi, {{$user->first_name}}

Your password has been successfully changed!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
