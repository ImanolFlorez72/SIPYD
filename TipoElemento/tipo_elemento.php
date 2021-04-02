<?php
session_start();
include('../Componentes/header.php');
include('../Componentes/menuA.php');

if (!isset($usuario)) {
    header("location: ../Vistas/Login.php");
}else{
?>


<div class="container">
  <div class="alert alert-dismissible alert-success" style="margin-top:20px;">
    <center><strong>
        <h1> Tipo de Elemento</h1>
      </strong> </center>
  </div>
  <form action="" method="POST">
    <div class="container">
      <div class="form-group">
        <div class="row">
          <div class="col">
            <input type="number" class="form-control" id="idTe" hidden>
            <strong><label>Descripción</label></strong>
            <input type="text" class="form-control" id="descripcionTe" placeholder="Descripción" required>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success btn_save" id="guardarTe">Guardar</button>
      </div>
  </form>
</div>
<br>
<div id="tablaTe"></div>

<?php 
}
include("edit_delete.php");
?>
<script type="text/javascript">
  $('#tablaTe').load('tablaTe.php');

  $('#guardarTe').click(function() {
    idTe = $('#idTe').val();
    descripcionTe = $('#descripcionTe').val();
    agregarTe(idTe, descripcionTe);

  });
  $('#actualizarTE').click(function() {
    actualizaTE();
  });
</script>
