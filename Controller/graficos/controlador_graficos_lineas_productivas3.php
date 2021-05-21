<?php
require '../../Model/modelo_graficas.php';

$MU = new Modelo_Grafica();

$consulta = $MU->listarLineaProductivaTres();
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
