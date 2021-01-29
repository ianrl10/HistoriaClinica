
<?php
    require '../../modelo/modelo_medico.php';
    $MA = new Modelo_Medico();
    $consulta = $MA-> listar_combo_rol_paciente();
    echo json_encode($consulta);
?>