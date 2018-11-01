@extends('layouts.master')

@section('javascript')
    @parent
    <script type="text/javascript">
        $(function () {
            $('#btn-submit').click(function () {
                $('#form-settings').submit();
            });

            $('#btn-recalculate-invoices').click(function () {
                var $btn = $(this).button('loading');
                $.post("{{ route('invoices.recalculate') }}").done(function (response) {
                    notify(response.message, 'info');
                }).fail(function (response) {
                    notify('{{ trans('fi.error') }}: ' + $.parseJSON(response.responseText).message, 'error');
                }).always(function () {
                    $btn.button('reset');
                });
            });

            $('#btn-recalculate-workorders').click(function () {
                var $btn = $(this).button('loading');
                $.post("{{ route('workorders.recalculate') }}").done(function (response) {
                    notify(response.message, 'info');
                }).fail(function (response) {
                    notify('{{ trans('fi.error') }}: ' + $.parseJSON(response.responseText).message, 'error');
                }).always(function () {
                    $btn.button('reset');
                });
            });

            $('#btn-recalculate-quotes').click(function () {
                var $btn = $(this).button('loading');
                $.post("{{ route('quotes.recalculate') }}").done(function (response) {
                    notify(response.message, 'info');
                }).fail(function (response) {
                    notify('{{ trans('fi.error') }}: ' + $.parseJSON(response.responseText).message, 'error');
                }).always(function () {
                    $btn.button('reset');
                });
            });

            $('#setting-tabs a').click(function (e) {
                var tabId = $(e.target).attr("href").substr(1);
                $.post("{{ route('settings.saveTab') }}", {settingTabId: tabId});
            });

            $('#setting-tabs a[href="#{{ session('settingTabId') }}"]').tab('show');

        });
    </script>
@stop

@section('content')

    <section class="content m-3">
        <h3 class="float-left">
            {{ trans('fi.system_settings') }}
        </h3>

        <div class="float-right">
            <button class="btn btn-primary" id="btn-submit"><i class="fa fa-save"></i> {{ trans('fi.save') }}</button>
        </div>
        <div class="clearfix"></div>
    </section>

    <section class="content">

        @include('layouts._alerts')

        {!! Form::open(['route' => 'settings.update', 'files' => true, 'id' => 'form-settings']) !!}

        <div class="row">
            <div class="col-md-12">

                <div class="card m-2">

                    <div class="card-header d-flex p-0">
                        <ul class="nav nav-tabs" id="setting-tabs">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab"
                                                    href="#tab-general">{{ trans('fi.general') }}</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                    href="#tab-dashboard">{{ trans('fi.dashboard') }}</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                    href="#tab-quotes">{{ trans('fi.quotes') }}</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                    href="#tab-workorders">{{ trans('fi.workorders') }}</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                    href="#tab-invoices">{{ trans('fi.invoices') }}</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                    href="#tab-taxes">{{ trans('fi.taxes') }}</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                    href="#tab-email">{{ trans('fi.email') }}</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                    href="#tab-pdf">{{ trans('fi.pdf') }}</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                    href="#tab-online-payments">{{ trans('fi.online_payments') }}</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                    href="#tab-scheduler">{{ trans('fi.scheduler') }}</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                    href="#tab-backup">{{ trans('fi.backup') }}</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                    href="#tab-system">{{ trans('fi.system') }}</a></li>
                        </ul>
                    </div>
                    <div class="tab-content m-2">
                        <div id="tab-general" class="tab-pane active">
                            @include('settings._general')
                        </div>
                        <div id="tab-dashboard" class="tab-pane">
                            @include('settings._dashboard')
                        </div>
                        <div id="tab-invoices" class="tab-pane">
                            @include('settings._invoices')
                        </div>
                        <div id="tab-workorders" class="tab-pane">
                            @include('settings._workorders')
                        </div>
                        <div id="tab-quotes" class="tab-pane">
                            @include('settings._quotes')
                        </div>
                        <div id="tab-taxes" class="tab-pane">
                            @include('settings._taxes')
                        </div>
                        <div id="tab-email" class="tab-pane">
                            @include('settings._email')
                        </div>
                        <div id="tab-pdf" class="tab-pane">
                            @include('settings._pdf')
                        </div>
                        <div id="tab-online-payments" class="tab-pane">
                            @include('settings._online_payments')
                        </div>
                        <div id="tab-scheduler" class="tab-pane">
                            @include('settings._scheduler')
                        </div>
                        <div id="tab-backup" class="tab-pane">
                            @include('settings._backup')
                        </div>
                        <div id="tab-system" class="tab-pane">
                            @include('settings._system')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {!! Form::close() !!}

    </section>

@stop