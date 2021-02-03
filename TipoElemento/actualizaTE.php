<?php
    include("../Modelo/Tipo_Elemento.php");
    $TM=new TipoElemento();

    $cood = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    try {
        $TM->Actualizar_TipoElemento($cood,$nombre);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }


?>