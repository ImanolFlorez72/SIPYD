<?php 
    require_once("../Controlador/Conexion.php");
    class TipoCuenta{
        public function Consultar_TipoCuenta(){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $data=array();
            $sql = mysqli_query($conx, "SELECT tc_cood, tc_descripcion FROM tipo_cuenta");      
            $i=0;
            while($reg = mysqli_fetch_array($sql)){
                $data[$reg["tc_cood"]] = $reg["tc_descripcion"];
            }
            //mysql_close($conx);
            return $data;
        }
    
        public function Insertar_TipoCuenta($descripcion){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql = "INSERT INTO tipo_cuenta values(null,'$descripcion')";
            mysqli_query($conx, $sql) or die ("Insercion Fallida");
        }
    
        public function Actualizar_TipoCuenta($cod,$descripcion){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql="UPDATE tipo_cuenta SET tc_descripcion='$descripcion' WHERE tc_cood=$cod";
            mysqli_query($conx,$sql) or die("Actualizacion Fallida");
        }
    
        public function Eliminar_TipoCuenta($cod){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql="DELETE FROM tipo_cuenta WHERE tc_cood=$cod";
            mysqli_query($conx,$sql) or die("Eliminacion Fallida");
        }
    }
    
?>