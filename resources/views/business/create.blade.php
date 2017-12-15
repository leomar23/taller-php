@extends('layouts.backend')

@section('content')
    <section class="content-header animated fadeIn fast">
        <h1>
            Comercios
            <small>Nuevo Comercio</small>
        </h1>
        <br>
        <a class="btn btn-default btn-st" href="{{ route('business.index') }}"> @lang('buttons.back')</a>

    </section>
    <section class="content container-fluid">
        {!! Form::open(array('route' => 'business.store','method'=>'POST','id'=>'business-form')) !!}
        <div class="box">
            <div class="box-body">
                
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="form-group {{ $errors->has('owner_id') ? ' has-error' : '' }}">
                            <label>Propietario - </label>
                            {!! Form::select('owner_id', $users, 1 ) !!} <!-- id de User seleccionado por defecto = 1 -->
                            {!! $errors->first('owner_id', '<span class="help-block text-danger">:message</span>') !!}
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
                        <div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
                            <label>@lang('labels.location')</label>
                            {!! Form::textarea('location', null, array('placeholder' => Lang::get('labels.location'),'class' => 'form-control border-input')) !!}
                            {!! $errors->first('location', '<span class="help-block text-danger">:message</span>') !!}
                        </div>
                    </div>

                </div>
                

            </div>
            <div class="box-footer">
                <div class="text-right">
                     <a class="btn btn-default btn-tl-outline" href="{{ route('business.index') }}"> @lang('buttons.cancel')</a>
                    <button type="submit" class="btn btn-success">@lang('buttons.submit')</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection

@section('scripts-back-page')
    {!! JsValidator::formRequest('Taller\Http\Requests\BusinessCreateRequest', '#business-form') !!}
@endsection
