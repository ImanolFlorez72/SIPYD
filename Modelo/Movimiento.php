<?php
require_once("../Controlador/Conexion.php");
class Movimiento{
    
    public function Insertar_Movimiento($descripcion,$observacion,$codigomovimiento,$codigoelemento){
        $conexion=new Conexion();
        $conx = $conexion->Conectar();
        $sql = "INSERT INTO tipo_movimiento values(null,'$descripcion')";
        mysqli_query($conx, $sql) or die ("Insercion Fallida");
        $conexion->close();
    }

    public function Actualizar_Detalle($cod,$descripcion){
        $conexion=new Conexion();
        $conx = $conexion->Conectar();
        $sql="UPDATE tipo_movimiento SET tm_movimiento='$descripcion' WHERE tm_cod=$cod";
        mysqli_query($conx,$sql) or die("Actualizacion Fallida");
        $conexion->close();
    }

    public function Eliminar_Detalle($cod){
        $conexion=new Conexion();
        $conx = $conexion->Conectar();
        $sql="DELETE FROM tipo_movimiento WHERE tm_cod=$cod";
        mysqli_query($conx,$sql) or die("Eliminacion Fallida");
        $conexion->close();
    }
}