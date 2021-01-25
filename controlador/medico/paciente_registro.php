
<?php
    require '../../modelo/modelo_medico.php';

    $MM = new Modelo_Medico();
    $usuario = htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'UTF-8');
    $rol = htmlspecialchars($_POST['rol'], ENT_QUOTES, 'UTF-8');
    $apellido = htmlspecialchars($_POST['apellido'], ENT_QUOTES, 'UTF-8');
    $contra = password_hash($_POST['contrasena'], PASSWORD_DEFAULT, ['cost'=>10]);
    $sexo = htmlspecialchars($_POST['sexo'], ENT_QUOTES, 'UTF-8');
    $cedula = htmlspecialchars($_POST['cedula'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $estado = htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8');
    $ciudad = htmlspecialchars($_POST['ciudad'], ENT_QUOTES, 'UTF-8');
    $direccion = htmlspecialchars($_POST['direccion'], ENT_QUOTES, 'UTF-8');
    $telefono = htmlspecialchars($_POST['telefono'], ENT_QUOTES, 'UTF-8');
    $receta = htmlspecialchars($_POST['receta'], ENT_QUOTES, 'UTF-8');
    $consulta = $MM-> Registrar_Paciente($usuario,$rol,$apellido,$contra,$sexo,$cedula,$email,$estado,$ciudad,$direccion,$telefono,$receta);
    echo $consulta;
?>