

<div class="container">
    <form class="form-horizontal" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}
        <fieldset>
            <legend>BUSINESS REGISTRATION</legend>
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif

            @if(session('response'))
                <div class="col-md-8 alert alert-success">
                    {{@session('response')}}
                </div>
            @endif
            <div class="form-group">
                <label for="organization" class="col-lg-2 control-label">Name of Organization:*</label>
                <div class="col-lg-6">
                    <input type="text" name="organization" class="form-control" id="inputorganization" placeholder="Name of Organization">
                </div>
                <div class="form-group">
                    <label for="formOrganization" class="col-lg-2 control-label">Which of the following best describes your organization:</label>
                    <div class="col-lg-6">
                        <select class="form-control" name="formOrganization" id="formOrganization">
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
                    </div>
                    <div class="form-group">
                        <label for="inputfirstname" class="col-lg-2 control-label">First Name:*</label>
                        <div class="col-lg-6">
                            <input type="text" name="firstname" class="form-control" id="inputfirstname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputlastname" class="col-lg-2 control-label">Last Name:*</label>
                        <div class="col-lg-6">
                            <input type="text" name="lastname" class="form-control" id="inputlastname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputemail" class="col-lg-2 control-label">E-Mail:*</label>
                        <div class="col-lg-3">
                            <input type="text" name="email" class="form-control" id="inputemail" placeholder="E-mail address">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="inputphonenumber" class="col-lg-2 control-label">Phone Number:*</label>
                            <div class="col-lg-3">
                                <input type="text" name="phonenumber" class="form-control" id="inputphonenumber" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress1" class="col-lg-2 control-label">Address 1</label>
                            <div class="col-lg-6">
                                <input type="text" name="address1" class="form-control" id="inputAddress1" placeholder="Example: Street Name,Company Name,P.O. Box Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2" class="col-lg-2 control-label">Address 2</label>
                            <div class="col-lg-6">
                                <input type="text" name="address2" class="form-control" id="inputAddress2" placeholder="Example: Apartment,Suite,Unit Number,Building,Floor">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCity" class="col-lg-2 control-label">City</label>
                            <div class="col-lg-3">
                                <input type="text" name="city" class="form-control" id="inputCity" placeholder="Name of the City">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="state" class="col-lg-2 control-label">State</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="state" id="state">
                                    <option value="Select State">Select State</option>
                                    <option value="AL">AL</option>
                                    <option value="AK">AK</option>
                                    <option value="AR">AR</option>
                                    <option value="AZ">AZ</option>
                                    <option value="CA">CA</option>
                                    <option value="CO">CO</option>
                                    <option value="CT">CT</option>
                                    <option value="DC">DC</option>
                                    <option value="DE">DE</option>
                                    <option value="FL">FL</option>
                                    <option value="GA">GA</option>
                                    <option value="HI">HI</option>
                                    <option value="IA">IA</option>
                                    <option value="ID">ID</option>
                                    <option value="IL">IL</option>
                                    <option value="IN">IN</option>
                                    <option value="KS">KS</option>
                                    <option value="KY">KY</option>
                                    <option value="LA">LA</option>
                                    <option value="MA">MA</option>
                                    <option value="MD">MD</option>
                                    <option value="ME">ME</option>
                                    <option value="MI">MI</option>
                                    <option value="MN">MN</option>
                                    <option value="MO">MO</option>
                                    <option value="MS">MS</option>
                                    <option value="MT">MT</option>
                                    <option value="NC">NC</option>
                                    <option value="NE">NE</option>
                                    <option value="NH">NH</option>
                                    <option value="NJ">NJ</option>
                                    <option value="NM">NM</option>
                                    <option value="NV">NV</option>
                                    <option value="NY">NY</option>
                                    <option value="ND">ND</option>
                                    <option value="OH">OH</option>
                                    <option value="OK">OK</option>
                                    <option value="OR">OR</option>
                                    <option value="PA">PA</option>
                                    <option value="RI">RI</option>
                                    <option value="SC">SC</option>
                                    <option value="SD">SD</option>
                                    <option value="TN">TN</option>
                                    <option value="TX">TX</option>
                                    <option value="UT">UT</option>
                                    <option value="VT">VT</option>
                                    <option value="VA">VA</option>
                                    <option value="WA">WA</option>
                                    <option value="WI">WI</option>
                                    <option value="WV">WV</option>
                                    <option value="WY">WY</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputZip" class="col-lg-2 control-label">ZipCode</label>
                            <div class="col-lg-1">
                                <input type="text" name="zipcode" class="form-control" id="inputZip" placeholder="Zip">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputtaxexempt" class="col-lg-2 control-label">Are you a 501c3?*</label>
                            <div class="col-lg-6">
                                <input type="radio" name="taxexempt" value="yes">Yes
                                <input type="radio" name="taxexempt" value="no">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="formRequestFor" class="col-lg-2 control-label">Request For:*</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="formRequestFor" id="formRequestFor">
                                    <option value="">Select...</option>
                                    <option value="productorservice">Product or Service Donation</option>
                                    <option value="sponsorship">Sponsorship/Advertisement</option>
                                    <option value="giftcard">Gift Card</option>
                                    <option value="cashcheck">Cash/Check</option>
                                    <option value="other">Other (please explain)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="formDonationPurpose" class="col-lg-2 control-label">Donation Purpose:*</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="formDonationPurpose" id="formDonationPurpose">
                                    <option value="">Select...</option>
                                    <option value="raffleprize">Raffle/Door Prize</option>
                                    <option value="liveauction">Live Auction</option>
                                    <option value="silentauction">Silent Auction</option>
                                    <option value="onlineauction">Online Auction</option>
                                    <option value="event">Walk/Run/Ride Event</option>
                                    <option value="Other">Other (please explain)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputeventname" class="col-lg-2 control-label">Name of Event:*</label>
                            <div class="col-lg-1">
                                <input type="text" name="eventname" class="form-control" id="inputeventname" placeholder="Name of Event">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputeventdate" class="col-lg-2 control-label">Event Date:*</label>
                            <div class="col-lg-1">
                                <input type="text" name="eventdate" class="form-control" id="inputeventdate" placeholder="Date of Event">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputenddate" class="col-lg-2 control-label">Donation Needed By:*</label>
                            <div class="col-lg-1">
                                <input type="text" name="enddate" class="form-control" id="inputenddate" placeholder="Date Donation will be picked up (if approved)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputeventpurpose" class="col-lg-2 control-label">Event Purpose:*</label>
                            <div class="col-lg-1">
                                <input type="text" name="eventpurpose" class="form-control" id="inputeventpurpose" placeholder="Purpose of event..example: raise awareness, generate funds for research, ect.">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="FormAttendees" class="col-lg-2 control-label">Estimated Number of Attendees:*</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="FormAttendees" id="FormAttendees">
                                    <option value="">Select...</option>
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
                        <div class="form-group">
                            <label for="inputvenue" class="col-lg-2 control-label">Event Venue or address:*</label>
                            <div class="col-lg-1">
                                <input type="text" name="venue" class="form-control" id="inputvenue" placeholder="Place event will be held">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputmarketingopportunities" class="col-lg-2 control-label">What are the marketing opportunities to our business if approved?*</label>
                            <div class="col-lg-1">
                                <input type="text" name="marketingopportunities" class="form-control" id="inputmarketingopportunities" placeholder="Please provide a brief description of the business value this event creates for the company.">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>



