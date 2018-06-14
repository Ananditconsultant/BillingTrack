@extends('layouts.master')

@section('javascript')
    @include('layouts._typeahead')
    @include('clients._js_lookup')
    @include('layouts._datepicker')
@stop

@section('content')

    <script type="text/javascript">
        $(function () {
            $('#name').focus();
        });
    </script>

    {!! Form::open(['route' => 'timeTracking.projects.store']) !!}

    <section class="content-header">
        <h1 class="pull-left">
            {{ trans('TimeTracking::lang.create_project') }}
        </h1>
        <div class="pull-right">
            <button class="btn btn-primary"><i class="fa fa-save"></i> {{ trans('fi.save') }}</button>
        </div>
        <div class="clearfix"></div>
    </section>

    <section class="content">

        @include('layouts._alerts')

        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">

                    <div class="box-body">

                        <div class="form-group">
                            <label>* {{ trans('TimeTracking::lang.project_name') }}: </label>
                            {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) !!}
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>* {{ trans('fi.company_profile') }}:</label>
                                {!! Form::select('company_profile_id', $companyProfiles, config('fi.defaultCompanyProfile'),
                                ['id' => 'company_profile_id', 'class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-4">
                                <label>* {{ trans('fi.client') }}:</label>
                                {!! Form::text('client_name', null, ['id' => 'client_name', 'class' =>
                                'form-control client-lookup', 'autocomplete' => 'off']) !!}
                            </div>
                            <div class="col-md-4">
                                <label>* {{ trans('fi.due_date') }}:</label>
                                {!! Form::text('due_at', null, ['id' => 'due_at', 'class' => 'date-picker form-control']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>* {{ trans('TimeTracking::lang.hourly_rate') }}:</label>
                                {!! Form::text('hourly_rate', null, ['id' => 'hourly_rate', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {!! Form::close() !!}

    <script type="text/javascript">
        $(function () {
            $("#due_at").datepicker({format: '{{ config('fi.datepickerFormat') }}', autoclose: true});
        })
    </script>

@stop