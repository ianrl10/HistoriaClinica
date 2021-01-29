
<?php
    require '../../modelo/modelo_paciente.php';

    $MA = new Modelo_Paciente();
    $usuario = htmlspecialchars($_POST['user'], ENT_QUOTES, 'UTF-8');
    $contra = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');
    $consulta = $MA-> VerificarPacienteUsuario($usuario,$contra);
    $data = json_encode($consulta);
    if(count($consulta)>0){
        echo $data;
    }else{
        echo 0;
    }


?>