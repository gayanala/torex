@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Donation Request</div>

                    <div class="panel-body">

                        {!! Form::model($donationrequest,['method' => 'PATCH','route'=>['donationrequests.update',$donationrequest->id], 'class' => 'form-horizontal']) !!}

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            {!! Form::label('Name of the Organization', '* Name of the Organization:', ['class'=>'col-md-4 control-label', ]) !!}
                            <div class="col-lg-6">
                                {!! Form::text('requester',null,['required'], ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Requester Type', '* Requester Type:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">
                                {!! Form::text('requester_type',null,['required'], ['class' => 'form-control'] ) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('First Name', '* First Name:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('first_name',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Last Name', '* Last Name:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('last_name',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Email Address', 'Email Address:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">   {!! Form::text('email', null,[''],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Phone Number', '* Phone Number:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('phone_number',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Address 1', '* Address 1:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('street_address1',null,['required'],['class'=>'form-control' ]) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Address 2', 'Address 2:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6"> {!! Form::text('street_address2',null,['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('City', '* City:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('city',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('State', '* State:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('state',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Zip Code', '* Zip Code:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('zipcode',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Tax Exempt', '* Tax Exempt:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::radio('taxexempt',null,['required']) !!} Yes &nbsp;&nbsp;
                                {!! Form::radio('taxexempt',null,['required']) !!} No
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Request For', '* Request For:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('item_requested',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Donation Purpose', '* Donation Purpose:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('item_purpose',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Event Name', '* Event Name:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('event_name',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Start Date', '* Start Date:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::date('event_start_date',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('End Date', '* End Date:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::date('event_end_date',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Event Purpose', '* Event Purpose:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('event_purpose',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Attendance', '* Attendance:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('est_attendee_count',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Event Venue or Address', '* Event Venue or Address:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('venue',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Marketing Opportunities', '* Marketing Opportunities:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('marketing_opportunities',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                                {!! Form::submit('Cancel', ['class' => 'btn btn-primary']) !!}
                                <span style="color: red"> <h5>Fields Marked With (<span
                                                style="color: red; font-size: 20px; vertical-align:middle;">*</span>) Are Mandatory</h5></span>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection