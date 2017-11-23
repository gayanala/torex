@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{--<div class="col-md-10 col-md-offset-1">--}}
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{ $organizationName }}</h1></div>
                <br>

                <div class="panel-body" style="position: relative;"><br><br>

                    @if(sizeOf($donationrequests) != 0)

                        <div class="dateControlBlock" style="position: absolute; top: 10px; right:16px; color: #111;">
                            <div style="">
                                From:&nbsp;&nbsp;&nbsp;<input type="date" name="dateStart" id="dateStart" size="8" style="box-shadow: 0 0 0.5px #333; width:140px"/>
                                &nbsp;To:&nbsp;&nbsp;&nbsp;<input type="date" name="dateEnd" id="dateEnd" size="8" style="box-shadow:0 0 0.5px #333; width:140px"/>
                            </div>
                        </div>


                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr class="bg-info">
                                <th class="text-center">Organization Name</th>
                                <th class="text-center">Request Amount</th>
                                <th class="text-center">Request For</th>
                                <th class="text-center">Location</th>
                                {{--<th class="text-center">Event Name</th>--}}
                                <th class="text-center">Date Needed</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Status Reason</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: center">
                            @foreach ($donationrequests as $donationrequest)
                                <tr>
                                    <td style="vertical-align: middle">{{ $donationrequest->requester }}</td>
                                    <td style="vertical-align: middle">${{ $donationrequest->dollar_amount }}</td>
                                    <td style="vertical-align: middle">{{ $donationrequest->donationRequestType->item_name }}</td>
                                    <td style="vertical-align: middle">{{ $donationrequest->organization->org_name }}</td>
                                    {{--<td style="vertical-align: middle">{{ $donationrequest->event_name }}</td>--}}
                                    <td id="neededByDate"
                                        style="vertical-align: middle"><?php echo date("m/d/Y", strtotime($donationrequest->needed_by_date)); ?></td>

                                    <td style="vertical-align: middle"
                                        id="status{{$donationrequest->id}}">{{ $donationrequest->donationApprovalStatus->status_name }}</td>
                                    <td style="vertical-align: middle"
                                        id="status{{$donationrequest->id}}">{{ $donationrequest->approval_status_reason }}</td>
                                    <td style="white-space: nowrap">
                                        @if($donationrequest->donationApprovalStatus->id == 2 || $donationrequest->donationApprovalStatus->id == 3)
                                            <a href="" class="btn btn-success" title="Approve"
                                               don-id="{{$donationrequest->id}}"
                                               onClick="func(0, '{{$donationrequest->id}}')">
                                                <span class="glyphicon glyphicon-ok"></span></a>
                                            <a href="{{route('donationrequests.show',$donationrequest->id)}}"
                                               class="btn btn-info" title="Detail">
                                                <span class="glyphicon glyphicon-list-alt"></span></a>
                                            <a href="" class="btn btn-danger" title="Reject"
                                               onClick="func(1, '{{$donationrequest->id}}')">
                                                <span class="glyphicon glyphicon-remove"></span></a>
                                        @else
                                            <a href="{{route('donationrequests.show',$donationrequest->id)}}"
                                               class="btn btn-info" title="Detail">
                                                <span class="glyphicon glyphicon-list-alt"></span></a>
                                        @endif

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
                               onClick="window.open('{{ url('/donationrequests/create') }}?orgId={{Auth::user()->organization_id}}', '_self') ;"/>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">

    <!--script src="https://code.jquery.com/jquery-1.12.4.js"></script-->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>

    <script src="{{ asset('js/range_dates.js') }}" type="text/javascript"></script>
    <script>


   
        $(document).ready(function () {
            var table = $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        title: '{{ $organizationName }}',
                        filename: function () {
                            var d = new Date();
                            return '{{ $organizationName }}' + '{{$today}}';
                        },
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]  // indexes of the columns that should be printed,
                        }                      // Exclude indexes that you don't want to print.
                    },
                    {
                        extend: 'csv',
                        title: '{{ $organizationName }}',
                        filename: function () {
                            var d = new Date();
                            return '{{ $organizationName }}' + '{{$today}}';
                        },
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }

                    },
                    {
                        extend: 'excel',
                        title: '{{ $organizationName }}',
                        filename: function () {
                            var d = new Date();
                            return '{{ $organizationName }}' + '{{$today}}';
                        },
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    }
                ]
            });


            // Add event listeners to the two range filtering inputs
            $('#dateStart').change(function () {
                table.draw();
            });
            $('#dateEnd').change(function () {
                table.draw();
            });
        });

        function func(actionStatus, donId) {

            // Populating array with the id
            var idsArray = [donId];

            // Sending an ajax post request with the list of checked
            // checkboxes to update to either approved or rejected
            $.ajax({
                type: "POST",
                url: 'donation/change-status',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (resp) {
                    setStatusText = '';
                    if (resp.status == 0) {
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
                },
                data: {ids: idsArray, status: actionStatus}
            });

            // clearing the array
            idsArray = [];


        }
    </script>
@endsection