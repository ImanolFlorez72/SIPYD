<?php
    require_once("../Controlador/Conexion.php");
    class Elementos{
        public function Consultar_Elementos(){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $data=array();
            $sql = mysqli_query($conx, "SELECT e.`e_cod`,e.`e_descripcion`,e.`e_serial`,e.`e_modelo`,e.`e_observacion`,ee.`ee_cood`,ee.`ee_descripcion`,te.`te_cood`,te.`te_descripcion`
            FROM `elementos` AS e ,`estado_elemento` AS ee,`tipo_elemento` AS te
            WHERE e.`ee_cood`=ee.`ee_cood` AND e.`te_cood`=te.`te_cood`") or die ("Error");      
            while($reg = mysqli_fetch_array($sql)){
                $data[$reg["e_cod"]] = array("Descripcion"=> $reg["e_descripcion"],
                                            "Serial"=> $reg["e_serial"],
                                            "Modelo"=> $reg["e_modelo"],
                                            "Cod_EstadoElemento"=> $reg["ee_cood"],
                                            "EstadoElemento"=>$reg["ee_descripcion"],
                                            "Observacion"=> $reg["e_observacion"],
                                            "Cod_TipoElemento"=> $reg["te_cood"],
                                            "TipoElemento"=> $reg["te_descripcion"]);
            }
            //mysql_close($conx);
            return $data;
        
        }
        public function Insertar_Elementos($cod,$descripcion,$serial,$modelo,$codigoestado,$observacion,$codigotipo){
            $conexion = new Conexion();
            $conx = $conexion->Conectar();
            $sql = "INSERT INTO elementos (e_cood, e_descripcion, e_serial, e_modelo, ee_cood, e_obeservacion, te_cood)  
            VALUES ('$cod','$descripcion','$serial','$modelo',$codigoestado,'$observacion',$codigotipo)";
            if (mysqli_query($conx, $sql) == true) {
                echo "Excelente man";
            }else{
                echo $conx->error;
            }    
        }
        public function Actualizar_Elemento($cod,$descripcion,$serial,$modelo,$codigoestado,$observacion,$codigotipo){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql="UPDATE elementos SET e_descripcion='$descripcion',e_serial='$serial', e_modelo='$modelo', ee_cood=$codigoestado, e_observacion='$observacion', te_cood=$codigotipo 
            WHERE e_cod=$cod";

            if (mysqli_query($conx,$sql) == true) {
                echo "Cambios guardados";
            }else{
                echo $conx->error;
            }

        }
        public function Eliminar_Elemento($cod){
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
            $sql="DELETE FROM elementos WHERE e_cod=$cod";
            mysqli_query($conx,$sql) or die("Eliminacion Fallida");
        }
    }
    
?>