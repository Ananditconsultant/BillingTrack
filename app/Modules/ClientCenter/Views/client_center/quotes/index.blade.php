@extends('client_center.layouts.logged_in')

@section('content')

    <section class="content-header">
        <h1>{{ trans('fi.quotes') }}</h1>
    </section>

    <section class="content">

        @include('layouts._alerts')

        <div class="row">

            <div class="col-xs-12">

                <div class=" card card-light">

                    <div class="card-body no-padding">
                        @include('client_center.quotes._table')
                    </div>

                </div>

                <div class="float-right">
                    {!! $quotes->render() !!}
                </div>

            </div>

        </div>

    </section>

@stop