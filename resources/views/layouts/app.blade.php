<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>A Tagg Intiative</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <script src="{{ asset('js/jquery-1.11.0.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    @yield('header')
    <style>
        body {
            font: 16px Montserrat, sans-serif;
            font-size: small;
            line-height: 2.0;
            color: #0077aa;
            margin-bottom:100px;
            padding:0;
            min-height: 100%;
            position:relative;
            clear: both;
        }

        h2
        {
            font-size: 30px;
            color: #66512c;
            position: relative;
            float: bottom;
            top: 75%;
            left: 55%;
            transform: translate(-60%, 30%);
        }

        h3
        {
            font-size: 30px;
            color: #ffffff;
            position: relative;
            float: bottom;
            top: 75%;
            left: 55%;
            transform: translate(-60%, 30%);
        }

        p {font-size: 16px;
            color: #3a87ad;
            position: relative;
            float: bottom;
            top: 75%;
            left: 53%;
            transform: translate(-55%, 30%);
            vertical-align: middle;
        }
        h1 {font-size: 16px;
            color: #3a87ad;
            position: relative;
            float: bottom;
            top: 75%;
            left: 55%;
            transform: translate(-55%, 30%);
        }

        .margin {margin-bottom: 45px;}
        .bg-1 {

            background-color: #ffab40;
            color: #ffffff;
        }

        img {
            background-size: cover;
            display: block;
            vertical-align: middle;

        }


        .imgalign
        {
            margin-left: auto;
            margin-right: auto;
            background-size: cover;
            display: block;
            vertical-align: middle;
        }

        .txtalign
        {
            margin-left: auto;
            margin-right: auto;
            vertical-align: middle;
            width: 8em
        }

        .bg-2 {
            background-color: #ffffff; /* Dark Blue */
            color: #ffffff;
        }
        .bg-3 {
            background-color: #f1f8e9; /* White */
            color: #555555;
        }
        .bg-4 {
            background-color: #0097a7; /* Black Gray */
            color: #fff;
        }
        .container-fluid {
            padding-top: 0px;
            padding-bottom: 0px;
        }
        .navbar {
            padding-top: 15px;
            padding-bottom: 15px;
            border: 0;
            border-radius: 0;
            margin-bottom: 0;
            font-size: 12px;
            letter-spacing: 5px;
        }
        .navbar-nav  li a:hover {
            color: #1abc9c !important;
        }
        .col-sm-6
        {display: block;}
        .background-image {
            background: no-repeat fixed;
            max-width: 100%;
            display: block;
            left: -50px;
            top:-5px;
            bottom:-5px;
            right: -5px;
            z-index: 1;
            -ms-filter: blur(3px);
            filter: blur(2px);
            margin:1px -30px 1px -25px;
            box-shadow: 0px 5px -1px rgba(34,34,34,0.6);
        }

        .footer {
            position: fixed;
            right: 0;
            bottom: 0px;
            left: 0;
            top: inherit;
            padding-top: -200px;
            text-align: center;
        }


    </style>
</head>


<body>
<div id="app">
    <nav class="navbar navbar-light" style="background-color: #ffffff;">
        <div class="container-fluid">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="row">
                <div class="col-sm-3">

                    <img src="https://lh3.googleusercontent.com/LztMKmMMgzoLugM5QPjZbOafJJUZ8SZa-LX5CYa8qNqtwosMed3NnCF-PE1Atd5i5-AM8A=s170" alt="TAGG" id="logo"  class="img-responsive"/>


                </div>
                <div class="col-sm-9 col-md-offset-3" style='position:absolute;right: 0px;top:15px;' >
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <a href="{{ route('login') }}" class="w3-bar-item w3-button">Login</a>
                                <a href="{{ route('register') }}" class="w3-bar-item w3-button">Register</a>
                                <a href="{{ route('donationrequests.create', ['orgId' => '1'])}} " class="w3-bar-item w3-button">RequestDonation</a>
                            @else
                                <li><a href="{{ url('/dashboard')}}" class="w3-bar-item w3-button">Dashboard</a></li>
                                <li><a href="{{ url('/guirules')}}" class="w3-bar-item w3-button">Rule Management</a></li>
                                <li><a href="{{ route('donationrequests.index')}}" class="w3-bar-item w3-button">Donation Requests</a></li>
                                <li><a href="{{ route('emailtemplates.index')}}" class="w3-bar-item w3-button">Template Editor</a></li>
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
                                            <a href="{{ route('organizations.index')}}">Organization Management</a>
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
            </div>
        </div>
    </nav>

    <div id="content">
        @yield('content')
    </div>

</div>

<!-- Scripts
<script src="{{ asset('js/app.js') }}"></script> -->

</body>
   <footer class="footer bg-4">

    <img src="http://www.unhcr.ca/wp-content/uploads/2016/04/icon-partner.png" class="imgalign"  style="width:100px;height:50px;"  >

    <h5>A tagg Intiative</h5>

   </footer>





