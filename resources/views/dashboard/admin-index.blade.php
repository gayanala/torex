@extends('layouts.app')

@section('content')

    <div id="wrapper">
        <!-- Navigation -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-center">Request Management Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            {{--<div class="row">--}}
                {{--<div class="col-lg-3 col-md-6">--}}
                    {{--<div class="panel panel-green">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-xs-3">--}}
                                    {{--<i class="fa fa-money fa-5x" style="color: #3e8f3e"></i>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-9 text-left">--}}
                                    {{--<div>AVERAGE AMOUNT DONATED: <div class="huge" style="font-weight: bold; font-size: 20px;">${{ $avgAmountDonated }}</div></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-3 col-md-6">--}}
                    {{--<div class="panel panel-green">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-xs-3">--}}
                                    {{--<i class="fa fa-window-close-o fa-5x" style="color: red"></i>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-9 text-left">--}}
                                    {{--<div class="huge"--}}
                                         {{--style="font-weight: bold; font-size: 20px;">{{ $rejectedNumber }}</div>--}}
                                    {{--<div>REJECTED</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<a href="#">--}}
                            {{--<div class="panel-footer">--}}
                                {{--<span class="pull-left">View Details</span>--}}
                                {{--<span class="pull-left"><i class="fa fa-arrow-circle-left"></i></span>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-3 col-md-6">--}}
                    {{--<div class="panel panel-yellow">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-xs-3">--}}
                                    {{--<i class="fa fa-check-square-o fa-5x" style="color: #00dd00"></i>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-9 text-left">--}}
                                    {{--<div class="huge"--}}
                                         {{--style="font-weight: bold; font-size: 20px;">{{ $approvedNumber }}</div>--}}
                                    {{--<div>APPROVED</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<a href="#">--}}
                            {{--<div class="panel-footer">--}}
                                {{--<span class="pull-left">View Details</span>--}}
                                {{--<span class="pull-left"><i class="fa fa-arrow-circle-left"></i></span>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-3 col-md-6">--}}
                    {{--<div class="panel panel-red">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-xs-3">--}}
                                    {{--<i class="fa fa-clock-o fa-5x" style="color: darkorange"></i>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-9 text-left">--}}
                                    {{--<div class="huge"--}}
                                         {{--style="font-weight: bold; font-size: 20px;">{{ $pendingNumber }}</div>--}}
                                    {{--<div>PENDING DONATIONS</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-3 col-md-6">--}}
                    {{--<div class="panel panel-red">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-xs-3">--}}
                                    {{--<i class="fa fa-user-circle-o fa-5x" style="color: greenyellow"></i>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-9 text-left">--}}
                                    {{--<div class="huge" style="font-weight: bold; font-size: 20px;">{{ $userCount }}</div>--}}
                                    {{--<div>ACTIVE CUSTOMERS</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-3 col-md-6">--}}
                    {{--<div class="panel panel-red">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-xs-3">--}}
                                    {{--<i class="fa fa-address-book-o fa-5x" ></i>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-9 text-left">--}}
                                    {{--<div class="huge"--}}
                                         {{--style="font-weight: bold; font-size: 20px;">{{ $numActiveLocations }}</div>--}}
                                    {{--<div>ACTIVE LOCATIONS</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-3 col-md-6">--}}
                    {{--<div class="panel panel-red">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-xs-3">--}}
                                    {{--<i class="fa fa-user-circle-o fa-5x" style="color: darkgreen"></i>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-9 text-left">--}}
                                    {{--<div class="huge"--}}
                                         {{--style="font-weight: bold; font-size: 20px;">{{ $userThisWeek }}</div>--}}
                                    {{--<div>NEW BUSINESSES THIS WEEK</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-3 col-md-6">--}}
                    {{--<div class="panel panel-red">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-xs-3">--}}
                                    {{--<i class="fa fa-user-circle-o fa-5x" style="color: yellow"></i>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-9 text-left">--}}
                                    {{--<div class="huge"--}}
                                         {{--style="font-weight: bold; font-size: 20px;">{{ $userThisMonth }}</div>--}}
                                    {{--<div>NEW BUSINESSES THIS MONTH</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading" style="background-color: #d4c8b8;">
                            <div class="row">
                                <div class="col-xs-3" style="padding-bottom: 15px;">
                                    <i class="fa fa-envelope-open fa-5x" style="color: white"></i>
                                </div>
                                <div class="col-xs-9 text-left">
                                    <div style="color: white;font-size: 15px;font-weight: bolder;"> APPROVED : <span
                                                class="huge"
                                                style="font-weight: bold; font-size: 20px;">{{ $approvedNumber }}</span></div>
                                </div>
                                <div class="col-xs-9 text-left">
                                    <div style="color: white;font-size: 15px;font-weight: bolder;"> REJECTED : <span
                                                class="huge"
                                                style="font-weight: bold; font-size: 20px;">{{ $rejectedNumber }}</span></div>
                                </div>
                                <div class="col-xs-9 text-left">
                                    <div style="color: white;font-size: 15px;font-weight: bolder;"> PENDING : <span
                                                class="huge"
                                                style="font-weight: bold; font-size: 20px;">{{ $pendingNumber }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading" style="background-color: #b69da8;">
                            <div class="row">
                                <div class="col-xs-3" style="padding-bottom: 15px;">
                                    <i class="fa fa-users fa-5x" style="color: white"></i>
                                </div>
                                <div class="col-xs-9 text-left">
                                    <div style="color: white;font-size: 15px;font-weight: bolder;"> AVERAGE AMOUNT
                                        DONATED : <span class="huge"
                                                        style="font-weight: bold; font-size: 20px;">${{ $avgAmountDonated }}</span></div>
                                </div>
                                <div class="col-xs-9 text-left">
                                    <div style="color: white;font-size: 15px;font-weight: bolder;"> ACTIVE CUSTOMERS :
                                        <span class="huge"
                                              style="font-weight: bold; font-size: 20px;">{{ $userCount }}</span></div>
                                </div>
                                <div class="col-xs-9 text-left">
                                    <div style="color: white;font-size: 15px;font-weight: bolder;"> ACTIVE LOCATIONS :
                                        <span class="huge"
                                              style="font-weight: bold; font-size: 20px;">{{ $numActiveLocations }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading" style="background-color: #a5c5bd;">
                            <div class="row">
                                <div class="col-xs-3" style="padding-bottom: 15px;">
                                    <i class="fa fa-university fa-5x" style="color: white"></i>
                                </div>
                                <div class="col-xs-9 text-left">
                                    <div style="color: white;font-size: 15px;font-weight: bolder;"> NEW BUSINESSES THIS
                                        WEEK : <span class="huge"
                                                     style="font-weight: bold; font-size: 20px;">{{ $userThisWeek }}</span></div>
                                </div>
                                <div class="col-xs-9 text-left">
                                    <div style="color: white;font-size: 15px;font-weight: bolder;"> NEW BUSINESSES THIS
                                        MONTH : <span class="huge"
                                                      style="font-weight: bold; font-size: 20px;">{{ $userThisMonth }}</span></div>
                                </div>
                                <div class="col-xs-9 text-left">
                                    <div style="color: white;font-size: 15px;font-weight: bolder;"> NEW BUSINESSES THIS
                                        YEAR : <span class="huge"
                                                     style="font-weight: bold; font-size: 20px;">{{ $userThisYear }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">

                <!-- /.col-lg-8 -->
                <div class="col-lg-12">
                    <div class="panel panel-default text-left">
                        <div class="panel-heading">
                            <b>Donations per Businesses</b>
                        </div>

                        <div class="panel-body">
                            @if(sizeOf($organizations) != 0)
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style=>
                                    <thead>
                                        <tr class="bg-info">
                                            <th class="text-center">Business Name</th>
                                            <th class="text-center">Total Amount Requested</th>
                                            <th class="text-center">Total Amount Approved YTD</th>
                                            <th class="text-center">Approved</th>
                                            <th class="text-center">Rejected</th>
                                            <th class="text-center">Status</th>
                                            {{--<th class="text-center">Active Locations</th>--}}
                                            <th class="text-center">Details</th>
                                        </tr>
                                    </thead>

                                    <tbody  style="text-align: center">
                                        @foreach ($organizations as $organization)
                                            @if(is_null($organization->trial_ends_at))
                                                @continue;
                                            @endif
                                            <tr>
                                                <td style="vertical-align: middle">{{ $organization->org_name }}</td>
                                                <td style="vertical-align: middle">${{ $organization->donationRequest->sum('dollar_amount') }}</td>
                                                <td style="vertical-align: middle">${{ $organization->donationRequest->where('approval_status_id', '5')->where('updated_at', '>', \Carbon\Carbon::now()->startOfYear())->sum('approved_dollar_amount') }} </td>
                                                <td style="vertical-align: middle">{{ $organization->donationRequest->where('approval_status_id', '5')->count() }}</td>
                                                <td style="vertical-align: middle">{{ $organization->donationRequest->where('approval_status_id', '4')->count() }}</td>
                                                <td style="vertical-align: middle">{{ $organization->trial_ends_at->gte(\Carbon\Carbon::now()) ? 'Active' : 'Inactive' }}</td>
                                                {{--<td style="vertical-align: middle">{{ App\Organization::findOrFail($organization->id)->where('trial_ends_at', '>=', \Carbon\Carbon::now()->toDateTimeString())->get()  OR App\ParentChildOrganizations::where('parent_org_id', $organization->id)->pluck('child_org_id')->count() }}</td>--}}
                                                <td>
                                                    <a href="{{ url('/organizationdonations', encrypt($organization->id))}}"
                                                       class="btn btn-info" title="Detail">
                                                        <span class="glyphicon glyphicon-list-alt"></span></a>

                                                </td>
                                                {{--<td style="vertical-align: middle"><a href="{{route('donationrequests.show',$donationrequest->id)}}" class="btn savebtn"> Detail </a>--}}
                                                {{--                                    <td style="vertical-align: middle"><a href="{{route('donationrequests.edit',$donationrequest->id)}}" class="btn savebtn"> Edit </a>--}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div>No pending donation requests to show.</div>
                            @endif

                        </div>

                        <!-- Donation request -->
                        <!-- /.panel -->
                    </div>

                    <!-- /.col-lg-4 -->
                </div>

                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <script>

            $(document).ready(function() {
                $('#example').DataTable();
                // Storing the number of all the checkboxes
                // of donation requests
                var totalCheckboxes = $('.myCheckbox').length;
                // Toggling selectall by checking if all the checkboxes are checked
                $('.myCheckbox').change(function() {
                    if (($('.myCheckbox:checked').size() == totalCheckboxes) && (totalCheckboxes != 0)) {
                        $('#selectall').prop('checked', true);
                    } else {
                        $('#selectall').prop('checked', false);
                    }
                });
            } );

            $('#selectall').change(function() {
                idsArray = [];
                if(document.getElementById('selectall').checked) {
                    $('.myCheckbox').prop('checked', true);
                    $('.myCheckbox').each(function(){
                        idsArray.push($(this).attr('ids'));
                    });
                    $('#selected-ids-hidden').val(idsArray);
                    //get all ids push to idsArray
                } else {
                    $('.myCheckbox').prop('checked', false);

                    $('#selected-ids-hidden').val('');
                    // empty/splice idsArray
                }

            });

            var idsArray = [];

            // Populating array with the list of checkboxes with
            // checked ids
            $('.myCheckbox').change(function () {
                var id = $(this).attr('ids');
                if(this.checked) {
                    idsArray.push(id);
                } else {
                    idsArray.splice(idsArray.indexOf(id), 1);
                }
                $('#selected-ids-hidden').val((idsArray));
            });


            function func(actionStatus) {


                $('#selected-ids-hidden').val(JSON.stringify(idsArray));

                // Populating array with the list of checkboxes with
                // checked ids
                $('.myCheckbox').each(function () {
                    if(this.checked) {
                        idsArray.push($(this).attr('ids'));
                    }
                });

                // Sending an ajax post request with the list of checked
                // checkboxes to update to either approved or rejected
                $.ajax({
                    type: "POST",
                    url: 'donation/change-status',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function( resp ) {
                        //window.location.href = 'emaileditor/editsendmail/' + $.param(idsArray);
                        setStatusText = '';
                        if(resp.status == 0) {
                            setStatusText = 'Approved';
                        } else if (resp.status == 1) {
                            setStatusText = 'Rejected';
                        }
                        // Handle your response..
                        for (var i = 0; i < resp.idsArray.length; i++) {
                            // 0 - approved
                            //1- rejected
                            $('#status' + resp.idsArray[i]).text(setStatusText);
                        }
                        //alert(resp.emailids);
                    },
                    data: {ids:idsArray, status:actionStatus}
                });

                // clearing the array
                idsArray = [];

                $('input:checkbox:checked').prop('checked', false);

            }
        </script>

        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    </div>
@endsection
