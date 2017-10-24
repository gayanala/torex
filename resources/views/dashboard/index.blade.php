@extends('layouts.app')



@section('header')
    <!-- <title>Dashboard</title> -->

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <h4>
                    <div class="pull-left">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-lg"
                                    data-toggle="dropdown">
                                Year to Date
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-left" role="menu">
                                <li><a href="#">Past months</a>
                                </li>
                                <li><a href="#">Past 6 months</a>
                                </li>
                                <li><a href="#">Past 12 months</a>
                                </li>

                            </ul>
                        </div>
                    </div></h4>
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
                                <div class="huge">$9,160</div>
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
                                <div class="huge">12</div>
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
                                <div class="huge">124</div>
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
                                <div class="huge">13</div>
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
                        <i class="fa fa-bar-chart-o fa-fw"></i> <b>Top 10 Donation Requests</b>
                    </div>

<!-- Donation request -->
                    <!-- /.panel-heading -->
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

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</div>
    @endsection
