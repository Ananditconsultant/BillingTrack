@include('quotes._js_copy')

<div class="modal fade" id="modal-copy-quote">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('fi.copy')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <div id="modal-status-placeholder"></div>

                <form>

                    <div class="form-group d-flex align-items-center">
                        <label class="col-sm-4 text-right text">@lang('fi.client')</label>

                        <div class="col-sm-8">
                            {!! Form::text('client_name', $quote->client->unique_name, ['id' => 'copy_client_name', 'class' => 'form-control client-lookup', 'autocomplete' => 'off']) !!}
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label class="col-sm-4 text-right text">@lang('fi.date')</label>

                        <div class="col-sm-8">
                            {!! Form::text('quote_date', date(config('fi.dateFormat')), ['id' => 'copy_quote_date', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label class="col-sm-4 text-right text">@lang('fi.company_profile')</label>
                        <div class="col-sm-8">
                            {!! Form::select('company_profile_id', $companyProfiles, config('fi.defaultCompanyProfile'),
                            ['id' => 'copy_company_profile_id', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label class="col-sm-4 text-right text">@lang('fi.group')</label>

                        <div class="col-sm-8">
                            {!! Form::select('group_id', $groups, $quote->group_id, ['id' => 'copy_group_id', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('fi.cancel')</button>
                <button type="button" id="btn-copy-quote-submit"
                        class="btn btn-primary">@lang('fi.submit')</button>
            </div>
        </div>
    </div>
</div>