<?php
require '../../Model/modelo_finca.php';

$MU = new Modelo_Finca();

$consulta = $MU->listarActividadesAgro();
$data = json_encode($consulta);
if (count($consulta) > 0) {
    echo $data;
} else {
    echo 0;
}
