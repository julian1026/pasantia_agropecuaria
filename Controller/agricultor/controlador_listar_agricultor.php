<?php
require '../../Model/modelo_agricultor.php';
$idPersona = $_POST['idPer'];

$MU = new Modelo_Agricultor();

$consulta = $MU->listarAgricultores($idPersona);
$data = json_encode($consulta);
if (count($consulta) > 0) {
    echo $data;
} else {
    echo 0;
}
