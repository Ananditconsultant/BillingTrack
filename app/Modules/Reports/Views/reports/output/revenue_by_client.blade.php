@extends('reports.layouts.master')

@section('content')

    <h1 style="text-align: center;">@lang('fi.revenue_by_client')</h1>

    <table class="alternate">
        <thead>
        <tr>
            <th>@lang('fi.client')</th>
            @foreach ($months as $month)
                <th class="amount">{{ $month }}</th>
            @endforeach
            <th class="amount">@lang('fi.total')</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($results as $client=>$amounts)
            <tr>
                <td>{{ $client }}</td>
                @foreach (array_keys($months) as $monthKey)
                    <td class="amount">{{ $amounts['months'][$monthKey] }}</td>
                @endforeach
                <td class="amount">{{ $amounts['total'] }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>

@stop