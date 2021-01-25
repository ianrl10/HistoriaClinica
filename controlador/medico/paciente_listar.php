
<?php
    require '../../modelo/modelo_medico.php';
    $MA = new Modelo_Medico();
    $consulta = $MA-> listar_paciente();
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