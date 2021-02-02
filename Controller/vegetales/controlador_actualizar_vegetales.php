<?php
require '../../Model/modelo_vegetales.php';

$MU = new Modelo_Vegetal();



/* datos finca */
$nombreVegetal = htmlspecialchars($_POST['nombreVegetal'], ENT_QUOTES, 'utf-8');
$tipoVegetal = htmlspecialchars($_POST['tipoVegetal'], ENT_QUOTES, 'utf-8');
$cantidadVegetal = htmlspecialchars($_POST['cantidadVegetal'], ENT_QUOTES, 'utf-8');
$informacionVegetal = htmlspecialchars($_POST['informacionVegetal'], ENT_QUOTES, 'utf-8');
$idVegetales = htmlspecialchars($_POST['idVegetal'], ENT_QUOTES, 'utf-8');

$actualizar = $MU->actualizarVegetales(
    $nombreVegetal,
    $tipoVegetal,
    $cantidadVegetal,
    $informacionVegetal,
    $idVegetales
);

echo $actualizar;
