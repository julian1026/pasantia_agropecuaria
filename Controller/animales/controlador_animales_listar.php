<?php
require '../../Model/modelo_animales.php';

$MU = new Modelo_Animal();
$idFinca = $_POST['idFinca'];
$consulta = $MU->listarAnimales($idFinca);
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
