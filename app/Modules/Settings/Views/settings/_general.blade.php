@section('javascript')
    @parent
    <script type="text/javascript">
        $().ready(function () {
            $('#btn-check-update').click(function () {
                $.get("{{ route('settings.updateCheck') }}")
                    .done(function (response) {
                        notify(response.message,'info');
                    })
                    .fail(function (response) {
                        notify("@lang('fi.unknown_error')",'error');
                    });

                {{--axios.get("{{ route('settings.updateCheck') }}")--}}
                    {{--.then(function (response) {--}}
                        {{--console.log(response);--}}
                        {{--notify(response.data.message,'info');--}}
                    {{--})--}}
                    {{--.catch(function (error) {--}}
                        {{--notify("@lang('fi.unknown_error')",'error');--}}
                    {{--})--}}

            });
        });
    </script>
@stop

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label>@lang('fi.header_title_text'): </label>
            {!! Form::text('setting[headerTitleText]', config('fi.headerTitleText'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>@lang('fi.default_company_profile'): </label>
            {!! Form::select('setting[defaultCompanyProfile]', $companyProfiles, config('fi.defaultCompanyProfile'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>@lang('fi.version'): </label>

            <div class="input-group">
                {!! Form::text('version', config('fi.version'), ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                <span class="input-group-append">
                    @if (!config('app.demo'))
					<button class="btn btn-secondary" id="btn-check-update"
                            type="button" >@lang('fi.check_for_update') </button>
                    @else
                        Check updates are disabled in the demo.
                    @endif
				</span>
            </div>
        </div>
    </div>

</div>

<div class="row">



    <div class="col-md-2">
        <div class="form-group">
            <label>@lang('fi.language'): </label>
            {!! Form::select('setting[language]', $languages, config('fi.language'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>@lang('fi.date_format'): </label>
            {!! Form::select('setting[dateFormat]', $dateFormats, config('fi.dateFormat'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('fi.use_24_hour_time_format'): </label>
            {!! Form::select('setting[use24HourTimeFormat]', $yesNoArray, config('fi.use24HourTimeFormat'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('fi.timezone'): </label>
            {!! Form::select('setting[timezone]', $timezones, config('fi.timezone'), ['class' => 'form-control']) !!}
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('fi.skin_header_bg'): </label>
            {!! Form::select('skin[headBackground]', $skins, json_decode(config('fi.skin'),true)['headBackground'], ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('fi.skin_header_text'): </label>
            {!! Form::select('skin[headClass]', ['dark'=>'Dark', 'light'=>'Light'], json_decode(config('fi.skin'),true)['headClass'], ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('fi.skin_menu_bg'): </label>
            {!! Form::select('skin[sidebarBackground]', $skins, json_decode(config('fi.skin'),true)['sidebarBackground'], ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>@lang('fi.skin_menu_text'): </label>
            {!! Form::select('skin[sidebarClass]', ['dark'=>'Dark', 'light'=>'Light'], json_decode(config('fi.skin'),true)['sidebarClass'], ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-6">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>@lang('fi.display_client_unique_name'): </label>
                    {!! Form::select('setting[displayClientUniqueName]', $clientUniqueNameOptions, config('fi.displayClientUniqueName'), ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('fi.quantity_price_decimals'): </label>
                            {!! Form::select('setting[amountDecimals]', $amountDecimalOptions, config('fi.amountDecimals'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('fi.round_tax_decimals'): </label>
                            {!! Form::select('setting[roundTaxDecimals]', $roundTaxDecimalOptions, config('fi.roundTaxDecimals'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>@lang('fi.address_format'): </label>
            {!! Form::textarea('setting[addressFormat]', config('fi.addressFormat'), ['class' => 'form-control', 'rows' => 5]) !!}
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('fi.base_currency'): </label>
                    {!! Form::select('setting[baseCurrency]', $currencies, config('fi.baseCurrency'), ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('fi.exchange_rate_mode'): </label>
                    {!! Form::select('setting[exchangeRateMode]', $exchangeRateModes, config('fi.exchangeRateMode'), ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('fi.results_per_page'):</label>
                    {!! Form::select('setting[resultsPerPage]', $resultsPerPage, config('fi.resultsPerPage'), ['class' => 'form-control']) !!}
                </div>
            </div>

        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>@lang('fi.restolup') </label>
            {!! Form::select('setting[restolup]', [0=>trans('fi.no'),1=>trans('fi.yes')], config('fi.restolup'),
                            ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>@lang('fi.emptolup') </label>
            {!! Form::select('setting[emptolup]', [0=>trans('fi.no'),1=>trans('fi.yes')], config('fi.emptolup'),
                            ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>@lang('fi.force_https'):</label>
            {!! Form::select('setting[forceHttps]', $yesNoArray, config('fi.forceHttps'), ['class' => 'form-control', 'title' => trans('fi.force_https_help') ]) !!}
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            @if (!config('app.demo'))
            <a href="{{action('BT\Modules\Products\Controllers\ProductController@forceLUTupdate',['ret' => 0])}}"
               class="btn btn-warning">@lang('fi.force_product_update')</a>
            @else
                Force updates are disabled in the demo.
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            @if (!config('app.demo'))
            <a href="{{action('BT\Modules\Employees\Controllers\EmployeeController@forceLUTupdate',['ret' => 0])}}"
               class="btn btn-warning">@lang('fi.force_employee_update')</a>
            @else
                Force updates are disabled in the demo.
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <p class="form-text text-muted">@lang('fi.force_https_help')</p>
        </div>
    </div>
</div>
