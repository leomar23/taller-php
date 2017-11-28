@extends('layouts.backend')

@section('content')
    <section class="content-header animated fadeIn fast">
        <h1>
            @lang('pages.permission_index_title')
            <small>@lang('pages.permission_index_subtitle')</small>
        </h1>
        <br>
        @if (Entrust::can('permission-create'))
            <a class="btn btn-success"  href="{{ route('permission.create') }}">@lang('buttons.new')</a>
        @endif
    </section>
    <section class="content container-fluid">
        <div class="box">
            {{-- <div class="box-header with-border"></div> --}}
            <div class="box-body">
                {{--  <div class="table-responsive">  --}}
                    <table class="table">
                        <tr>
                            {{--<th class="hidden-xs">@lang('labels.no')</th>--}}
                            <th>@lang('labels.name')</th>
                            <th>@lang('labels.display_name')</th>
                            <th width="280px">@lang('labels.actions')</th>
                        </tr>
                        @foreach ($data as $key => $permission)
                        <tr>
                            {{--<td class="hidden-xs">{{ $permission->id }}</td>--}}
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->display_name }}</td>
                            <td>
                                @if (Entrust::can('permission-edit'))
                                    <a class="btn btn-default btn-st" href="{{ route('permission.edit',$permission->id) }}"><i class="fa fa-pencil"></i>@lang('buttons.edit')</a>
                                @endif
                                @if (Entrust::can('permission-delete'))
                                    {!! Form::open(['method' => 'DELETE','route' => ['permission.destroy', $permission->id],'style'=>'display:inline','id'=>'form-item-'.$permission->id]) !!}
                                    <button type="button" onclick="beforeDel({{ $permission->id }})" class="btn btn-default btn-st">@lang('buttons.delete')</button>
                                    {!! Form::close() !!}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                {{--  </div>  --}}
            </div>
            <div class="box-footer clearfix">
                {!! $data->render() !!}
            </div>
        </div>
    </section>
@endsection