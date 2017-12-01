@extends('layouts.app')
@section('content')



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
    <script>
        $(window).load(function () {
            var phones = [{"mask": "(###) ###-####"}];
            $('#phone_number').inputmask({
                mask: phones,
                greedy: false,
                definitions: {'#': {validator: "[0-9]", cardinality: 1}},

            });

        });
    </script>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">




                <div class="col-10">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h1>URL for Donations</h1></div>
                        <div class="panel-body">
                            <script type="text/javascript">
                                function Copy() {
                                    var urlCopied = document.getElementById('urlCopied');
                                    urlCopied.value = "{{url('donationrequests/create')}}?orgId={{$organization->id}}&newrequest=true" ;
                                    urlCopied.select();
                                    //Copied = Url.createTextRange();
                                    document.execCommand("copy");
                                    window.confirm("You have successfully generated the URL needed for donation Requests on your website\n" +
                                        "The URL has been copied to your clipboard.");
                                }
                            </script>
                            <div>
                                <input type="button" style="cursor: help;" value="Show Url" title="For use for promotions or on social media." onclick="Copy();" />
                                <input type="text" id="urlCopied" size="80"/><br />
                                <small>
                                    Click the button to copy to display and your clipboard the URL to the donation request form to submit requests to your business.
                                    This URL can be shared on social media sites or embedded as a link in a website to allow outside organizations to submit requests
                                    online that will automatically be filtered by your donation preferences.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="panel panel-default">
                    <div class="panel-heading">Update Location</div>

                    <div class="panel-body">

                        {!! Form::model($organization, ['method' => 'PATCH','route'=>['organizations.update', $organization->id], 'class' => 'form-horizontal']) !!}

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="org_name" class="col-md-4 control-label"> Business Name <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6">
                                {!! Form::text('org_name',null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('org_description') ? ' has-error' : '' }}">
                            <label for="org_description" class="col-md-4 control-label">Business Description</label>

                            <div class="col-md-6">
                                <input id="org_description" type="text" class="form-control" name="org_description"
                                       value="{{ old('org_description', $organization->org_description) }}">

                                @if ($errors->has('org_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('org_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="org_description" class="col-md-4 control-label">Business Type <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="col-md-6">

                                {!! Form::select('organization_type_id', array(null => 'Select...') + $Organization_types->all(), null, ['class'=>'form-control','required', 'disabled']) !!}

                                @if ($errors->has('organization_type_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('organization_type_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="street_address1" class="col-md-4 control-label"> Address 1 <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6">{!! Form::text('street_address1',null,['class' => 'form-control', 'required']) !!}</div>
                        </div>

                        <div class="form-group">
                            <label for="street_address2" class="col-md-4 control-label"> Address 2 </label>
                            <div class="col-lg-6">   {!! Form::text('street_address2', null,['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            <label for="city" class="col-md-4 control-label">City <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6">{!! Form::text('city',null,['class' => 'form-control', 'required']) !!}</div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">State <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="col-md-6">

                                {!! Form::select('state', array(null => 'Select...') + $states->all(), null, ['class'=>'form-control']) !!}

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                            <label for="zipcode" class="col-md-4 control-label">Zip Code <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6"> {!! Form::text('zipcode',null,['class' => 'form-control', 'maxlength' => 5,'id'=>'zipcode','required']) !!}</div>
                        </div>

                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : ''}}">
                            <label for="phone_number" class="col-md-4 control-label">Phone Number <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6">
                            {!! Form::text('phone_number',null,['class' => 'form-control', 'id'      => 'phone_number' ,'required']) !!}


                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'btnSave']) !!}
                                <button id="btnEdit" class="btn btn-primary hidden" type="button">Edit</button>
                                <input class="btn btn-primary" type="button" value="Back" onClick="history.go(-1);">
                                <span style="color: red"> <h5>Fields Marked With (<span
                                                style="color: red; font-size: 20px; vertical-align:middle;">*</span>) Are Mandatory</h5></span>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->organization_id == $organization->id)
<script>
    $(window).load(function() {
        $("input").attr("readonly", true);
        $("select").attr("disabled", true);
        $("#btnSave").addClass("hidden");
        $("#btnCancel").addClass("hidden");
        $('#btnEdit').removeClass('hidden');
    });
    $('#btnEdit').on('click', function () {
        $('input').removeAttr('readonly');
        $('select').removeAttr('disabled');
        $('#btnSave').removeClass('hidden');
        $('#btnEdit').addClass('hidden');
    });
    $("#zipcode").on('keypress', function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            return false;
        }
    });
</script>
        @endif
    </div>
@endsection
