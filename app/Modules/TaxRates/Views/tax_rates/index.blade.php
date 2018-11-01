@extends('layouts.master')

@section('content')

    <section class="content m-3">
        <h3 class="float-left">
            {{ trans('fi.tax_rates') }}
        </h3>

        <div class="float-right">
            <a href="{{ route('taxRates.create') }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> {{ trans('fi.new') }}</a>
        </div>
        <div class="clearfix"></div>
    </section>

    <section class="container-fluid">

        @include('layouts._alerts')
        <div class=" card card-light">
            <div class="card-body no-padding">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{!! Sortable::link('name', trans('fi.name')) !!}</th>
                        <th>{!! Sortable::link('percent', trans('fi.percent')) !!}</th>
                        <th>{!! Sortable::link('is_compound', trans('fi.compound')) !!}</th>
                        <th>{{ trans('fi.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($taxRates as $taxRate)
                        <tr>
                            <td>{{ $taxRate->name }}</td>
                            <td>{{ $taxRate->formatted_percent }}</td>
                            <td>{{ $taxRate->formatted_is_compound }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                            data-toggle="dropdown">
                                        {{ trans('fi.options') }} <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('taxRates.edit', [$taxRate->id]) }}"><i
                                                    class="fa fa-edit"></i> {{ trans('fi.edit') }}</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"
                                           onclick="swalConfirm('{{ trans('fi.delete_record_warning') }}', '{{ route('taxRates.delete', [$taxRate->id]) }}');"><i
                                                    class="fa fa-trash-alt"></i> {{ trans('fi.delete') }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="float-right">
            {!! $taxRates->appends(request()->except('page'))->render() !!}
        </div>
    </section>

@stop