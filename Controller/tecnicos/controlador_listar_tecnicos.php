<?php
require '../../Model/modelo_tecnico.php';

$MU = new Modelo_Tecnico();

$consulta = $MU->listarTecnicos();
$data = json_encode($consulta);
if (count($consulta) > 0) {
    echo $data;
} else {
    echo 0;
}
