@extends('layouts.app')

@section('content')

    <div id="wrapper">
        <!-- Navigation -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-center" style="font-size:20px;font-weight: 900;">Dashboard
                        for {{ $organization->org_name }}</h1>
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
                                    {{--<div class="huge" style="font-weight: bold; font-size: 20px;">--}}
                                        {{--${{ $avgAmountDonated }}</div>--}}
                                    {{--<div>AVERAGE AMOUNT DONATED</div>--}}
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
                {{--<div class="col-lg-3 col-md-6">--}}
                    {{--<div class="panel panel-red">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-xs-3">--}}
                                    {{--<i class="fa fa-user-circle-o fa-5x" style="color: blue"></i>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-9 text-left">--}}
                                    {{--<div class="huge"--}}
                                         {{--style="font-weight: bold; font-size: 20px;">{{ $userThisYear }}</div>--}}
                                    {{--<div>NEW BUSINESSES THIS YEAR</div>--}}
                                {{--</div>--}}
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
                                <i class="fa fa-envelope-open fa-5x" style="color: white;"></i>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div style="color: white;font-size: 15px;font-weight: bolder;"> APPROVED : <span
                                            class="huge"
                                            style="font-weight: bold; font-size: 20px;">{{ $approvedNumber }}</span>
                                </div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div style="color: white;font-size: 15px;font-weight: bolder;"> REJECTED : <span
                                            class="huge"
                                            style="font-weight: bold; font-size: 20px;">{{ $rejectedNumber }}</span>
                                </div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div style="color: white;font-size: 15px;font-weight: bolder;"> PENDING : <span
                                            class="huge"
                                            style="font-weight: bold; font-size: 20px;">{{ $pendingNumber }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading" style=" background-color: #b69da8;">
                        <div class="row">
                            <div class="col-xs-3" style="padding-bottom: 15px;">
                                <i class="fa fa-line-chart fa-5x" style="color: white;"></i>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div style="color: white;font-size: 15px;font-weight: bolder;"> AVERAGE AMOUNT DONATED :
                                    <span class="huge"
                                          style="font-weight: bold; font-size: 20px;">${{ $avgAmountDonated }}</span>
                                </div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div style="color: white;font-size: 15px;font-weight: bolder;"> ACTIVE CUSTOMERS : <span
                                            class="huge"
                                            style="font-weight: bold; font-size: 20px;">{{ $userCount }}</span></div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div style="color: white;font-size: 15px;font-weight: bolder;"> ACTIVE LOCATIONS : <span
                                            class="huge"
                                            style="font-weight: bold; font-size: 20px;">{{ $numActiveLocations }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading" style=" background-color:#a5c5bd;">
                        <div class="row">
                            <div class="col-xs-3" style="padding-bottom: 15px;">
                                <i class="fa fa-university fa-5x" style="color: white;"></i>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div style="color: white;font-size: 15px;font-weight: bolder;"> NEW BUSINESSES THIS WEEK
                                    : <span class="huge"
                                            style="font-weight: bold; font-size: 20px;">{{ $userThisWeek }}</span></div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div style="color: white;font-size: 15px;font-weight: bolder;"> NEW BUSINESSES THIS
                                    MONTH : <span class="huge"
                                                  style="font-weight: bold; font-size: 20px;">{{ $userThisMonth }}</span>
                                </div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div style="color: white;font-size: 15px;font-weight: bolder;"> NEW BUSINESSES THIS YEAR
                                    : <span class="huge"
                                            style="font-weight: bold; font-size: 20px;">{{ $userThisYear }}</span></div>
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
                            <b>Business Donations</b>
                        </div>

                        <div class="panel-body">
                            @if(!is_null($organization) && sizeOf($organization) != 0)
                                <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="bg-info">
                                        <th class="text-center">Location Name</th>
                                        <th class="text-center">Location Address</th>
                                        <th class="text-center">Approved</th>
                                        <th class="text-center">Rejected</th>
                                        <th class="text-center">Location Requested Date</th>
                                        {{--<th class="text-center">Details</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody style="text-align: center">
                                        @foreach($organization->donationRequest as $donationRequest)
                                            <tr>
                                                <td style="vertical-align: middle"><?php echo ($donationRequest->organization->org_name); ?></td>
                                                <td style="vertical-align: middle"><?php echo ($donationRequest['street_address1'] . ' ' . $donationRequest['street_address2'] . ' ' . $donationRequest['city'] . ' ' . $donationRequest['state'] . ' ' . $donationRequest['zipcode']); ?></td>
                                                <td style="vertical-align: middle">{{ $donationRequest->where('approval_status_id', '5')->count() }}</td>
                                                <td style="vertical-align: middle">{{ $donationRequest->where('approval_status_id', '4')->count() }}</td>
                                                <td style="vertical-align: middle"><?php echo ($donationRequest->created_at); ?></td>
                                                {{--<td style="vertical-align: middle">--}}
                                                    {{--<a href="{{route('donationrequests.show',encrypt($donationRequest->id))}}" class="btn btn-info" title="Detail">--}}
                                                        {{--<span class="glyphicon glyphicon-list-alt"></span></a>--}}

                                                {{--</td>--}}
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
        <input class="btn backbtn" type="button" value="Back" onClick="history.go(-1);">

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>

        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    </div>
@endsection