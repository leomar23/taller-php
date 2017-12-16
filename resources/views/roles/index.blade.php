@extends('layouts.backend')

@section('content')
    <section class="content-header animated fadeIn fast">
        <h1>
            Gestión de Roles
            <small>Lista de Roles</small>
        </h1>
        <br>
        @if (Entrust::can('role-create'))
            <a class="btn btn-success"  href="{{ route('roles.create') }}">@lang('buttons.new')</a>
        @endif
    </section>
    <section class="content container-fluid">
        <div class="box">
            {{-- <div class="box-header with-border"></div> --}}
            <div class="box-body">
                {{-- <div class="table-responsive"> --}}
                    <table class="table">
                        <tr>
                            {{--<th>@lang('labels.no')</th>--}}
                            <th>@lang('labels.name')</th>
                            <th>@lang('labels.display_name')</th>
                            <th class="hidden-xs">@lang('labels.description')</th>
                            <th width="280px">@lang('labels.actions')</th>

                        </tr>
                        @foreach ($roles as $key => $role)
                            <tr>
                                {{--<td>{{ $role->id }}</td>--}}
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->display_name }}</td>
                                <td class="hidden-xs">{{ $role->description }}</td>
                                <td>
                                    <a class="btn btn-default btn-st" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye"></i>@lang('buttons.show')</a>
                                    @if (Entrust::can('role-edit'))
                                        <a class="btn btn-default btn-st" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-pencil"></i>@lang('buttons.edit')</a>
                                    @endif
                                    @if (Entrust::can('role-delete'))
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline','id'=>'form-item-'.$role->id]) !!}
                                        <button type="button" onclick="beforeDel({{ $role->id }})" class="btn btn-default btn-st">@lang('buttons.delete')</button>
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                {{-- </div> --}}
            </div>
            <div class="box-footer clearfix">
                {!! $roles->render() !!}
            </div>
        </div>
    </section>
@endsection