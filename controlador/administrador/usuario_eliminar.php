
<?php
    require '../../modelo/modelo_administrador.php';

    $MA = new Modelo_Administrador();
    $idusuario = htmlspecialchars($_POST['idusuario'], ENT_QUOTES, 'UTF-8');
    $rol = htmlspecialchars($_POST['rol'], ENT_QUOTES, 'UTF-8');
    $apellido = htmlspecialchars($_POST['apellido'], ENT_QUOTES, 'UTF-8');
    $sexo = htmlspecialchars($_POST['sexo'], ENT_QUOTES, 'UTF-8');
    $cedula = htmlspecialchars($_POST['cedula'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $estado = htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8');
    $ciudad = htmlspecialchars($_POST['ciudad'], ENT_QUOTES, 'UTF-8');
    $direccion = htmlspecialchars($_POST['direccion'], ENT_QUOTES, 'UTF-8');
    $telefono = htmlspecialchars($_POST['telefono'], ENT_QUOTES, 'UTF-8');
    $receta = htmlspecialchars($_POST['receta'], ENT_QUOTES, 'UTF-8');
    $consulta = $MA-> Eliminar_Datos_Usuario($idusuario,$rol,$apellido,$sexo,$cedula,$email,$estado,$ciudad,$direccion,$telefono,$receta);
    echo $consulta;
?>