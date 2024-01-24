@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card-body">
                    @if (session('mensage'))
                        <div class="alert alert-success" role="alert">
                            {{ session('mensage') }}
                        </div>
                    @endif
                </div>
    <x-formnegocio/>
    <a href="{{ route('promociones.create') }}" class="btn btn-primary" role="button" id="btn-promocion">Agregar Promocion</a>
    </div>
</div>
@endsection
