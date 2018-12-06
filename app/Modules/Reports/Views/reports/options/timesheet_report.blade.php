@extends('layouts.master')

@section('javascript')

    {{--@include('reports.options._mod_daterangepicker')--}}
    @include('layouts._daterangepicker')
    {{--@include('layouts._typeahead')--}}

    <script type="text/javascript">
        $(function () {
            $('#btn-run-report').click(function () {

                const from_date = $('#from_date').val();
                const to_date = $('#to_date').val();
                const company_profile_id = $('#company_profile_id').val();

                $.post("{{ route('timesheets.validate') }}", {
                    from_date: from_date,
                    to_date: to_date,
                    company_profile_id: company_profile_id
                }).done(function () {
                    clearErrors();
                    $('#form-validation-placeholder').html('');
                    output_type = $("input[name=output_type]:checked").val();
                    query_string = "?from_date=" + from_date + "&to_date=" + to_date + "&company_profile_id=" + company_profile_id;
                    if (output_type == 'preview') {
                        $('#preview').show();
                        $('#preview-results').attr('src', "{{ route('timesheets.html') }}" + query_string);
                    }
                    else if (output_type == 'pdf') {
                        window.location.href = "{{ route('timesheets.pdf') }}" + query_string;
                    }
                    else if (output_type == 'iif') {
                        window.location.href = "{{ route('timesheets.iif') }}" + query_string;
                    }

                }).fail(function (response) {
                    showErrors($.parseJSON(response.responseText), '#form-validation-placeholder');
                });
            });
        });
    </script>
@stop

@section('content')
    @include('layouts._alerts')

    <section class="container-fluid m-2">
        {{--{!! Form::wobreadcrumbs() !!}--}}
        <h3 class="float-left">@lang('fi.timesheet')</h3>

        <div class="float-right">
            <button class="btn btn-primary" id="btn-run-report">@lang('fi.run_report')</button>
        </div>
        <div class="clearfix"></div>
    </section>

    <section class="container-fluid">

        <div id="form-validation-placeholder"></div>

        <div class="card card-light">
            <div class="card-header">
                <h3 class="card-title">
                    @lang('fi.criteria_timesheet')
                </h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>@lang('fi.company_profile'):</label>
                            {!! Form::select('company_profile_id', $companyProfiles, null, ['id' => 'company_profile_id', 'class' => 'form-control'])  !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>@lang('fi.date_range'):</label>
                            {!! Form::hidden('from_date', null, ['id' => 'from_date']) !!}
                            {!! Form::hidden('to_date', null, ['id' => 'to_date']) !!}
                            {!! Form::text('date_range', null, ['id' => 'date_range', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
                        </div>
                        <script>
                            $('#from_date').val('{{ \Carbon\Carbon::now()->startOfWeek()->subWeek() }}');
                            $('#to_date').val('{{ \Carbon\Carbon::now()->endOfWeek()->subWeek() }}');
                        </script>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>@lang('fi.output_type')</label>
                        <div class="form-check form-check-inline">

                            <label class="form-check-label ">
                                <input class="form-check-input ml-3" type="radio" name="output_type" value="preview"
                                       checked="checked"> @lang('fi.preview')
                            </label>
                            <label class="form-check-label ml-3">
                                <input class="form-check-input" type="radio" name="output_type"
                                       value="pdf"> @lang('fi.pdf')
                            </label>
                            <label class="form-check-label ml-3">
                                <input class="form-check-input" type="radio" name="output_type"
                                       value="iif"> @lang('fi.export_to_timer')
                            </label>
                        </div>
                    </div>
                </div>

            </div>
            {!! Form::close() !!}
        </div>

        <div class="row" id="preview"
             style="height: 100%; background-color: #e6e6e6; padding: 25px; margin: 0; display: none;">
            <div class="col-lg-8 offset-lg-2" style="background-color: white;">
                <iframe src="about:blank" id="preview-results" frameborder="0" style="width: 100%;" scrolling="no"
                        onload="resizeIframe(this, 500);"></iframe>
            </div>
        </div>

    </section>

@stop

