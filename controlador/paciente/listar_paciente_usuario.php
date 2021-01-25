
<?php
    require '../../modelo/modelo_paciente.php';
    $MA = new Modelo_Paciente();
    $consulta = $MA-> listar_paciente_usuario();
    if($consulta){
        echo json_encode($consulta);
    }else{
        echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';   
    }    
  
?>