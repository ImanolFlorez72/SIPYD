<?php
    require_once("../Controlador/Conexion.php");
    $conexion = new Conexion();
    $conx = $conexion->Conectar();

    $cood = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $mail = $_POST['mail'];
    $oficina = $_POST['oficina'];
    $cuenta = $_POST['cuenta'];

    try {
        $sql = "UPDATE funcionario SET f_nombre='$nombre', f_apellido='$apellido', f_documento='$documento', f_correo='$mail', o_cood='$oficina', c_cood='$cuenta'
        WHERE f_cood = $cood";
        $result = mysqli_query($conx,$sql);
        if ($result == true) {
            echo $result;
        } else {
            echo $conx->error;
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }


?>