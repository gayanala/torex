@extends('layouts.app')
@section ('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Subscription</div>
                    <div class="panel-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{!! Session::get('success') !!}</div>
                        @endif
                        @if (Session::has('failure'))
                            <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                        @endif
                        <form action="#" method="post" id="payment-form">
                            {{csrf_field()}}

                            <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Number Of Users</label>

                                <div class="col-md-6">
                                    <input id="user_locations" type="text" class="form-control" name="user_locations"
                                           value="{{ old('user_locations') }}" placeholder="User locations" required
                                           autofocus>

                                    @if ($errors->has('user_locations'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('user_locations') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="plan" class="col-md-4 control-label">Plan</label>

                                <div class="col-lg-6">
                                    <select class="form-control" name="plan" id="plan">
                                        <option value="">Select...</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="annually">Annually</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label"></label>

                                <div class="col-md-6">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active"><a href="#"><span class="badge pull-right"><span
                                                            class="glyphicon glyphicon-usd" id="result_final"> 0 </span></span>
                                                Final Payment</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="button" class="btn btn-primary form-control">Pay</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/custom.js')}}"></script>
@endsection