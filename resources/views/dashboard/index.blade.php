<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Request Management Dashboard</h1>
                <h4>  <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                    data-toggle="dropdown">
                                Year to Date
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
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
                            <div class="col-xs-9 text-right">
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
                            <div class="col-xs-9 text-right">
                                <div class="huge">12</div>
                                <div>REJECTED</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
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
                            <div class="col-xs-9 text-right">
                                <div class="huge">124</div>
                                <div>APPROVED</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
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
                            <div class="col-xs-9 text-right">
                                <div class="huge">13</div>
                                <div>PENDING</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> <b>Top 10 Pending Requests Ready For Denial</b>

                    </div>
                    <!-- /.panel-heading -->
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Event Date & Time</th>
                                    <th>Cause</th>
                                    <th>Organization</th>
                                    <th>Donation Type</th>
                                    <th>Request Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 3:29 PM</td>
                                    <td>10/21/2013</td>
                                    <td>WCA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>
                                    <td>
                                        <div class="btn-group">
                                            <select>
                                                <option value="approve">APPROVE</option>
                                                <option value="deny">DENY</option>

                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 3:20 PM</td>
                                    <td>10/21/2013</td>
                                    <td>WCA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>
                                    <td>
                                        <div class="btn-group">
                                            <select>
                                                <option value="approve">APPROVE</option>
                                                <option value="deny">DENY</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>$721.33</td>
                                    <td> 10/21/2013 3:03 PM</td>
                                    <td>10/21/2013</td>
                                    <td>WCA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>
                                    <td>
                                        <div class="btn-group">
                                            <select>
                                                <option value="approve">APPROVE</option>
                                                <option value="deny">DENY</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 3:00 PM</td>
                                    <td>10/21/2013</td>
                                    <td>WCA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>
                                    <td>
                                        <div class="btn-group">
                                            <select>
                                                <option value="approve">APPROVE</option>
                                                <option value="deny">DENY</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 2:49 PM</td>
                                    <td>10/21/2013</td>
                                    <td>CASA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>
                                    <td>
                                        <div class="btn-group">
                                            <select>
                                                <option value="approve">APPROVE</option>
                                                <option value="deny">DENY</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table style="width:100%">
                                <col align="left">
                                <col align="left">
                                <col align="right">

                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-primary">View All Request </button>
                                    </td>
                                    <td>   <button type="button" class="btn btn-primary">Set Status</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel-body -->
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> <b>Top Items Approved</b></div>
                    <!-- /.panel-heading -->

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Event Date & Time</th>
                                    <th>Cause</th>
                                    <th>Organization</th>
                                    <th>Donation Type</th>
                                    <th>Request Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 3:29 PM</td>
                                    <td>10/21/2013</td>
                                    <td>WCA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>

                                </tr>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 3:20 PM</td>
                                    <td>10/21/2013</td>
                                    <td>WCA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>

                                </tr>
                                <tr>
                                    <td>$721.33</td>
                                    <td> 10/21/2013 3:03 PM</td>
                                    <td>10/21/2013</td>
                                    <td>WCA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>

                                </tr>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 3:00 PM</td>
                                    <td>10/21/2013</td>
                                    <td>WCA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>

                                </tr>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 2:49 PM</td>
                                    <td>10/21/2013</td>
                                    <td>CASA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>

                                </tr>
                                </tbody>
                            </table>
                            <table style="width:100%">
                                <col align="left">
                                <col align="left">
                                <col align="right">

                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-primary">View All  Requests</button>
                                    </td>
                                    <td>   <button type="button" class="btn btn-primary">Set Requests Status</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                    <!-- /.panel-body -->
                </div>
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> <b>Top 10 Pending Requests Ready For Approval</b>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Event Date & Time</th>
                                    <th>Cause</th>
                                    <th>Organization</th>
                                    <th>Donation Type</th>
                                    <th>Request Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 3:29 PM</td>
                                    <td>10/21/2013</td>
                                    <td>WCA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>
                                    <td>
                                        <div class="btn-group">
                                            <select>
                                                <option value="deny">DENY</option>
                                                <option value="approve">APPROVE</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 3:20 PM</td>
                                    <td>10/21/2013</td>
                                    <td>WCA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>
                                    <td>
                                        <div class="btn-group">
                                            <select>
                                                <option value="deny">DENY</option>
                                                <option value="approve">APPROVE</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>$721.33</td>
                                    <td> 10/21/2013 3:03 PM</td>
                                    <td>10/21/2013</td>
                                    <td>WCA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>
                                    <td>
                                        <div class="btn-group">
                                            <select>
                                                <option value="deny">DENY</option>
                                                <option value="approve">APPROVE</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 3:00 PM</td>
                                    <td>10/21/2013</td>
                                    <td>WCA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>
                                    <td>
                                        <div class="btn-group">
                                            <select>
                                                <option value="deny">DENY</option>
                                                <option value="approve">APPROVE</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 2:49 PM</td>
                                    <td>10/21/2013</td>
                                    <td>CASA</td>
                                    <td>Gift Cards</td>
                                    <td>10/21/2013</td>
                                    <td>
                                        <div class="btn-group">
                                            <select>
                                                <option value="deny">DENY</option>
                                                <option value="approve">APPROVE</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table style="width:100%">
                                <col align="left">
                                <col align="left">
                                <col align="right">

                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-primary">View All Request</button>
                                    </td>
                                    <td>   <button type="button" class="btn btn-primary">Set Status</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <!-- /.panel-body -->
                </div>

                <!-- /.panel -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> <b>Top Cause Categories</b>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Cause</th>
                                    <th>Organization</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>$321.33</td>
                                    <td>Fund raising for violence against women</td>
                                    <td>WCA</td>

                                </tr>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 3:20 PM</td>
                                    <td>10/21/2013</td>

                                </tr>
                                <tr>
                                    <td>$721.33</td>
                                    <td> 10/21/2013 3:03 PM</td>
                                    <td>10/21/2013</td>

                                </tr>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 3:00 PM</td>
                                    <td>10/21/2013</td>

                                </tr>
                                <tr>
                                    <td>$321.33</td>
                                    <td>10/21/2013 2:49 PM</td>
                                    <td>10/21/2013</td>

                                </tr>
                                </tbody>
                            </table>
                            <table style="width:100%">
                                <col align="left">
                                <col align="left">
                                <col align="right">

                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-primary">View All  Requests</button>
                                    </td>
                                    <td>   <button type="button" class="btn btn-primary">Set Requests Status</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>

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
<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/plugins/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/sb-admin-2.js"></script>

</body>

</html>
