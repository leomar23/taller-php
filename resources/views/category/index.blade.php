@extends('layouts.backend')

@section('content')
<section class="content-header animated fadeIn fast">
        <h1>
            Categorias
            <small>Lista Categorias</small>
        </h1>
        <br>
        @if (Entrust::can('category-create'))
            <a class="btn btn-success"  href="{{ route('category.create') }}">@lang('buttons.new')</a>
        @endif
</section>
<section class="content container-fluid">
        <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>@lang('labels.name')</th>
                            <th>@lang('labels.description')</th>
                            <th width="280px">@lang('labels.actions')</th>
                        </tr>
                        @foreach ($categories as $key => $cat)
                            <tr>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->description }}</td>
                                <td>
                                    @if (Entrust::can('category-edit'))
                                        <a class="btn btn-default btn-st" href="{{ route('category.edit',$cat->id) }}"><i class="fa fa-pencil"></i>@lang('buttons.edit')</a>
                                    @endif
                                    @if (Entrust::can('category-delete'))
                                        {!! Form::open(['method' => 'DELETE','route' => ['category.destroy', $cat->id],'style'=>'display:inline','id'=>'form-item-'.$cat->id]) !!}
                                        <button type="button" onclick="beforeDel({{ $cat->id }})" class="btn btn-default btn-st">@lang('buttons.delete')</button>
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="box-footer clearfix">
                {!! $categories->render() !!}
            </div>
        </div>
    </section>
@endsection
