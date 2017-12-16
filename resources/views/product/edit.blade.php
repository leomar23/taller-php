@extends('layouts.backend')

@section('content')
    <section class="content-header animated fadeIn fast">
        <h1>
            Producto
            <small>Editar {{ $product->name }}</small>
        </h1>
        <br>
        <a class="btn btn-default btn-st" href="{{ route('product.index') }}"> @lang('buttons.back')</a>

    </section>
    <section class="content container-fluid">
        {!! Form::model($product, ['method' => 'PATCH','route' => ['product.update', $product->id],'id'=>'product-form']) !!}
        <div class="box">            
                
            <div class="col-xs-12 col-sm-12 col-md-12">                    
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>@lang('labels.name')</label>
                        {!! Form::text('name', null, array('placeholder' => Lang::get('labels.name'),'class' => 'form-control  border-input')) !!}
                        {!! $errors->first('name', '<span class="help-block text-danger">:message</span>') !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                        <label>@lang('labels.price')</label>
                        {!! Form::text('price', null, array('placeholder' => Lang::get('labels.price'),'class' => 'form-control border-input')) !!}
                        {!! $errors->first('price', '<span class="help-block text-danger">:message</span>') !!}
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label>@lang('labels.description')</label>
                        {!! Form::textarea('description', null, array('placeholder' => 'description', 'class' => 'form-control border-input')) !!}
                        {!! $errors->first('description', '<span class="help-block text-danger">:message</span>') !!}
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <div class="text-right">
                     <a class="btn btn-default btn-tl-outline" href="{{ route('product.index') }}"> @lang('buttons.cancel')</a>
                    <button type="submit" class="btn btn-success">@lang('buttons.save')</button>
                </div>
            </div>
        </div>
        <!-- {!! Form::hidden('owner_id', $product->owner_id, array('placeholder' => Lang::get('labels.owner_id'), 'class' => 'form-control  border-input')) !!} -->
        {!! Form::close() !!}
    </section>
@endsection

@section('scripts-back-page')
    {!! JsValidator::formRequest('Taller\Http\Requests\ProductUpdateRequest', '#product-form') !!}
@endsection
