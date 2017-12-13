@extends('layouts.backend')

@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="card">
    <div class="header" >
        <div class="col-md-6" style="padding-bottom: 10px;">
            <h4 class="title">TypeProduct Management</h4>
            <p class="category">Here is a subtitle for this table</p>
        </div>
        <div class="col-md-6">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('typeProduct.create') }}"> Create New TypeProduct</a>
            </div>
        </div>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table">
            <tr>
                <th>No</th>
                <th>@lang('labels.category')</th>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($typeProducts as $key => $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->category->name }}</td>
                    <td>{{ $data->name }}</td>
                    <td>
                        {{--<a class="btn btn-info" href="{{ route('typeProduct.show',$data->id) }}">Show</a>--}}
                        <a class="btn btn-primary" href="{{ route('typeProduct.edit',$data->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['typeProduct.destroy', $data->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
{!! $typeProducts->render() !!}

@endsection