<?php
    require("../Modelo/Elementos.php");
    $elementos=new Elementos();
    $conexion=new Conexion();
    $conx = $conexion->Conectar();
    $id = $_POST['id'];

    try {
        $sql="DELETE FROM elementos WHERE e_cod=$id";
        $result = mysqli_query($conx,$sql);
        if ($result == true) {
            echo $result;
        }else {
            echo $conx->error;
        }
    } catch (\Exception $e) {
        $e ->getMessage();
    }

?>