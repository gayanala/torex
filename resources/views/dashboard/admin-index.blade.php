@extends('layouts.app')

@section('content')

    <div id="wrapper">
        <!-- Navigation -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-center" style="font-size:20px;font-weight: 900;">TAGG DASHBOARD (YTD)</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading" style="background-color: #d4c8b8;">
                        <div class="row">
                            <div class="col-xs-3" style="padding-bottom: 15px;">
                                <i class="fa fa-envelope-open fa-5x" style="color: white"></i>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div style="color: white;font-size: 15px;font-weight: bolder;"> REQUESTS APPROVED : <span
                                            class="huge"
                                            style="font-weight: bold; font-size: 20px;">{{ $approvedNumber }}</span></div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div style="color: white;font-size: 15px;font-weight: bolder;"> REQUESTS REJECTED : <span
                                            class="huge"
                                            style="font-weight: bold; font-size: 20px;">{{ $rejectedNumber }}</span></div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div style="color: white;font-size: 15px;font-weight: bolder;"> REQUESTS PENDING : <span
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
                                    <i class="fa fa-university fa-5x" style="color: white"></i>
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
                                    <i class="fa fa-line-chart fa-5x" style="color: white"></i>
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
                        <div class="panel-heading text-center" style="color:#0077aa;font-size:15px;">
                            <b>DONATIONS SUMMARY</b>
                        </div>

                        <div class="panel-body">
                            @if(sizeOf($organizations) != 0)
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style=>
                                    <thead>
                                        <tr class="bg-info">
                                            <th class="text-center">Business Name</th>
                                            <th class="text-center">Amount Requested</th>
                                            <th class="text-center">Amount Approved</th>
                                            <th class="text-center">Approved</th>
                                            {{--<th class="text-center">Rejected</th>--}}
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
                                                <td style="vertical-align: middle">${{ $organization->approvedDonationRequest->sum('dollar_amount') }}</td>
                                                <td style="vertical-align: middle">${{ $organization->approvedDonationRequest->where('approval_status_id', 5)->where('updated_at', '>', \Carbon\Carbon::now()->startOfYear())->sum('approved_dollar_amount') }} </td>
                                                <td style="vertical-align: middle">{{ $organization->approvedDonationRequest->where('approval_status_id', 5)->count() }}</td>
                                                {{--<td style="vertical-align: middle">{{ $organization->donationRequest->where('approval_status_id', '4')->count() }}</td>--}}
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
            } );
        </script>

        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    </div>
@endsection
