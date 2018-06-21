<script type="text/javascript">
    $(function() {
        $('.invoice_filter_options').change(function () {
            $('form#filter').submit();
        });

        $('#btn-bulk-delete').click(function () {

            var ids = [];

            $('.bulk-record:checked').each(function () {
                ids.push($(this).data('id'));
            });

            if (ids.length > 0) {
                bulkConfirm('{!! trans('fi.bulk_delete_record_warning') !!}', "{{ route('invoices.bulk.delete') }}", ids)
            }
        });

        $('.bulk-change-status').click(function() {
            var ids = [];

            $('.bulk-record:checked').each(function () {
                ids.push($(this).data('id'));
            });

            if (ids.length > 0) {
                bulkConfirm('{!! trans('fi.bulk_invoice_change_status_warning') !!}', "{{ route('invoices.bulk.status') }}",
                            ids, $(this).data('status'))
            }
        });
    });
</script>