
<?php
    class conexion{
        private $servidor;
        private $usuario;
        private $contrasena;
        private $database;
        public $conexion;
        public function __construct(){
            $this->servidor = "localhost";
            $this-> usuario = "root";
            $this-> contrasena = "";
            $this-> database = "bd_historiaclinica";   
        }
        function conectar(){
            $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contrasena,
            $this->database);
            $this->conexion->set_charset("utf8");
        }
        function cerrar(){
            $this->conexion->close();
        }
    }
?>