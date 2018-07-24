@extends('layouts.master')

@section('content')
    <!--basic form starts-->
    {{--{!! Form::wobreadcrumbs() !!}--}}
    @include('layouts._alerts')
    <div class="col-lg-12">
        <div class="panel panel-info" id="hidepanel1">
            <div class="panel-heading">
                <h3 class="panel-title">
                    {{ trans('fi.edit_product') }}
                </h3>

            </div>
            <div class="panel-body">
            {!! Form::model($products, array('route' => array('products.update', $products->id),
                                                        'id'=>'products_form','action'=>'#','method' => 'PUT', 'class'=>'form-horizontal')) !!}
            <!-- Name input-->
                <div class="form-group">
                    <label class="col-md-3 control-label"
                           for="name">{{ trans('fi.product_name') }}</label>
                    <div class="col-md-9">
                        {!! Form::text('name',$products->name,['id'=>'name', 'class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- Description input-->
                <div class="form-group">
                    <label class="col-md-3 control-label"
                           for="description">{{ trans('fi.product_description') }}</label>
                    <div class="col-md-9">
                        {!! Form::text('description',$products->description,['id'=>'description', 'class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- Serial Number input-->
                <div class="form-group">
                    <label class="col-md-3 control-label"
                           for="serialnum">{{ trans('fi.product_serialnum') }}</label>
                    <div class="col-md-9">
                        {!! Form::text('serialnum',$products->serialnum,['id'=>'serialnum', 'class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- Active Checkbox-->
                <div class="form-group">
                    <label class="col-md-3 control-label"
                           for="active">{{ trans('fi.product_active') }}</label>
                    <div class="col-md-9">
                        {!! Form::checkbox('active',1,$products->active,['id'=>'active', 'class'=>'checkbox']) !!}
                    </div>
                </div>
                <!-- Cost input-->
                <div class="form-group">
                    <label class="col-md-3 control-label"
                           for="cost">{{ trans('fi.product_cost') }}</label>
                    <div class="col-md-9">
                        {!! Form::text('cost',$products->cost,['id'=>'cost', 'class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- Category input-->
                <div class="form-group">
                    <label class="col-md-3 control-label"
                           for="category">{{ trans('fi.product_category') }}</label>
                    <div class="col-md-9">
                        {!! Form::text('category',$products->category,['id'=>'category', 'class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- Type input-->
                <div class="form-group">
                    <label class="col-md-3 control-label"
                           for="type">{{ trans('fi.product_type') }}</label>
                    <div class="col-md-9">
                        {!! Form::text('type',$products->type,['id'=>'type', 'class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- Numstock input-->
                <div class="form-group">
                    <label class="col-md-3 control-label"
                           for="numstock">{{ trans('fi.product_numstock') }}</label>
                    <div class="col-md-9">
                        {!! Form::text('numstock',$products->numstock,['id'=>'numstock', 'class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align:center" class="buttons">
            <a class="btn btn-warning btn-lg" href={!! route('products.index')  !!}>{{ trans('fi.cancel') }} <span
                        class="glyphicon glyphicon-remove-circle"></span></a>
            <button type="submit" class="btn btn-success btn-lg">{{ trans('fi.save') }} <span
                        class="glyphicon glyphicon-floppy-disk"></span></button>
            {{--{!! Button::normal(trans('texts.cancel'))
                    ->large()
                    ->asLinkTo(URL::previous())
                    ->appendIcon(Icon::create('remove-circle')) !!}

            {!! Button::success('Save')
                    ->submit()
                    ->large()
                    ->appendIcon(Icon::create('floppy-disk')) !!}--}}
        </div>
        {!! Form::close() !!}
    </div>
@stop