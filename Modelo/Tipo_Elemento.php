<?php 
    require_once("../Controlador/Conexion.php");
    class TipoElemento{
        public function Consultar_TipoElemento(){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $data=array();
            $sql = mysqli_query($conx, "SELECT te_cood, te_descripcion FROM tipo_elemento");      
            $i=0;
            while($reg = mysqli_fetch_array($sql)){
                $data[$reg["te_cood"]] = $reg["te_descripcion"];
            }
            //mysql_close($conx);
            return $data;
        }
    
        public function Insertar_TipoElemento($descripcion){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql = "INSERT INTO tipo_elemento values(null,'$descripcion')";
            mysqli_query($conx, $sql) or die ("Insercion Fallida");
        }
    
        public function Actualizar_TipoElemento($cod,$descripcion){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql="UPDATE tipo_elemento SET te_descripcion='$descripcion' WHERE te_cood=$cod";
            mysqli_query($conx,$sql) or die("Actualizacion Fallida");
        }
    
        public function Eliminar_TipoElemento($cod){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql="DELETE FROM tipo_elemento WHERE te_cood=$cod";
            mysqli_query($conx,$sql) or die("Eliminacion Fallida");
        }
    }
    
?>