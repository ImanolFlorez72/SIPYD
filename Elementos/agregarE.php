<?php
    include_once('../Controlador/conexion.php');
    $conexion = new Conexion();
    $conx = $conexion->Conectar();

    $cod= $_POST['identificacion'];
    $descripcion = $_POST['descripcion'];
    $serial = $_POST['serial'];
    $modelo = $_POST['modelo'];
    $codigoestado = $_POST['estado'];
    $observacion = $_POST['observacion'];
    $codigotipo = $_POST['tipoElemento'];

    try {
        $sql = "INSERT INTO elementos (e_cod, e_descripcion, e_serial, e_modelo, ee_cood, e_observacion, te_cood)  
        VALUES ('$cod','$descripcion','$serial','$modelo',$codigoestado,'$observacion',$codigotipo)";
        $result = mysqli_query($conx, $sql);
        if ($result == true) {
            echo $result;
        }else{
            echo $conx->error;
        }
    } catch (Error $th) {
        $th->getMessage();
    }
?>