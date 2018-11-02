<table class="table table-hover">
    <thead>
    <tr>
        <th>{{ trans('fi.status') }}</th>
        <th>{{ trans('fi.quote') }}</th>
        <th>{{ trans('fi.date') }}</th>
        <th>{{ trans('fi.expires') }}</th>
        <th>{{ trans('fi.summary') }}</th>
        <th>{{ trans('fi.total') }}</th>
        <th>{{ trans('fi.options') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($quotes as $quote)
        <tr>
            <td>
                <span class="badge badge-{{ $quoteStatuses[$quote->quote_status_id] }}">{{ trans('fi.' . $quoteStatuses[$quote->quote_status_id]) }}</span>
                @if ($quote->viewed)
                    <span class="badge badge-success">{{ trans('fi.viewed') }}</span>
                @else
                    <span class="badge badge-secondary">{{ trans('fi.not_viewed') }}</span>
                @endif
            </td>
            <td>{{ $quote->number }}</td>
            <td>{{ $quote->formatted_created_at }}</td>
            <td>{{ $quote->formatted_expires_at }}</td>
            <td>{{ $quote->summary }}</td>
            <td>{{ $quote->amount->formatted_total }}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                        {{ trans('fi.options') }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{ route('clientCenter.public.quote.pdf', [$quote->url_key]) }}" target="_blank"><i class="fa fa-print"></i> {{ trans('fi.pdf') }}</a></li>
                        <li><a href="{{ route('clientCenter.public.quote.show', [$quote->url_key]) }}" target="_blank"><i class="fa fa-search"></i> {{ trans('fi.view') }}</a></li>
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>