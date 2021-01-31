

<?php
    require '../../modelo/modelo_administrador.php';
    $MA = new Modelo_Administrador();
    $consulta = $MA-> listar_combo_receta();
    echo json_encode($consulta);
?>