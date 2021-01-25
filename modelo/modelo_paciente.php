
<?php
    class Modelo_Paciente{
       private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }

        function VerificarPacienteUsuario($usuario,$contra){
            $sql = "call SP_VERIFICAR_PACIENTE_USUARIO('$usuario')";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)){
                while ($consulta_VA = mysqli_fetch_array($consulta)){
                    if(password_verify($contra, $consulta_VA["password_usuario"]))
                    {
                        $arreglo[] = $consulta_VA;
                    }
                }
                 return $arreglo;
                 $this->conexion->cerrar();   
             
            }

        }

        function listar_paciente_usuario(){
            $sql = "call SP_LISTAR_PACIENTE_USUARIO()";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)){
                while ($consulta_VA = mysqli_fetch_assoc($consulta)){
                    $arreglo["data"][]=$consulta_VA;
                   
                }
                 return $arreglo;
                 $this->conexion->cerrar();   
             
            }

        }

        function listar_combo_rol(){
            $sql = "call SP_SP_LISTAR_COMBO_ROL()";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)){
                while ($consulta_VA = mysqli_fetch_array($consulta)){
                        $arreglo[3] = $consulta_VA;
                }
                 return $arreglo;
                 $this->conexion->cerrar();   
             
            }

        }

    }

?>
