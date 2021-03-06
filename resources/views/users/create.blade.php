@extends('layouts.backend')

@section('content')
    <section class="content-header animated fadeIn fast">
        <h1>
            Crear Usuario
            <small>Crear</small>
        </h1>
        <br>
        <a class="btn btn-default btn-st" href="{{ route('users.index') }}"> @lang('buttons.back')</a>

    </section>
    <section class="content container-fluid">
    {!! Form::open(array('route' => 'users.store','method'=>'POST','id'=>'user-form')) !!}
        <div class="box">
            <div class="box-body">                
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>@lang('labels.name')</label>
                                {!! Form::text('name', null, array('placeholder' => Lang::get('labels.name'),'class' => 'form-control  border-input')) !!}
                                {!! $errors->first('name', '<span class="help-block text-danger">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label>@lang('labels.last_name')</label>
                                {!! Form::text('last_name', null, array('placeholder' => Lang::get('labels.last_name'),'class' => 'form-control  border-input')) !!}
                                {!! $errors->first('last_name', '<span class="help-block text-danger">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>@lang('labels.email')</label>
                                {!! Form::email('email', null, array('placeholder' => Lang::get('labels.email'),'class' => 'form-control border-input')) !!}
                                {!! $errors->first('email', '<span class="help-block text-danger">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label>@lang('labels.gender')</label>
                                {!! Form::select('gender', ['Male' => Lang::get('labels.male'), 'Female' => Lang::get('labels.female'), 'Other' => Lang::get('labels.other')], null, ['placeholder' => Lang::get('labels.default_select_gender'),'class' => 'form-control border-input']) !!}
                                {!! $errors->first('gender', '<span class="help-block text-danger">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label>@lang('labels.phone')</label>
                                {!! Form::text('phone', null, array('placeholder' => Lang::get('labels.phone'),'class' => 'form-control border-input')) !!}
                                {!! $errors->first('phone', '<span class="help-block text-danger">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('birth_date') ? ' has-error' : '' }}">
                                <label>@lang('labels.birthdate')</label>
                                {!! Form::date('birth_date', Carbon\Carbon::now(), array('class' => 'form-control border-input')) !!}
                                {!! $errors->first('birth_date', '<span class="help-block text-danger">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>@lang('labels.password')</label>
                                {!! Form::password('password', array('placeholder' => Lang::get('labels.password'),'class' => 'form-control border-input')) !!}
                                {!! $errors->first('password', '<span class="help-block text-danger">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                                <label>@lang('labels.confirm_password')</label>
                                {!! Form::password('confirm-password', array('placeholder' => Lang::get('labels.confirm_password'),'class' => 'form-control  border-input')) !!}
                                {!! $errors->first('confirm-password', '<span class="help-block text-danger">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('status_id') ? ' has-error' : '' }}">
                                <label>@lang('labels.role')</label> 
                                {!! Form::select('status_id', $roles, 1) !!}
                                {!! $errors->first('status_id', '<span class="help-block text-danger">:message</span>') !!}
                            </div>
                        </div>

                    </div>
                        
                        {{--<div class="col-xs-12 col-sm-6 col-md-6">--}}
                            {{--<div class="form-group {{ $errors->has('status_id') ? ' has-error' : '' }}">--}}
                                {{--<label>@lang('labels.status')</label>{!! $errors->first('status_id', '<span class="help-block text-danger">:message</span>') !!}--}}
                                {{--{!! Form::select('status_id',$status,null, ['placeholder' => Lang::get('labels.default_select_status'),'class' => 'form-control border-input']) !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    
                    </div>
                    
                    {{--<div class="col-xs-12 col-sm-12 col-md-12 text-right">--}}
                        {{--<button type="submit" class="btn btn-tl-outline">@lang('buttons.submit')</button>--}}
                    {{--</div>--}}

                </div>
            </div>
            <div class="box-footer">
                <div class="text-right">
                    <a class="btn btn-default btn-tl-outline" href="{{ route('users.index') }}"> @lang('buttons.cancel')</a>
                    <button type="submit" class="btn btn-success">@lang('buttons.submit')</button>
                </div>
            </div>
        </div>
        <!-- {!! Form::hidden('status_id', 1, array('placeholder' => Lang::get('labels.status_id'), 'class' => 'form-control  border-input')) !!} -->
        {!! Form::close() !!}
    </section>
@endsection

@section('scripts-back-page')
    {!! JsValidator::formRequest('Taller\Http\Requests\UserCreateRequest', '#user-form') !!}
@endsection