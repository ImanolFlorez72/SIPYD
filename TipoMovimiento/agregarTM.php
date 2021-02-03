<?php
    include("../Modelo/Tipo_Movimiento.php");
    $TM=new TipoMovimiento();
    $id = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    try {
        
        $TM->Insertar_TipoMovimiento($nombre);
        
    } catch (\Exception $e) {
        $e ->getMessage();
    }

?>