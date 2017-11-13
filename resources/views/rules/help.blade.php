@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
<h1 style="left-padding:20%;"><b>Business Rules Help</b></h1><br>
                <iframe src="{{ asset('files/business_rules_help.pdf') }}" width="100%" height="670px" scrolling="Yes"
                        style=" border:solid;left-paddinf:20%;"></iframe>
        </div>
    </div>

@endsection
