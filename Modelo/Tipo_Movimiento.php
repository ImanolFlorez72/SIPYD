<?php
require_once("../Controlador/Conexion.php");
class TipoMovimiento{
    public function Consultar_TipoMovimiento(){
        $conexion=new Conexion();
        $conx = $conexion->Conectar();
        $data=array();
        $sql = mysqli_query($conx, "SELECT tm_cod, tm_movimiento FROM tipo_movimiento");      
        $i=0;
        while($reg = mysqli_fetch_array($sql)){
            $data[$reg["tm_cod"]] = $reg["tm_movimiento"];
        }
        //mysql_close($conx);
        $conexion->close();
        return $data;
    }

    public function Insertar_TipoMovimiento($descripcion){
        $conexion=new Conexion();
        $conx = $conexion->Conectar();
        $sql = "INSERT INTO tipo_movimiento values(null,'$descripcion')";
        mysqli_query($conx, $sql) or die ("Insercion Fallida");
        $conexion->close();
    }

    public function Actualizar_TipoMovimiento($cod,$descripcion){
        $conexion=new Conexion();
        $conx = $conexion->Conectar();
        $sql="UPDATE tipo_movimiento SET tm_movimiento='$descripcion' WHERE tm_cod=$cod";
        mysqli_query($conx,$sql) or die("Actualizacion Fallida");
        $conexion->close();
    }

    public function Eliminar_TipoMovimiento($cod){
        $conexion=new Conexion();
        $conx = $conexion->Conectar();
        $sql="DELETE FROM tipo_movimiento WHERE tm_cod=$cod";
        mysqli_query($conx,$sql) or die("Eliminacion Fallida");
        $conexion->close();
    }
}








?>