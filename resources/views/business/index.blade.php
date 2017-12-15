@extends('layouts.backend')

@section('content')
<section class="content-header animated fadeIn fast">
        <h1>
            Comercios
            <small>Lista Comercios</small>
        </h1>
        <br>
        @if (Entrust::can('business-create'))
            <a class="btn btn-success"  href="{{ route('business.create') }}">@lang('buttons.new')</a>
        @endif
</section>
<section class="content container-fluid">
        <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>@lang('labels.name')</th>
                            <th>@lang('labels.location')</th>
                            <th width="280px">Acciones</th>
                        </tr>
                        @foreach ($businesses as $key => $bus)
                            <tr>
                                <td>{{ $bus->name }}</td>
                                <td>{{ $bus->location }}</td>
                                <td>
                                    @if (Entrust::can('business-edit'))
                                        <a class="btn btn-default btn-st" href="{{ route('business.edit',$bus->id) }}"><i class="fa fa-pencil"></i>@lang('buttons.edit')</a>
                                    @endif
                                    @if (Entrust::can('business-delete'))
                                        {!! Form::open(['method' => 'DELETE','route' => ['business.destroy', $bus->id],'style'=>'display:inline','id'=>'form-item-'.$bus->id]) !!}
                                        <button type="button" onclick="beforeDel({{ $bus->id }})" class="btn btn-default btn-st">@lang('buttons.delete')</button>
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="box-footer clearfix">
                {!! $businesses->render() !!}
            </div>
        </div>
    </section>
@endsection
