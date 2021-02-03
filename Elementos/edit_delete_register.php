<!-- Actualizar -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Elemento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action=" " method="POST">
          <div class="container">
            <div class="form-group">
              <div class="row">
                <input type="number" id="identificacion_elementoE" class="form-control" hidden name="rc_identificacion" placeholder="Indentifiacion">
              </div>
              <br>
              <div class="row">
                <strong><label>Descripcion</label></strong>
                <input type="text" id="descripcion_elementoE" class="form-control" name="rc_nombre" placeholder="Descripcio del Elemento">
              </div>
              <br>
              <div class="row">
                <strong> <label>Serial</label></strong>
                <input type="text" id="serial_elementoE" class="form-control" name="rc_telefono" placeholder="Serial del Elemento">
              </div>
              <br>
              <div class="row">
                <strong><label>Modelo</label></strong>
                <input type="text" id="modelo_elementoE" class="form-control" name="rc_correo" placeholder="Modelo">
              </div>
              <br>
              <div class="row">
                <strong><label>Estado Elemento</label></strong>
                <select required class="form-control" id="estado_elementoE" name="estado_elemento">
                  <option value="0">Seleccionar</option>
                  <?php
                  $est_elemento = $estadolementos->Consultar_EstadoElemento();
                  foreach ($est_elemento as $cod => $valor) {
                    echo '<option value="' . $cod . '">' . $valor . '</option>';
                  }
                  ?>
                </select>
              </div>
              <br>
              <div class="row">
                <strong><label>Obeservacion</label></strong>
                <textarea class="form-control" id="observacion_elementoE" placeholder="Observacion" cols="10" rows="1"></textarea>
              </div>
              <br>
              <div class="row">
                <strong> <label>Tipo de Elemento</label></strong>
                <select required="" class="form-control" id="tipo_elementoE" name="tipo_elemento">
                  <option value="0">Seleccionar</option>
                  <?php
                  $Tipoelemento = $tipoelemento->Consultar_TipoElemento();
                  foreach ($Tipoelemento as $cod => $valor) {
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
        <button type="button" class="btn btn-success" id="actualizaDatos">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
