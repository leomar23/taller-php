@extends('layouts.backend')

@section('content')
    <section class="content-header animated fadeIn fast">
      <h1>
        @lang('pages.users_index_title')
        <small>@lang('pages.users_index_subtitle')</small>
      </h1>
      <br>
      @if (Entrust::can('user-create'))
      <a class="btn btn-success"  href="{{ route('users.create') }}">@lang('buttons.new')</a></li>
      @endif
    </section>
    <section class="content container-fluid">
        <div class="box">
            {{-- <div class="box-header with-border"></div> --}}
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            {{--<th>@lang('labels.no')</th>--}}
                            <th>@lang('labels.name')</th>
                            <th>@lang('labels.email')</th>
                            {{--<th>@lang('labels.status')</th>--}}
                            <th>@lang('labels.roles')</th>
                            <th width="280px">@lang('labels.actions')</th>
                        </tr>
                        @foreach ($data as $key => $user)
                            <tr>
                                {{--<td>{{ $user->id }}</td>--}}
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->roles))
                                        @foreach($user->roles as $v)
                                            <label class="label label-success">{{ $v->display_name }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-default btn-st" href="{{ route('users.show',$user->id) }}">@lang('buttons.show')</a>
                                    @if (Entrust::can('user-edit'))
                                    <a class="btn btn-default btn-st" href="{{ route('users.edit',$user->id) }}">@lang('buttons.edit')</a>
                                    @endif
                                    @if (Entrust::can('user-delete'))
                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline','id'=>'form-item-'.$user->id]) !!}
                                    <button type="button" onclick="beforeDel({{ $user->id }})" class="btn btn-default btn-st">@lang('buttons.delete')</button>
                                    {!! Form::close() !!}
                                     @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="box-footer clearfix">
                {!! $data->render() !!}
            </div>
        </div>
    </section>
@endsection