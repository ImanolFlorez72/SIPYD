<?php
    include('../Modelo/Tipo_Elemento.php');
    $aTE =  new TipoElemento();

    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];

    try {
        $aTE->Insertar_TipoElemento($descripcion);
    } catch (\Exception $e) {
        $e->getMessage();
    }
?>