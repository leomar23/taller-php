@extends('layouts.backend')

@section('content')
    <section class="content-header animated fadeIn fast">
        <h1>
            Comercios
            <small>Editar {{ $business->name }}</small>
        </h1>
        <br>
        <a class="btn btn-default btn-st" href="{{ route('business.index') }}"> @lang('buttons.back')</a>

    </section>
    <section class="content container-fluid">
        {!! Form::model($business, ['method' => 'PATCH','route' => ['business.update', $business->id],'id'=>'business-form']) !!}
        <div class="box">
            <div class="box-body">                
                <div class="row">

                    <div class="col-xs-12 col-sm-6 col-md-6">               
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>@lang('labels.name')</label>
                                {!! Form::text('name', null, array('placeholder' => Lang::get('labels.name'),'class' => 'form-control  border-input')) !!}
                                {!! $errors->first('name', '<span class="help-block text-danger">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
                                <label>@lang('labels.location')</label>
                                {!! Form::textarea('location', null, array('placeholder' => Lang::get('labels.location'),'class' => 'form-control border-input')) !!}
                                {!! $errors->first('location', '<span class="help-block text-danger">:message</span>') !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6" > <!-- mitad derecha -->
                        
                        <div class="col-xs-12 col-sm-12 col-md-12" >
                            <div class="col-xs-12 col-sm-6 col-md-6" >
                                <label>Productos que comercializa</label>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6" >
                                <label>Precio</label>
                            </div>
                        </div>
                        
                        @foreach($products as $value)

                            <div class="col-xs-12 col-sm-6 col-md-6" >                            
                                <div class="form-group"> 
                                    <div class="checkbox checkbox-primary">
                                        {{ Form::checkbox('products[]', $value->id, in_array($value->id, $prod_vendidos), array('id' => 'checkbox')) }}
                                        <label> {{ $value->name }}</label>
                                    </div>                                    
                                </div>                            
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6" >                            
                                <div class="form-group">
                                    {{ Form::text('price'.$value->id, $prices[$value->id-1], array('placeholder' => Lang::get('labels.price'),'class' => 'form-control  border-input')) }}
                                    {!! $errors->first('location', '<span class="help-block text-danger">:message</span>') !!}
                                </div> 
                            </div>

                        @endforeach
                    </div> <!-- termina mitad derecha -->

                </div>
            </div>

            <div class="box-footer">
                <div class="text-right">
                     <a class="btn btn-default btn-tl-outline" href="{{ route('business.index') }}"> @lang('buttons.cancel')</a>
                    <button type="submit" class="btn btn-success">@lang('buttons.save')</button>
                </div>
            </div>
        </div>
        {!! Form::hidden('owner_id', $business->owner_id, array('placeholder' => Lang::get('labels.owner_id'), 'class' => 'form-control  border-input')) !!}
        {!! Form::close() !!}
    </section>
@endsection

@section('scripts-back-page')
    {!! JsValidator::formRequest('Taller\Http\Requests\BusinessUpdateRequest', '#business-form') !!}
@endsection
