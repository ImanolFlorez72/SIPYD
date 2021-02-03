<?php
    require_once("../Controlador/Conexion.php");
    
    class EstadoElemento{
        
        public function Consultar_EstadoElemento(){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $data=array();
            $sql = mysqli_query($conx, "SELECT ee_cood, ee_descripcion FROM estado_elemento");      
            $i=0;
            while($reg = mysqli_fetch_array($sql)){
                $data[$reg["ee_cood"]] = $reg["ee_descripcion"];
            }
            //mysql_close($conx);
            return $data;
        
        }
        public function Insertar_EstadoElemento($descripcion){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql = "INSERT INTO estado_elemento values(null,'$descripcion')";
            mysqli_query($conx, $sql) or die ("Insercion Fallida");
        }
        public function Actualizar_EstadoElemento($cod,$descripcion){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql="UPDATE estado_elemento SET ee_descripcion='$descripcion' WHERE ee_cood=$cod";
            mysqli_query($conx,$sql) or die("Actualizacion Fallida");
        }
        public function Eliminar_EstadoElemento($cod){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql="DELETE FROM estado_elemento WHERE ee_cood=$cod";
            mysqli_query($conx,$sql) or die("Eliminacion Fallida");
        }
    }
    
?>