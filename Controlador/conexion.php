<?php 
    class Conexion{
        protected $con;
        public function Conectar(){
            $server="localhost";
            $usuario="root";
            $clave="";
            $base="inventario_secretariaedu";
            $this->con=mysqli_connect($server,$usuario,$clave,$base);
            mysqli_set_charset($this->con,'utf8'); 
            return $this->con;
        }
        public function close(){
            $this->con = null;
      }
    }
    
?>