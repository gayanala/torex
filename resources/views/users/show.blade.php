@extends('app')
@section('content')
    <h1>Profile Details</h1>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>First Name</td>
                <td><?php echo ($user['first_name']); ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?php echo ($user['last_name']); ?></td>
            </tr>

            <tr>
                <td>User Name</td>
                <td><?php echo ($user['user_name']); ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo ($user['email']); ?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><?php echo ($user['password']); ?></td>
            </tr>

            <td>Street Address 1</td>
            <td><?php echo ($user['street_address1']); ?></td>
            </tr>

            <td>Street Address 2</td>
            <td><?php echo ($user['street_address2']); ?></td>
            </tr>

            <tr>
                <td>City</td>
                <td><?php echo ($user['city']); ?></td>
            </tr>

            <td>State</td>
            <td><?php echo ($user['state']); ?></td>
            </tr>

            <tr>
                <td>ZipCode</td>
                <td><?php echo ($user['zipcode']); ?></td>
            </tr>

            <td>Phone Number</td>
            <td><?php echo ($user['phone_number']); ?></td>
            </tr>


            </tbody>
        </table>
    </div>

@stop

