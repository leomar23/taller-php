@extends('layouts.backend')

@section('content')
    <section class="content-header animated fadeIn fast">
        <h1>
            Ver Usuario
            <small>Ver Rol</small>
        </h1>
        <ul class="content-header-buttons">
            {{--<a class="btn btn-default" href="{{ route('users.index') }}"> @lang('buttons.back')</a>--}}
        </ul>
    </section>
    <section class="content container-fluid">
        <div class="box">
            <div class="box-body">
                {{-- <div class="table-responsive"> --}}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><strong>@lang('labels.name')</strong></td>
                                <td>{{ $role->name }}</td>
                            </tr>
                            <tr>
                                <td style="width: 200px;"><strong>@lang('labels.display_name')</strong></td>
                                <td>{{ $role->display_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>@lang('labels.description')</strong></td>
                                <td>{{ $role->description }}</td>
                            </tr>
                            <tr>
                                <td><strong>@lang('labels.permissions')</strong></td>
                                <td>
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                            <label class="label label-success">{{ $v->display_name }}</label>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    {{-- </div> --}}
                </div>
            </div>
            <div class="box-footer">
                <div class="text-right">
                    <a class="btn btn-default btn-tl-outline" href="{{ route('roles.index') }}"> @lang('buttons.back')</a>
                </div>
            </div>
        </div>
    </section>
@endsection
