<?php
require '../../Model/modelo_finca.php';

$MU = new Modelo_Finca();

$consulta = $MU->listarFincas();
if ($consulta) {
    echo json_encode($consulta);
} else {
    echo '{
        "sEcho": 1,
        "iTotalRecords": "0",
        "iTotalDisplayRecords": "0",
        "aaData": []
    }';
}
