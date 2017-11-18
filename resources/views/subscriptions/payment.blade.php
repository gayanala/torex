@extends('layouts.app')

@section('content')

    <script>
        var MON_CHAR = {{ config('variables.monthly_charge') }};
        var ANUAL_CHAR = {{ config('variables.annual_charge') }};
        var EXTRA_CHAR = {{ config('variables.extra_charge') }};
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/stripe.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="https://js.stripe.com/v2/"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading"><h1> Subscription </h1></div>
                    <h2 style="text-align:center;"></h2>

                    @if ($errors->any())

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                </div>
                @endif
                {{ Form::open(['method'=> 'POST', 'action' => 'SubscriptionController@getIndex','id'=>'subscription-form']) }}

                {{ csrf_field() }}
                <fieldset>

                    @if(session('response'))
                        <div class="col-md-8 alert alert-success">
                            {{@session('response')}}
                        </div>
                    @endif


                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group{{ $errors->has('user_locations') ? ' has-error' : '' }}">
                                <div class="panel panel-default">
                                    <div class="panel-heading">

                                        <div class="panel-heading"><h1> Number of Locations & Type of Plan</h1></div>
                                    </div>
                                </div>
                                <label class="control-label" for="user_locations">Locations</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="user_locations" id="user_locations" required>
                                        <option value="5">Up to 5</option>
                                        <option value="25">Up to 25</option>
                                        <option value="100">Up to 100</option>
                                        <option value="101+">Unlimiteds</option>
                                    </select>

                                    @if ($errors->has('user_locations'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_locations') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <label for="plan" class="control-label">Plan</label>
                                <div class="col-lg-6">

                                    <select class="form-control" name="plan" id="plan" required>
                                        <option value="">Select...</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Annually">Annually</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6" style="padding-bottom: 12px;">
                            </div>
                            <div class="col-sm-12">
                                <label for="coupon" class="control-label">Coupon</label>
                                <div class="col-md-6" style="padding-left: 0px;">
                                    <input id="coupon" type="text" class="form-control" name="coupon"
                                           value="{{ old('coupon') }}" placeholder="Coupon" required
                                           autofocus>
                                    <input type="button"
                                           class="btn btn-primary pull-right" style="padding-left:1%;" id="apply"
                                           value='Apply'
                                           disabled/>

                                    @if ($errors->has('coupon'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('coupon') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-sm-12" style="max-height: 15px;" id="coupon-message"></div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">

                                    <div class="panel-heading"><h1> Payment Details </h1></div>

                                    <div class="checkbox pull-right">
                                        <label>
                                            <input type="checkbox"/>
                                            Remember
                                        </label>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="stripe-errors panel"></div>
                                    <form role="form">
                                        <div class="form-group">
                                            <label for="cardNumber">
                                                CARD NUMBER</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="cardNumber" maxlength="16"
                                                       data-stripe="number"
                                                       placeholder="Valid Card Number"
                                                       required autofocus/>
                                                <span class="input-group-addon"><span
                                                            class="glyphicon glyphicon-lock"></span></span>

                                            </div>
                                            <span id="card_error" style="color: red; display: none;"></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-7 col-md-7 pull-left">
                                                <label for="expityMonth">EXPIRY DATE</label>
                                                <div class="form-group">

                                                    <div class="col-xs-6 col-lg-6 pl-ziro">
                                                        <input type="text" class="form-control" data-stripe="exp-month"
                                                               id="expiryMonth" placeholder="MM" maxlength="2"
                                                               required/>
                                                    </div>
                                                    <div class="col-xs-6 col-lg-6 pl-ziro">
                                                        <input type="text" class="form-control" data-stripe="exp-year"
                                                               id="expiryYear" placeholder="YY" maxlength="2" required/>
                                                    </div>
                                                </div>
                                                <span id="expiry_error" style="color: red; display: none;"></span>
                                            </div>
                                            <div class="col-xs-5 col-md-5 pull-right">
                                                <div class="form-group">
                                                    <label for="cvCode">
                                                        CV CODE</label>
                                                    <input type="password" class="form-control" data-stripe="cvc"
                                                           maxlength="3"
                                                           id="cvCode"
                                                           placeholder="CV" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="#"><span class="badge pull-right"><span
                                                    class="glyphicon glyphicon-usd" id="result_final">0</span></span>
                                        Final
                                        Payment</a>
                                </li>
                            </ul>
                            <br/>
                            <button class="btn btn-success btn-lg btn-block" type="submit" id="buttonPay">Pay</button>
                        </div>
                    </div>

                </fieldset>

            </div>
            {{form::token()}}
            {{ Form::close() }}
        </div>

    </div>
    </div>
    </body>



@endsection
{{--@section('scripts')--}}

{{--@endsection--}}

