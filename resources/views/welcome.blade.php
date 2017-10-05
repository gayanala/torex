@extends('layouts.app')

@section('content')

<body>

    <div class="content">
        <div style="text-align:center;padding:170px;">
            <br><br><br><br><br>
            <h1 style="font-size:150px">CommunityQ</h1>
        </div>
    </div>

{{--test mail form--}}
    {{--    <div class="bottom">
        <form action="{{ route('sendmail') }}" method="post">
            <input type="email" name="mail" placeholder="mail address">
            <input type="text" name="title" placeholder="message">
            <button type="submit">Send Mail</button>
            {{ csrf_field() }}
        </form>
    </div>--}}

@yield('content')

</body>
