<?php
require '../../Model/modelo_vegetales.php';

$MU = new Modelo_Vegetal();



/* datos finca */
$nombreVegetal = htmlspecialchars($_POST['nombreVegetal'], ENT_QUOTES, 'utf-8');
$tipoPlanta = htmlspecialchars($_POST['tipoVegetal'], ENT_QUOTES, 'utf-8');
$cantidad = $_POST['cantidadVegetal'];
$idFinca = $_POST['idFinca'];
$informacion = htmlspecialchars($_POST['informacionVegetal'], ENT_QUOTES, 'utf-8');


$registrar = $MU->registrarVegetales($nombreVegetal, $tipoPlanta, $cantidad, $informacion, $idFinca);
echo $registrar;
