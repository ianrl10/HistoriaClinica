<?php
    class Modelo_Medico{
       private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion-conectar();
        }
    }

?>
