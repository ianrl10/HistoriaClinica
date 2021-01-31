
<?php
    require '../../modelo/modelo_administrador.php';

    $MA = new Modelo_Administrador();
    $usuario = htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'UTF-8');
    $rol = htmlspecialchars($_POST['rol'], ENT_QUOTES, 'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
    $apellido = htmlspecialchars($_POST['apellido'], ENT_QUOTES, 'UTF-8');
    $contra = password_hash($_POST['contrasena'], PASSWORD_DEFAULT, ['cost'=>10]);
    $sexo = htmlspecialchars($_POST['sexo'], ENT_QUOTES, 'UTF-8');
    $cedula = htmlspecialchars($_POST['cedula'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $estado = htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8');
    $ciudad = htmlspecialchars($_POST['ciudad'], ENT_QUOTES, 'UTF-8');
    $direccion = htmlspecialchars($_POST['direccion'], ENT_QUOTES, 'UTF-8');
    $telefono = htmlspecialchars($_POST['telefono'], ENT_QUOTES, 'UTF-8');
    $medicamento = htmlspecialchars($_POST['medicamento'], ENT_QUOTES, 'UTF-8');
    $indicaciones = htmlspecialchars($_POST['indicaciones'], ENT_QUOTES, 'UTF-8');
    $consulta = $MA-> Registrar_Usuario($usuario,$rol,$nombre,$apellido,$contra,$sexo,$cedula,$email,$estado,$ciudad,$direccion,$telefono,$medicamento,$indicaciones);
    echo $consulta;
?>