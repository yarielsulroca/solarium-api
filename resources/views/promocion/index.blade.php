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
                <a href="{{ route('promociones.create') }} " class="btn btn-primary" >
                    Crear Promocion
                </a>
                <br />
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Url_img</th>
                        <th scope="col">Descripcion</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($promociones as $promocion)
                        @endforeach
                    <tr>
                        <th scope="row">
                           {{--  {{ $promocion->id }} --}}
                        </th>
                        <td>
                          {{--   {{ $promocion->title }} --}}
                        </td>
                        <td>
                        {{--  {{ $promocion->imagen }} --}}
                        </td>
                        <td>
                        {{--   {{ $promocion->descripcion }} --}}
                        </td>
                        <td width="10px">
                            <a {{-- href="{{ route('promociones.edit/$pomocion_id')}}" --}} class="btn btn-warning">
                                Editar</a>
                            </td>
                        <<td width="10px">
                            <a {{-- href="{{ route('promociones.destroy',$pomocion_id) }}" --}} class="btn btn-danger">
                                Borrar</a> 
                            </td>
                    </tr>
                    </tbody>
                </table>
               {{--  {{ $promociones->render() }} --}}
                </div>
            </div>
@endsection