@extends('layouts.backend')

@section('content')
    <section class="content-header animated fadeIn fast">
        <h1>
            @lang('pages.users_show_title')
            <small>{{ $user->name }} {{ $user->last_name }}</small>
        </h1>
        <br>
        <a class="btn btn-default" href="{{ route('users.index') }}"> @lang('buttons.back')</a>

    </section>
    <section class="content container-fluid">
        <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><strong>@lang('labels.name')</strong></td>
                                <td>{{ $user->name }} {{ $user->last_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>@lang('labels.email')</strong></td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>@lang('labels.phone')</strong></td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <td><strong>@lang('labels.birthdate')</strong></td>
                                <td>{{ $user->birth_date }}</td>
                            </tr>
                            <tr>
                                <td><strong>@lang('labels.gender')</strong></td>
                                <td>{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <td><strong>@lang('labels.roles')</strong></td>
                                <td>@if(!empty($user->roles))
                                        @foreach($user->roles as $v)
                                            <label class="label label-success" style="color:white;">{{ $v->display_name }}</label>
                                        @endforeach
                                    @endif</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection