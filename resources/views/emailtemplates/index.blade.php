@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Edit Email Templates Here</h1></div>

                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="bg-info">
                                <th>Email Type</th>
                                <th>Email Subject</th>
                                <th>Email Body</th>
                                <th colspan="3">Actions</th>
                            </tr>
                            </thead>
                            <tr>
                                      <td style="vertical-align: middle">{{ $emailtemplate[0]->template_type_id }}</td>
                                    <td style="vertical-align: middle">{{ $emailtemplate[0]->email_subject }}</td>
                                    <td style="vertical-align: middle">{{ $emailtemplate[0]->email_message }}</td>
                                    <td style="vertical-align: middle"><a href="{{route('emailtemplate', ['id' => $emailtemplate[0]->template_type_id])}}
                                    " class="btn btn-warning"> Edit </a>

                                </tr>
                                
                             <tbody>
                               
                            </tbody>
                        </table>
                    </div>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection