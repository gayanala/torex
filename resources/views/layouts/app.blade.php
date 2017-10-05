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
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <a href="{{ route('login') }}" class="w3-bar-item w3-button">Login</a>
                        <a href="{{ route('register') }}" class="w3-bar-item w3-button">Register</a>
                        <a href="{{ route('donationrequests.create', ['orgId' => '1'])}} " class="w3-bar-item w3-button">Request Donation</a>
                    @else
                        <li><a href="{{ url('/dashboard')}}" class="w3-bar-item w3-button">Dashboard</a></li>
                        <li><a href="{{ url('/guirules')}}" class="w3-bar-item w3-button">Rule Management</a></li>
                        <li><a href="{{ route('donationrequests.index')}}" class="w3-bar-item w3-button">Donation Requests</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<span
                                        class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('users.index')}}">Profile Management</a>
                                </li>
                                <li>
                                    <a href="{{ route('reset-password') }}">
                                        Reset Password
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

</body>



