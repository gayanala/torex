<!doctype html>
<html>
<head>
    <title> Profile Management Page</title>

    <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}">
    <script type="text/javascript"></script>

    <style type="text/css"><!--
        body {
            top: 10%;
            left: 0;
            right: 0;
            margin: 0 auto;
            width: 50%;
            height: 100px;
        }

        --></style>


</head>
<body>


</body>
</html>

<form class="form-horizontal">
    <fieldset>
        <h2> Manage Your Profile Here </h2>

        <h3> Change Username</h3>


        <div class="form-group">

            <label for="inputOldUsername" class="col-lg-2 control-label">Enter Old User Name</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="user_name" name="username">
            </div>

            <label for="inputNewUsername" class="col-lg-2 control-label">Enter New User Name</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="user_name" name="username">
            </div>

            <label for="inputNewUsernameAgain" class="col-lg-2 control-label">Confirm New User Name</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="username" name="username">
                <button type="submit" class="btn btn-">Save Changes</button>
            </div>


            <h3> Update Contact Information</h3>

            <div class="form-group">

                <label for="inputfirstname" class="col-lg-2 control-label">First Name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="username" name="username">
                </div>

                <label for="inputlastname" class="col-lg-2 control-label">Last Name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="username" name="username">
                </div>

                <label for="inputstreetaddress" class="col-lg-2 control-label">Street Address</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="username" name="username">
                </div>

                <label for="inputcity" class="col-lg-2 control-label">City</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="username" name="username">
                </div>

                <label for="inputstate" class="col-lg-2 control-label">State</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="username" name="username">
                </div>

                <label for="inputZipcode" class="col-lg-2 control-label">Zip Code</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="username" name="username">
                </div>

                <label for="inputphone" class="col-lg-2 control-label">Phone Number</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="username" name="username">
                </div>

                <label for="inputorganizationname" class="col-lg-2 control-label">Organization Name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="username" name="username">
                    <button type="submit" class="btn btn-">Save Changes</button>
                </div>
            </div>
            <pre></pre>

            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <h3> Thank You!!!</h3>

                </div>
            </div>
    </fieldset>
</form>
