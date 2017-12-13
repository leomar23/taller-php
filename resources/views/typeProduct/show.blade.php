@extends('layouts.backend')

@section('content')
    <div class="card">
        <div class="header" >
            <div class="col-md-6" style="padding-bottom: 10px;">
                <h4 class="title">Show Category</h4>
            </div>
            <div class="col-md-6">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('category.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $category->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection