<!-- FORMULARIO EDITAR -->
<div class="modal fade" id="modalEditarTE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tipo Elementos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>
      <div class="modal-body">
        <form action=" " method="POST">
          <div class="container">
            <div class="form-group">
              <input type="number" id="idTE" class="form-control" hidden placeholder="Codigo">
              <div class="row">
                <strong><label>Descripcion</label></strong>
                <input type="text" id="nombreTE" class="form-control" placeholder="Descripcion">
              </div>
              <br>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" id="actualizarTE">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>