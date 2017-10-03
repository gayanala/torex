<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tagg</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>

    html, body {
        background-color: #71c4ff;
        /*color: #636b6f;*/
        /*font-family: 'Raleway', sans-serif;*/
        /*font-weight: 100;*/
        /*height: 100vh;*/
        /*margin: 0;*/
    }



    /*.content {*/
        /*text-align: center;*/
    /*}*/

    /*.title {*/
        /*font-size: 84px;*/
    /*}*/

    /*.links > a {*/
        /*color: #636b6f;*/
        /*padding: 0 25px;*/
        /*font-size: 12px;*/
        /*font-weight: 600;*/
        /*letter-spacing: .1rem;*/
        /*text-decoration: none;*/
        /*text-transform: uppercase;*/
    /*}*/

    /*.m-b-md {*/
        /*margin-bottom: 30px;*/
    /*}*/
</style>

<body>
{{--<div class="flex-center position-ref full-height w3-top" style="background-color: #a6e1ec">--}}
<div class="w3-top">
    <div class="w3-bar w3-white w3-padding w3-card-2">
        <a href="{{ url('/') }}" class="w3-bar-item w3-button">CommunityQ</a>
        @if (Auth::guest())
            <div class="w3-right">
                <a href="{{ route('login') }}" class="w3-bar-item w3-button">Login</a>
                <a href="{{ route('register') }}" class="w3-bar-item w3-button">Register</a>
                <a href="{{ route('donation', ['orgId' => '1'])}} " class="w3-bar-item w3-button">Request Donation</a>
                {{--<a href="donationrequest/create?orgId=1" class="w3-bar-item w3-button">Request Donation</a>--}}
            </div>
        @else
            <div class="w3-right">
                <a href="{{ route('donationrequests.index')}}" class="w3-bar-item w3-button">Donation Requests</a>
                <a href="{{ url('/home') }}" class="w3-bar-item w3-button">
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </a>
                <a href="{{ route('users.index')}}" class="w3-bar-item w3-button">Profile Management</a>
                <a href="{{ route('reset-password') }}" class="w3-bar-item w3-button">Reset Password</a>
                    <a href="{{ route('logout') }}" class="w3-bar-item w3-button"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
            </div>
        @endif
    </div>
</div>
<br><br><br><br>
@yield('content')

</body>


