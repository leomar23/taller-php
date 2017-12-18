@extends('layouts.backend')

@section('content')
    <section class="content-header animated fadeIn fast">
        <h1>
            Productos 
            <small>Nuevo Producto</small>
        </h1>
        <br>
        <a class="btn btn-default btn-st" href="{{ route('product.index') }}"> @lang('buttons.back')</a>

    </section>
    <section class="content container-fluid">
        {!! Form::open(array('route' => 'product.store','method'=>'POST','id'=>'product-form', 'enctype'=>'multipart/form-data')) !!}
        <div class="box">
            <div class="box-body">                
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label>Categoria - </label>
                            {!! Form::select('category_id', $categories, 1 ) !!} <!-- id de Categoria seleccionado por defecto = 1 -->
                            {!! $errors->first('category_id', '<span class="help-block text-danger">:message</span>') !!}
                        </div>
                    </div>   
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>@lang('labels.name')</label>
                            {!! Form::text('name', null, array('placeholder' => Lang::get('labels.name'),'class' => 'form-control  border-input')) !!}
                            {!! $errors->first('name', '<span class="help-block text-danger">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label>@lang('labels.description')</label>
                            {!! Form::textarea('description', null, array('placeholder' => Lang::get('labels.description'),'class' => 'form-control border-input')) !!}
                            {!! $errors->first('description', '<span class="help-block text-danger">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="form-group {{ $errors->has('bar_code') ? ' has-error' : '' }}">
                            <label>@lang('labels.bar_code')</label>
                            {!! Form::text('bar_code', null, array('placeholder' => Lang::get('labels.bar_code'),'class' => 'form-control border-input')) !!}
                            {!! $errors->first('bar_code', '<span class="help-block text-danger">:message</span>') !!}
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                            <label>@lang('labels.price')</label>
                            {!! Form::number('price', null, array('placeholder' => Lang::get('labels.price'),'class' => 'form-control border-input')) !!}
                            {!! $errors->first('price', '<span class="help-block text-danger">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <input type="file" name='imageSelector'>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="text-right">
                     <a class="btn btn-default btn-tl-outline" href="{{ route('product.index') }}"> @lang('buttons.cancel')</a>
                    <button type="submit" class="btn btn-success">@lang('buttons.submit')</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection

@section('scripts-back-page')
    {!! JsValidator::formRequest('Taller\Http\Requests\ProductCreateRequest', '#product-form') !!}
@endsection
