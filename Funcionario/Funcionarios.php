<?php
session_start();
$usuario = $_SESSION['username'];

include("../Componentes/header.php");
include('../Componentes/menuA.php');
require_once("../Controlador/Conexion.php");
include('../Modelo/Tipo_Cuenta.php');
include('../Modelo/Oficina.php');
$oficina = new Oficina();
$cuenta = new TipoCuenta();

if (!isset($usuario)) {
    header("location: ../Vistas/Login.php");
}else{

?>

<div class="container">
    <div class="alert alert-dismissible alert-success" style="margin-top:20px;">
        <center>
            <strong>
                <h1>Registrar Funcionarios</h1>
            </strong>
        </center>
    </div>
    <form action="" method="POST">
        <div class="container">
            <div class="row">
                <div class="col">
                    <strong><label>Identificacion</label></strong>
                    <input type="number" class="form-control" id="id_funcionario" placeholder="Identificacion" required>
                </div>
                <div class="col">
                    <strong><label>Nombre</label></strong>
                    <input type="text" class="form-control" id="nombre_funcionario" placeholder="Nombre" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong> <label>Apellido</label></strong>
                    <input type="text" class="form-control" id="apellido_funcionario" placeholder="Apellido" required>
                </div>
                <div class="col">
                    <strong><label>Documento</label></strong>
                    <input type="text" class="form-control" id="documento_funcionario" placeholder="Documento" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong> <label>E-mail</label></strong>
                    <input type="text" class="form-control" id="mail_funcionario" placeholder="E-mail" required>
                </div>
                <div class="col">
                    <strong><label>Oficiona</label></strong>
                    <select class="form-control" id="oficina_funcionario" required>
                        <option value="0">Seleccionar</option>
                        <?php
                        $oficina_fun = $oficina->Consultar_Oficina();
                        foreach ($oficina_fun as $cod => $valor) {
                            echo '<option value="' . $cod . '">' . $valor . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong> <label>Usuario</label></strong>
                    <input type="text" class="form-control" id="usuario_f" placeholder="Usuario" required="">
                </div>
                <div class="col">
                    <strong><label>Contraseña</label></strong>
                    <input type="text" class="form-control" id="contrasena_f" placeholder="Contraseña" required="">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong><label>Cuenta</label></strong>
                    <select class="form-control" id="Cuenta_funcionario" required>
                        <option value="0">Seleccionar</option>
                        <?php
                        $cuenta_fun = $cuenta->Consultar_TipoCuenta();
                        foreach ($cuenta_fun as $cod => $valor) {
                            echo '<option value="' . $cod . '">' . $valor . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <button type="button" class="btn btn-success btn_save" id="guardarF">Guardar</button>
        </div>
    </form><!-- Formulario funcionario -->
</div><!-- Contenedor -->

<div class="container">
    <div id="tablaFuncionario"></div>
</div><!-- Contenedor tabla -->
<?php
}
?>

<?php
include_once('edit_delete.php');
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tablaFuncionario').load('tablaFunc.php');
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#guardarF').click(function() {
            identificacion = $('#id_funcionario').val();
            nombre = $('#nombre_funcionario').val();
            apellido = $('#apellido_funcionario').val();
            documento = $('#documento_funcionario').val();
            mail = $('#mail_funcionario').val();
            oficiona = $('#oficina_funcionario').val();
            cuenta = $('#Cuenta_funcionario').val();
            usuario=$('#usuario_f').val();
            contrasena=$('#contrasena_f').val();
            
            agregarF(identificacion,nombre,apellido,documento,mail,oficiona,cuenta,usuario,contrasena);
        });

        $('#actualizarF').click(function() {
            oficionaF = $('#oficionaF').val();
            cuentaF = $('#id_funcionario').val();
            actualizaF(oficionaF, cuentaF);
        });
    });
</script>
