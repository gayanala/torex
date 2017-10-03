@extends('layouts.app')

@section('content')

  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Email Editor</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="{{ action('UserController@create') }}">
                            {{ csrf_field() }}

                          
                            <div class="form-group{{ $errors->has('email_template_types') ? ' has-error' : '' }}">
                                <label for="email_template_types" class="col-md-4 control-label"> Template Type <span
                                            style="color: red; font-size: 20px; vertical-align:middle;">*</span>
                                </label>

                                <div class="col-md-6">
                                    <input id="email_template_types" type="text" class="form-control" name="email_template_types"
                                           value="{{ old('emaemail_template_typesil_subject') }}" placeholder="Template For" required
                                           autofocus>

                                    @if ($errors->has('email_template_types'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email_template_types') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('email_subject') ? ' has-error' : '' }}">
                                <label for="email_subject" class="col-md-4 control-label"> Subject <span
                                            style="color: red; font-size: 20px; vertical-align:middle;">*</span>
                                </label>

                                <div class="col-md-6">
                                    <input id="email_subject" type="text" class="form-control" name="email_subject"
                                           value="{{ old('email_subject') }}" placeholder="Subject For The Email" required
                                           autofocus>

                                    @if ($errors->has('email_subject'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email_subject') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


 <textarea>Enter Your Template For Email's Here</textarea>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                    
                                    <span style="color: red"> <h5>Fields Marked With (<span
                                                    style="color: red; font-size: 20px; vertical-align:middle;">*</span>) Are Mandatory</h5></span>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
