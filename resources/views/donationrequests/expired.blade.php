@extends('layouts.app')

@section('content')
    <script>
        $('#app').hide();
        $('#navDemo').wrap('<span style="display: none;" hidden />');
    </script>
    <br>
    <div class="flex-center full-height">
        <div class="content">
            <div class="title m-b-md">
                Sorry, the Business is not available, please contact Admin for more info.
            </div>
        </div>
    </div>
@endsection