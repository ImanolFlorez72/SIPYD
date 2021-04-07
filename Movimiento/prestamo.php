<?php
  include("../Componentes/header.php");
  include("../Componentes/menuA.php");
  require_once("../Controlador/conexion.php");
  require_once("../Modelo/Tipo_Movimiento.php");
  $tipoM = new TipoMovimiento();
  $con = new conexion();
?>

<div class="container">
  <div class="alert alert-dismissible alert-success" style="margin-top:20px;" >
    <center>
      <strong>
        <h1>Realizar Préstamo</h1>
      </strong>
    </center>
  </div>
  <form action=" " method="POST">
    <div class="container">
      <div class="form-group">
        <div class="row">
          <div class="col">
            <strong><label>Código Préstamo</label></strong>
            <input type="number" class="form-control" hidden id="prestamo_id">
          </div>
          <div class="col">
            <strong> <label>Estado</label></strong>
            <input type="text" class="form-control" id="prestamo_estado" required>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <strong><label>Fecha de Salidad</label></strong>
            <input type="date" class="form-control" id="prestamo_fs" required>
          </div>

          <div class="col-3">
            <strong><label>Fecha de Entrega</label></strong>
            <input type="date" class="form-control" id="prestamo_fe" required>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <strong> <label>Funcionario Autoriza</label></strong>
            <select class="form-control" id="prestamo_funA" required>
              <option value="0">Seleccionar</option>
              <?php
              $conx = $con->Conectar();
              $sql = "SELECT f_cood, f_documento,f_nombre,f_apellido FROM funcionario";
              $result = mysqli_query($conx, $sql);
              while ($ver = mysqli_fetch_array($result)) {
                echo '<option value="' . $ver[0] . '">' . $ver[2] . " " . $ver[3] . "(" . $ver[1] . ")" . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="col">
            <strong> <label>Funcionario Entrega</label></strong>
            <select class="form-control" id="prestamo_funE" required>
              <option value="0">Seleccionar</option>
              <?php
              $conx = $con->Conectar();
              $sql = "SELECT f_cood, f_documento,f_nombre,f_apellido FROM funcionario";
              $result = mysqli_query($conx, $sql);
              while ($ver = mysqli_fetch_array($result)) {
                echo '<option value="' . $ver[0] . '">' . $ver[2] . " " . $ver[3] . "(" . $ver[1] . ")" . '</option>';
              }
              ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <strong> <label>Funcionario Recibe</label></strong>
            <select class="form-control form-control" id="prestamo_funR" required>
              <option value="0">Seleccionar</option>
              <?php
              $conx = $con->Conectar();
              $sql = "SELECT f_cood, f_documento,f_nombre,f_apellido FROM funcionario";
              $result = mysqli_query($conx, $sql);
              while ($ver = mysqli_fetch_array($result)) {
                echo '<option value="' . $ver[0] . '">' . $ver[2] . " " . $ver[3] . "(" . $ver[1] . ")" . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="col">
            <strong> <label>Tipo de Movimiento</label></strong>
            <select class="form-control form-control" id="prestamo_Tm">
              <option value="0"> Seleccionar </option>
              <?php
              $tipoM = $tipoM->Consultar_TipoMovimiento();
              foreach ($tipoM as $cod => $valor) {
                echo '<option value="' . $cod . '">' . $valor . '</option>';
              }
              ?>
            </select>
          </div>

        </div>
          <button type="submit" class="btn btn-success btn_save" id="guardarP">Guardar</button>
      </div>
    </div>
  </form>
</div>
<div id="tablaPrestamo">
<?php include("../Movimiento/tabla_movimiento.php");?>
</div>
<div class="reporte-hidden">
  <?php include("../Movimiento/reporte.php") ?>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#guardarP').click(function() {
      id = $('#prestamo_id').val();
      estado = $('#prestamo_estado').val();
      fechaSalida = $('#prestamo_fs').val();
      fechaEntrada = $('#prestamo_fe').val();
      funAutoriza = $('#prestamo_funA').val();
      funEntrega = $('#prestamo_funE').val();
      funRecibe = $('#prestamo_funR').val();
      tipoM = $('#prestamo_Tm').val();

      registrarM(id, estado, fechaSalida, fechaEntrada, funAutoriza, funEntrega, funRecibe, tipoM);
    });
  });
</script>


<?php include("../Componentes/footer.php");?>
