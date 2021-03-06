
<?php
    class Modelo_Medico{
       private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }

        function VerificarUsuario($usuario,$contra){
            $sql = "call SP_VERIFICAR_USUARIO('$usuario')";
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

        function listar_paciente(){
            $sql = "call SP_LISTAR_PACIENTE()";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)){
                while ($consulta_VA = mysqli_fetch_assoc($consulta)){
                    $arreglo["data"][]=$consulta_VA;
                   
                }
                 return $arreglo;
                 $this->conexion->cerrar();   
             
            }

        }

        function listar_combo_rol_paciente(){
            $sql = "call SP_LISTAR_COMBO_ROL_PACIENTE()";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)){
                while ($consulta_VA = mysqli_fetch_array($consulta)){
                        $arreglo[] = $consulta_VA;
                }
                 return $arreglo;
                 $this->conexion->cerrar();   
             
            }

        }

        function Modificar_Datos_Paciente($idusuario,$rol,$nombre,$apellido,$sexo,$cedula,$email,$estado,$ciudad,$direccion,
        $telefono,$medicamento,$indicaciones){
            $sql = "call SP_MODIFICAR_DATOS_PACIENTE('$idusuario','$rol','$nombre','$apellido','$sexo','$cedula','$email'
            ,'$estado','$ciudad','$direccion','$telefono','$medicamento'.'$indicaciones')";
            if ($consulta = $this->conexion->conexion->query($sql)){
                return 1;
          
            }else{
                return 0; 
             
            }

        }



        function Registrar_Usuario($usuario,$rol,$nombre,$apellido,$contra,$sexo,$cedula,$email,$estado,$ciudad,$direccion,
        $telefono,$medicamento,$indicaciones){
            $sql = "call SP_REGISTRAR_USUARIO('$usuario','$rol','$nombre','$apellido','$contra','$sexo','$cedula','$email'
            ,'$estado','$ciudad','$direccion','$telefono','$medicamento'.'$indicaciones')";
            if ($consulta = $this->conexion->conexion->query($sql)){
                if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);
                }
                $this->conexion->cerrar();   
             
            }

        }

    }

?>
