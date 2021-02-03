<?php
    include("../Modelo/Tipo_Elemento.php");
    $tm=new TipoElemento();

    $id = $_POST['id'];
    
    try {
       $tm->Eliminar_TipoElemento($id);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }


?>