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
                                <th class="text-center">Organization Name</th>
                                <th class="text-center">Request Amount</th>
                                <th class="text-center">Request For</th>
                                {{--<th class="text-center">Event Name</th>--}}
                                <th class="text-center">Handout Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tfoot class="bg-info">
                                <th class="text-center">Organization Name</th>
                                <th class="text-center">Request Amount</th>
                                <th class="text-center">Request For</th>
                                {{--<th class="text-center">Event Name</th>--}}
                                <th class="text-center">Handout Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tfoot>
                            <tbody  style="text-align: center">
                            @foreach ($donationrequests as $donationrequest)
                                <tr>
                                    <td style="vertical-align: middle">{{ $donationrequest->requester }}</td>
                                    <td style="vertical-align: middle">${{ $donationrequest->dollar_amount }}</td>
                                    <td style="vertical-align: middle">{{ $donationrequest->donationRequestType->item_name }}</td>
                                    {{--<td style="vertical-align: middle">{{ $donationrequest->event_name }}</td>--}}
                                    <td style="vertical-align: middle"><?php echo date("m/d/Y", strtotime($donationrequest->needed_by_date)); ?></td>

                                    <td style="vertical-align: middle">{{ $donationrequest->donationApprovalStatus->status_name }}</td>
                                    <td>
                                        <a href="{{route('donationrequests.show',$donationrequest->id)}}" class="btn btn-warning" title="Detail">
                                            <span class="glyphicon glyphicon-list-alt"></span></a>
                                        <a href="" class="btn btn-success" title="Approve">
                                            <span class="glyphicon glyphicon-ok"></span></a>
                                        <a href="" class="btn btn-danger" title="Reject">
                                            <span class="glyphicon glyphicon-remove"></span></a>
                                    </td>
                                    {{--<td style="vertical-align: middle"><a href="{{route('donationrequests.show',$donationrequest->id)}}" class="btn btn-primary"> Detail </a>--}}
{{--                                    <td style="vertical-align: middle"><a href="{{route('donationrequests.edit',$donationrequest->id)}}" class="btn btn-warning"> Edit </a>--}}
                                </tr>
                            @endforeach

                            </tbody>
                            @else
                                <div>No Donation Request is stored in the system yet.</div>
                            @endif
                        </table>

                            <div class="panel-heading"><h1>Add a Donation Request</h1></div>
                            <input type="button" value="Manual Entry for Donation Request"
                        onClick="window.open('{{ url('/donationrequests/create') }}?orgId={{Auth::user()->organization_id}}', '_blank');"/>
                    </div>

                    
 <div class="col-md-2">
          <form action="{{url('donationrequests/export')}}" method='GET' enctype="multipart/form-data">
            <button class="btn btn-success" type="submit">Export</button>
          </form>
        </div>
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