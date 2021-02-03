<?php 
    require_once("../Controlador/Conexion.php");
    class Oficina{
        public function Consultar_Oficina(){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $data=array();
            $sql = mysqli_query($conx, "SELECT o_cood, o_descripcion FROM oficina");      
            $i=0;
            while($reg = mysqli_fetch_array($sql)){
                $data[$reg["o_cood"]] = $reg["o_descripcion"];
            }
            //mysql_close($conx);
            return $data;
        }
    
        public function Insertar_Oficina($descripcion){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql = "INSERT INTO oficina values(null,'$descripcion')";
            mysqli_query($conx, $sql) or die ("Insercion Fallida");
        }
    
        public function Actualizar_Oficina($cod,$descripcion){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql="UPDATE oficina SET o_descripcion='$descripcion' WHERE o_cood=$cod";
            mysqli_query($conx,$sql) or die("Actualizacion Fallida");
        }
    
        public function Eliminar_Oficina($cod){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql="DELETE FROM oficina WHERE o_cood=$cod";
            mysqli_query($conx,$sql) or die("Eliminacion Fallida");
        }
    }
    
    
?>