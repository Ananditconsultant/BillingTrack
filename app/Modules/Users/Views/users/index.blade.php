@extends('layouts.master')

@section('javascript')
    <script type="text/javascript">
        $(function () {
            $('.user_filter_options').change(function () {
                $('form#filter').submit();
            });
        });
    </script>
@stop

@section('content')

    <section class="content m-3">
        <h3 class="float-left">
            {{ trans('fi.users') }}
        </h3>

        <div class="float-right">
            {{--fix for datatable--}}
            {{--<div class="btn-group">--}}
                {{--{!! Form::open(['method' => 'GET', 'id' => 'filter', 'class'=>"form-inline"]) !!}--}}
                {{--{!! Form::select('userType', $userTypes, request('userType'), ['class' => 'user_filter_options form-control ']) !!}--}}
                {{--{!! Form::close() !!}--}}
            {{--</div>--}}
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
                    {{ trans('fi.new') }}
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('users.create', ['admin']) }}">{{ trans('fi.admin_account') }}</a>
                    <a class="dropdown-item" href="{{ route('users.create', ['client']) }}">{{ trans('fi.client_account') }}</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>

    <section class="container-fluid">

        @include('layouts._alerts')

        <div class=" card card-light">
            <div class="card-body">
                {!! $dataTable->table(['class' => 'table dt-responsive display', 'width' => '100%', 'cellspacing' => '0']) !!}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush