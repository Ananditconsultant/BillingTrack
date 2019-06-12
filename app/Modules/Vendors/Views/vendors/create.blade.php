@extends('layouts.master')

@section('content')
    <!--basic form starts-->
    {{--{!! Form::wobreadcrumbs() !!}--}}
    @include('layouts._alerts')
    <section class="content-header">
        {!! Form::open(['route' => 'vendors.store', 'class'=>'form-horizontal']) !!}

        <div class="card card-light">
            <div class="card-header">
                <h3 class="card-title"><i
                            class="fa fa-edit fa-fw"></i>
                    @lang('fi.create_vendor')
                    <a class="btn btn-warning float-right" href={!! route('vendors.index')  !!}><i
                                class="fa fa-ban"></i> @lang('fi.cancel')</a>
                    <button type="submit" class="btn btn-primary float-right"><i
                                class="fa fa-save"></i> @lang('fi.save') </button>
                </h3>

            </div>
            <div class="card-body">
            <!-- Name input-->
                <div class="form-group d-flex align-items-center">
                    <label class="col-md-2 text-right text"
                           for="name">@lang('fi.name')</label>
                    <div class="col-md-4">
                        {!! Form::text('name',old('name'),['id'=>'name', 'class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </section>
@stop
