@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <!-- will be used to show any messages -->
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>

                @endif


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{URL::action('SubscriptionController@resume')}}"
                           class="btn btn-primary pull-right" style="padding-left:1%;">
                            Resume Subscription </a>
                        <a href="{{URL::action('SubscriptionController@cancel')}}"
                           class="btn btn-primary pull-right" style="text-align: right;padding-right:1%;">
                            Cancel Subscription </a>
                        @if ($count < $subscription)
                            <h1 style="text-align: center">Subscription made for {{$subscription_quantity}}
                                locations</h1>
                        </div>
                        <div class="panel-heading">
                            <a href="{{action('OrganizationController@createOrganization')}}"
                               class="btn btn-primary pull-right">
                                [+] Add </a><h1> Manage Business Locations </h1>
                        </div>

                    @else
                        <div class="alert alert-info">Plan limit includes the parent organization and the limit is
                            crossed, upgrade to add more locations.
                        </div>
                        <div class="panel-heading">
                            <h1> Manage Business Locations </h1>

                            <h1 style="text-align: center">Subscription made for {{$subscriptiondb}} locations</h1>
                        </div>
                    @endif

                </div>

                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="bg-info">
                                <th class="text-center">Business Name</th>
                                <th class="text-center">Business Description</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Monthly Budget</th>
                                <th class="text-center" colspan="2">Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($childOrganizations as $organization)
                                <tr class="text-center">
                                    <td style="vertical-align: middle">{{ $organization->organization['org_name'] }}</td>
                                    <td style="vertical-align: middle">{{ $organization->organization['org_description'] }}</td>
                                    <td style="vertical-align: middle">{{ $organization->organization['street_address1'] }}
                                        {{ $organization->organization['street_address2'] }}
                                        , {{ $organization->organization['city'] }}
                                        , {{ $organization->organization['state'] }} {{ $organization->organization['zipcode'] }}</td>
                                    <td style="vertical-align: middle">{{ $organization->organization['phone_number']}}</td>
                                    <td style="vertical-align: middle">{{'$'}}{{ $organization->organization['monthly_budget']}}</td>
                                    <td style="vertical-align: middle"><a
                                                href="{{route('organizations.edit',$organization->child_org_id)}}"
                                                class="btn btn-warning">Edit</a></td>
                                    <td style="vertical-align: middle">
                                        {{ Form::open([
                                                        'method' => 'DELETE',
                                                        'action' => ['OrganizationController@destroy', $organization->child_org_id]
                                                      ]) }}
                                        <input type="submit" value="Delete" class='btn btn-danger'
                                               onClick="return confirm('Are you sure you want to delete the Business Location?');">
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection