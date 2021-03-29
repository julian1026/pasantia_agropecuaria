<?php
require '../../Model/modelo_visitaFinca.php';
$idFinca = $_POST['idFinca'];

$MU = new Modelo_VisitarFinca();

$consulta = $MU->listar($idFinca);
$data = json_encode($consulta);
if (count($consulta) > 0) {
    echo $data;
} else {
    echo 0;
}

// $consulta = $MU->listarAll($idFinca);
// $data = json_encode($consulta);
// if (count($consulta) > 0) {
//     echo $data;
// } else {
//     echo 0;
// }
