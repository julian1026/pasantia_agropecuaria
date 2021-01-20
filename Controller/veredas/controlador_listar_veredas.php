<?php
require '../../Model/modelo_vereda.php';

$MU = new Modelo_Vereda();

$consulta = $MU->listarVeredas();
$data = json_encode($consulta);
if (count($consulta) > 0) {
    echo $data;
} else {
    echo 0;
}
