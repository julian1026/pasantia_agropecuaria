<?php
require '../../Model/modelo_vegetales.php';

$MU = new Modelo_Vegetal();
$idFinca = $_POST['idFinca'];
$consulta = $MU->listarVegetales($idFinca);
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
