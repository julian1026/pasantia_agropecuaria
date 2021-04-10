<?php
require '../../Model/modelo_finca.php';

$cedula = $_POST['cedula'];
$fechaI = $_POST['fechaI'];
$fechaF = $_POST['fechaF'];

$MU = new Modelo_Finca();

$consulta = $MU->reporte2($cedula, $fechaI, $fechaF);
echo json_encode($consulta);
