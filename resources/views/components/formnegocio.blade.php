<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNegocioModal">
        Agregar Negocio
    </button>
    <br><br>
    <div class="modal fade" id="addNegocioModal" tabindex="-1" role="dialog" aria-labelledby="addNegocioModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNegocioModalLabel">Agregar Negocio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <!-- Formulario para agregar negocio -->
                        <form action="{{ route('negocio-store') }}" method="POST">
                            @csrf
                            <label for="name">Nombre del negocio:</label>
                            <input type="text" id="name" name="name" required><br><br>

                            <label for="direccion">Dirección:</label>
                            <input type="text" id="adresse" name="adresse" required><br><br>

                            <label for="phone">Teléfono:</label>
                            <input type="phone" id="phone" name="phone" required><br><br>

                            <label for="status">Estado:</label>
                            <select id="status" name="status" required>

                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>

                            </select><br><br>
                            <input type="submit" class="btn btn-primary" value="Añadir negocio">
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>