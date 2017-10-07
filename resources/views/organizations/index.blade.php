@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>  View & Update Organization Portfolio </h1></div>
                    <div class="panel-body">
                        @if(sizeOf($organizations) != 0)
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="bg-info">
                                <th class="text-center">Organization Name</th>
                                <th class="text-center">Organization Type</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Phone Number</th>
                                <th colspan="3" class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($organizations as $organization)

                                <tr class="text-center">
                                <td style="vertical-align: middle">{{ $organization->org_name }}</td>
                                <td style="vertical-align: middle">{{ $organization->organization_type_id }}</td>
                                <td style="vertical-align: middle">{{ $organization->street_address1 }} {{ $organization->street_address2 }}, {{ $organization->city }}, {{ $organization->state }} {{ $organization->zipcode }}</td>
                                <td style="vertical-align: middle">{{ $organization->phone_number }}</td>
                                <td style="vertical-align: middle"><a href="{{route('organizations.edit',$organization->id)}}" class="btn btn-warning"> Edit </a>
                                </td>
                            </tr>
                            @endforeach
                            {{$organizations->links()}}
                            </tbody>
                        </table>
                        @else
                            <p>No Organization is stored in the system yet.</p>
                        @endif
                        {{$organizations->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection