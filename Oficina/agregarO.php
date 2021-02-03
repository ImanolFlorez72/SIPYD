<?php
    include("../Modelo/Oficina.php");
    $ofic=new Oficina();
    $id = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    try {
        
        $ofic->Insertar_Oficina($nombre);
        
    } catch (\Exception $e) {
        $e ->getMessage();
    }

?>