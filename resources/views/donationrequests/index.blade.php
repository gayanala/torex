@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{--<div class="col-md-10 col-md-offset-1">--}}
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{ $organizationName }}</h1></div><br>

                    {{--<div class="col-md-offset-8 col-lg-offset-8 col-xs-offset-8 form-inline">--}}
                        {{--{{ Form::open(['method'=> 'GET', 'action' => 'DonationRequestController@searchDonationRequest']) }}--}}
                        {{--{{ Form::input('search','q', null, ['placeholder' => 'Requester Name...','class'=>'form-control', 'autocomplete'=>'off'])}}--}}
                        {{--{!! Form::submit('Search', ['class' => 'btn btn-default']) !!}--}}
                        {{--{{ Form::close() }}--}}
                    {{--</div> <br>--}}

                    {{--<div class="col-md-offset-8 col-lg-offset-8 col-xs-offset-8">--}}
                        {{--<a type="button" class="btn btn-primary" href="{{ action('DonationRequestController@index') }}">View All Donation Requests</a>--}}
                    {{--</div>--}}

                    <div class="panel-body">
                        @if(sizeOf($donationrequests) != 0)
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr class="bg-info">
                                <th class="text-center">Select</th>
                                {{--<th class="text-center">Requester</th>--}}
                                <th class="text-center">Request Amount</th>
                                <th class="text-center">Request For</th>
                                <th class="text-center">Event Name</th>
                                <th class="text-center">Handout Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                                {{--<th colspan="2" class="text-center">Actions</th>--}}
                            </tr>
                            </thead>
                            <tfoot class="bg-info">
                                <th class="text-center">Select</th>
                                {{--<th class="text-center">Requester</th>--}}
                                <th class="text-center">Request Amount</th>
                                <th class="text-center">Request For</th>
                                <th class="text-center">Event Name</th>
                                <th class="text-center">Handout Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tfoot>
                            <tbody  style="text-align: center">
                            @foreach ($donationrequests as $donationrequest)
                                <tr>
                                    <td style="vertical-align: middle">
                                        <input type="checkbox" name="selectBox" value="checked">
                                    </td>
                                    {{--<td style="vertical-align: middle">{{ $donationrequest->requester }}</td>--}}
                                    <td style="vertical-align: middle">${{ $donationrequest->dollar_amount }}</td>
                                    <td style="vertical-align: middle">{{ $donationrequest->item_requested }}</td>
                                    <td style="vertical-align: middle">{{ $donationrequest->event_name }}</td>
                                    <td style="vertical-align: middle">{{ $donationrequest->event_end_date }}</td>
                                    <td style="vertical-align: middle">{{ $donationrequest->approval_status_id }}</td>
                                    <td>
                                        <a href="{{route('donationrequests.show',$donationrequest->id)}}" class="btn btn-info">
                                            <span class="glyphicon glyphicon-list-alt"></span> Detail</a>
                                        {{--<button class="show-modal btn btn-info"--}}
                                                {{--data-info="">--}}
                                            {{--<span class="glyphicon glyphicon-list-alt"></span> Detail--}}
                                        {{--</button>--}}
                                        <button class="edit-modal btn btn-success"
                                                data-info="">
                                            <span class="glyphicon glyphicon-ok"></span> Approve
                                        </button>
                                        <button class="edit-modal btn btn-danger"
                                                data-info="">
                                            <span class="glyphicon glyphicon-remove"></span> Deny
                                        </button>
                                    </td>

                                    {{--<td style="vertical-align: middle"><a href="{{route('donationrequests.show',$donationrequest->id)}}" class="btn btn-primary"> Detail </a>--}}
                                    {{--<td style="vertical-align: middle"><a href="{{route('donationrequests.edit',$donationrequest->id)}}" class="btn btn-warning"> Edit </a>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <p>No Donation Request is stored in the system yet.</p>
                        @endif

                        <div>
                            <a href="" class="btn btn-success" style="width:33%"> Approve Requesters </a>
                            <a href="" class="btn btn-danger" style="width:33%"> Deny Requesters </a>
                            <a href="" class="btn btn-warning" style="width:33%"> Contact Requesters </a>
                        </div>
                            <div class="panel-heading"><h1>Add a Donation Request</h1></div>
                            <input type="button" value="Manual Entry for Donation Request"
                        onClick="window.open('http://tagg-preprod.herokuapp.com/donationrequests/create?orgId={{Auth::user()->organization_id}}', '_blank');"/>
                    </div>
                </div>
            {{--</div>--}}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection