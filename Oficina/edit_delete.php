<!-- FORMULARIO EDITAR -->
<div class="modal fade" id="modalEditarO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Oficina</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action=" " method="POST">
          <div class="container">
            <div class="form-group">
              <div class="row">
                <input type="number" id="idO" class="form-control" hidden placeholder="Codigo">
              </div>
              <br>
              <div class="row">
                <strong><label>Nombre</label></strong>
                <input type="text" id="nombreO" class="form-control" placeholder="Nombre">
              </div>
              <br>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" id="actualizarO">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>