@extends('layouts.backend')

@section('content')
    <section class="content-header animated fadeIn fast">
        <h1>
            Ordenes
            <small>Lista de Ordenes</small>
        </h1>
        <br>
        @if (Entrust::can('order-create'))
            <a class="btn btn-success"  href="{{ route('orders.create') }}">@lang('buttons.new')</a>
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
                        @foreach ($orders as $key => $order)
                            <tr>
                                {{--<td>{{ $order->id }}</td>--}}
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->display_name }}</td>
                                <td class="hidden-xs">{{ $order->description }}</td>
                                <td>
                                    <a class="btn btn-default btn-st" href="{{ route('orders.show',$order->id) }}"><i class="fa fa-eye"></i>@lang('buttons.show')</a>
                                    @if (Entrust::can('orders-edit'))
                                        <a class="btn btn-default btn-st" href="{{ route('orders.edit',$order->id) }}"><i class="fa fa-pencil"></i>@lang('buttons.edit')</a>
                                    @endif
                                    @if (Entrust::can('role-delete'))
                                        {!! Form::open(['method' => 'DELETE','route' => ['orders.destroy', $order->id],'style'=>'display:inline','id'=>'form-item-'.$order->id]) !!}
                                        <button type="button" onclick="beforeDel({{ $order->id }})" class="btn btn-default btn-st">@lang('buttons.delete')</button>
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                {{-- </div> --}}
            </div>
            <div class="box-footer clearfix">
                {!! $orders->render() !!}
            </div>
        </div>
    </section>
@endsection