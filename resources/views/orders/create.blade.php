@extends('layouts.backend')

@section('content')
    <section class="content-header animated fadeIn fast">
        <h1>
            @lang('pages.role_create_title')
            <small>@lang('pages.role_create_subtitle')</small>
        </h1>
        <br>
        <a class="btn btn-default btn-st" href="{{ route('roles.index') }}"> @lang('buttons.back')</a>

    </section>
    <section class="content container-fluid">
        {!! Form::open(array('route' => 'roles.store','method'=>'POST', 'id'=>'role-form')) !!}
        <div class="box">
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>@lang('labels.name')</label>
                            {!! Form::text('name', null, array('placeholder' => Lang::get('labels.name'),'class' => 'form-control border-input')) !!}
                            {!! $errors->first('name', '<span class="help-block text-danger">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('display_name') ? ' has-error' : '' }}">
                            <label>@lang('labels.display_name')</label>
                            {!! Form::text('display_name', null, array('placeholder' => Lang::get('labels.display_name'),'class' => 'form-control border-input')) !!}
                            {!! $errors->first('display_name', '<span class="help-block text-danger">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label>@lang('labels.description')</label>
                            {!! Form::textarea('description', null, array('placeholder' => Lang::get('labels.description'),'class' => 'form-control border-input')) !!}
                            {!! $errors->first('description', '<span class="help-block text-danger">:message</span>') !!}
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4" >
                        <div id="container-items">
                            <div class="form-group">
                                <label>@lang('labels.permissions')</label>
                                <br/>
                                @foreach($permission as $value)
                                    <div class="checkbox checkbox-primary">
                                        {{ Form::checkbox('permission[]', $value->id, false, array('id' => 'checkbox')) }}
                                        <label> {{ $value->display_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="box-footer">
                <div class="text-right">
                <a class="btn btn-default btn-tl-outline" href="{{ route('roles.index') }}"> @lang('buttons.cancel')</a>
                <button type="submit" class="btn btn-success">@lang('buttons.submit')</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection

@section('scripts-back-page')
    {!! JsValidator::formRequest('Taller\Http\Requests\RoleCreateRequest', '#role-form') !!}
@endsection