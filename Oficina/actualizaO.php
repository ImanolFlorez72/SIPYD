<?php
    include("../Modelo/Oficina.php");
    $ofic=new Oficina();

    $cood = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    try {
        $ofic->Actualizar_Oficina($cood,$nombre);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }


?>