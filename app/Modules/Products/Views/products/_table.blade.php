    <table id="dt-productstable" class="table dataTable no-footer" cellspacing="0" width="100%">

    <thead>
    <tr>
        <th>@lang('fi.product_id')</th>
        <th>@lang('fi.product_name')</th>
        <th>@lang('fi.product_active')</th>
        <th>@lang('fi.product_cost')</th>
        <th>@lang('fi.product_category')</th>
        <th>@lang('fi.product_type')</th>
        <th>@lang('fi.product_numstock')</th>
        <th>@lang('fi.options')</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($products as $product)
        <tr>
            <td><a href="{{ route('products.edit', [$product->id]) }}"
                   title="@lang('fi.edit')">{{ $product->id }}</a></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->active }}</td>
            <td>{{ $product->cost }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->type }}</td>
            <td>{{ $product->numstock }}</td>
            <td> <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-primary btn-sm "><i
                            class="fa fa-edit"></i>
                    @lang('fi.edit') </a></td>
        </tr>
    @endforeach
    </tbody>

</table>

<script>
    $(function () {
        {{--for products DT--}}
        $('#dt-productstable').DataTable({
            paging: false,
            order: [[0, "asc"]],//order on id
            "columnDefs": [
                {"orderable": false, "targets": 7}
            ]
        });
    });
</script>