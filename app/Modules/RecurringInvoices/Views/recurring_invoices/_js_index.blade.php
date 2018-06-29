<script type="text/javascript">
    $(function () {
        $('.recurring_invoice_filter_options').change(function () {
            $('form#filter').submit();
        });

        $('#btn-bulk-delete').click(function () {
            var ids = [];

            $('.bulk-record:checked').each(function () {
                ids.push($(this).data('id'));
            });

            if (ids.length > 0) {
                bulkConfirm('{!! trans('fi.bulk_delete_record_warning') !!}', "{{ route('recurring_invoices.bulk.delete') }}", ids)
            }
        });
    });
</script>