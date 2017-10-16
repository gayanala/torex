
@extends('layouts.app')
@section('header')
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('querybuilder/jquery/dist/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('querybuilder/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.3.0/bootbox.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@endsection
@section('content')

<div class="panel panel-default">
  <div class="panel-heading"style="font-size:20px"><b>Select the rule to edit</b></div>
  <div class="panel-body" style="height:350px">

  <div class="col-sm-6">
    <label for="Denial">
      <a href="{{ url('/denialrules')}}" style="font-size:23px"class="w3-bar-item w3-button">Denial Rule</a>
    </label>


<br><br>
<label for="Pending">
  <a href="{{ url('/pendingrules')}}" style="font-size:23px"class="w3-bar-item w3-button">Pending Rule</a>
</label>
    </div>
    <div class="col-sm-6">
      <label for="Acceptance">
        <a href="{{ url('/acceptancerules')}}" style="font-size:23px"class="w3-bar-item w3-button">Acceptance Rule</a>
      </label>
      <br><br>
        <label for="Auto Denial">
          <a href="{{ url('/acceptancerules')}}" style="font-size:23px"class="w3-bar-item w3-button">Auto Denial Rule</a>
        </label>
      </div>
</div>
</div>




@endsection
