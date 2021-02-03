<!-- FORMULARIO EDITAR -->
<div class="modal fade" id="modalEditarTM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TIPO MOVIMIENTOS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action=" " method="POST">
          <div class="container">
            <div class="form-group">
              <div class="row">
                <input type="number" id="idTM" class="form-control" hidden placeholder="Codigo">
              </div>
              <br>
              <div class="row">
                <strong><label>Descripcion</label></strong>
                <input type="text" id="nombreTM" class="form-control" placeholder="Descripcion">
              </div>
              <br>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" id="actualizarTM">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>