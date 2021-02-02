<?php
require '../../Model/modelo_animales.php';

$MU = new Modelo_Animal();



/* datos finca */
$tipo = htmlspecialchars($_POST['tipoAnimal'], ENT_QUOTES, 'utf-8');
$raza = htmlspecialchars($_POST['razaAnimal'], ENT_QUOTES, 'utf-8');
$vacuna = htmlspecialchars($_POST['nombreVacuna'], ENT_QUOTES, 'utf-8');
$cantidad = htmlspecialchars($_POST['cantidadAnimal'], ENT_QUOTES, 'utf-8');
$informacion = htmlspecialchars($_POST['informacionAnimal'], ENT_QUOTES, 'utf-8');
$idAnimal = htmlspecialchars($_POST['idAnimal'], ENT_QUOTES, 'utf-8');

$actualizar = $MU->actualizarAnimales(
    $tipo,
    $raza,
    $vacuna,
    $cantidad,
    $informacion,
    $idAnimal
);

echo $actualizar;
