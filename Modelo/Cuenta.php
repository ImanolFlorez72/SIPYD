<?php 
    require_once("../Controlador/Conexion.php");
    class Cuenta{
        public function Consultar_Cuenta(){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $data=array();
            $sql = mysqli_query($conx,  "SELECT c.`c_cood`,c.`c_usuario`,c.`c_contrasena`,tc.`tc_cood`,tc.`tc_descripcion`
                                        FROM cuenta AS c,tipo_cuenta AS tc
                                        WHERE c.`tc_cood`=tc.`tc_cood`") or die ("Error");
            while($reg = mysqli_fetch_array($sql)){
                $data[$reg["c_cood"]] = array("Usuario"=>$reg["c_usuario"],
                                                "Contrasena"=>$reg["c_contrasena"],
                                                "Cod_TipoCuenta"=>$reg["tc_cood"],
                                                "TipoCuenta"=>$reg["tc_descripcion"]);                                       
            }
        return $data;
        }
        public function Insertar_Cuenta($codigo,$usuario,$contrasena,$codigotipocuenta){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql = "INSERT INTO cuenta values($codigo,'$usuario','$contrasena',$codigotipocuenta)";
            mysqli_query($conx, $sql) or die ("Insercion Fallida");
        }
        public function Actualizar_Cuenta($cod,$usuario,$contrasena,$codigotipocuenta){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql="UPDATE cuenta SET c_usuario='$usuario',c_contrasena='$contrasena',tc_cood='$codigotipocuenta' WHERE c_cood=$cod";
            mysqli_query($conx,$sql) or die("Actualizacion Fallida");
        }
        public function Eliminar_Cuenta($cod){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql="DELETE FROM cuenta WHERE c_cood=$cod";
            mysqli_query($conx,$sql) or die("Eliminacion Fallida");
        }
        public function Login($usuario,$contrasena){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql=mysqli_query($conx,"SELECT `c_cood`,`c_usuario`,`c_contrasena`,`tc_cood` 
            FROM `cuenta`
            WHERE `c_usuario`='$usuario' AND `c_contrasena`='$contrasena' LIMIT 1") or die ("Error Login");
            if($reg = mysqli_fetch_array($sql)){
                return array(true,$reg["tc_cood"]);
            }else{
                return array(false,null);
            }
        }
    }
    
?>

