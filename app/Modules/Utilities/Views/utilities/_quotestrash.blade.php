<div class="box box-primary">

    <div class="box-body no-padding">
        <table class="table table-hover">

            <thead>
            <tr>
                <th>ID</th>
                <th>{{ trans('fi.quote_number') }}</th>
                <th>{{ trans('fi.client') }}</th>
                <th>Date Trashed</th>
                <th>{{ trans('fi.options') }}</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($quotes as $quote)
                <tr>
                    <td>{{ $quote->id }}</td>
                    <td>{{ $quote->number }}</td>
                    <td>{{ $quote->client->name }}</td>
                    <td>{{ $quote->deleted_at }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button"
                                    class="btn btn-default btn-sm dropdown-toggle"
                                    data-toggle="dropdown">
                                {{ trans('fi.options') }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="{{ route('utilities.restore_trash', [$quote->id, 'entity' => 'quote']) }}"><i
                                                class="fa fa-edit"></i> Restore</a></li>
                                {{--<li><a href="{{ route('users.password.edit', [$quote->id]) }}"><i class="fa fa-lock"></i> {{ trans('fi.reset_password') }}</a></li>--}}
                                {{--<li><a href="#"--}}
                                {{--onclick="swalConfirm('{{ trans('fi.delete_record_warning') }}', '{{ route('users.delete', [$quote->id]) }}');"><i class="fa fa-trash-o"></i> {{ trans('fi.delete') }}</a></li>--}}
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>