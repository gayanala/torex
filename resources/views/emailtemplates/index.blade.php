@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
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
                            @foreach($emailtemplates as $emailtemplate)
                                      <td style="vertical-align: middle">{{ $emailtemplate->emailTemplateTypes->template_type }}</td>
                                    <td style="vertical-align: middle">{{ $emailtemplate->email_subject }}</td>
                                   
                                    <td style="vertical-align: middle"><a href="
                                    {{action('EmailTemplateController@edit', ['id' => $emailtemplate->id])}}
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