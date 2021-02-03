<?php
require_once("../Controlador/Conexion.php");
class Detalle{
    public function Consultar_Detalle(){
        $conexion=new Conexion();
        $conx = $conexion->Conectar();
        $data=array();
        $sql = mysqli_query($conx, "SELECT d_cod, d_observacion, m_cod,e_cod FROM detalle");      
        $i=0;
        while($reg = mysqli_fetch_array($sql)){
            $data[$reg["d_cod"]] = array("Observacion"=> $reg["d_observacion"],
                                        "CodMovimiento"=> $reg["m_cod"],
                                        "Modelo"=> $reg["e_modelo"]);
        }
        //mysql_close($conx);
        $conexion->close();
        return $data;
    }

    public function Insertar_Detalle($descripcion,$observacion,$codigomovimiento,$codigoelemento){
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








?>