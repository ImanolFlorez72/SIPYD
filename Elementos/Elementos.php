<?php
session_start();
include("../Componentes/header.php");
include('../Componentes/menuA.php');
include("../Modelo/Estado_Elemento.php");
include("../Modelo/Tipo_Elemento.php");
require_once("../Controlador/Conexion.php");
$estadolementos = new EstadoElemento();
$tipoelemento = new TipoElemento();

if (!isset($usuario)) {
    header("location: ../Vistas/Login.php");
}else{

?>

<div class="container">
    <div class="alert alert-dismissible alert-success" style="margin-top:20px;">
        <center>
            <strong>
                <h1>Registrar Elementos</h1>
            </strong>
        </center>
    </div>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <strong><label>Codigo</label></strong>
                <input type="number" class="form-control" id="elemto_cod" name="elemto_cod" placeholder="Codigo">
            </div>
            <div class="col">
                <strong><label>Descripcion</label></strong>
                <input type="text" class="form-control" id="elemento_descripcion" name="elemento_descripcion" placeholder="Descripcio del Elemento" required >
            </div>
        </div>
        <div class="row">
            <div class="col">
                <strong> <label>Serial</label></strong>
                <input type="text" class="form-control" id="elemento_serial" name="elemento_serial" placeholder="Serial del Elemento" required>
            </div>
            <div class="col">
                <strong><label>Modelo</label></strong>
                <input type="text" class="form-control" id="elemento_modelo" name="elemento_modelo" placeholder="Modelo" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <strong><label>Estado Elemento</label></strong>
                <select required class="form-control" id="estado_elemento" name="estado_elemento">
                    <option value="0">Seleccionar</option>
                    <?php
                    $est_elemento = $estadolementos->Consultar_EstadoElemento();
                    foreach ($est_elemento as $cod => $valor) {
                        echo '<option value="' . $cod . '">' . $valor . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <strong><label>Observacion</label></strong>
                <input type="textarea" class="form-control" id="elemento_observacion" name="elemento_observacion" placeholder="Observacion">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <strong> <label>Tipo de Elemento</label></strong>
                <select required="" class="form-control" id="tipo_elemento" name="tipo_elemento">
                    <option value="0">Seleccionar</option>
                    <?php
                    $Tipoelemento = $tipoelemento->Consultar_TipoElemento();
                    foreach ($Tipoelemento as $cod => $valor) {
                        echo '<option value="' . $cod . '">' . $valor . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <button type="button" class="btn btn-success btn_save" id="guardar">Guardar</button>
    </form><!-- Formulario -->
</div><!-- Contenedor -->

<div class="container">
    <div id="tabla"></div>
</div>
<?php
}
?>
<?php
include_once('edit_delete_register.php');
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabla').load('tabla.php');
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#guardar').click(function() {
            identificacion = $('#elemto_cod').val();
            descripcion = $('#elemento_descripcion').val();
            serial = $('#elemento_serial').val();
            modelo = $('#elemento_modelo').val();
            estado = $('#estado_elemento').val();
            obeservacion = $('#elemento_observacion').val();
            tipoElemento = $('#tipo_elemento').val();
            agregarE(identificacion, descripcion, serial, modelo, estado, obeservacion, tipoElemento);
        });


        $('#actualizaDatos').click(function() {
            estadoE = $('#estado_elementoE').val();
            TipoE = $('#tipo_elementoE').val();
            actualizaE(estadoE,TipoE);
        });
    });
</script>