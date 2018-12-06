@extends('layouts.master')

@section('content')
    <section class="content mt-3 mb-3">
        <h3 class="float-left">@lang('fi.item_lookups')</h3>

        <div class="float-right">
            <a href="{{ route('itemLookups.create') }}" class="btn btn-primary "><i
                        class="fa fa-plus"></i> @lang('fi.new')</a>
        </div>
        <div class="clearfix"></div>
    </section>

    <section class="container-fluid">
        @include('layouts._alerts')
        <div class="card card-light">
            <div class="card-body">
                <table id="dt-itemlookupstable" class="table dataTable no-footer">
                    <thead>
                    <tr>
                        <th>@lang('fi.name')</th>
                        <th>@lang('fi.description')</th>
                        <th>@lang('fi.price')</th>
                        <th>@lang('fi.tax_1')</th>
                        <th>@lang('fi.tax_2')</th>
                        <th>@lang('fi.options')</th>
                        <th class="d-none">resource_table</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($itemLookups as $itemLookup)
                        <tr>
                            <td>{!! $itemLookup->formatted_name !!}</td>
                            <td>{{ $itemLookup->description }}</td>
                            <td>{{ $itemLookup->formatted_price }}</td>
                            <td>{{ $itemLookup->taxRate->name ?? '' }}</td>
                            <td>{{ $itemLookup->taxRate2->name ?? '' }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                            data-toggle="dropdown">
                                        @lang('fi.options')
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item"
                                           href="{{ route('itemLookups.edit', [$itemLookup->id]) }}"><i
                                                    class="fa fa-edit"></i> @lang('fi.edit')</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"
                                           onclick="swalConfirm('@lang('fi.delete_record_warning')', '{{ route('itemLookups.delete', [$itemLookup->id]) }}');"><i
                                                    class="fa fa-trash-alt"></i> @lang('fi.delete')</a>
                                    </div>
                                </div>
                            </td>
                            <td class="d-none">{{ $itemLookup->resource_table }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script>
        $(function () {
            {{--for itemlookups DT--}}
            $('#dt-itemlookupstable').DataTable({
                paging: false,
                order: [[6, "asc"], [0, "asc"]],//order on hidden resource table then name
                "columnDefs": [
                    {"orderable": false, "targets": 5}
                ]
            });
        });
    </script>

@stop
