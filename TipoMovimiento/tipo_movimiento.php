<?php
session_start();
include("../Componentes/header.php");
include("../Componentes/menuA.php");
include("../Modelo/Tipo_Movimiento.php");
$tipomov = new TipoMovimiento();

if (!isset($usuario)) {
    header("location: ../Vistas/Login.php");
}else{
?>

<div class="container">
  <div class="alert alert-dismissible alert-success" style="margin-top:20px" ;>
    <center><strong>
        <h1> Tipo de Movimiento</h1>
      </strong> </center>
  </div>

  <form action="" method="POST">
    <div class="container">
      <div class="form-group">
        <div class="row">
          <div class="col">
            <strong><label>Código Movimiento</label></strong>
            <input type="number" class="form-control" id="CodigoTM" placeholder="Código Movimiento" required>
          </div>
          <div class="col">

            <strong><label>Descripción</label></strong>
            <input type="text" class="form-control" id="DescripcionTM" placeholder="Descripción" required>
          </div>
        </div>
        <br>

        <button type="submit" class="btn btn-success" id="guardarTM">Guardar</button>
      </div>
  </form>
</div>

<div class="container">
  <div id="tablaTipoMovimiento"></div>
</div>

<?php
}
include("edit_delete.php");
?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#tablaTipoMovimiento').load('tablaTipoMovimiento.php');
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#guardarTM').click(function() {
      nombre = $('#DescripcionTM').val();
      codigo = $('#CodigoTM').val();

      agregarTM(nombre, codigo);
    });

    $('#actualizarTM').click(function() {
      actualizaTM();
    });
  });
</script>