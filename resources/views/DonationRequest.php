<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Donation Request Form</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <form action ="welcome.php" method="post">
                        Name of Organization: <input type="text" name="organization"><br>
                        <p>
                            Which of the following best describes your organization:<br>
                            <select name="formOrganization">
                            <option value="">Select...</option>
                            <option value="animalwelfare">Animal Welfare</option>
                            <option value="artsculturehumanities">Arts, Culture & Humanities</option>
                            <option value="civilrightsaction">Civil Rights, Social Action & Advocacy</option>
                            <option value="communityimprovement">Community Improvement</option>
                            <option value="corporategiving">Corporate Giving</option>
                            <option value="education">Education K-12</option>
                            <option value="environment">Environment</option>
                            <option value="faithreligious">Faith/Religious</option>
                            <option value="foodnutrition">Food, Agriculture & Nutrition</option>
                            <option value="healthcare">Health Care</option>
                            <option value="humanservices">Human Services</option>
                            <option value="youthactivities">Youth Sports/Activities</option>
                            <option value="other">Other (please explain)</option>
                            </select>
                        </p>
                        First Name: <input type="text" name="firstname"><br>
                        Last Name: <input type ="text" name="lastname"><br>
                        E-mail: <input type ="text" name="email"><br>
                        Phone Number: <input type ="text" name="phonenumber"><br>
                        E-mail: <input type ="text" name="email"><br>
                        Street Address: <input type ="text" name="streetaddress"><br>
                        City: <input type ="text" name="city"><br>
                        State: <input type ="text" name="State"><br>
                        Zip Code: <input type ="text" name="zipcode"><br>
                        Tax Exempt501c3 Form 
                        Are you a 501c3?
                        <input type="radio" name="taxexempt" value="yes">Yes
                        <input type="radio" name="taxexempt" value="no">No
                        <p>
                            Request for: <br>
                            <select name="formRequestFor">
                                <option value="">Select...</option>
                                <option value="productorservice">Product or Service Donation</option>
                                <option value="sponsorship">Sponsorship/Advertisement</option>
                                <option value="giftcard">Gift Card</option>
                                <option value="cashcheck">Cash/Check</option>
                                <option value="other">Other (please explain)</option>
                            </select>
                        </p>
                        <p>
                            Donation Purpose: <br>
                            <select name="formDonationPurpose">
                                <option value="">Select...</option>
                                <option value="raffleprize">Raffle/Door Prize</option>
                                <option value="liveauction">Live Auction</option>
                                <option value="silentauction">Silent Auction</option>
                                <option value="onlineauction">Online Auction</option>
                                <option value="event">Walk/Run/Ride Event</option>
                                <option value="Other">Other (please explain)</option>
                            </select>
                        </p>
                        Event Name: <input type="text" name="eventtype"><br>
                        Event Date: <input type="date" name="eventdate"><br>
                        Donation Needed by Date: <input type="date" name="enddate"><br>
                        Event Purpose: <textarea name="eventpurpose" rows="5" cols="40"></textarea><br>
                        Estimated Number of Attendees: <input type="text" name="attendees"><br>
                        Event Venue/Address: <textarea name="venue" rows="5" cols="40"></textarea><br>
                        What are the marketing opportunities to our business if approved?<br>
                        <textarea name="marketingopportunities" rows="5" cols="40"></textarea><br>
                    </form>



                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
