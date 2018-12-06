<div class="row">

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('fi.default_workorder_template'): </label>
            {!! Form::select('setting[workorderTemplate]', $workorderTemplates, config('fi.workorderTemplate'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('fi.default_group'): </label>
            {!! Form::select('setting[workorderGroup]', $groups, config('fi.workorderGroup'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('fi.workorders_expire_after'): </label>
            {!! Form::text('setting[workordersExpireAfter]', config('fi.workordersExpireAfter'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('fi.default_status_filter'): </label>
            {!! Form::select('setting[workorderStatusFilter]', $workorderStatuses, config('fi.workorderStatusFilter'), ['class' => 'form-control']) !!}
        </div>
    </div>

</div>

<div class="form-group">
    <label>@lang('fi.convert_workorder_when_approved'): </label>
    {!! Form::select('setting[convertWorkorderWhenApproved]', $yesNoArray, config('fi.convertWorkorderWhenApproved'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>@lang('fi.convert_workorder_setting'): </label>
    {!! Form::select('setting[convertWorkorderTerms]', $convertWorkorderOptions, config('fi.convertWorkorderTerms'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>@lang('fi.default_terms'): </label>
    {!! Form::textarea('setting[workorderTerms]', config('fi.workorderTerms'), ['class' => 'form-control', 'rows' => 2]) !!}
</div>

<div class="form-group">
    <label>@lang('fi.default_footer'): </label>
    {!! Form::textarea('setting[workorderFooter]', config('fi.workorderFooter'), ['class' => 'form-control', 'rows' => 2]) !!}
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('fi.if_workorder_is_emailed_while_draft'): </label>
            {!! Form::select('setting[resetWorkorderDateEmailDraft]', $workorderWhenDraftOptions, config('fi.resetWorkorderDateEmailDraft'), ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6"></div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('fi.recalculate_workorders'): </label><br>
            @if (!config('app.demo'))
            <button type="button" class="btn btn-secondary" id="btn-recalculate-workorders"
                    data-loading-text="@lang('fi.recalculating_wait')">@lang('fi.recalculate')</button>
            @else
                Recalculate is disabled in the demo.
            @endif
            <p class="form-text text-muted">@lang('fi.recalculate_help_text')</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>@lang('fi.wo_timesheet_companyname')</label>
            {!! Form::text('setting[tsCompanyName]', config('fi.tsCompanyName'),
                            ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>@lang('fi.wo_timesheet_companycreatetime') </label>
            {!! Form::text('setting[tsCompanyCreate]', config('fi.tsCompanyCreate'),
                            ['class' => 'form-control']) !!}
        </div>
    </div>
</div>