<?php
require '../../Model/modelo_finca.php';

$MU = new Modelo_Finca();
$idFinca = $_POST['idFinca'];
$consulta = $MU->mostrarGeneral($idFinca);
echo json_encode($consulta);
