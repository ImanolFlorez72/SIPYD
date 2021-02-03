<?php
    include("../Modelo/Oficina.php");
    $ofic=new Oficina();

    $id = $_POST['id'];
    
    try {
       $ofic->Eliminar_Oficina($id);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }


?>