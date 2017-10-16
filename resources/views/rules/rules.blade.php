@extends('layouts.app')
@section('css')
    <!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="http://querybuilder.js.org/assets/css/docs.min.css" rel="stylesheet">
    <link href="http://querybuilder.js.org/assets/css/style.css" rel="stylesheet">
@endsection
@section('header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.3.0/bootbox.min.js"></script>
@endsection
@section('content')
    <!--<section class="bs-docs-section clearfix"> -->
    <br />
    <br />
    <br />
    <br />
    <div class="col-md-12 col-lg-10 col-lg-offset-1">
        <div id="builder-plugins"></div>
        <div class="btn-group">
            <button class="btn btn-error parse-sql" data-target="plugins">Preview Rules</button>
            <button class="btn btn-warning reset" data-target="plugins">Clear Rules</button>
            <button class="btn btn-success set-json" data-target="plugins">Reset Rules</button>
            <button class="btn btn-primary parse-json" data-target="plugins">Save (Show) Rules</button>
            <a href="{{ action('RuleEngineController@runRule') }}" class="btn btn-default">Run Rule</a>
        </div>
        @if(Session::has('msg')) <div class="alert alert-info"> {{Session::get('msg')}} </div> @endif
        <br />
        <input id="insql" type="text" name="insql" value="SQL" size="100" />
        <br />
        <br />
        <br />
        <!-- <div id="querybuilder"></div> -->
    </div>
    <!-- </section> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.1/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/6.0.7/css/bootstrap-slider.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.bootstrap3.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/awesome-bootstrap-checkbox/1.0.0/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jQuery-QueryBuilder@2.4.3/dist/css/query-builder.default.min.css">



    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/6.0.7/bootstrap-slider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jQuery-QueryBuilder@2.4.3/dist/js/query-builder.standalone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sql-parser@0.5.0/browser/sql-parser.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/interact.js/1.2.6/interact.min.js"></script>


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


    <script src="{{ asset('querybuilder/rulebuilder.js') }}" type="text/javascript"></script>
    <style>
        .code-popup {
            max-height: 500px;
        }
        .modal-backdrop {
            z-index: -1;
        }
    </style>
    <!-- <script>alert('Contact form scripts');</script> -->
    <script>
        var rules_plugins = {!!  htmlspecialchars_decode($rule, ENT_NOQUOTES) !!};
        /*
        var rules_plugins = {
            condition: 'AND',
            rules: [
                {
                    id: 'amount',
                    operator: 'less',
                    value: 500.00
                }, {
                    condition: 'OR',
                    rules: [{
                        id: 'requester_type',
                        operator: 'equal',
                        value: 2
                    }, {
                        id: 'requester_type',
                        operator: 'equal',
                        value: 6
                    }, {
                        id: 'requester_type',
                        operator: 'not_equal',
                        value: 1
                    }]
                }, {
                    condition: 'AND',
                    rules: [{
                        id: 'requester',
                        operator: 'equal',
                        value: 'Naggy Group 1'
                    }, {
                        id: 'requester',
                        operator: 'equal',
                        value: 'Naggy Group 2'
                    }, {
                        id: 'amount',
                        operator: 'less_or_equal',
                        value: 50.00
                    }]
                }]
        };
*/
        $('#builder-plugins').queryBuilder({
            plugins: [
                'sortable',
                'filter-description',
                'unique-filter',
                'bt-tooltip-errors',
                'bt-selectpicker',
                'bt-checkbox',
                'invert',
                'not-group'
            ],
            filters: [{
                id: 'needed_by_date',
                label: 'Date Needed',
                type: 'date',
                validation: {
                    format: 'MM/DD/YYYY'
                },
                plugin: 'datepicker',
                operators: ['less_equal', 'greater_equal', 'between', 'not_between'],
                plugin_config: {
                    format: 'mm/dd/yyyy',
                    todayBtn: 'linked',
                    todayHighlight: true,
                    autoclose: true
                }
            }, {
                id: 'requester',
                label: 'Requester Name',
                type: 'string'
            }, {
                id: 'requester_type',
                label: 'Request Type',
                type: 'integer',
                input: 'select',
                values: {
                    1: 'Animal Welfare',
                    2: 'Arts, Culture & Humanities',
                    3: 'Civil Rights, Social Action & Advocacy',
                    4: 'Community Improvement',
                    5: 'Corporate Giving',
                    6: 'Education K-12',
                    7: 'Environment',
                    8: 'Faith/Religious',
                    9: 'Food, Agriculture & Nutrition',
                    10: 'Health Care',
                    11: 'Human Services',
                    12: 'Youth Sports/Activities',
                    13: 'Others'
                },
                operators: ['equal', 'not_equal', 'in', 'not_in', 'is_null', 'is_not_null']
            }, {
                id: 'tax_exempt',
                label: 'Tax Exempt',
                type: 'boolean',
                input: 'checkbox',
                values: {
                    1: 'Yes'
                },
                operators: ['equal', 'not_equal']
            }, {
                id: 'dollar_amount',
                label: 'Dollar Amount',
                type: 'double',
                validation: {
                    min: 0,
                    step: 0.01
                }
            }/*, {
                id: 'id',
                label: 'Identifier',
                type: 'string',
                placeholder: '____-____-____',
                operators: ['equal', 'not_equal'],
                validation: {
                    format: /^.{4}-.{4}-.{4}$/
                }
            }*/],

            rules: rules_plugins
        });
       /*$('#btn-reset').on('click', function() {
            $('#builder-plugins').queryBuilder('reset');
        });

        $('#btn-set').on('click', function() {
            $('#builder-plugins').queryBuilder('setRules', rules_plugins);
        });

        $('#btn-get').on('click', function() {
            var result = $('#builder-plugins').queryBuilder('getRules');

            if (!$.isEmptyObject(result)) {
                alert(JSON.stringify(result, null, 2));
            }
        });
        $('#btn-getsql').on('click', function() {
            var result = $('#builder-plugins').queryBuilder('getSQL');

            if (!$.isEmptyObject(result)) {
                alert(result);
            }
        });*/
        ////////////////////////////////////////////////////////////////////////////
        // the default rules, what will be used on page loads...
        /*var datatablesRequest = {};
        var _rules = defaultRules = {"condition":"AND","rules":[
            {"id":"active","field":"active","type":"integer","input":"radio","operator":"equal","value":"1"}
        ]};

        // a button/link that is used to update the rules.
        function updateFilters() {
            _rules = $('#querybuilder').queryBuilder('getRules');
            reloadDatatables();
        }

        function filterChange() {
            var _json = JSON.stringify( _rules );
            datatablesRequest = { rules: _json };
        }

        filterChange();

        function reloadDatatables() {
            // Datatables first...
            filterChange();

            $('.dataTable').each(function() {
                dt = $(this).dataTable();
                dt.fnDraw();
            })
        }

        jQuery(document).ready(function(){
            // dynamic table
            oTable = jQuery('.datatable').dataTable({
                "fnServerParams": function(aoData) {
                    // add the extra parameters from the jQuery QueryBuilder to the Datatable endpoint...
                    $.each(datatablesRequest , function(k,v){
                        aoData.push({"name": k, "value": v});
                    })
                }
            })
        });*/
    </script>

@endsection