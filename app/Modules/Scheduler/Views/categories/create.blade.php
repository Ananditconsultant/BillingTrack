@extends('layouts.master')

@section('content')
    {{--@if(config('app.name') == 'FusionInvoice') {!! Form::breadcrumbs() !!} @endif--}}
    @include('layouts._alerts')
    <!--basic form starts-->
    <div class="container-fluid mt-2">
        {!! Form::open(['route' => 'scheduler.categories.store', 'class'=>'form-horizontal']) !!}

        <div class="card card-light">
            <div class="card-header">
                <h3 class="card-title"><i
                            class="fa fa-edit fa-fw"></i>
                    {{ trans('fi.create_category') }}
                    <a class="btn btn-warning float-right" href={!! URL::previous()  !!}><i
                                class="fa fa-ban"></i> {{ trans('fi.cancel') }}</a>
                    <button type="submit" class="btn btn-success float-right"><i
                                class="fa fa-save"></i> {{ trans('fi.save') }}</button>
                </h3>

            </div>
            <div class="card-body">
                <!-- Name input-->
                <div class="form-group">
                    {!! Form::label('name',trans('fi.category_name'),['class'=>'col-sm-2 col-form-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('name',old('name'),['id'=>'name', 'placeholder'=>'Category Name', 'class'=>'form-control', 'autocomplete' => 'off']) !!}
                    </div>
                </div>
                <!-- text_color input-->
                <div id="cp1" class="form-group colorpicker-component">
                    {!! Form::label('text_color',trans('fi.category_text_color'),['class'=>'col-sm-2 col-form-label']) !!}
                    <div class="input-group col-md-3">
                        {!! Form::text('text_color',Request::old('text_color'),['id'=>'text_color', 'placeholder'=>'Text Color', 'class'=>'form-control', 'autocomplete' => 'off']) !!}
                        <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-square cp1icon"
                                                          style="color: #ffffff"></i></span>
                        </div>
                    </div>
                </div>
                <!-- text_color input-->
                <div id="cp2" class="form-group colorpicker-component">
                    {!! Form::label('bg_color',trans('fi.category_bg_color'),['class'=>'col-sm-2 col-form-label']) !!}
                    <div class="input-group col-md-3">
                        {!! Form::text('bg_color',Request::old('bg_color'),['id'=>'bg_color', 'placeholder'=>'Background Color', 'class'=>'form-control', 'autocomplete' => 'off']) !!}
                        <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-square cp2icon"
                                                             style="color: #000000"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {!! Form::close() !!}
    <script>
        $('#cp1').colorpicker({color: '#ffffff', format: 'hex'});
        $('#cp1').on('colorpickerChange', function(event) {
            $('.cp1icon').css('color', event.color.toString());
        });
        $('#cp2').colorpicker({color: '#000000', format: 'hex'});
        $('#cp2').on('colorpickerChange', function(event) {
            $('.cp2icon').css('color', event.color.toString());
        });
    </script>
    </div>
    </div>
@stop
@section('javascript')
    <link href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"
            type="text/javascript"></script>

@stop