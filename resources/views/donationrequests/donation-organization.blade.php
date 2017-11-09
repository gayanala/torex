@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Donation Requests for {{ $organization->org_name }}</div>

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="bg-info">
                                <th class="text-center">Organization Address</th>
                                <th class="text-center">Donation Requested Date</th>
                                <th class="text-center">Organization Name</th>
                                <th class="text-center">Details</th>
                            </tr>
                        </thead>
                            <tbody>
                            @foreach($organization->donationRequest as $donationRequest)
                            <tr class="bg-info">
                                <tr>
                                    <td><?php echo ($donationRequest->organization->org_name); ?></td>
                                    <td><?php echo ($donationRequest['street_address1'] . $donationRequest['street_address2'] . $donationRequest['city'] . $donationRequest['state'] . $donationRequest['zipcode'] . $donationRequest['phone_number']); ?></td>
                                    <td><?php echo ($donationRequest->created_at); ?></td>
                                    <td>Details</td>
                                </tr>
                            </tr>
                                @endforeach
                            </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@stop