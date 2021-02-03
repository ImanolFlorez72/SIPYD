<?php
    include("../Modelo/Tipo_Movimiento.php");
    $TM=new TipoMovimiento();

    $cood = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    try {
        $TM->Actualizar_TipoMovimiento($cood,$nombre);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }


?>