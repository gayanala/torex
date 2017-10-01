@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Donation Request Form</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ action('DonationRequestController@store') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="orgId" value="{{ $_GET['orgId'] }}">
                            <div class="form-group{{ $errors->has('requester') ? ' has-error' : '' }}">
                                <label for="requester" class="col-md-4 control-label">Name Of The Organization <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                                <div class="col-md-6">
                                    <input id="requester" type="text" class="form-control" name="requester" value="{{ old('requester') }}" placeholder="Name of your organization" required autofocus>

                                    @if ($errors->has('requester'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('requester') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('requester_type') ? ' has-error' : '' }}">
                                <label for="requester_type" class="col-md-4 control-label">Organization Type <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                                <div class="col-md-4">

                                    <select class="form-control" name="requester_type" id="requester_type">
                                        <option value="Select Organization Type">Select</option>
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
                                        <option value="other">Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label for="firstname" class="col-md-4 control-label">First Name <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" placeholder="Your First Name" required autofocus>

                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label for="lastname" class="col-md-4 control-label">Last Name <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" placeholder="Your Last Name" required autofocus>

                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email Address <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your Email Address" autofocus required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                                <label for="phonenumber" class="col-md-4 control-label">Phone Number <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                                <div class="col-md-6">
                                    <input id="phonenumber" type="tel" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}" placeholder="Your Phonenumber" required autofocus>

                                    @if ($errors->has('phonenumber'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                                <label for="address1" class="col-md-4 control-label">Address 1 <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                                <div class="col-md-6">
                                    <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1') }}" placeholder="Street Address, Company Name or C/O" required autofocus>

                                    @if ($errors->has('address1'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address2" class="col-md-4 control-label">Address 2</label>
                                <div class="col-md-6">
                                    <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') }}" placeholder="Apartment Name, Building Number, Floor">
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="city" class="col-md-4 control-label">City <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="Name of your " required autofocus>

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                <label for="state" class="col-md-4 control-label">State <span style="color: red; font-size: 20px; vertical-align:middle;">*</span> </label>

                                <div class="col-md-6">

                                    <select class="form-control" name="state" id="state" required autofocus>
                                        <option value="Select State">Select State</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA">California</option>
                                        <option value="CO">Colorado</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="DC">District Of Columbia</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="ID">Idaho</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IN">Indiana</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NV">Nevada</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="OH">Ohio</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="OR">Oregon</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="TX">Texas</option>
                                        <option value="UT">Utah</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WA">Washington</option>
                                        <option value="WV">West Virginia</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="WY">Wyoming</option>
                                    </select>

                                    @if ($errors->has('state'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                <label for="zipcode" class="col-md-4 control-label">Zipcode <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                                <div class="col-md-6">
                                    <input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}" placeholder="Your Zipcode" required autofocus>

                                    @if ($errors->has('zipcode'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('taxexempt') ? ' has-error' : '' }}">
                                <label for="taxexempt" class="col-md-4 control-label"> Are you a 501c3? <span style="color: red; font-size: 20px; vertical-align:middle;">*</span> </label>

                                <div class="col-md-6">

                                    <input type="radio" name="taxexempt" value="true">Yes
                                    <input type="radio" name="taxexempt" value="false">No
                                    @if ($errors->has('taxexempt'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('taxexempt') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('item_requested') ? ' has-error' : '' }}">
                                <label for="item_requested" class="col-md-4 control-label">Request For <span style="color: red; font-size: 20px; vertical-align:middle;">*</span> </label>

                                <div class="col-md-6">
                                    <select class="form-control" name="item_requested" id="item_requested">
                                        <option value="">Select...</option>
                                        <option value="productorservice">Product or Service Donation</option>
                                        <option value="sponsorship">Sponsorship/Advertisement</option>
                                        <option value="giftcard">Gift Card</option>
                                        <option value="cashcheck">Cash/Check</option>
                                        <option value="other">Other (please explain)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('item_purpose') ? ' has-error' : '' }}">
                                <label for="item_purpose" class="col-md-4 control-label">Donation Purpose <span style="color: red; font-size: 20px; vertical-align:middle;">*</span> </label>

                                <div class="col-md-6">
                                    <select class="form-control" name="item_purpose" id="item_purpose">
                                        <option value="">Select...</option>
                                        <option value="raffleprize">Raffle/Door Prize</option>
                                        <option value="liveauction">Live Auction</option>
                                        <option value="silentauction">Silent Auction</option>
                                        <option value="onlineauction">Online Auction</option>
                                        <option value="event">Walk/Run/Ride Event</option>
                                        <option value="Other">Other (please explain)</option>
                                    </select>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('eventname') ? ' has-error' : '' }}">
                                <label for="eventname" class="col-md-4 control-label">Name of the Event <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                                <div class="col-md-6">
                                    <input id="eventname" type="text" class="form-control" name="eventname" value="{{ old('eventname') }}" placeholder="Your Event Name" required autofocus>

                                    @if ($errors->has('eventname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('eventname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('startdate') ? ' has-error' : '' }}">
                                <label for="startdate" class="col-md-4 control-label">Event Date <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                                <div class="col-md-6">
                                    <input id="startdate" type="date" class="form-control" name="startdate" value="{{ old('startdate') }}" placeholder="Start Date" required autofocus>

                                    @if ($errors->has('startdate'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('startdate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('enddate') ? ' has-error' : '' }}">
                                <label for="enddate" class="col-md-4 control-label">End Date <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                                <div class="col-md-6">
                                    <input id="enddate" type="date" class="form-control" name="enddate" value="{{ old('enddate') }}" placeholder="End Date" required autofocus>

                                    @if ($errors->has('enddate'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('enddate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('eventpurpose') ? ' has-error' : '' }}">
                                <label for="eventpurpose" class="col-md-4 control-label">Purpose Of The Event <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                                <div class="col-md-6">
                                    <input id="eventpurpose" type="text" class="form-control" name="eventpurpose" value="{{ old('eventpurpose') }}" placeholder="Purpose of the Event" required autofocus>

                                    @if ($errors->has('eventpurpose'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('eventpurpose') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('formAttendees') ? ' has-error' : '' }}">
                                <label for="formAttendees" class="col-md-4 control-label">Estimated Number Of Attendes<span style="color: red; font-size: 20px; vertical-align:middle;">*</span> </label>

                                <div class="col-md-6">
                                    <select class="form-control" name="formAttendees" id="formAttendees">
                                        <option value="">Select</option>
                                        <option value="ten"> fewer than 10</option>
                                        <option value="twentyfive">11-25</option>
                                        <option value="fifty">26-50</option>
                                        <option value="seventyfive">51-75</option>
                                        <option value="onehundred">76-100</option>
                                        <option value="hundredfifty">101-150</option>
                                        <option value="twohundred">151-200</option>
                                        <option value="morethantwohundred">more than 200</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('inputvenue') ? ' has-error' : '' }}">
                                <label for="inputvenue" class="col-md-4 control-label">Event Venue or Address<span style="color: red; font-size: 20px; vertical-align:middle;">*</span> </label>

                                <div class="col-md-6">
                                    <input id="venue" type="text" class="form-control" name="venue" value="{{ old('venue') }}" placeholder="Place event will be held" required autofocus>

                                    @if ($errors->has('venue'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('venue') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('marketingopportunities') ? ' has-error' : '' }}">
                                <label for="marketingopportunities" class="col-md-4 control-label">What are the marketing opportunities? <span style="color: red; font-size: 20px; vertical-align:middle;">*</span> </label>

                                <div class="col-md-6">
                                    <input id="marketingopportunities" type="text" class="form-control" name="marketingopportunities" value="{{ old('marketingopportunities') }}" placeholder="Please provide a brief description" required autofocus>

                                    @if ($errors->has('marketingopportunities'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('marketingopportunities') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        Send Request
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
