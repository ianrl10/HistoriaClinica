
<?php
    require '../../modelo/modelo_administrador.php';
    $MA = new Modelo_Administrador();
    $consulta = $MA-> listar_usuario();
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