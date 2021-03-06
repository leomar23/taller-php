@extends('layouts.backend')

@section('content')
    <section class="content-header animated fadeIn fast">
        <h1>
            Categorias
            <small>Editar {{ $category->name }}</small>
        </h1>
        <br>
        <a class="btn btn-default btn-st" href="{{ route('category.index') }}"> @lang('buttons.back')</a>

    </section>
    <section class="content container-fluid">
        {!! Form::model($category, ['method' => 'PATCH','route' => ['category.update', $category->id],'id'=>'category-form']) !!}
        <div class="box">
            <div class="box-body">
                
                <div class="row">
                    
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>@lang('labels.name')</label>
                            {!! Form::text('name', null, array('placeholder' => 'name','class' => 'form-control  border-input')) !!}
                            {!! $errors->first('name', '<span class="help-block text-danger">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label>@lang('labels.description')</label>
                            {!! Form::textarea('description', null, array('placeholder' => 'description', 'class' => 'form-control border-input')) !!}
                            {!! $errors->first('description', '<span class="help-block text-danger">:message</span>') !!}
                        </div>
                    </div>

                </div>
                

            </div>
            <div class="box-footer">
                <div class="text-right">
                     <a class="btn btn-default btn-tl-outline" href="{{ route('category.index') }}"> @lang('buttons.cancel')</a>
                    <button type="submit" class="btn btn-success">@lang('buttons.save')</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection

@section('scripts-back-page')
    {!! JsValidator::formRequest('Taller\Http\Requests\CategoryUpdateRequest', '#category-form') !!}
@endsection
