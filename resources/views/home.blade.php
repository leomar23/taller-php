@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>

                @if (Auth::check())
                <div class="panel-body">
                    Logueado como {{ @Auth::user()->name }}
                </div>            
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
