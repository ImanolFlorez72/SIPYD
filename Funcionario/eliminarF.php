<?php
    require("../Modelo/Funcionario.php");
    $func=new Funcionario();
    $id = $_POST['id'];

    try {
        $func->Eliminar_Funcionario($id);
        
    } catch (\Exception $e) {
        $e ->getMessage();
    }

?>