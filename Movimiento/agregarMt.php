<?php
    include('../Controlador/conexion.php');
    $conx = new Conexion();
    $conx = $conx->Conectar();

    $id = $_POST['id'];
    $estado = $_POST['estado'];
    $fSalida = $_POST['fechaSalida'];
    $fEntrada = $_POST['fechaEntrada'];
    $fAutoriza = $_POST['funAutoriza'];
    $fEntrega = $_POST['funEntrega'];
    $fRecibe = $_POST['funRecibe'];
    $Tm = $_POST['tipoM'];

    try {
        $sql = "INSERT INTO movimiento (m_cod, m_fecha_salida, m_estado, m_autoriza, m_entrega, m_recibe, tm_cod, m_fecha_estipulada)
        VALUES (null,'$fSalida', '$estado', $fAutoriza, $fEntrega, $fRecibe, $Tm , '$fentarda')";
        $result = mysqli_query($conx, $sql);
        if ($result == true) {
            echo $result;
        }else{
            echo $conx->error;
        }
    } catch (\Error $e) {
        $e -> getMessage();
    }
?>