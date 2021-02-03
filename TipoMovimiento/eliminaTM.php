<?php
    include("../Modelo/Tipo_Movimiento.php");
    $TM=new TipoMovimiento();

    $id = $_POST['id'];
    
    try {
       $TM->Eliminar_TipoMovimiento($id);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }


?>