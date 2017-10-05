@extends('layouts.app')

@section('content')
{{
$('#thetable').DataTable({
:
,"fnServerParams": function(aoData){
				console.log('in fnServerParams');
				$.each(datatablesRequest, function(k,v){
					console.log('adding "'+k+'"="'+v+'"');
					aoData[k]=v;
                });
				console.log(aoData);
			}
			function filterChange() {
        var _json = JSON.stringify( _rules );
        datatablesRequest = { querybuilder: _json };
        // formerly: datatablesRequest = { rules: _rules };
    }
    }
}}
    {{ csrf_field() }}

@stop
