<?php

include("../Componentes/header.php");
include("../Componentes/menuA.php");
include("../Modelo/Oficina.php");
$oficina=new Oficina();
?>




<div class="container">
  <div class="alert alert-dismissible alert-success" style="margin-top:20px";>
 <center><strong><h1>Oficinas</h1></strong> </center>
</div>


<br>
<form action="" method="POST">
<div class="container">
<div class="form-group">  
<div class="row">
    <div class="col">
      <strong><label>Código de Oficina</label></strong>
      <input type="number" class="form-control"  id="codigooficina"  placeholder="Codigo" required="">
    </div>
    <div class="col">
      <strong><label>Nombre de Oficina</label></strong>
      <input type="text" class="form-control"  id="nombreoficina"  placeholder="Nombre " required="">
    </div>
  </div>
  <br>
  <div class="row">
 
  <div class="col">
 <button type="submit" class="btn btn-success" id="guardarO">Guardar</button>
 </div>
 </div>
</div>
</form>
</div>
</div>


<br> 
 <div class="container">
 <div id="tablaOficina"></div>
 
</div>
<?php
include_once('edit_delete.php');
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tablaOficina').load('tablaOficina.php');
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#guardarO').click(function() {
            nombre = $('#nombreoficina').val();
            codigo=$('#codigooficina').val();
           
            agregarO(nombre,codigo);
        });


        $('#actualizarO').click(function() {
            actualizaO();
        });
    });
</script>