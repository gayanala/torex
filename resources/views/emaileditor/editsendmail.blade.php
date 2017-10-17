@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <p class="col-sm-offset-1" style="font-size: 300%; vertical-align: top">Approve and Send Email</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9 col-sm-offset-1">
                <form >
                    <div class="col-sm-9 form-group">
                        <label class="col-sm-3" for="email">Email address:</label>
                        <input class="col-sm-6" type="text" class="form-control" id="subject">
                    </div>
                    <div class="col-sm-9 form-group">
                        <label class="col-sm-3" for="pwd">Password:</label>
                        <input class="col-sm-6" type="password" class="form-control" id="pwd">
                    </div>
                    <div class="col-sm-9 checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <div class="col-sm-9"><button type="submit" class="btn btn-default">Submit</button></div>
                </form>
            </div>
            <div>
                
            </div>
        </div>
@endsection