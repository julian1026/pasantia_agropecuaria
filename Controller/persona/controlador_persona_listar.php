<?php
 require '../../Model/modelo_personas.php';

 $MU= new Modelo_Persona();

 $consulta=$MU->listarPersona();
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
