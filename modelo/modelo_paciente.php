<?php
    class Modelo_Paciente{
       private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion-conectar();
        }
    }

?>
