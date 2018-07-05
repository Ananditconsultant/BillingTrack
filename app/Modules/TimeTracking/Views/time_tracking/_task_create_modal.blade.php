@include('time_tracking._task_list_refresh_js')

<script type="text/javascript">
    $(function () {

        $('#modal-add-task').modal();

        $('#modal-add-task').on('shown.bs.modal', function () {
            $("#add_task_name").focus();
        });

        $('.btn-submit-task').click(function () {
            $('#modal-status-placeholder').html('');
            $.post('{{ route('timeTracking.tasks.store') }}', {
                time_tracking_project_id: {{ $project->id }},
                name: $('#add_task_name').val()
            }).done(function (response) {
                $('#add_task_name').val('').focus();
                refreshTaskList();
            }).fail(function (response) {
                showErrors($.parseJSON(response.responseText).errors, '#modal-status-placeholder');
            });
        });

    });
</script>

<div class="modal fade" id="modal-add-task">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{ trans('fi.add_task') }}</h4>
            </div>
            <div class="modal-body">

                <div id="modal-status-placeholder"></div>

                    <div class="form-group">
                        <label class="control-label">{{ trans('fi.task') }}:</label>
                        {!! Form::text('name', null, ['id' => 'add_task_name', 'class' => 'form-control']) !!}
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('fi.cancel') }}</button>
                <button type="button" class="btn btn-primary btn-submit-task" id="btn-submit-task-add-another">{{ trans('fi.submit_and_add_another_task') }}</button>
                <button type="button" class="btn btn-primary btn-submit-task" data-dismiss="modal">{{ trans('fi.submit_and_close') }}</button>
            </div>
        </div>
    </div>
</div>