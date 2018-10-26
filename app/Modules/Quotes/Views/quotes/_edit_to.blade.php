@include('quotes._js_edit_to')

<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">{{ trans('fi.to') }}</h3>

        <div class="card-tools pull-right">
            <button class="btn btn-default btn-sm" id="btn-change-client"><i
                    class="fa fa-exchange"></i> {{ trans('fi.change') }}</button>
            <button class="btn btn-default btn-sm" id="btn-edit-client" data-client-id="{{ $quote->client->id }}"><i
                    class="fa fa-pencil"></i> {{ trans('fi.edit') }}</button>
        </div>
    </div>
    <div class="card-body">
        <strong>{{ $quote->client->name }}</strong><br>
        {!! $quote->client->formatted_address !!}<br>
        {{ trans('fi.phone') }}: {{ $quote->client->phone }}<br>
        {{ trans('fi.email') }}: {{ $quote->client->email }}
    </div>
</div>