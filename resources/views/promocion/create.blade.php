@extends('home')
@section('content')
<h2>CREAR CURSO</h2>

<div class="container">
    <form action="{{ route('promociones.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <label for="" class="form-label">Fecha</label>
        <input id="titulo" name="titulo" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="1">
    </div>

    <label for="" class="form-label">Selecione el Estado</label>
        <select class="form-control" name="status" id="status">
        <option value="">Posibles Estados de la Promocion</option>
                <option value="1">Activa</option>
                <option value="0">Inicativa</option>
        </select>
    <br/><br/>
    <label for="" class="form-label">Selecione EL Negocio</label>
        <select class="form-control" name="negocio_id" id="negocio_id">
        <option value="">Selecione el lugar a Promocionar</option>
            @foreach( $negocios as $negocio)
                <option value="{{$negocio->id}}">{{$negocio->name}}</option>
            @endforeach
        </select>
        <br/><br/><br/><br/>
        <div class="custom-file">
            <label class="custom-file-label" for="customFile">Choose file</label>
            <input type="file" class="custom-file-input" id="customFile" name="imagen">
        </div>
    <br><br><br>
    <button id="saveButton">Save</button>
    <a href="/home" class="btn btn-secondary" tabindex="5">Cancelar</a>
</form>
</div>

<script>
    $(document).ready(function() {
    $('#saveButton').on('click', function() {
        var file = $('#customFile')[0].files[0];
        var formData = new FormData();
        formData.append('file', file);

        $.ajax({
        url: 'https://127.0.0.1/solarium-app/api-app/public/promociones',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Manejar la respuesta del servidor aquí
            alert('Promoción guardada con éxito');
        },
        error: function() {
            // Manejar errores aquí
            alert('Error al guardar la promoción');
        }
        });
    });
    });
</script>
@endsection