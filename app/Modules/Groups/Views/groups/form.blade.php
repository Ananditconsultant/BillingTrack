@extends('layouts.master')

@section('content')

    <script type="text/javascript">
        $(function () {
            $('#name').focus();
        });
    </script>

    @if ($editMode == true)
        {!! Form::model($group, ['route' => ['groups.update', $group->id]]) !!}
    @else
        {!! Form::open(['route' => 'groups.store']) !!}
    @endif

    <section class="content m-3">
        <h3 class="float-left">
            {{ trans('fi.group_form') }}
        </h3>
        <div class="float-right">
            <button class="btn btn-primary"><i class="fa fa-save"></i> {{ trans('fi.save') }}</button>
        </div>
        <div class="clearfix"></div>
    </section>

    <section class="container-fluid">

        @include('layouts._alerts')

        <div class=" card card-light">
            <div class="card-body">
                <div class="form-group">
                    <label>{{ trans('fi.name') }}: </label>
                    {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>{{ trans('fi.format') }}: </label>
                    {!! Form::text('format', null, ['id' => 'format', 'class' => 'form-control']) !!}
                    <span class="help-block">{{ trans('fi.available_fields') }}: {NUMBER} {YEAR} {MONTH} {MONTHSHORTNAME} {WEEK}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('fi.next_number') }}: </label>
                    {!! Form::text('next_id', isset($group->next_id) ? $group->next_id : 1, ['id' => 'next_id', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>{{ trans('fi.left_pad') }}: </label>
                    {!! Form::text('left_pad', isset($group->left_pad) ? $group->left_pad : 0, ['id' => 'left_pad', 'class' => 'form-control']) !!}
                    <span class="help-block">{{ trans('fi.left_pad_description') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('fi.reset_number') }}: </label>
                    {!! Form::select('reset_number', $resetNumberOptions, null, ['id' => 'reset_number', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </section>

    {!! Form::close() !!}
@stop