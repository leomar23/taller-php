@extends('layouts.backend')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="header">
            <div class="col-md-6" style="padding-bottom: 10px;">
                <h4 class="title">@lang('pages.type_product_create_title')</h4>
            </div>
            <div class="col-md-6">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('typeProduct.index') }}"> @lang('buttons.back')</a>
                </div>
            </div>
        </div>
        <div class="content">
            {!! Form::open(array('route' => 'typeProduct.store','method'=>'POST')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label>@lang('labels.category')</label>
                    <div class="form-group">
                        {!! Form::select('category_id',$category,null, array('class' => 'form-control show-tick border-input','id'=>'category_id')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <label>@lang('labels.name')</label>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control border-input')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">@lang('buttons.submit')</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection