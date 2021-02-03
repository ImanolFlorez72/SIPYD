<!-- FORMULARIO EDITAR -->
<div class="modal fade" id="modalEditarF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Funcionario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action=" " method="POST">
          <div class="container">
            <div class="form-group">
              <div class="row">
                <input type="number" id="idF" class="form-control" hidden placeholder="Indentifiacion">
              </div>
              <br>
              <div class="row">
                <strong><label>Nombre</label></strong>
                <input type="text" id="nombreF" class="form-control" placeholder="Nombre">
              </div>
              <br>
              <div class="row">
                <strong> <label>Apellido</label></strong>
                <input type="text" id="apellidoF" class="form-control" placeholder="Apellido">
              </div>
              <br>
              <div class="row">
                <strong><label>Documento</label></strong>
                <input type="number" id="DocumentoF" class="form-control" placeholder="Documento">
              </div>
              <br>
              <div class="row">
                <strong><label>E-mail</label></strong>
                <input type="email" id="mailF" class="form-control" placeholder="Correo Electronico">
              </div>
              <br>
              <div class="row">
                <strong><label>Oficiona</label></strong>
                <select class="form-control" id="oficionaF" required>
                  <option value="0">Seleccionar</option>
                  <?php
                  $oficina_fun = $oficina->Consultar_Oficina();
                  foreach ($oficina_fun as $cod => $valor) {
                    echo '<option value="' . $cod . '">' . $valor . '</option>';
                  }
                  ?>
                </select>
              </div>
              <br>
              <div class="row">
                <strong><label>Cuenta</label></strong>
                <select class="form-control" id="cuentaF" required>
                  <option value="0">Seleccionar</option>
                  <?php
                  $cuenta_fun = $cuenta->Consultar_TipoCuenta();
                  foreach ($cuenta_fun as $cod => $valor) {
                    echo '<option value="' . $cod . '">' . $valor . '</option>';
                  }
                  ?>
                </select>
              </div>
              <br>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" id="actualizarF">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>