@extends('layouts.backend')

@section('content')
<section class="content-header animated fadeIn fast">
        <h1>
            Productos
            <small>Lista Productos</small>
        </h1>
        <br>
        @if (Entrust::can('product-create'))
            <a class="btn btn-success"  href="{{ route('product.create') }}">@lang('buttons.new')</a>
        @endif
</section>
<section class="content container-fluid">
        <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>@lang('labels.name')</th>
                            <th>@lang('labels.category')</th>
                            <!-- <th>@lang('labels.price')</th> -->
                            <th width="280px">Acciones</th>
                        </tr>
                        @foreach ($products as $key => $producto)
                            <tr>
                                <td>{{ $producto->name }}</td>
                                <td>{{ $categories[$producto->category_id] }}</td>
                                <!-- <td>{{ $producto->price }}</td> -->
                            <td>
                                    @if (Entrust::can('product-edit'))
                                        <a class="btn btn-default btn-st" href="{{ route('product.edit',$producto->id) }}"><i class="fa fa-pencil"></i>@lang('buttons.edit')</a>
                                    @endif
                                    @if (Entrust::can('product-delete'))
                                        {!! Form::open(['method' => 'DELETE','route' => ['product.destroy', $producto->id],'style'=>'display:inline','id'=>'form-item-'.$producto->id]) !!}
                                        <button type="button" onclick="beforeDel({{ $producto->id }})" class="btn btn-default btn-st">@lang('buttons.delete')</button>
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="box-footer clearfix">
                {!! $products->render() !!}
            </div>
        </div>
    </section>
@endsection
