@extends('layouts.app')



@section('header')
    <!-- <title>Dashboard</title> -->

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

@endsection

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
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div class="huge">{{$amountDonated}}</div>
                                <div>TOTAL AMOUNT DONATED</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div class="huge">{{$rejectedNumber}}</div>
                                <div>REJECTED</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-left"><i class="fa fa-arrow-circle-left"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div class="huge">{{$approvedNumber}}</div>
                                <div>APPROVED</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-left"><i class="fa fa-arrow-circle-left"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div class="huge">{{$pendingNumber}}</div>
                                <div>PENDING</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-left"><i class="fa fa-arrow-circle-left"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">

            <!-- /.col-lg-8 -->
            <div class="col-lg-12">
                <div class="panel panel-default text-left">
                    <div class="panel-heading">
                        <b>Pending Requests</b>
                    </div>

<!-- Donation request -->
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        @if(sizeOf($donationrequests) != 0)
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr class="bg-info">
                                    <th class="text-center">SelectAll <input type="checkbox" id="selectall"/></th>
                                    <th class="text-center">Organization Name</th>
                                    <th class="text-center">Request Amount</th>
                                    <th class="text-center">Request For</th>
                                    {{--<th class="text-center">Event Name</th>--}}
                                    <th class="text-center">Handout Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>

                                <tbody  style="text-align: center">
                                @foreach ($donationrequests as $donationrequest)
                                    <tr>
                                        <td style="vertical-align: middle"><input type="checkbox" class="myCheckbox"/></td>
                                        <td style="vertical-align: middle">{{ $donationrequest->requester }}</td>
                                        <td style="vertical-align: middle">${{ $donationrequest->dollar_amount }}</td>
                                        <td style="vertical-align: middle">{{ $donationrequest->donationRequestType->item_name }}</td>
                                        {{--<td style="vertical-align: middle">{{ $donationrequest->event_name }}</td>--}}
                                        <td style="vertical-align: middle"><?php echo date("m/d/Y", strtotime($donationrequest->needed_by_date)); ?></td>

                                        <td style="vertical-align: middle">{{ $donationrequest->donationApprovalStatus->status_name }}</td>
                                        <td>
                                            <a href="{{route('donationrequests.show',$donationrequest->id)}}" class="btn btn-warning" title="Detail">
                                                <span class="glyphicon glyphicon-list-alt"></span></a>

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
                            <button class="active btn-group-lg btn-primary">Approve Selected Donations</button>
                            <button class="active btn-group-lg btn-primary">Reject Selected Donation</button>
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

    <!-- jQuery Version 1.11.0 -->
    <!--script src="js/jquery-1.11.0.js"></script-->

    <!-- Bootstrap Core JavaScript -->
    <!--script src="js/bootstrap.min.js"></script-->

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );

        $('#selectall').change(function() {
            if(document.getElementById('selectall').checked) {
                $('.myCheckbox').prop('checked', true);
            } else {
                $('.myCheckbox').prop('checked', false);
            }

        });
    </script>

</div>
    @endsection
