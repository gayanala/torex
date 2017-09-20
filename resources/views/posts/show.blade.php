@extends('app')
@section('content')
    <h1>Profile Details</h1>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>ID</td>
                <td><?php echo ($post['id']); ?></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><?php echo ($post['first_name']); ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?php echo ($post['last_name']); ?></td>
            </tr>

            <td>Street Address</td>
            <td><?php echo ($post['address']); ?></td>
            </tr>
            <tr>
                <td>City</td>
                <td><?php echo ($post['city']); ?></td>
            </tr>
            <td>State</td>
            <td><?php echo ($post['state']); ?></td>
            </tr>
            <tr>
                <td>ZipCode</td>
                <td><?php echo ($post['zip_code']); ?></td>
            </tr>
            <td>Phone Number</td>
            <td><?php echo ($post['phone_number']); ?></td>
            </tr>
            <tr>
                <td>Organization Name</td>
                <td><?php echo ($post['organization_name']); ?></td>
            </tr>
            <td>User Name</td>
            <td><?php echo ($post['username']); ?></td>
            </tr>
            <tr>
                <td>Organization Name</td>
                <td><?php echo ($post['password']); ?></td>
            </tr>

            </tbody>
        </table>
    </div>

@stop

