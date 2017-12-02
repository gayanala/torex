@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    {{ csrf_field() }}
                    <div class="panel-heading"><h1 style="text-align: center; font-size: xx-large; vertical-align: ">Edit Email Templates Here</h1></div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr class="bg-info">
                                <th>Email Type</th>
                                <th>Email Subject</th>
                               
                                <th colspan="3"></th>
                            </tr>
                            </thead>
                            <tr>
                                @foreach($email_templates as $email_template)
                                    <td style="vertical-align: middle">{{ $email_template->emailTemplateTypes->template_type }}</td>
                                    <td style="vertical-align: middle">{{ $email_template->email_subject }}</td>
                                   
                                    <td style="vertical-align: middle"><a href="
                                    {{action('EmailTemplateController@edit', ['id' => encrypt($email_template->id)])}}
                                    " class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil"></span></a>
                                </tr>
                                @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection