@component('mail::message')
# Welcome to CommunityQ!, {{$user->first_name}}

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent'



Thanks,<br>
{{ config('app.name') }}
@endcomponent
