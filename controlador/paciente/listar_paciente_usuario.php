
<?php
    require '../../modelo/modelo_paciente.php';
    $MM = new Modelo_Paciente();
    $consulta = $MM-> listar_paciente();
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