@extends('layouts.app')

@section('content')

<body>

    <div class="content">
        <div style="text-align:center;padding:170px;">
            <br><br><br><br><br>
            <h1 style="font-size:150px"><img src="http://i66.tinypic.com/2wfl06o.gif" border="0"><img src="http://i65.tinypic.com/2lnwvmd.gif" border="0"></h1>
        </div>
    </div>

    <div class="bottom">
        <form action="{{ route('sendmail') }}" method="post">
            <input type="email" name="mail" placeholder="mail address">
            <input type="text" name="title" placeholder="message">
            <button type="submit">Send Mail</button>
            {{ csrf_field() }}
        </form>
    </div>

@yield('content')

</body>
