<?php
    require("../Modelo/Elementos.php");
    $conexion=new Conexion();
    $conx = $conexion->Conectar();

    $cod= $_POST['identificacion'];
    $descripcion = $_POST['descripcion'];
    $serial = $_POST['serial'];
    $modelo = $_POST['modelo'];
    $codigoestado = $_POST['estado'];
    $observacion = $_POST['observacion'];
    $codigotipo = $_POST['tipoElemento'];

    try {
        $sql="UPDATE elementos SET e_descripcion='$descripcion',e_serial='$serial', e_modelo='$modelo', ee_cood=$codigoestado, e_observacion='$observacion', te_cood=$codigotipo 
        WHERE e_cod=$cod";
        $result = mysqli_query($conx,$sql);
        if ($result == true) {
            echo $result;
        }else{
            echo $conx->error;
        }
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }
