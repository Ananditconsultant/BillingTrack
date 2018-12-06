@section('javascript')
    @parent
    <script type="text/javascript">
        $(function () {

            updatePDFOptions();

            $('#pdfDriver').change(function () {
                updatePDFOptions();
            });

            function updatePDFOptions() {

                $('.wkhtmltopdf-option').hide();

                pdfDriver = $('#pdfDriver').val();

                if (pdfDriver == 'wkhtmltopdf') {
                    $('.wkhtmltopdf-option').show();
                }
            }

        });
    </script>
@stop

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label>@lang('fi.paper_size'): </label>
            {!! Form::select('setting[paperSize]', $paperSizes, config('fi.paperSize'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>@lang('fi.paper_orientation'): </label>
            {!! Form::select('setting[paperOrientation]', $paperOrientations, config('fi.paperOrientation'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>@lang('fi.pdf_disposition'): </label>
            {!! Form::select('setting[pdfDisposition]', $pdfDisposition, config('fi.pdfDisposition'), ['class' => 'form-control']) !!}
        </div>
    </div>

</div>

<div class="form-group">
    <label>@lang('fi.pdf_driver'): </label>
    {!! Form::select('setting[pdfDriver]', $pdfDrivers, config('fi.pdfDriver'), ['id' => 'pdfDriver', 'class' => 'form-control']) !!}
</div>

<div class="form-group wkhtmltopdf-option">
    <label>@lang('fi.binary_path'): </label>
    {!! Form::text('setting[pdfBinaryPath]', config('fi.pdfBinaryPath'), ['class' => 'form-control']) !!}
</div>