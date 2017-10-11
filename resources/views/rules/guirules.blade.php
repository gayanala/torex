@extends('layouts.app')
@section('header')
    <!--<link rel="stylesheet" href="../../../node_modules/jQuery-QueryBuilder/dist/css/query-builder.default.css">-->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://querybuilder.js.org/assets/css/docs.min.css" rel="stylesheet">
    <link href="http://querybuilder.js.org/assets/css/style.css" rel="stylesheet">
    <!-- <script type="text/javascript" src="../../../node_modules/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="../../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../../node_modules/jquery-extendext/jQuery.extendext.js"></script>
    <script type="text/javascript" src="../../../node_modules/dot/doT.js"></script>
    <script type="text/javascript" src="../../../node_modules/moment/moment.js"></script>
    <script type="text/javascript" src="../../../node_modules/jQuery-QueryBuilder/dist/js/query-builder.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.3.0/bootbox.min.js"></script>
    <script src="http://querybuilder.js.org/assets/js/docs.min.js"></script>
    <script src="http://querybuilder.js.org/assets/js/script.js"></script>
@endsection
@section('content')
    <!--<section class="bs-docs-section clearfix"> -->
    <div class="col-md-12 col-lg-10 col-lg-offset-1">
    <div id="builder-plugins"></div>
    <div class="btn-group">
        <button class="btn btn-error parse-json" data-target="plugins">Preview Rules</button>
        <button class="btn btn-warning reset" data-target="plugins">Clear Rules</button>
        <button class="btn btn-success set-json" data-target="plugins">Reset Rules</button>
        <button class="btn btn-primary parse-json" data-target="plugins">Save (Show) Rules</button>
    </div>
    </div>
    <!-- </section> -->
    <link href="http://querybuilder.js.org/dist/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="http://querybuilder.js.org/dist/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet">
    <link href="http://querybuilder.js.org/dist/selectize/dist/css/selectize.bootstrap3.css" rel="stylesheet">
    <link href="http://querybuilder.js.org/dist/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="http://querybuilder.js.org/dist/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="http://querybuilder.js.org/dist/jQuery-QueryBuilder/dist/css/query-builder.default.min.css" rel="stylesheet">

    <script src="http://querybuilder.js.org/dist/moment/min/moment.min.js"></script>
    <script src="http://querybuilder.js.org/dist/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="http://querybuilder.js.org/dist/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js"></script>
    <script src="http://querybuilder.js.org/dist/selectize/dist/js/standalone/selectize.min.js"></script>
    <script src="http://querybuilder.js.org/dist/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="http://querybuilder.js.org/dist/jQuery-QueryBuilder/dist/js/query-builder.standalone.min.js"></script>
    <script src="http://querybuilder.js.org/dist/sql-parser/browser/sql-parser.js"></script>
    <script src="http://querybuilder.js.org/dist/interact/dist/interact.min.js"></script>

    <!-- <script src="../../../node_modules/jQuery-QueryBuilder/dist/js/query-builder.js"></script>
    <script>var baseurl = 'http://querybuilder.js.org';</script>
    <script src="http://querybuilder.js.org/assets/demo-basic.js"></script>
    <script src="http://querybuilder.js.org/assets/demo-widgets.js"></script>
    <script src="http://querybuilder.js.org/assets/demo-plugins.js"></script>
    <script src="http://querybuilder.js.org/assets/demo-import-export.js"></script> -->
    <script src="http://querybuilder.js.org/assets/demo.js"></script>
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
                    id: 'category',
                    operator: 'equal',
                    value: 2
                }, {
                    id: 'category',
                    operator: 'equal',
                    value: 6
                }, {
                    id: 'category',
                    operator: 'not_equal',
                    value: 1
                }]
            }, {
                    condition: 'AND',
                    rules: [{
                        id: 'name',
                        operator: 'equal',
                        value: 'Naggy Group 1'
                    }, {
                        id: 'name',
                        operator: 'equal',
                        value: 'Naggy Group 2'
                    }, {
                        id: 'amount',
                        operator: 'less_or_equal',
                        value: 50.00
                    }]
            }]
        };

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
                id: 'name',
                label: 'Name',
                type: 'string'
            }, {
                id: 'category',
                label: 'Category',
                type: 'integer',
                input: 'select',
                values: {
                    1: 'Athletics',
                    2: 'Cancer Research',
                    3: 'Health Care',
                    4: 'Housing',
                    5: 'Youth Organization',
                    6: 'Veteran Affairs'
                },
                operators: ['equal', 'not_equal', 'in', 'not_in', 'is_null', 'is_not_null']
            }, {
                id: 'in_stock',
                label: 'In stock',
                type: 'integer',
                input: 'radio',
                values: {
                    1: 'Yes',
                    0: 'No'
                },
                operators: ['equal']
            }, {
                id: 'amount',
                label: 'Amount',
                type: 'double',
                validation: {
                    min: 0,
                    step: 0.01
                }
            }, {
                id: 'id',
                label: 'Identifier',
                type: 'string',
                placeholder: '____-____-____',
                operators: ['equal', 'not_equal'],
                validation: {
                    format: /^.{4}-.{4}-.{4}$/
                }
            }],

            rules: rules_plugins
        });
        $('#btn-reset').on('click', function() {
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
    </script>

@endsection